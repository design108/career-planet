<?php
class common_header_footer
{
    public function main_links()
    {
    ?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<?php    
    }
    public function main_script()
    {
     ?>
<div class="sidebar-overlay" data-reff=""></div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/Chart.bundle.js"></script>
<script src="assets/js/chart.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<?php   
    }
    public function main_header()
    {
    ?>

<div class="header-left">
    <a href="" class="logo">
        <img src="assets/img/favicon.png" width="35" height="35" alt=""> <span>Planet Education</span>
    </a>
</div>
<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
<a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
<ul class="nav user-menu float-right">
    <li class="nav-item dropdown has-arrow">
        <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
            <span class="user-img">
                <img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
                <span class="status online"></span>
            </span>
            <span> <?php 
echo "Welcome ". $_SESSION['email'];
            ?></span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="./index.php">Logout</a>
        </div>
    </li>
</ul>
<div class="dropdown mobile-user-menu float-right">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
            class="fa fa-ellipsis-v"></i></a>
    <div class="dropdown-menu dropdown-menu-right">

        <a class="dropdown-item" href="./index.php">Logout</a>
    </div>
</div>
<?php
    }
    public function main_sidebar()
    {
        $activePage = basename($_SERVER['PHP_SELF'], ".php");
    ?>
<style>
#active {
    color: #000000;
    background-color: #bbe6ff;
    border-right: 3px solid #009efb;
}
</style>
<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li class="menu-title">Main</li>
            <li>
                <a href="./admin-dashbord.php" id="<?= ($activePage == 'admin-dashbord') ? 'active':''; ?>"><i
                        class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li>
                <a href="./pages_data.php" id="<?= ($activePage == 'pages_data') ? 'active':''; ?>"><i
                        class="fa fa-dashboard"></i> <span> Pages Data </span></a>
            </li>
            <li>
                <a href="./add-exam-pattern.php" id="<?= ($activePage == 'add-exam-pattern') ? 'active':''; ?>"><i
                        class="fa fa-dashboard"></i> <span>Add Exam Pattern </span></a>
            </li>
            <li class="submenu">
							<a href="#"><i class="fa fa-user"></i> <span>Update Exam Pattern</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="./jee-exam-pattern-update.php">JEE Main Exam Pattern</a></li>
								<li><a href="./neet-exam-pattern-update.php">NEET Exam Pattern</a></li>
								<li><a href="#">Olympiad Exam Preparation</a></li>
								<li><a href="#">Digital SAT Test Structure</a></li>
                                <li><a href="#">ACT Exam Pattern</a></li>
                                <li><a href="#">GMAT Test Structure</a></li>
                                <li><a href="#">GRE Test Structure</a></li>
                                <li><a href="#">UCAT Test Structure</a></li>
                                <li><a href="#">TOEFL iBT Test Structure</a></li>
                                <li><a href="#">IELTS Test Structure</a></li>
							</ul>
						</li>
            <li>
                <a href="./prep-course-options.php" id="<?= ($activePage == 'add-prep-course-options') ? 'active':''; ?>"><i
                        class="fa fa-dashboard"></i> <span>Prep Course Options</span></a>
            </li>
           

            

        </ul>
    </div>
</div>
<?php    
    }
}
?>