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


if(isset($_POST['update']))
{
    if($common -> update_jee_data())
    {
        $success="Data Updated";
    }
    else{
        $success="Error....";
    }
}

$page_id = $_GET["page_id"];
$sql = "SELECT * FROM `jee_data` WHERE jee_data_id=$page_id";
$result = $con->query($sql);

if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc()) {
       $banner_title = $row['banner_title'];
       $banner_desc = $row['banner_desc'];
       $main_title = $row['main_title'];
       $course_info = $row['course_info'];
       $exam_pattern_title = $row['exam_pattern_title'];
       $exam_pattern_desc = $row['exam_pattern_desc'];
       $prep_course_title = $row['prep_course_title'];
       $prep_course_info = $row['prep_course_info'];
       $key_features_title = $row['key_features_title'];
       $key_features = $row['key_features'];
       $courses_title = $row['courses_title'];
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
                    <div class="col-lg-12">
                        <div class="alert alert-success" role="alert">
                            <?php echo $success;?>
                        </div>
                    </div>
                    <?php   
        }
        ?>
                    <div class="col-lg-12 offset-lg-2">
                        <h4 class="page-title">Update Pages Data (Test Prep / Languages Program / Kids Program)</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-9 offset-lg-2">
                        <form action="#" method="POST">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Select Course :</label>
                                    <select class="form-control" onChange="getSubcat(this.value);" id="category"
                                        name="course_name_id">
                                        <?php                                        
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

                                    </select>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label>Page Id :</label>
                                    <input class="form-control" name="page_id" value="<?php echo $page_id;?>"
                                        placeholder="" type="text" readonly>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label>Banner Title :</label>
                                    <input class="form-control" name="banner_title" value="<?php echo $banner_title;?>"
                                        placeholder="" type="text">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label>Banner Description (if any..):</label>
                                    <textarea class="form-control" name="banner_desc" value="<?php echo $banner_desc;?>"
                                        placeholder=""></textarea>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label>Main Title:</label>
                                    <input class="form-control" name="main_title" value="<?php echo $main_title;?>"
                                        placeholder="" type="text">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label>Course Information:</label>
                                    <textarea cols="30" name="course_info" placeholder="" rows="4" id="mytextarea"
                                        class="form-control"><?php echo $course_info;?></textarea>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label>Exam Pattern Title:</label>
                                    <input class="form-control" name="exam_pattern_title"
                                        value="<?php echo $exam_pattern_title;?>" placeholder="" type="text">
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label>Exam Pattern Description:</label>
                                    <textarea cols="30" name="exam_pattern_desc" placeholder="" rows="4" id="mytextarea"
                                        class="form-control"><?php echo $exam_pattern_desc;?></textarea>
                                </div>

                                <!-------------------------------------------------------------------------->

                                <div class="col-lg-12 form-group">
                                    <label>Prepration Courses Title
                                        :</label>
                                    <input class="form-control" name="prep_course_title"
                                        value="<?php echo $prep_course_title;?>" placeholder="" type="text">
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label>Prepration Courses Information (if any.....):</label>
                                    <textarea cols="30" name="prep_course_info" placeholder="" rows="4" id="mytextarea"
                                        class="form-control"><?php echo $prep_course_info;?></textarea>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label>Key Feature Title:</label>
                                    <input class="form-control" name="key_feature_title"
                                        value="<?php echo $key_features_title; ?>" placeholder="" type="text">
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label>Add Key Features in list Format</label>
                                    <textarea cols="30" name="key_features" placeholder=" " rows="4" id="mytextarea"
                                        class="form-control"><?php echo  $key_features; ?></textarea>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label>Prep Courses Title (eg. Digital SAT Prep Options):</label>
                                    <input class="form-control" name="courses_title"
                                        value="<?php echo $courses_title; ?>" placeholder="" type="text">
                                </div>

                                <div class="col-lg-12 form-group m-t-20">
                                    <button name="update" class="btn btn-primary submit-btn">Update Data </button>
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