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
$data_grade_8=$common->fetch_career_counselling_grade_8();
$data_grade_9=$common->fetch_career_counselling_grade_10();
$college=$common->fetch_College();
$profile=$common->fetch_profile();
$intern=$common->fetch_intern();

if(isset($_POST['Update_grade_8']))
{
    if($common->update_career_counselling_grade_8())
    {
        $success_message="Grades 8-9 Information Updated";
        echo" <script>setTimeout(\"location.href = './career-counselling.php';\",4500);</script>";
    }
    else
    {
        echo "error";
    }
}

if(isset($_POST['Update_grade_10']))
{
    if($common->update_career_counselling_grade_10())
    {
        $success_message2="Grades 10-12 Information Updated";
        echo" <script>setTimeout(\"location.href = './career-counselling.php';\",4500);</script>";
    }
    else
    {
        echo "error";
    }
}

if(isset($_POST['Update_college']))
{
    if($common->update_ccollege())
    {
        $success_message3="College & Graduates Information Updated";
        echo" <script>setTimeout(\"location.href = './career-counselling.php';\",4500);</script>";
    }
    else
    {
        echo "error";
    }
}

if(isset($_POST['Update_profile']))
{
    if($common->update_profile())
    {
        $success_message4="Profile Building Information Updated";
        echo" <script>setTimeout(\"location.href = './career-counselling.php';\",4500);</script>";
    }
    else
    {
        echo "error";
    }
}

if(isset($_POST['Update_intern']))
{
    if($common->update_intern())
    {
        $success_message5="Career Internship Information Updated";
        echo" <script>setTimeout(\"location.href = './career-counselling.php';\",4500);</script>";
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
                        <h4 class="page-title">Career Counselling Programs</h4>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <?php
                        if(isset($success_message))
                        {
                        ?>
                        <span class="text-success"><?php echo $success_message;?></span>
                        <?php    
                        }
                        ?>
                        <?php
                        if(isset($success_message2))
                        {
                        ?>
                        <span class="text-success"><?php echo $success_message2;?></span>
                        <?php    
                        }
                        ?>
                        <?php
                        if(isset($success_message3))
                        {
                        ?>
                        <span class="text-success"><?php echo $success_message3;?></span>
                        <?php    
                        }
                        ?>
                        <?php
                        if(isset($success_message4))
                        {
                        ?>
                        <span class="text-success"><?php echo $success_message4;?></span>
                        <?php    
                        }
                        ?>
                        <?php
                        if(isset($success_message5))
                        {
                        ?>
                        <span class="text-success"><?php echo $success_message5;?></span>
                        <?php    
                        }
                        ?>
                        <div class="transfer-files">
                            <ul class="nav nav-tabs nav-tabs-solid nav-justified mb-0">
                                <li class="nav-item"><a class="nav-link active" href="#grade8" data-toggle="tab">Grades
                                        8-9</a></li>
                                <li class="nav-item"><a class="nav-link" href="#grade10" data-toggle="tab">Grades
                                        10-12</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#college" data-toggle="tab">College &
                                        Graduates</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#Profile" data-toggle="tab">Profile
                                        Building</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#intern" data-toggle="tab">Career
                                        Internship</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="grade8">
                                    <br>

                                    <div class="card" style="padding:10px;"><br>
                                        <h4>Update Career Counselling : <?php echo $data_grade_8['grade'];?></h4><br>
                                        <form action="./career-counselling.php" method="post">
                                            <input type="hidden" name="career_co_id"
                                                value="<?php echo $data_grade_8['career_co_id'];?>">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="grade"
                                                    value="<?php echo $data_grade_8['grade'];?>" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Information</label>
                                                <textarea id="mytextarea" class="form-control" name="information"
                                                    placeholder=""><?php echo $data_grade_8['information'];?></textarea>
                                            </div>

                                            <input type="submit" class="btn btn-primary" value="Update"
                                                name="Update_grade_8">
                                        </form>
                                    </div>

                                </div>
                                <div class="tab-pane" id="grade10">
                                    <br>

                                    <div class="card" style="padding:10px;"><br>
                                        <h4>Update Career Counselling : <?php echo $data_grade_9['grade'];?></h4><br>
                                        <form action="./career-counselling.php" method="post">
                                            <input type="hidden" name="career_co_id"
                                                value="<?php echo $data_grade_9['career_co_id'];?>">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="grade"
                                                    value="<?php echo $data_grade_9['grade'];?>" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Information</label>
                                                <textarea id="mytextarea" class="form-control" name="information"
                                                    placeholder=""><?php echo $data_grade_9['information'];?></textarea>
                                            </div>

                                            <input type="submit" class="btn btn-primary" value="Update"
                                                name="Update_grade_10">
                                        </form>
                                    </div>
                                </div>


                                <div class="tab-pane" id="college">
                                    <br>

                                    <div class="card" style="padding:10px;"><br>
                                        <h4>Update Career Counselling : <?php echo $college['grade'];?></h4><br>
                                        <form action="./career-counselling.php" method="post">
                                            <input type="hidden" name="career_co_id"
                                                value="<?php echo $college['career_co_id'];?>">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="grade"
                                                    value="<?php echo $college['grade'];?>" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Information</label>
                                                <textarea id="mytextarea" class="form-control" name="information"
                                                    placeholder=""><?php echo $college['information'];?></textarea>
                                            </div>

                                            <input type="submit" class="btn btn-primary" value="Update"
                                                name="Update_college">
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane" id="Profile">
                                    <br>

                                    <div class="card" style="padding:10px;"><br>
                                        <h4>Update Career Counselling : <?php echo $profile['grade'];?></h4><br>
                                        <form action="./career-counselling.php" method="post">
                                            <input type="hidden" name="career_co_id"
                                                value="<?php echo $profile['career_co_id'];?>">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="grade"
                                                    value="<?php echo $profile['grade'];?>" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Information</label>
                                                <textarea id="mytextarea" class="form-control" name="information"
                                                    placeholder=""><?php echo $profile['information'];?></textarea>
                                            </div>

                                            <input type="submit" class="btn btn-primary" value="Update"
                                                name="Update_profile">
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane" id="intern">
                                    <br>

                                    <div class="card" style="padding:10px;"><br>
                                        <h4>Update Career Counselling : <?php echo $intern['grade'];?></h4><br>
                                        <form action="./career-counselling.php" method="post">
                                            <input type="hidden" name="career_co_id"
                                                value="<?php echo $intern['career_co_id'];?>">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="grade"
                                                    value="<?php echo $intern['grade'];?>" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Information</label>
                                                <textarea id="mytextarea" class="form-control" name="information"
                                                    placeholder=""><?php echo $intern['information'];?></textarea>
                                            </div>

                                            <input type="submit" class="btn btn-primary" value="Update"
                                                name="Update_intern">
                                        </form>
                                    </div>
                                </div>
                            </div>
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