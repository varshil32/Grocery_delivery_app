<?php
require('./dbconnection.php');
ob_start();
if(!isset($_POST['submit']))
{
	header("location:addproduct.php");
	ob_end_flush();
	exit();
}

// if($_FILES["fileToUploadProduct"]["name"]=="")
if(empty(array_filter($_FILES['fileToUploadProduct']['name'])))
{
	$name=$_POST['name'];
	$description=$_POST['description'];
	$price = $_POST['price'];
	$category_id=$_POST['category_id'];
	$subcategory_id=$_POST['subcategory_id'];
	$active = 1;
	
	$qry="INSERT INTO `product_table`(`product_name`,`product_description`, `product_price`, `category_id`, `subcategory_id`,`active`) VALUES 
	('".$name."','".$description."','".$price."',$category_id,$subcategory_id,$active)";
	$rs=mysqli_query($conn,$qry);
	if($rs)
	{
		header("location:viewproducts.php?successinsert=Product inserted successfully.");
		ob_end_flush();
		exit();
	}
	else
	{
		header("location:viewproducts.php?errorinsert=Product not inserted.");
		ob_end_flush();
		exit();
	}		
}
else
{
	require "finaluploadproduct.php";
}

if ($messageErr) {
	header("location:viewproducts.php?errorfileinsert=Problem in file insertion");
	ob_end_flush();
	exit();
} else if ($messageErrBrochure) {
	header("location:viewproducts.php?errorbrochureinsert=Problem in brochure insertion");
	ob_end_flush();
	exit();
} else {
	$allimages= $filearray ? implode(',',$filearray) : NULL;
	$name=$_POST['name'];
	$description=$_POST['description'];
	$price = $_POST['price'];
	$category_id=$_POST['category_id'];
	$subcategory_id=$_POST['subcategory_id'];
	$active = 1;
	
	$qry="INSERT INTO `product_table`(`product_name`,`product_description`,`product_pic`, `product_price`, `category_id`, `subcategory_id`,`active`) VALUES 
	('".$name."','".$description."','".$allimages."','".$price."',$category_id,$subcategory_id,$active)";
	$rs=mysqli_query($conn,$qry);
	if($rs)
	{
		header("location:viewproducts.php?successinsert=Product inserted successfully.");
		ob_end_flush();
		exit();
	}
	else
	{
		header("location:viewproducts.php?errorinsert=Product not inserted.");
		ob_end_flush();
		exit();
	}
}
?>