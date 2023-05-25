<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    header('location:index.php');
}
include('./admin-common.php');
$head= new common_header_footer();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Planet Education</title>
    <?php $head->main_links(); ?>
</head>

<body>
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
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-book"></i></span>
                            <div class="dash-widget-info text-right">
                       
                               <a href="./books-upload.php"> <span class="widget-title1">See Book details <i class="fa fa-book"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $head->main_script();?>

</body>

</html>