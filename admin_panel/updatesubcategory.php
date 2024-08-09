<?php
require('./dbconnection.php');

$subcategory_id=$_POST["txt_subcatid"];
$subcategory_name=$_POST["subcategory"];
$category_id=$_POST['categoryId'];

$qry1="UPDATE subcategory_table SET subcategory_name='".$subcategory_name."',category_id='".$category_id."' WHERE id='".$subcategory_id."'";

$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	header("location:viewsubcategories.php?successupdate=Subcategory updated successfully.");
	exit();
}
else
{
	header("location:viewsubcategories.php?errorupdate=Subcategory not updated.");
	exit();
}