<?php
require('./dbconnection.php');
$category_id=$_POST["id"];
$category_name=$_POST["category"];
$qry1="UPDATE category_table SET category_name='".$category_name."' WHERE id=$category_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
  header("location:viewcategories.php?successupdate=Category updated successfully.");
  exit();
}
else
{ header("location:viewcategories.php?errorupdate=Category not updated.");
  exit();
}
?>