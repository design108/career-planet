<?php
include('../connection.php');
if(!empty($_POST["cat_id"])) 
{
 $id=intval($_POST['cat_id']);
$query=mysqli_query($con,"SELECT * FROM course_subcat WHERE course_cat_id=$id");
?>
<option value="0">Select Subcategory</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
<option value="<?php echo htmlentities($row['course_subcat_id']); ?>">
    <?php echo htmlentities($row['course_subcat_name']); ?></option>
<?php
 }
}
?>