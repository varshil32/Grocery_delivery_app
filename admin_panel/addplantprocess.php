<?php
require('./dbconnection.php');
ob_start();
if(!isset($_POST['submit']))
{
	header("location:addplant.php");
	ob_end_flush();
	exit();
}

//if($_FILES["fileToUploadPlant"]["name"]=="")
if(empty(array_filter($_FILES['fileToUploadPlant']['name'])))
{
	echo "No File is Selected.";
	exit();
}
else
{
	require "finaluploadplant.php";
}

if (!$messageErr) {
	$name=$_POST['name'];
	$description=$_POST['description'];
	$allimages= implode(',',$filearray);
	$active = 1;
	
	$qry="INSERT INTO plants(name,description,pic,active) VALUES('".$name."','".$description."','".$allimages."',$active)";
	$rs=mysqli_query($conn,$qry);
	if($rs)
	{
		echo "Success";
		header("location:viewplants.php?successinsert=Plant inserted successfully.");
		ob_end_flush();
		exit();
	}
	else
	{
		echo "Error";
		header("location:viewplants.php?errorinsert=Plant not inserted.");
		ob_end_flush();
		exit();
	}
}  else {
	header("location:viewplants.php?errorfileinsert=Problem in file insertion");
	ob_end_flush();
	exit();
}
?>