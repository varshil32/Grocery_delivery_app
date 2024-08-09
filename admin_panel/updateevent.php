<?php
require('./dbconnection.php');
if(empty(array_filter($_FILES['fileToUploadEvent']['name'])))
{
	echo "No File is Selected.";
	$event_id=$_POST["txt_eventid"];
	$event_name=$_POST["name"];
  $event_description=$_POST["description"];

  $qry1="UPDATE events SET name='".$event_name."',description='".$event_description."' WHERE id=$event_id";
  echo $qry1;

  $rs1=mysqli_query($conn,$qry1);
  if($rs1)
  {
    header("location:viewevents.php?successupdate=Event updated successfully.");
	  exit();
  }
  else
  {
   header("location:viewevents.php?errorupdate=Event not updated.");
    exit();
  }
}
else
{
  require "finaluploadevent.php";
  $event_id=$_POST["txt_eventid"];
  $event_name=$_POST["name"];
  $event_description=$_POST["description"];
  $allimages= implode(',',$filearray);
  $qry1="UPDATE events SET name='".$event_name."',pic='".$allimages."',description='".$event_description."' WHERE id=$event_id";
  
  $rs1=mysqli_query($conn,$qry1);
  if($rs1)
  {
    header("location:viewevents.php?successupdate=Event updated successfully.");
    exit();
  }
  else
  {
    header("location:viewevents.php?errorupdate=Event not updated.");
    exit();
  }
}
echo $event_id;
?>