<?php
session_start();
// include("./class/DBConnection.php");
if(!isset($_SESSION['user_id']))
{
    header('location:index.php');
}
include('./admin-common.php');
$head= new common_header_footer();

include('./controller/common_controller.php');
$common = new common_controller();


if(isset($_POST['prep_course_submit']))
{
    if($common -> insert_prep_course_options_pattern())
    {
        $success="Data Inserted";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Planet Education</title>
    <?php $head->main_links(); ?>
    <script src="./js/tinymce.min.js" referrerpolicy="origin"></script>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="js/exam-pattern.js"></script>
</head>

<body>
    <style>
    .tox .tox-notification--warning {
        background-color: #fff5cc;
        border-color: #fff0b3;
        color: #222f3e;
        display: none;
    }
    </style>
    <div class="main-wrapper">
        <div class="header">
            <?php $head->main_header();?>
        </div>
        <div class="sidebar" id="sidebar">
            <?php $head->main_sidebar();?>
        </div>


        <div class="page-wrapper">
            <div class="content">
                <div class="row">

                    <div class="col-lg-12">
                        <h4 class="page-title">Add Exam Pattern</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
         if(isset($success))
         {
          ?>
                        <div class="alert alert-success" role="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <?php echo $success;?>

                        </div>
                        <?php   
        }
        ?>
                    </div>
                    <div class="col-lg-12">
                        <form action="#" method="POST">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Select Course :</label>
                                    <select class="form-control" onChange="getSubcat(this.value);" name="course_name_id"
                                        id="category">
                                        <?php
                        include('../connection.php');
                        $query=mysqli_query($con,"SELECT * FROM `course_category`");
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>

                                        <option value="<?php echo $row['course_cat_id'];?>">
                                            <?php echo $row['course_cat_name'];?></option>
                                        <?php    
                        }
                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Select Sub Course :</label>
                                    <select onchange="hide_show(this);" class="form-control" id="subcategory"
                                        name="sub_course_name_id" required>
                                    </select>
                                </div>


                                <!-- Modal Button for Add Exam Pattern -->
                                <div class="col-lg-3 form-group">
                                    <!-------------JEE Button-------------------->
                                    <button type="button" class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".bd-example-modal-lg" id="course_btn" style="display:none; "
                                        onclick="getcourse();">Add Prep Course +
                                    </button>
                                </div>
                                <!-- <div class="col-lg-3">
                                    <a href="./add-prep-course-options.php?prep_course_options_id =<?php echo $prep_course_options_id; ?>"
                                        class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".bd-example-modal-lg" id="course_btn2"
                                        style="display:none; min-width: 200px;" onclick="getcourse();">Update Prep
                                        Course +
                                    </a>
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
    tinymce.init({
        selector: '#mytextarea',
        plugins: [
            'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
            'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
            'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help',
            'wordcount'
        ],
        toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'


    });

    function getSubcat(val) {
        $.ajax({
            type: "POST",
            url: "./get_subcat.php",
            data: 'cat_id=' + val,
            success: function(data) {
                $("#subcategory").html(data);
            }
        });
    }

    function hide_show() {
        if (document.getElementById('subcategory').value != "0") {
            if (course_btn.style.display === "none" && course_btn2.style.display === "none") {
                course_btn.style.display = "block";
                course_btn2.style.display = "block";
            }
        } else {
            course_btn.style.display = "none";
            course_btn2.style.display = "none";
        }
    }
    </script>


    <!-------------------- modal Form for Add JEE Exam Pattern ---------------------------->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="container">

                    <h4 class="text-center p-3">Add Prep Course Data</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label>Course</label>
                                <input type="text" class="form-control" id="course_jee" value="" placeholder=""
                                    name="course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Sub Course</label>
                                <input type="text" class="form-control" id="subcourse_jee" value="" placeholder=""
                                    name="sub_course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Tile (eg. SAT Classroom Training )</label>
                                <input type="text" class="form-control" name="course_title" placeholder="">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Upload Image</label>
                                <input type="text" onfocus="(this.type='file')" class="form-control" name="course_image"
                                    placeholder="">
                            </div>
                            <div class="col-lg-12 form-group">
                                <label> Description (eg. SAT Regular Program -
                                    In-Person or Live Online Classroom Instruction)</label>
                                <textarea class="form-control" id="mytextarea" name="course_description"
                                    placeholder=""></textarea>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label>Features List (eg. * LIVE Classes Taught by Test Prep
                                    Experts)</label>
                                <textarea class="form-control" id="mytextarea" name="course_features_list"
                                    placeholder=""></textarea>
                            </div>

                            <div class="col-lg-4">
                                <button type="submit" name="prep_course_submit" class="btn-primary btn">Submit</button>
                                <button type="button" class="btn-danger btn" data-dismiss="modal"
                                    aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-------------------- modal end Here --------------------------->












    <?php $head->main_script();?>

</body>

</html>