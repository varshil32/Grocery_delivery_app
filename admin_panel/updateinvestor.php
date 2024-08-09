<?php
require('./dbconnection.php');
if(empty(array_filter($_FILES['fileToUploadInvestor']['name'])))
{
  $investor_id=$_POST["txt_investorid"];
  $investor_name=$_POST["name"];

  $qry1="UPDATE investors SET name='".$investor_name."' WHERE id=$investor_id";
  $rs1=mysqli_query($conn,$qry1);
  if($rs1)
  {
    header("location:viewinvestors.php?successupdate=Investor updated successfully.");
    exit();
  }
  else
  {
    header("location:viewinvestors.php?errorupdate=Investor not updated.");
    exit();
  }
}
else
{
  require "finaluploadinvestor.php";
  if (!$messageErr) {
    $investor_id=$_POST["txt_investorid"];
    $investor_name=$_POST["name"];
    $allimages= implode(',',$filearray);
    $active = 1;
    $qry1="UPDATE investors SET name='".$investor_name."',pic='".$allimages."' WHERE id=$investor_id";
    
    $rs1=mysqli_query($conn,$qry1);
    if($rs1)
    {
      header("location:viewinvestors.php?successupdate=Investor updated successfully.");
      exit();
    }
    else
    {
      header("location:viewinvestors.php?errorupdate=Investor not updated.");
      exit();
    }
  } else {
    header("location:viewinvestors.php?errorfileinsert=Problem in file insertion");
    exit();
  }
}
echo $investor_id;

?>