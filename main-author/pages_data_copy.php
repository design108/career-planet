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


if(isset($_POST['submit']))
{
    if($common -> insert_jee_data())
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
</head>

<body>
    <style>
    .tox .tox-notification--warning {
        background-color: #fff5cc;
        border-color: #fff0b3;
        color: #222f3e;
        display: none;
    }

    .form-group {
        margin-bottom: 28px;
    }

    label {
        color: black;
        font-size: 15px;
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
                    <?php 
         if(isset($success))
         {
          ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success;?>
                    </div>
                    <?php   
        }
        ?>
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Pages Data (Test Prep / Languages Program / Kids Program)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9 offset-lg-2">
                        <form action="#" method="POST">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Select Course :</label>
                                    <select class="form-control" onChange="getSubcat(this.value);" id="category"
                                        name="course_name_id">
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
                                    <select class="form-control" name="sub_course_name_id" id="subcategory">
                                        <!-- <option value="6">Engineering Entrance Tests- JEE</option>
                                        <option value="7">Medical Entrance Test- NEET</option>
                                        <option value="8">Foundations Programs</option>
                                        <option value="9">Olympiad Coaching</option>
                                        <option value="10">SAT</option> -->
                                    </select>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label>Banner Title (eg. Digital SAT):</label>
                                    <input class="form-control" name="banner_title" placeholder="" type="text">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label>Banner Description (eg. Crack the digital SAT | Score 1500+ in SAT | Learn
                                        from Test Prep Experts):</label>
                                    <textarea class="form-control" name="banner_desc" placeholder=""></textarea>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label>Main Title (eg. Digital SAT):</label>
                                    <input class="form-control" name="main_title" placeholder="" type="text">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label>Course Information (eg. The Digital SAT is a new format of the SAT test that
                                        will be....):</label>
                                    <textarea cols="30" name="course_info" placeholder="" rows="4" id="mytextarea"
                                        class="form-control"></textarea>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label>Exam Pattern Title (eg. Digital SAT Test Structure):</label>
                                    <input class="form-control" name="exam_pattern_title" placeholder="" type="text">
                                </div>


                                <!-------------------------------------------------------------------------->

                                <div class="col-lg-12 form-group">
                                    <label>Prepration Courses Title (eg. Digital SAT Test Preparation Courses:)
                                        :</label>
                                    <input class="form-control" name="prep_course_title" placeholder="" type="text">
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label>Prepration Courses Information (if any.....):</label>
                                    <textarea cols="30" name="prep_course_info" placeholder="" rows="4" id="mytextarea"
                                        class="form-control"></textarea>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label>Key Feature Title (eg. Key Features of the course:):</label>
                                    <input class="form-control" name="key_feature_title" placeholder="" type="text">
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label>Add Key Features in list Format (eg. - 100% Result Oriented Program, -
                                        Customised study plan):</label>
                                    <textarea cols="30" name="key_features" placeholder=" " rows="4" id="mytextarea"
                                        class="form-control"></textarea>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label>Prep Courses Title (eg. Digital SAT Prep Options):</label>
                                    <input class="form-control" name="courses_title" placeholder="" type="text">
                                </div>

                                <div class="col-lg-12 form-group m-t-20">
                                    <button name="submit" class="btn btn-primary submit-btn">Submit Data </button>
                                </div>
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
    </script>
    <?php $head->main_script();?>

</body>

</html>