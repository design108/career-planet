<?php
session_start();
include('./admin-common.php');
$head= new common_header_footer();
include('./controller/common_controller.php');
$book=new common_controller();
if(isset($_POST['login']))
{
    $verify=$book->login_verify();
    if(mysqli_num_rows($verify)>0)
    {
        $row=mysqli_fetch_array($verify);
        $_SESSION['user_id']=$row['user_id'];
        $_SESSION['email']=$row['email'];
        $success="Login success.You will redirect to dashbord. Please wait...";
        echo" <script>setTimeout(\"location.href = './admin-dashbord.php';\",4500);</script>";
    }
    else
        {
            $error = "Email & password does not match";
            
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Planet education</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <h3 class="text-center">Planet Education</h3>
                    <form action="index.php" method="POST" class="form-signin" id="login_form">
                        <div class="account-logo">
                            <a href="index.php"><img src="assets/img/favicon.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" autofocus="" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary account-btn" name="login">Login</button>
                            <img id="loaderIcon" style="visibility:hidden; display:none;width:35px;height:35px;"
                                src="./assets/img/loadere.gif" alt="..." />
                        </div>
                    </form>
                    <?php
                        if(isset($success))
                        {
                        ?>
                    <span class="text-success"><?php echo $success;?></span>
                    <?php   
                        }
                        if(isset($error))
                        {
                        ?>
                    <span class="text-danger"><?php echo $error;?></span>
                    <?php    
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        $('#login_form').submit(function() {
            $('#loaderIcon').css('visibility', 'visible');
            $('#loaderIcon').show();
        });
    })
    </script>
</body>

</html>