<?php
require('./dbconnection.php');
ob_start();
if(!isset($_POST['submit']))
{
	header("location:addevent.php");
    ob_end_flush();
	exit();
}

//if($_FILES["fileToUploadEvent"]["name"]=="")
if(empty(array_filter($_FILES['fileToUploadEvent']['name'])))
{
	echo "No File is Selected.";
	exit();
}
else
{
	require "finaluploadevent.php";
}

if (!$messageErr) {
	$name=$_POST['name'];
	$description=$_POST['description'];
	 $allimages= implode(',',$filearray);
	
	$active = 1;
	//$qry="INSERT INTO categoryallimages_table(category_name,category_img,isactive,doi) VALUES('".$catname."','".$target_file."',$isactive,'".$dt."')";
	$qry="INSERT INTO events(name,description,pic,active) VALUES('".$name."','".$description."','".$allimages."',$active)";
	$rs=mysqli_query($conn,$qry);
	if($rs)
	{
		header("location:viewevents.php?successinsert=Event inserted successfully.");
		ob_end_flush();
		exit();
	}
	else
	{
		header("location:viewevents.php?errorinsert=Event not inserted.");
		ob_end_flush();
		exit();
	}
} else {
	header("location:viewplants.php?errorfileinsert=Problem in file insertion");
	ob_end_flush();
	exit();
}
?>