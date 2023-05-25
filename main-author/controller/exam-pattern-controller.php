<?php
include("./class/DBConnection.php");
class Exam_pattern
{
    public function jee_main_exam_fetch()
    {
        $db = new DatabaseConnection;
        $con = $db->connection();
        
        $query="SELECT * FROM `jee_exam_pattern`";
       $result=$con->query($query);
       return $result;
    }

    public function jee_main_exam_update()
    {
        $db = new DatabaseConnection;
        $con = $db->connection();

        $jee_exam_pattern_id=$_POST['jee_exam_pattern_id'];
        $particular=$_POST['particular'];
        $b_tech=$_POST['b_tech'];
        $b_arch=$_POST['b_arch'];
        $b_planning=$_POST['b_planning'];

        $query_update=$con->query("UPDATE `jee_exam_pattern` SET `particular`='$particular',`b_tech`='$b_tech',
        `b_arch`='$b_arch',`b_planning`='$b_planning' WHERE jee_exam_pattern_id=$jee_exam_pattern_id");
        return $query_update;

    }

    public function neet_exam_pattern()
    {
        $db = new DatabaseConnection;
        $con = $db->connection();
        $query="SELECT * FROM `neet_exam_pattern`";

        $query_neet=$con->query($query);
        return $query_neet;
    }

    public function neet_exam_pattern_update()
    {
        $db = new DatabaseConnection;
        $con = $db->connection();
        $neet_exam_pattern_id=$_POST['neet_exam_pattern_id'];
        $factors_neet_exam_pattern=$_POST['factors_neet_exam_pattern'];

        $neet_exam_details=$_POST['neet_exam_details'];
        $query_update=$con->query("UPDATE `neet_exam_pattern` SET `factors_neet_exam_pattern`='$factors_neet_exam_pattern',
        `neet_exam_details`='$neet_exam_details' WHERE neet_exam_pattern_id=$neet_exam_pattern_id");
        return $query_update;
    }
}
?>