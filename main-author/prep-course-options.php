<?php
  include('../connection.php');
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

if(isset($_POST['prep_course_update']))
{
    if($common -> update_prep_course_options_pattern())
    {
        $success="Data Update";
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
                        <h4 class="page-title">Pages Data (Test Prep / Languages Program / Kids Program)</h4>
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
                                <div class="col-lg-7 form-group">
                                    <label>Search Course :</label>
                                    <input class="form-control" id="myInput" type="text" placeholder="Search Course...">
                                </div>
                                <div class="col-lg-5 text-right pr-5">
                                    <br>
                                    <a href="./add-prep-course-options.php" class="btn btn-primary">Add +</a>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <div class="card-block">
                                            <!-- <h6 class="card-title text-bold"></h6> -->

                                            <div class="table-responsive">
                                                <table class="datatable table table-stripped" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Course Name</th>
                                                            <th>Sub Course Name</th>
                                                            <th>Course Image</th>
                                                            <th>Course Title</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $sql = "SELECT * FROM `prep_course_options` 
                                                        INNER JOIN `course_category` ON prep_course_options.course_id = course_category.course_cat_id 
                                                        INNER JOIN `course_subcat` ON prep_course_options.sub_course_id = course_subcat.course_subcat_id";
                                                        $result = $con->query($sql);
                                                        
                                                        if($result->num_rows > 0)
                                                        {
                                                            while($row = $result->fetch_assoc()) {
                                                               $prep_course_options_id  = $row['prep_course_options_id'];
                                                               $course_name = $row['course_cat_name'];
                                                               $sub_course_name = $row['course_subcat_name'];

                                                               $course_id = $row['course_id'];
                                                               $sub_course_id = $row['sub_course_id'];
                                                               $course_image = $row['course_image'];                                                             
                                                               $course_title = $row['course_title'];  
                                                               $course_description = $row['course_description'];    
                                                               $course_features_list = $row['course_features_list'];                                                         
                                                                                                                            
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $prep_course_options_id; ?></td>
                                                            <td><?php echo $course_name; ?></td>
                                                            <td><?php echo $sub_course_name; ?></td>
                                                            <td><img src="../images/prep_courses/<?php echo $course_image; ?>"
                                                                    alt="" style="height:80px; max-width:100%;"> </td>
                                                            <td><?php echo $course_title; ?></td>
                                                            <td>
                                                                <a href="./prep-course-options.php?prep_course_options_id=<?php echo $prep_course_options_id; ?>"
                                                                    data-toggle="modal"
                                                                    data-target=".bd-example-modal-lg<?php echo $prep_course_options_id;  ?>"
                                                                    class="btn btn-info"><i
                                                                        class="fa fa-pencil m-r-5"></i></a>
                                                                <a href="#" class="btn btn-danger"><i
                                                                        class="fa fa-trash-o m-r-5"></i></a>
                                                            </td>
                                                        </tr>
                                                        <!-------------------- modal Form for Add JEE Exam Pattern ---------------------------->
                                                        <div class="modal fade bd-example-modal-lg<?php echo $prep_course_options_id; ?>"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content p-3">
                                                                    <div class="container">
                                                                        <h4 class="text-center p-3">Add Prep Course Data
                                                                        </h4>
                                                                        <form
                                                                            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                                                                            method="POST" enctype="multipart/form-data">
                                                                            <div class="row">
                                                                                 <input type="hidden"
                                                                                        class="form-control"
                                                                                        id="course_jee"
                                                                                        value="<?php echo $prep_course_options_id;?>"
                                                                                        placeholder="" name="prep_course_options_id"
                                                                                        readonly>
                                                                                <div class="col-lg-6 form-group">
                                                                                    <label>Course</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="course_jee"
                                                                                        value="<?php echo $course_id;?>"
                                                                                        placeholder="" name="course_id"
                                                                                        readonly>
                                                                                </div>
                                                                                <div class="col-lg-6 form-group">
                                                                                    <label>Sub Course</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="subcourse_jee"
                                                                                        value="<?php echo $sub_course_id;?>"
                                                                                        placeholder=""
                                                                                        name="sub_course_id" readonly>
                                                                                </div>
                                                                                <div class="col-lg-6 form-group">
                                                                                    <label>Title (eg. SAT Classroom
                                                                                        Training )</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="course_title"
                                                                                        placeholder=""
                                                                                        value="<?php echo $course_title; ?>">
                                                                                </div>
                                                                                <div class="col-lg-6 form-group">
                                                                                    <label>Upload Image</label>
                                                                                    <input type="text"
                                                                                        onfocus="(this.type='file')"
                                                                                        class="form-control"
                                                                                        name="course_image"
                                                                                        placeholder=""
                                                                                        value="<?php echo $course_image; ?>">
                                                                                </div>
                                                                                <div class="col-lg-12 form-group">
                                                                                    <label> Description (eg. SAT Regular
                                                                                        Program -
                                                                                        In-Person or Live Online
                                                                                        Classroom Instruction)</label>
                                                                                    <textarea class="form-control"
                                                                                        id="mytextarea"
                                                                                        name="course_description"
                                                                                        placeholder=""><?php echo $course_description; ?></textarea>
                                                                                </div>
                                                                                <div class="col-lg-12 form-group">
                                                                                    <label>Features List (eg. * LIVE
                                                                                        Classes Taught by Test Prep
                                                                                        Experts)</label>
                                                                                    <textarea class="form-control"
                                                                                        id="mytextarea"
                                                                                        name="course_features_list"
                                                                                        placeholder=""><?php echo $course_features_list; ?></textarea>
                                                                                </div>

                                                                                <div class="col-lg-4">
                                                                                    <button type="submit"
                                                                                        name="prep_course_update"
                                                                                        class="btn-primary btn">Update</button>
                                                                                    <button type="button"
                                                                                        class="btn-danger btn"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">Cancel</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-------------------- modal end Here --------------------------->

                                                        <?php 
                                                         
                                                        }
                                                    }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>






    <?php $head->main_script();?>
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
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>

</body>

</html>