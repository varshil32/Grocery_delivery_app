<?php
require('./dbconnection.php');
if(empty(array_filter($_FILES['fileToUploadPlant']['name'])))
{
	$plant_id=$_POST["txt_plantid"];
	$plant_name=$_POST["name"];
  $plant_description=$_POST["description"];

  $qry1="UPDATE plants SET name='".$plant_name."',description='".$plant_description."' WHERE id=$plant_id";
  
  $rs1=mysqli_query($conn,$qry1);
  if($rs1)
  {
    header("location:viewplants.php?successupdate=Plant updated successfully.");
  	exit();
  }
  else
  {
    header("location:viewplants.php?errorupdate=Plant not updated.");
    exit();
  }
}
else
{
  require "finaluploadplant.php";
  
  if (!$messageErr) {
    $plant_id=$_POST["txt_plantid"];
    $plant_name=$_POST["name"];
    $plant_description=$_POST["description"];
    $allimages= implode(',',$filearray);
    $active = 1;
    $qry1="UPDATE plants SET name='".$plant_name."',pic='".$allimages."',description='".$plant_description."' WHERE id=$plant_id";
    
    $rs1=mysqli_query($conn,$qry1);
    if($rs1)
    {
      header("location:viewplants.php?successupdate=Plant updated successfully.");
      exit();
    }
    else
    {
      header("location:viewplants.php?errorupdate=Plant not updated.");
      exit();
    }
  } else {
    header("location:viewplants.php?errorfileinsert=Problem in file insertion");
    exit();
  }
}
echo $plant_id;
?>