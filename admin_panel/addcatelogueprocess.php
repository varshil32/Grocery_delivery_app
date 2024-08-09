<?php
require('./dbconnection.php');
ob_start();
// ini_set("display_errors","1");
if(!isset($_POST['submit']))
{
	header("location:addbrand.php");
	ob_end_flush();
	exit();
}

if(empty(array_filter($_FILES['fileToUploadCatelogue']['name'])))
{
	echo "No File is Selected.";
	exit();
}
else
{
	require "finaluploadcatelogue.php";
}
if (!$messageErr) {
	$name=$_POST['name'];
	$allimages= implode(',',$filearray);
	$active = 1;
	$qry="INSERT INTO catelogue(name,pic,active) VALUES('".$name."','".$allimages."',$active)";
	$rs=mysqli_query($conn,$qry);
	if($rs)
	{
		header("location:viewcatelogue.php?successinsert=Catelogue inserted successfully.");
		ob_end_flush();
        exit();
	}
	else
	{
		header("location:viewcatelogue.php?errorinsert=Catelogue not inserted.");
		ob_end_flush();
        exit();
	}
} else {
    // print_r($messageErr);exit;
	header("location:viewcatelogue.php?errorfileinsert=Problem in file insertion");
	ob_end_flush();
    exit();
}
?>