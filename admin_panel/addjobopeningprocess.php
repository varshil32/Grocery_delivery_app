<?php
require('./dbconnection.php');
ob_start();
if(!isset($_POST['submit']))
{
	header("location:addjobopening.php");
	ob_end_flush();
	exit();
}
$name=$_POST['name'];
$requirements=$_POST['requirements'];

$responsibilities=$_POST['responsibilities'];
$background=$_POST['background'];
$experience = $_POST['experience'];
// $qualification=$_POST['qualification'];
$industry=$_POST['industry'];
$area=$_POST['area'];

$language = implode(',',$_POST['language']);
$active = 1;

// $qry="INSERT INTO opening(name,requirements,responsibilities,background,qualification,experience,industry,area,languages,active) VALUES('".$name."','".$requirements."','".$responsibilities."','".$background."','".$qualification."','".$experience."','".$industry."','".$area."','".$language."',$active)";
$qry="INSERT INTO opening(name,requirements,responsibilities,background,experience,industry,area,languages,active) VALUES('".$name."','".$requirements."','".$responsibilities."','".$background."','".$experience."','".$industry."','".$area."','".$language."',$active)";
$rs=mysqli_query($conn,$qry);
if($rs)
{
	header("location:viewjobopening.php?successinsert=Job opening inserted successfully.");
	ob_end_flush();
    exit();
}
else
{
	header("location:viewjobopening.php?errorinsert=Job opening not inserted.");
	ob_end_flush();
	exit();
}
?>