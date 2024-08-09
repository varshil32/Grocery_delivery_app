<?php
require('./dbconnection.php');
ob_start();
if(!isset($_POST['submit']))
{
	header("location:addcategory.php");
	ob_end_flush();
	exit();
}
$category=$_POST['category'];
$active = 1;
$qry="INSERT INTO category_table(category_name,active) VALUES('".$category."',$active)";
$rs=mysqli_query($conn,$qry);
if($rs)
{
	header("location:viewcategories.php?successinsert=Category inserted successfully.");
	ob_end_flush();
	exit();
}
else
{
	header("location:viewcategories.php?errorinsert=Category not inserted.");
	ob_end_flush();
	exit();
}
?>