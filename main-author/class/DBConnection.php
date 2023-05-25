<?php
class DatabaseConnection{

  function connection(){
$con = new mysqli("localhost","root","","career_planet");
return $con;
  }
}
?>