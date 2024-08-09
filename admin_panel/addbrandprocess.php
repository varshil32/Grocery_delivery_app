<?php
require('./dbconnection.php');
ob_start();
if(!isset($_POST['submit']))
{
	header("location:addbrand.php");
	ob_end_flush();
	exit();
}

if(empty(array_filter($_FILES['fileToUploadBrand']['name'])))
{
	echo "No File is Selected.";
	exit();
}
else
{
	require "finaluploadbrand.php";
}
if (!$messageErr) {
	$name=$_POST['name'];
	$description=$_POST['description'];
	$allimages= implode(',',$filearray);
	$active = 1;
	$qry="INSERT INTO brands(name,description,pic,active) VALUES('".$name."','".$description."','".$allimages."',$active)";
	$rs=mysqli_query($conn,$qry);
	if($rs)
	{
		header("location:viewbrands.php?successinsert=Brand inserted successfully.");
		ob_end_flush();
        exit();
	}
	else
	{
		header("location:viewbrands.php?errorinsert=Brand not inserted.");
		ob_end_flush();
        exit();
	}
} else {
	header("location:viewplants.php?errorfileinsert=Problem in file insertion");
	ob_end_flush();
    exit();
}
?>