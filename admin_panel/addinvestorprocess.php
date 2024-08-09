<?php
require('./dbconnection.php');
if(!isset($_POST['submit']))
{
	header("location:addinvestor.php");
}


//if($_FILES["fileToUploadInvestor"]["name"]=="")
if(empty(array_filter($_FILES['fileToUploadInvestor']['name'])))
{
	echo "No File is Selected.";
	exit();
}
else
{
	require "finaluploadinvestor.php";
}
if (!$messageErr) {
	$name=$_POST['name'];
	$allimages= implode(',',$filearray);
	$active = 1;
	$qry="INSERT INTO investors(name,pic,active) VALUES('".$name."','".$allimages."',$active)";
	$rs=mysqli_query($conn,$qry);
	if($rs)
	{
		header("location:viewinvestors.php?successinsert=Investor inserted successfully.");
		exit();
	}
	else
	{
		header("location:viewinvestors.php?errorinsert=Investor not inserted.");
		exit();
	}
} else {
	header("location:viewinvestors.php?errorfileinsert=Problem in file insertion");
	exit();
}
?>