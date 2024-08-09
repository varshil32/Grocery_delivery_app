<?php
require('./dbconnection.php');

if(empty(array_filter($_FILES['fileToUploadAchievement']['name'])))
{
	echo "No File is Selected.";
	$achievement_id=$_POST["txt_achievementid"];
	$achievement_name=$_POST["name"];
  
  $qry1="UPDATE achievements SET name='".$achievement_name."' WHERE id=$achievement_id";

  $rs1=mysqli_query($conn,$qry1);
  if($rs1)
  {
  	echo "Updated";
    header("location:viewachievements.php?successupdate=Achievement updated successfully.");
  	exit();
  }
  else
  {
  	echo "Error";
    header("location:viewachievements.php?errorupdate=Achievement not updated.");
    exit();
  }
}
else
{
  require "finaluploadachievement.php";
  
  if (!$messageErr) {
    $achievement_id=$_POST["txt_achievementid"];
    $achievement_name=$_POST["name"];
    $allimages= implode(',',$filearray);
    $active = 1;
    $qry1="UPDATE achievements SET name='".$achievement_name."',pic='".$allimages."' WHERE id=$achievement_id";
    
    $rs1=mysqli_query($conn,$qry1);
    if($rs1)
    {
      echo "Updated";
      header("location:viewachievements.php?successupdate=Achievement updated successfully.");
      exit();
    }
    else
    {
      echo "Error";
       header("location:viewachievements.php?errorupdate=Achievement not updated.");
      exit();
    }
  } else {
    header("location:viewachievements.php?errorfileinsert=Problem in file insertion");
    exit();
  }
}
echo $achievement_id;

?>