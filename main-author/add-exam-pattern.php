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


if(isset($_POST['jee_button_submit']))
{
    if($common -> insert_jee_exam_pattern())
    {
        $success="Data Inserted";
    }
}

if(isset($_POST['neet_button_submit']))
{
    if($common -> insert_neet_exam_pattern())
    {
        $success="Data Inserted";
    }
}

if(isset($_POST['olympiad_coaching_submit']))
{
    if($common -> insert_olympiad_coaching_exam_pattern())
    {
        $success="Data Inserted";
    }
}

if(isset($_POST['sat_exam_submit']))
{
    if($common -> insert_sat_exam_pattern())
    {
        $success="Data Inserted";
    }
}

if(isset($_POST['act_exam_submit']))
{
    if($common -> insert_act_exam_pattern())
    {
        $success="Data Inserted";
    }
}

if(isset($_POST['gmat_exam_submit']))
{
    if($common -> insert_gmat_exam_pattern())
    {
        $success="Data Inserted";
    }
}

if(isset($_POST['gre_exam_submit']))
{
    if($common -> insert_gre_exam_pattern())
    {
        $success="Data Inserted";
    }
}

if(isset($_POST['ucat_exam_submit']))
{
    if($common -> insert_ucat_exam_pattern())
    {
        $success="Data Inserted";
    }
}

if(isset($_POST['toefl_exam_submit']))
{
    if($common -> insert_toefl_exam_pattern())
    {
        $success="Data Inserted";
    }
}

if(isset($_POST['ielts_exam_submit']))
{
    if($common -> insert_ielts_exam_pattern())
    {
        $success="Data Inserted";
    }
}

if(isset($_POST['languages_exam_submit']))
{
    if($common -> insert_languages_exam_pattern())
    {
        $success = "Data Inserted";
    }
}

if(isset($_POST['kids_program_level_submit']))
{
    if($common -> insert_kids_program_level())
    {
        $success = "Data Inserted";
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
                                    <select onchange="hide_show_btn(this);" class="form-control" id="subcategory"
                                        name="sub_course_name_id">
                                    </select>
                                </div>


                                <!-- Modal Button for Add Exam Pattern -->
                                <div class="col-lg-6 form-group">
                                    <!-------------JEE Button-------------------->
                                    <button type="button" class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".bd-example-modal-lg" id="jee_btn" style="display:none;"
                                        onclick="getcourse();">Add JEE
                                        Exam Pattern +</button>


                                    <!-------------NEET Button-------------------->
                                    <button type="button" class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".modal_NEET" onclick="getcourse();" id="neet_btn"
                                        style="display:none;">Add NEET
                                        Exam Pattern +</button>


                                    <!-------------Foundation Program Button---------------------------->
                                    <button type="button" class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".modal_Foundation" onclick="getcourse();" id="foundation_btn"
                                        style="display:none;">Add
                                        Foundation Program
                                        Exam Pattern +</button>

                                    <!-------------Olympiad Program Button------------------------------->
                                    <button type="button" class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".modal_Olympiad" onclick="getcourse();" id="olympiad_btn"
                                        style="display:none;">Add
                                        Olympiad Coaching
                                        Exam Pattern +</button>

                                    <!-------------SAT Program Button------------------------------------>
                                    <button type="button" class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".modal_SAT" onclick="getcourse();" id="sat_btn"
                                        style="display:none;">Add
                                        SAT
                                        Exam Pattern +</button>

                                    <!-------------ACT Program Button------------------------------------>
                                    <button type="button" class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".modal_ACT" onclick="getcourse();" id="act_btn"
                                        style="display:none;">Add
                                        ACT
                                        Exam Pattern +</button>

                                    <!-------------AP Exam Program Button------------------------------------>
                                    <button type="button" class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".modal_AP_exam" onclick="getcourse();" id="AP_exam_btn"
                                        style="display:none;">Add
                                        AP
                                        Exam Pattern +</button>

                                    <!-------------GMAT Exam Program Button------------------------------------>
                                    <button type="button" class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".modal_GMAT" onclick="getcourse();" id="GMAT_exam_btn"
                                        style="display:none;">Add
                                        GMAT
                                        Exam Pattern +</button>

                                    <!-------------GRE Exam Program Button------------------------------------>
                                    <button type="button" class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".modal_GRE" onclick="getcourse();" id="GRE_exam_btn"
                                        style="display:none;">Add
                                        GRE
                                        Exam Pattern +</button>

                                    <!-------------UCAT Exam Program Button------------------------------------>
                                    <button type="button" class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".modal_UCAT" onclick="getcourse();" id="UCAT_exam_btn"
                                        style="display:none;">Add
                                        UCAT
                                        Exam Pattern +</button>

                                    <!-------------TOEFL Exam Program Button------------------------------------>
                                    <button type="button" class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".modal_TOEFL" onclick="getcourse();" id="TOEFL_exam_btn"
                                        style="display:none;">Add
                                        TOEFL
                                        Exam Pattern +</button>

                                    <!-------------IELTS Exam Program Button------------------------------------>
                                    <button type="button" class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".modal_IELTS" onclick="getcourse();" id="IELTS_exam_btn"
                                        style="display:none;">Add
                                        IELTS
                                        Exam Pattern +</button>

                                    <!-------------Language Exam Program Button------------------------------------>
                                    <button type="button" class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".modal_Language" onclick="getcourse();" id="Languages_exam_btn"
                                        style="display:none;">Add
                                        Languages
                                        Levels +</button>

                                    <!-------------Abacus Exam Program Button------------------------------------>
                                    <button type="button" class="btn btn-primary submit-btn" data-toggle="modal"
                                        data-target=".modal_Abacus" onclick="getcourse();" id="Abacus_exam_btn"
                                        style="display:none;">Add
                                        Abacus
                                        Levels +</button>
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


    <!-------------------- modal Form for Add JEE Exam Pattern ---------------------------->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="container">

                    <h4 class="text-center p-3">Add Exam Pattern JEE</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
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
                                <label>Particulars</label>
                                <textarea class="form-control" name="particular"
                                    placeholder="Total Questions"></textarea>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label> B.Tech</label>
                                <textarea class="form-control" name="b_tech" placeholder="90 Questions"></textarea>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>B.Arch</label>
                                <textarea class="form-control" name="b_arch" placeholder="82 Questions"></textarea>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>B.Planning</label>
                                <textarea class="form-control" name="b_planning" placeholder="105 Questions"></textarea>
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" name="jee_button_submit" class="btn-primary btn">Submit</button>

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

    <!-------------------- modal Form for Add NEET Exam Pattern ---------------------------->
    <div class="modal fade modal_NEET" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="container">
                    <h4 class="text-center p-3">Add Exam Pattern For NEET Exam</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label>Course</label>
                                <input type="text" class="form-control" id="course_neet" value="" placeholder=""
                                    name="course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Sub Course</label>
                                <input type="text" class="form-control" id="subcourse_neet" value="" placeholder=""
                                    name="sub_course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Factors in NEET Exam Pattern</label>
                                <textarea class="form-control" placeholder="Factors in NEET Exam Pattern"
                                    name="factors_neet_exam_pattern"></textarea>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Details</label>
                                <textarea class="form-control" placeholder="Details"
                                    name="neet_exam_details"></textarea>
                            </div>

                            <div class="col-lg-4">
                                <button type="submit" name="neet_button_submit" class="btn-primary btn">Submit</button>

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

    <!-------------------- modal Form for Add Olympiad Coaching Exam Pattern ---------------------------->
    <div class="modal fade modal_Olympiad" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="container">
                    <h4 class="text-center p-3">Add Exam Pattern Olympiad Coaching</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label>Course</label>
                                <input type="text" class="form-control" id="course_olympiad" value="" placeholder=""
                                    name="course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Sub Course</label>
                                <input type="text" class="form-control" id="subcourse_olympiad" value="" placeholder=""
                                    name="sub_course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Standards</label>
                                <textarea class="form-control" placeholder="Standards"
                                    name="olympiad_coaching_standards"></textarea>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label> Mode Of Classes</label>
                                <textarea class="form-control" name="olympiad_coaching_made_classes"
                                    placeholder="Mode Of Classes"></textarea>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Courses Covered</label>
                                <textarea class="form-control" name="olympiad_coaching_courses_covered"
                                    placeholder="Courses Covered"></textarea>
                            </div>
                            <div class="col-lg-6 form-group">

                            </div>

                            <div class="col-lg-4">
                                <button type="submit" name="olympiad_coaching_submit"
                                    class="btn-primary btn">Submit</button>

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

    <!-------------------- modal Form for SAT Add Exam Pattern ---------------------------->
    <div class="modal fade modal_SAT" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="container">
                    <h4 class="text-center p-3">Add Exam Pattern SAT Program</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label>Course</label>
                                <input type="text" class="form-control" id="course_sat" value="" placeholder=""
                                    name="course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Sub Course</label>
                                <input type="text" class="form-control" id="subcourse_sat" value="" placeholder=""
                                    name="sub_course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Section</label>
                                <textarea class="form-control" name="SAT_exam_section" placeholder="Section"></textarea>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label> Time</label>
                                <textarea class="form-control" name="SAT_exam_time" placeholder="Time"></textarea>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Number of Questions</label>
                                <textarea class="form-control" name="SAT_no_of_question"
                                    placeholder="Number of Questions"></textarea>
                            </div>
                            <div class="col-lg-6 form-group">

                            </div>

                            <div class="col-lg-4">
                                <button type="submit" name="sat_exam_submit" class="btn-primary btn">Submit</button>

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

    <!-------------------- modal Form for ACT Add Exam Pattern ---------------------------->
    <div class="modal fade modal_ACT" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="container">
                    <h4 class="text-center p-3">Add Exam Pattern ACT Program</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label>Course</label>
                                <input type="text" class="form-control" id="course_act" value="" placeholder=""
                                    name="course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Sub Course</label>
                                <input type="text" class="form-control" id="subcourse_act" value="" placeholder=""
                                    name="sub_course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Test</label>
                                <input type="text" class="form-control" name="act_test" placeholder="Test">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label> Number of Quetions</label>
                                <textarea class="form-control" name="act_no_of_quetion"
                                    placeholder="Number of Quetions"></textarea>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Time Limit</label>
                                <input type="text" class="form-control" name="act_time_limit" placeholder="Time Limit">
                            </div>
                            <div class="col-lg-6 form-group">

                            </div>

                            <div class="col-lg-4">
                                <button type="submit" name="act_exam_submit" class="btn-primary btn">Submit</button>

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


    <!-------------------- modal Form for Add GMAT Exam Pattern ---------------------------->
    <div class="modal fade modal_GMAT" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="container">
                    <h4 class="text-center p-3">Add Exam Pattern GMAT Program</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label>Course</label>
                                <input type="text" class="form-control" id="course_gmat" value="" placeholder=""
                                    name="course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Sub Course</label>
                                <input type="text" class="form-control" id="subcourse_gmat" value="" placeholder=""
                                    name="sub_course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Section</label>
                                <input type="text" class="form-control" name="gmat_section" placeholder="Test">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label> Number of Quetions</label>
                                <input type="text" class="form-control" name="gmat_no_of_questions"
                                    placeholder="Number of Quetions">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Allotted Time </label>
                                <input type="text" class="form-control" name="gmat_allotted_time"
                                    placeholder="Allotted Limit">
                            </div>
                            <div class="col-lg-6 form-group">

                            </div>

                            <div class="col-lg-4">
                                <button type="submit" name="gmat_exam_submit" class="btn-primary btn">Submit</button>

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

    <!-------------------- modal Form for Add GRE Exam Pattern ---------------------------->
    <div class="modal fade modal_GRE" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="container">
                    <h4 class="text-center p-3">Add Exam Pattern GRE Program</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label>Course</label>
                                <input type="text" class="form-control" id="course_gre" value="" placeholder=""
                                    name="course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Sub Course</label>
                                <input type="text" class="form-control" id="subcourse_gre" value="" placeholder=""
                                    name="sub_course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Section</label>
                                <input type="text" class="form-control" name="gre_section" placeholder="Test">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label> Number of Quetions</label>
                                <input type="text" class="form-control" name="gre_no_of_questions"
                                    placeholder="Number of Quetions">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Allotted Time </label>
                                <input type="text" class="form-control" name="gre_allotted_time"
                                    placeholder="Allotted Limit">
                            </div>
                            <div class="col-lg-6 form-group">

                            </div>

                            <div class="col-lg-4">
                                <button type="submit" name="gre_exam_submit" class="btn-primary btn">Submit</button>

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

    <!-------------------- modal Form for Add UCAT Exam Pattern ---------------------------->
    <div class="modal fade modal_UCAT" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="container">
                    <h4 class="text-center p-3">Add Exam Pattern UCAT Program</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label>Course</label>
                                <input type="text" class="form-control" id="course_ucat" value="" placeholder=""
                                    name="course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Sub Course</label>
                                <input type="text" class="form-control" id="subcourse_ucat" value="" placeholder=""
                                    name="sub_course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>UCAT Category</label>
                                <input type="text" class="form-control" name="ucat_category" placeholder="Test">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label> Quetions</label>
                                <input type="text" class="form-control" name="ucat_questions" placeholder="Quetions">
                            </div>

                            <div class="col-lg-6 form-group">
                                <label>Duration </label>
                                <input type="text" class="form-control" name="ucat_duration" placeholder="Duration">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Topics & Skills tested</label>
                                <textarea name="ucat_topics_skills" class="form-control"></textarea>
                            </div>

                            <div class="col-lg-4">
                                <button type="submit" name="ucat_exam_submit" class="btn-primary btn">Submit</button>
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

    <!-------------------- modal Form for Add TOEFL Exam Pattern ---------------------------->
    <div class="modal fade modal_TOEFL" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="container">
                    <h4 class="text-center p-3">Add Exam Pattern TOEFL Program</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label>Course</label>
                                <input type="text" class="form-control" id="course_toefl" value="" placeholder=""
                                    name="course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Sub Course</label>
                                <input type="text" class="form-control" id="subcourse_toefl" value="" placeholder=""
                                    name="sub_course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Section</label>
                                <input type="text" class="form-control" name="toefl_category" placeholder="Test">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>No. of Questions</label>
                                <input type="text" class="form-control" name="toefl_questions" placeholder="Quetions">
                            </div>

                            <div class="col-lg-6 form-group">
                                <label>Allotted Time</label>
                                <input type="text" class="form-control" name="toefl_duration" placeholder="Duration">
                            </div>
                            <div class="col-lg-6 form-group">


                            </div>

                            <div class="col-lg-4">
                                <button type="submit" name="toefl_exam_submit" class="btn-primary btn">Submit</button>
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

    <!-------------------- modal Form for Add IELTS Exam Pattern ---------------------------->
    <div class="modal fade modal_IELTS" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="container">
                    <h4 class="text-center p-3">Add Exam Pattern IELTS Program</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label>Course</label>
                                <input type="text" class="form-control" id="course_ielts" value="" placeholder=""
                                    name="course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Sub Course</label>
                                <input type="text" class="form-control" id="subcourse_ielts" value="" placeholder=""
                                    name="sub_course_id" readonly>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Section</label>
                                <input type="text" class="form-control" name="ielts_section" placeholder="Test">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>No. of Questions</label>
                                <input type="text" class="form-control" name="ielts_no_of_question"
                                    placeholder="Quetions">
                            </div>

                            <div class="col-lg-6 form-group">
                                <label>Allotted Time</label>
                                <input type="text" class="form-control" name="ielts_allotted_time"
                                    placeholder="Duration">
                            </div>
                            <div class="col-lg-6 form-group">

                            </div>

                            <div class="col-lg-4">
                                <button type="submit" name="ielts_exam_submit" class="btn-primary btn">Submit</button>
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

    <!-------------------- modal Form for Add Languages Exam Pattern ---------------------------->
    <div class="modal fade modal_Language" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="container">
                    <h4 class="text-center p-3">Add Exam Pattern Languages Program</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label>Course</label>
                                <input type="text" class="form-control" id="course_language" value="" placeholder=""
                                    name="course_id">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Sub Course</label>
                                <input type="text" class="form-control" id="subcourse_language" value="" placeholder=""
                                    name="sub_course_id">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Levels</label>
                                <input type="text" class="form-control" placeholder="Test" name="levels">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Level Type</label>
                                <input type="text" class="form-control" placeholder="Quetions" name="level_type">
                            </div>


                            <div class="col-lg-4">
                                <button type="submit" name="languages_exam_submit"
                                    class="btn-primary btn">Submit</button>
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

    <!-------------------- modal Form for Add Languages Exam Pattern ---------------------------->
    <div class="modal fade modal_Abacus" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="container">
                    <h4 class="text-center p-3">Add Abacus Levels</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label>Course</label>
                                <input type="text" class="form-control" id="course_abacus" value="" placeholder=""
                                    name="course_id">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Sub Course</label>
                                <input type="text" class="form-control" name="sub_course_id" id="subcourse_abacus"
                                    value="" placeholder="">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Levels</label>
                                <input type="text" class="form-control" name="levels" id="levels" value=""
                                    placeholder="">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Age Group</label>
                                <input type="text" class="form-control" name="age_group" id="age_group" value=""
                                    placeholder="">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Desciption</label>
                                <textarea name="description" class="form-control" id="description"></textarea>
                            </div>

                            <div class="col-lg-6 form-group">

                            </div>


                            <div class="col-lg-4">
                                <button type="submit" name="kids_program_level_submit"
                                    class="btn-primary btn">Submit</button>
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