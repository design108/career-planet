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
                                    <a href="./add_pages_data.php" class="btn btn-primary">Add +</a>
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
                                                            <th>Banner Title</th>
                                                            <th>Course Info</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $sql = "SELECT * FROM `jee_data`";
                                                        $result = $con->query($sql);
                                                        
                                                        if($result->num_rows > 0)
                                                        {
                                                            while($row = $result->fetch_assoc()) {
                                                               $jee_data_id = $row['jee_data_id'];
                                                               $banner_title = $row['banner_title'];                                                             
                                                               $course_info = $row['course_info'];
                                                             
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $jee_data_id; ?></td>
                                                            <td><?php echo $banner_title; ?></td>
                                                            <td><?php echo $course_info; ?></td>
                                                            <td>
                                                                <a href="./update_pages_data.php?page_id=<?php echo $jee_data_id; ?>"
                                                                    class="btn btn-info"><i
                                                                        class="fa fa-pencil m-r-5"></i></a>
                                                                <a href="#" class="btn btn-danger"><i
                                                                        class="fa fa-trash-o m-r-5"></i></a>
                                                            </td>
                                                        </tr>

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