<?php 
include("./class/DBConnection.php");


class common_controller{
    public function login_verify()
    {
        $db=new DatabaseConnection;
        $con=$db->connection();

        $email=mysqli_real_escape_string($con,$_POST['email']);
        $password=mysqli_real_escape_string($con,$_POST['password']);
        $sql = $con->query("SELECT * FROM `user` WHERE email='$email' and password='$password'");
        return $sql;
    }

// --------------------------Update Data start Here-----------------------------------------

public function update_jee_data(){     
  $db = new DatabaseConnection;
  $con = $db->connection();

  $page_id = mysqli_real_escape_string($con, $_POST['page_id']);
  $banner_title = mysqli_real_escape_string($con, $_POST['banner_title']);
  $banner_desc = mysqli_real_escape_string($con, $_POST['banner_desc']); 
  $main_title = mysqli_real_escape_string($con, $_POST['main_title']);
  $course_info = mysqli_real_escape_string($con, $_POST['course_info']);
  $exam_pattern_title = mysqli_real_escape_string($con, $_POST['exam_pattern_title']);
  $exam_pattern_desc = mysqli_real_escape_string($con, $_POST['exam_pattern_desc']);
  $prep_course_title = mysqli_real_escape_string($con, $_POST['prep_course_title']);
  $prep_course_info = mysqli_real_escape_string($con, $_POST['prep_course_info']);
  $key_feature_title = mysqli_real_escape_string($con, $_POST['key_feature_title']);
  $key_features = mysqli_real_escape_string($con, $_POST['key_features']);
  $courses_title = mysqli_real_escape_string($con, $_POST['courses_title']);
  // $course_name_id = mysqli_real_escape_string($con, $_POST['course_name_id']);
  // $sub_course_name_id = mysqli_real_escape_string($con, $_POST['sub_course_name_id']);
  
  $sql = $con->query("UPDATE `jee_data` SET `banner_title`='$banner_title',
  `banner_desc`='$banner_desc',`main_title`='$main_title',`course_info`='$course_info',
  `exam_pattern_title`='$exam_pattern_title',`prep_course_title`='$prep_course_title',`prep_course_info`='$prep_course_info',
  `key_features_title`='$key_feature_title',`key_features`='$key_features',`courses_title`='$courses_title',
  `exam_pattern_desc`='$exam_pattern_desc' WHERE `jee_data_id` = '$page_id'");
  
  return $sql;

}

public function update_prep_course_options_pattern()
{
  $db = new DatabaseConnection;
  $con = $db->connection();
  
  
  $prep_course_options_id = mysqli_real_escape_string($con, $_POST['prep_course_options_id']);
  // $sub_course_id = mysqli_real_escape_string($con, $_POST['sub_course_id']);
  $course_title = mysqli_real_escape_string($con, $_POST['course_title']);
  
  $course_description = mysqli_real_escape_string($con, $_POST['course_description']);
  $course_features_list = mysqli_real_escape_string($con, $_POST['course_features_list']);

    if(isset($_FILES['course_image']))
    {
     
      $c_image= $_FILES['course_image']['name'];
      $c_image_temp=$_FILES['course_image']['tmp_name'];

        if($c_image_temp !="")
        {
          move_uploaded_file($c_image_temp, "../images/prep_courses/$c_image");
         
$sql="UPDATE `prep_course_options` SET `course_title`='$course_title',`course_image`='$c_image',
      `course_description`='$course_description',`course_features_list`='$course_features_list' WHERE prep_course_options_id=$prep_course_options_id";
      
        }

      }
      else{
        $sql ="UPDATE `prep_course_options` SET `course_title`='$course_title',
      `course_description`='$course_description',`course_features_list`='$course_features_list' WHERE `prep_course_options_id` = $prep_course_options_id";
    
      }
      $run_query=$con->query($sql);
      return $run_query;
}




// ---------------------------------------------------------
    public function insert_jee_data(){     
        $db = new DatabaseConnection;
        $con = $db->connection();

        $banner_title = mysqli_real_escape_string($con, $_POST['banner_title']);
        $banner_desc = mysqli_real_escape_string($con, $_POST['banner_desc']); 
        $main_title = mysqli_real_escape_string($con, $_POST['main_title']);
        $course_info = mysqli_real_escape_string($con, $_POST['course_info']);
        $exam_pattern_title = mysqli_real_escape_string($con, $_POST['exam_pattern_title']);
        $exam_pattern_desc = mysqli_real_escape_string($con, $_POST['exam_pattern_desc']);
        $prep_course_title = mysqli_real_escape_string($con, $_POST['prep_course_title']);
        $prep_course_info = mysqli_real_escape_string($con, $_POST['prep_course_info']);
        $key_feature_title = mysqli_real_escape_string($con, $_POST['key_feature_title']);
        $key_features = mysqli_real_escape_string($con, $_POST['key_features']);
        $courses_title = mysqli_real_escape_string($con, $_POST['courses_title']);
        $course_name_id = mysqli_real_escape_string($con, $_POST['course_name_id']);
        $sub_course_name_id = mysqli_real_escape_string($con, $_POST['sub_course_name_id']);
        
        $sql = $con->query("INSERT INTO `jee_data`(`banner_title`, `banner_desc`, `main_title`, 
        `course_info`, `exam_pattern_title`, `prep_course_title`, `prep_course_info`, `key_features_title`, 
        `key_features`, `courses_title`,`course_name_id`, `sub_course_name_id`, `exam_pattern_desc`) 
        VALUES ('$banner_title','$banner_desc','$main_title','$course_info','$exam_pattern_title','$prep_course_title',
        '$prep_course_info','$key_feature_title','$key_features','$courses_title','$course_name_id', '$sub_course_name_id', '$exam_pattern_desc')");
        
        return $sql;

    }

   
    public function insert_jee_exam_pattern(){     
        $db = new DatabaseConnection;
        $con = $db->connection();
        
        
        $course_id= mysqli_real_escape_string($con, $_POST['course_id']);
        $sub_course_id= mysqli_real_escape_string($con, $_POST['sub_course_id']);
        $particular= mysqli_real_escape_string($con, $_POST['particular']);
        $b_tech= mysqli_real_escape_string($con, $_POST['b_tech']);
        $b_arch= mysqli_real_escape_string($con, $_POST['b_arch']);
        $b_planning= mysqli_real_escape_string($con, $_POST['b_planning']);
       
        
        
        $sql = $con->query("INSERT INTO `jee_exam_pattern`(`course_id`,`sub_course_id`,`particular`, 
        `b_tech`,`b_arch`,`b_planning`) 
        VALUES ('$course_id','$sub_course_id','$particular','$b_tech','$b_arch','$b_planning')");
        
        return $sql;
    }

    public function insert_neet_exam_pattern(){     
        $db = new DatabaseConnection;
        $con = $db->connection();
        
        
        $course_id= mysqli_real_escape_string($con, $_POST['course_id']);
        $sub_course_id= mysqli_real_escape_string($con, $_POST['sub_course_id']);
        $factors_neet_exam_pattern= mysqli_real_escape_string($con, $_POST['factors_neet_exam_pattern']);
        $neet_exam_details= mysqli_real_escape_string($con, $_POST['neet_exam_details']);
       
        
        $sql = $con->query("INSERT INTO `neet_exam_pattern`(`course_id`,`sub_course_id`,`factors_neet_exam_pattern`, 
        `neet_exam_details`) 
        VALUES ('$course_id','$sub_course_id','$factors_neet_exam_pattern','$neet_exam_details')");
        
        return $sql;
    }

    public function insert_olympiad_coaching_exam_pattern(){     
        $db = new DatabaseConnection;
        $con = $db->connection();
        
        
        $course_id= mysqli_real_escape_string($con, $_POST['course_id']);
        $sub_course_id= mysqli_real_escape_string($con, $_POST['sub_course_id']);
        $olympiad_coaching_standards= mysqli_real_escape_string($con, $_POST['olympiad_coaching_standards']);
        $olympiad_coaching_made_classes= mysqli_real_escape_string($con, $_POST['olympiad_coaching_made_classes']);
        $olympiad_coaching_courses_covered= mysqli_real_escape_string($con, $_POST['olympiad_coaching_courses_covered']);
    
       
        
        // $sql = $con->query("INSERT INTO `olympiad_coaching_exam_pattern`(`course_id`,`sub_course_id`,`olympiad_coaching_standards`, 
        // `olympiad_coaching_made_classes`,'olympiad_coaching_courses_covered') 
        // VALUES ('$course_id','$sub_course_id','$olympiad_coaching_standards','$olympiad_coaching_made_classes','$olympiad_coaching_courses_covered')");

      $sql = $con->query("INSERT INTO `olympiad_coaching_exam_pattern`(`course_id`, `sub_course_id`, `olympiad_coaching_standards`, `olympiad_coaching_made_classes`, 
      `olympiad_coaching_courses_covered`) 
       VALUES ('$course_id','$sub_course_id','$olympiad_coaching_standards','$olympiad_coaching_made_classes','$olympiad_coaching_courses_covered')");
        
        return $sql;
    }

    public function insert_sat_exam_pattern(){
        $db = new DatabaseConnection;
        $con = $db->connection();
        
        
        $course_id= mysqli_real_escape_string($con, $_POST['course_id']);
        $sub_course_id= mysqli_real_escape_string($con, $_POST['sub_course_id']);
        $SAT_exam_section= mysqli_real_escape_string($con, $_POST['SAT_exam_section']);
        $SAT_exam_time= mysqli_real_escape_string($con, $_POST['SAT_exam_time']);
        $SAT_no_of_question= mysqli_real_escape_string($con, $_POST['SAT_no_of_question']);
     
       

      $sql = $con->query("INSERT INTO `sat_exam_pattern`(`course_id`, `sub_course_id`, `SAT_exam_section`, `SAT_exam_time`, 
      `SAT_no_of_question`) 
       VALUES ('$course_id','$sub_course_id','$SAT_exam_section','$SAT_exam_time','$SAT_no_of_question')");
        
        return $sql;
    }

    public function insert_act_exam_pattern(){
        $db = new DatabaseConnection;
        $con = $db->connection();
        
        
        $course_id = mysqli_real_escape_string($con, $_POST['course_id']);
        $sub_course_id = mysqli_real_escape_string($con, $_POST['sub_course_id']);
        $act_test = mysqli_real_escape_string($con, $_POST['act_test']);
        $act_no_of_quetion = mysqli_real_escape_string($con, $_POST['act_no_of_quetion']);
        $act_time_limit = mysqli_real_escape_string($con, $_POST['act_time_limit']);
     
       

      $sql = $con->query("INSERT INTO `act_exam_pattern`(`course_id`, `sub_course_id`, `act_test`, `act_no_of_quetion`, `act_time_limit`) 
      VALUES ('$course_id','$sub_course_id','$act_test','$act_no_of_quetion','$act_time_limit')");
        
        return $sql;
    }

    public function insert_gmat_exam_pattern(){
        $db = new DatabaseConnection;
        $con = $db->connection();
        
        
        $course_id = mysqli_real_escape_string($con, $_POST['course_id']);
        $sub_course_id = mysqli_real_escape_string($con, $_POST['sub_course_id']);
        $gmat_section = mysqli_real_escape_string($con, $_POST['gmat_section']);
        $gmat_no_of_questions = mysqli_real_escape_string($con, $_POST['gmat_no_of_questions']);
        $gmat_allotted_time = mysqli_real_escape_string($con, $_POST['gmat_allotted_time']);
     
       

      $sql = $con->query("INSERT INTO `gmat_exam_pattern`(`course_id`, `sub_course_id`, `gmat_section`, `gmat_no_of_questions`, `gmat_allotted_time`) 
      VALUES ('$course_id','$sub_course_id','$gmat_section','$gmat_no_of_questions','$gmat_allotted_time')");
        
        return $sql;
    }

    public function insert_gre_exam_pattern(){
        $db = new DatabaseConnection;
        $con = $db->connection();
        
        
        $course_id = mysqli_real_escape_string($con, $_POST['course_id']);
        $sub_course_id = mysqli_real_escape_string($con, $_POST['sub_course_id']);
        $gre_section = mysqli_real_escape_string($con, $_POST['gre_section']);
        $gre_no_of_questions = mysqli_real_escape_string($con, $_POST['gre_no_of_questions']);
        $gre_allotted_time = mysqli_real_escape_string($con, $_POST['gre_allotted_time']);
     
       

      $sql = $con->query("INSERT INTO `gre_exam_pattern`(`course_id`, `sub_course_id`, `gre_section`, `gre_no_of_questions`, `gre_allotted_time`) 
      VALUES ('$course_id','$sub_course_id','$gre_section','$gre_no_of_questions','$gre_allotted_time')");
        
        return $sql;
    }

    public function insert_ucat_exam_pattern(){
        $db = new DatabaseConnection;
        $con = $db->connection();
        
        
        $course_id = mysqli_real_escape_string($con, $_POST['course_id']);
        $sub_course_id = mysqli_real_escape_string($con, $_POST['sub_course_id']);
        $ucat_category = mysqli_real_escape_string($con, $_POST['ucat_category']);
        $ucat_questions = mysqli_real_escape_string($con, $_POST['ucat_questions']);
        $ucat_duration = mysqli_real_escape_string($con, $_POST['ucat_duration']);
        $ucat_topics_skills = mysqli_real_escape_string($con, $_POST['ucat_topics_skills']);
     
       

      $sql = $con->query("INSERT INTO `ucat_exam_pattern`(`course_id`, `sub_course_id`, `ucat_category`, `ucat_questions`, `ucat_duration`, `ucat_topics_skills`) 
      VALUES ('$course_id','$sub_course_id','$ucat_category','$ucat_questions','$ucat_duration','$ucat_topics_skills')");
        
        return $sql;
    }

    public function insert_toefl_exam_pattern(){
        $db = new DatabaseConnection;
        $con = $db->connection();
        
        
        $course_id = mysqli_real_escape_string($con, $_POST['course_id']);
        $sub_course_id = mysqli_real_escape_string($con, $_POST['sub_course_id']);
        $toefl_category = mysqli_real_escape_string($con, $_POST['toefl_category']);
        $toefl_questions = mysqli_real_escape_string($con, $_POST['toefl_questions']);
        $toefl_duration = mysqli_real_escape_string($con, $_POST['toefl_duration']);
       
     
       

      $sql = $con->query("INSERT INTO `toefl_exam_pattern`(`course_id`, `sub_course_id`, `toefl_category`, `toefl_questions`, `toefl_duration`) 
      VALUES ('$course_id','$sub_course_id','$toefl_category','$toefl_questions','$toefl_duration')");
        
        return $sql;
    }

    public function insert_ielts_exam_pattern(){
        $db = new DatabaseConnection;
        $con = $db->connection();
        
        
        $course_id = mysqli_real_escape_string($con, $_POST['course_id']);
        $sub_course_id = mysqli_real_escape_string($con, $_POST['sub_course_id']);
        $ielts_section = mysqli_real_escape_string($con, $_POST['ielts_section']);
        $ielts_no_of_question = mysqli_real_escape_string($con, $_POST['ielts_no_of_question']);
        $ielts_allotted_time = mysqli_real_escape_string($con, $_POST['ielts_allotted_time']);
       
     
       

      $sql = $con->query("INSERT INTO `ielts_exam_pattern`(`course_id`, `sub_course_id`, `ielts_section`, `ielts_no_of_question`, `ielts_allotted_time`) 
      VALUES ('$course_id','$sub_course_id','$ielts_section','$ielts_no_of_question','$ielts_allotted_time')");
        
        return $sql;
    }


    public function insert_prep_course_options_pattern(){
      $db = new DatabaseConnection;
      $con = $db->connection();
      
      
      $course_id = mysqli_real_escape_string($con, $_POST['course_id']);
      $sub_course_id = mysqli_real_escape_string($con, $_POST['sub_course_id']);
      $course_title = mysqli_real_escape_string($con, $_POST['course_title']);
      // $course_image = mysqli_real_escape_string($con, $_POST['course_image']);
      $course_description = mysqli_real_escape_string($con, $_POST['course_description']);
      $course_features_list = mysqli_real_escape_string($con, $_POST['course_features_list']);

      $upload='../images/prep_courses';
      $tmp_name = $_FILES["course_image"]["tmp_name"];
      $name = basename($_FILES["course_image"]["name"]);

         // Compress image
 function compressImage($source, $destination, $quality) {

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
      $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif') 
      $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png') 
      $image = @imagecreatefrompng($source);

  imagejpeg($image, $destination, $quality);

}

   // Compress Image
   compressImage($tmp_name,"$upload/$name",60);
      
     

     

    $sql = $con->query("INSERT INTO `prep_course_options`(`course_id`, `sub_course_id`, `course_title`, `course_image`, `course_description`, `course_features_list`) 
    VALUES ('$course_id','$sub_course_id','$course_title','$name','$course_description', '$course_features_list')");
      
      return $sql;
  }


  public function insert_languages_exam_pattern(){
    $db = new DatabaseConnection;
    $con = $db->connection();
    
    
    $course_id = mysqli_real_escape_string($con, $_POST['course_id']);
    $sub_course_id = mysqli_real_escape_string($con, $_POST['sub_course_id']);
    $levels = mysqli_real_escape_string($con, $_POST['levels']);
    $level_type = mysqli_real_escape_string($con, $_POST['level_type']);
    
 
   

  $sql = $con->query("INSERT INTO `languages_exam_pattern`(`course_id`, `sub_course_id`, `levels`, `level_type`) 
  VALUES ('$course_id','$sub_course_id','$levels','$level_type')");
    
    return $sql;
}

public function insert_kids_program_level(){
  $db = new DatabaseConnection;
  $con = $db->connection();
  
  
  $course_id = mysqli_real_escape_string($con, $_POST['course_id']);
  $sub_course_id = mysqli_real_escape_string($con, $_POST['sub_course_id']);
  $levels = mysqli_real_escape_string($con, $_POST['levels']);
  $age_group = mysqli_real_escape_string($con, $_POST['age_group']);
  $description = mysqli_real_escape_string($con, $_POST['description']);

  

 

$sql = $con->query("INSERT INTO `kids_program_level`(`course_id`, `sub_course_id`, `levels`, `age_group`,`description`) 
VALUES ('$course_id','$sub_course_id','$levels','$age_group','$description')");
  
  return $sql;
}



// ----------------------------------------------------------------------------------------
public function fetch_career_counselling_grade_8()
{
  $db = new DatabaseConnection;
  $con = $db->connection();

  $sql_fetch=$con->query("SELECT * FROM `career_counselling` WHERE career_co_id=1");
  $row_fetch = mysqli_fetch_array($sql_fetch);
  return $row_fetch;
}

public function update_career_counselling_grade_8()
{
  $db = new DatabaseConnection;
  $con = $db->connection();
  $career_co_id =  $_POST['career_co_id'];
  $grade = mysqli_real_escape_string($con, $_POST['grade']);
  $information = mysqli_real_escape_string($con, $_POST['information']);

  $grade_8_update=$con->query("UPDATE `career_counselling` SET `grade`='$grade',`information`='$information' 
  WHERE career_co_id=$career_co_id");
  return $grade_8_update;

}

public function fetch_career_counselling_grade_10()
{
  $db = new DatabaseConnection;
  $con = $db->connection();

  $sql_fetch=$con->query("SELECT * FROM `career_counselling` WHERE career_co_id=2");
  $row_fetch = mysqli_fetch_array($sql_fetch);
  return $row_fetch;
}

public function update_career_counselling_grade_10()
{
  $db = new DatabaseConnection;
  $con = $db->connection();
  $career_co_id =  $_POST['career_co_id'];
  $grade = mysqli_real_escape_string($con, $_POST['grade']);
  $information = mysqli_real_escape_string($con, $_POST['information']);

  $grade_10_update=$con->query("UPDATE `career_counselling` SET `grade`='$grade',`information`='$information' 
  WHERE career_co_id=$career_co_id");
  return $grade_10_update;

}


public function fetch_College()
{
  $db = new DatabaseConnection;
  $con = $db->connection();

  $sql_fetch=$con->query("SELECT * FROM `career_counselling` WHERE career_co_id=3");
  $row_fetch = mysqli_fetch_array($sql_fetch);
  return $row_fetch;
}

public function update_ccollege()
{
  $db = new DatabaseConnection;
  $con = $db->connection();
  $career_co_id =  $_POST['career_co_id'];
  $grade = mysqli_real_escape_string($con, $_POST['grade']);
  $information = mysqli_real_escape_string($con, $_POST['information']);

  $college_update=$con->query("UPDATE `career_counselling` SET `grade`='$grade',`information`='$information' 
  WHERE career_co_id=$career_co_id");
  return $college_update;

}

public function fetch_profile()
{
  $db = new DatabaseConnection;
  $con = $db->connection();

  $sql_fetch=$con->query("SELECT * FROM `career_counselling` WHERE career_co_id=4");
  $row_fetch = mysqli_fetch_array($sql_fetch);
  return $row_fetch;
}

public function update_profile()
{
  $db = new DatabaseConnection;
  $con = $db->connection();
  $career_co_id =  $_POST['career_co_id'];
  $grade = mysqli_real_escape_string($con, $_POST['grade']);
  $information = mysqli_real_escape_string($con, $_POST['information']);

  $profile_update=$con->query("UPDATE `career_counselling` SET `grade`='$grade',`information`='$information' 
  WHERE career_co_id=$career_co_id");
  return $profile_update;

}

public function fetch_intern()
{
  $db = new DatabaseConnection;
  $con = $db->connection();

  $sql_fetch=$con->query("SELECT * FROM `career_counselling` WHERE career_co_id=5");
  $row_fetch = mysqli_fetch_array($sql_fetch);
  return $row_fetch;
}


public function update_intern()
{
  $db = new DatabaseConnection;
  $con = $db->connection();
  $career_co_id =  $_POST['career_co_id'];
  $grade = mysqli_real_escape_string($con, $_POST['grade']);
  $information = mysqli_real_escape_string($con, $_POST['information']);

  $intern_update=$con->query("UPDATE `career_counselling` SET `grade`='$grade',`information`='$information' 
  WHERE career_co_id=$career_co_id");
  return $intern_update;

}

}
?>