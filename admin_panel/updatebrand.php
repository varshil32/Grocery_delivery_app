<?php
require('./dbconnection.php');

//if($_FILES["fileToUploadBrand"]["name"][$i]=="")
if(empty(array_filter($_FILES['fileToUploadBrand']['name'])))
{
	$brand_id=$_POST["txt_brandid"];
	$brand_name=$_POST["name"];
    $brand_description=$_POST["description"];

    $qry1="UPDATE brands SET name='".$brand_name."',description='".$brand_description."' WHERE id=$brand_id";


    $rs1=mysqli_query($conn,$qry1);
    if($rs1)
    {
        header("location:viewbrands.php?successupdate=Brand updated successfully.");
    	exit();
    }
    else
    {
        header("location:viewbrands.php?errorupdate=Brand not updated.");
        exit();
    }
}
else
{
    require "finaluploadbrand.php";

    if (!$messageErr) {
        $brand_id=$_POST["txt_brandid"];
        $brand_name=$_POST["name"];
        $brand_description=$_POST["description"];
        $allimages= implode(',',$filearray);
        $active = 1;
        $qry1="UPDATE brands SET name='".$brand_name."',pic='".$allimages."',description='".$brand_description."' WHERE id=$brand_id";
      
    
        $rs1=mysqli_query($conn,$qry1);
        if($rs1)
        {
          header("location:viewbrands.php?successupdate=Brand updated successfully.");
          exit();
        }
        else
        {
           header("location:viewbrands.php?errorupdate=Brand not updated.");
          exit();
        }
    } else {
        header("location:viewbrands.php?errorfileinsert=Problem in file insertion");
        exit();
    }
}
echo $brand_id;

?>