<?php
require('./dbconnection.php');
ob_start();
if(!isset($_POST['submit']))
{
	header("location:addachievement.php");
	ob_end_flush();
	exit();
}

//if($_FILES["fileToUploadAchievement"]["name"]=="")
if(empty(array_filter($_FILES['fileToUploadAchievement']['name'])))
{
	echo "No File is Selected.";
	exit();
}
else
{
	require "finaluploadachievement.php";
}
if (!$messageErr) {
	$name=$_POST['name'];
	
	$allimages= implode(',',$filearray);
	//exit();
	$active = 1;
	$qry="INSERT INTO achievements(name,pic,active) VALUES('".$name."','".$allimages."',$active)";
	$rs=mysqli_query($conn,$qry);
	if($rs)
	{
		header("location:viewachievements.php?successinsert=Achievement inserted successfully.");
		ob_end_flush();
		exit();
	}
	else
	{
		header("location:viewachievements.php?errorinsert=Achievement not inserted.");
		ob_end_flush();
		exit();
	}
} else {
	header("location:viewachievements.php?errorfileinsert=Problem in file insertion");
	ob_end_flush();
    exit();
}
?>