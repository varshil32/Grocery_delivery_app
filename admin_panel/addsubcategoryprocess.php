<?php
session_start();
require('./dbconnection.php');
ob_start();
if(!isset($_POST['submit']))
{
	header("location:addsubcategory.php");
	ob_end_flush();
	exit();
		
}
$category_id=$_POST['categoryid'];
$subcatname=$_POST['subcategory'];
$active = 1;
$qry="INSERT INTO subcategory_table(subcategory_name,category_id,active) VALUES('".$subcatname."',$category_id,$active)";
$rs=mysqli_query($conn,$qry);
if($rs)
{
	header("location:viewsubcategories.php?successinsert=Subcategory inserted successfully.");
	ob_end_flush();
	exit();
}
else
{
	header("location:viewsubcategories.php?errorinsert=Subcategory not inserted.");
    ob_end_flush();
	exit();
}
?>

