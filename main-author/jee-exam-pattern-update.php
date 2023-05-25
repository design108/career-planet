<?php
session_start();
// include("./class/DBConnection.php");
if(!isset($_SESSION['user_id']))
{
    header('location:index.php');
}
include('./admin-common.php');
$head= new common_header_footer();

include('./controller/exam-pattern-controller.php');
$exam_pattern = new Exam_pattern();

if(isset($_POST['update']))
{
if($exam_pattern->jee_main_exam_update())
{
  $message="JEE Main Exam Pattern updated";
  echo" <script>setTimeout(\"location.href = './jee-exam-pattern-update.php';\",4500);</script>";
}
else
{
    echo "error";
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
                        <h4 class="page-title">Update JEE Main Exam Pattern</h4>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="table-responsive">
                            <?php
                            if(isset($message))
                            {
                             ?>
                             <span class="text-success"></span><?php echo $message;?></span>
                             <?php   
                            }
                            
                            ?>
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>Particulars</th>
                                        <th>B.Tech</th>
                                        <th>B.Arch</th>
                                        <th>B.Planning</th>

                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $data=$exam_pattern->jee_main_exam_fetch();
                                    if($data->num_rows>0)
                                    {
                                        while($row=mysqli_fetch_assoc($data))
                                        {
                                         ?>
                                    <form action="jee-exam-pattern-update.php" method="post">
                                        <tr>
                                            <td>
                                                <input type="hidden" name="jee_exam_pattern_id" value="<?php echo $row['jee_exam_pattern_id'];?>">
                                                <input class="form-control" type="text" name="particular"
                                                    value="<?php echo $row['particular'];?>">
                                            </td>

                                            <td>

                                                <textarea class="form-control" name="b_tech"
                                                    rows="3"><?php echo $row['b_tech'];?></textarea>
                                            </td>
                                            <td>

                                                <textarea class="form-control" name="b_arch"
                                                    rows="3"><?php echo $row['b_arch'];?></textarea>
                                            </td>
                                            <td>

                                                <textarea class="form-control" name="b_planning"
                                                    rows="3"><?php echo $row['b_planning'];?></textarea>
                                            </td>
                                            <td>
                                                <input type="submit" name="update" value="Update" class="btn btn-primary">
                                            </td>
                                        </tr>

                                    </form>
                                    <?php   
                                        }
                                    }
                                    else
                                    {
                                        echo "<tr><td colspan='7'>No Data Found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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
    </script>








    <?php $head->main_script();?>

</body>

</html>