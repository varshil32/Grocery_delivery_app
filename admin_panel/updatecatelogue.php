<?php
require('./dbconnection.php');
ob_start();
//if($_FILES["fileToUploadCatelogue"]["name"][$i]=="")
if(empty(array_filter($_FILES['fileToUploadCatelogue']['name'])))
{
	$catelogue_id=$_POST["txt_catelogueid"];
	$catelogue_name=$_POST["name"];
    $catelogue_description=$_POST["description"];

    $qry1="UPDATE catelogue SET name='".$catelogue_name."' WHERE id=$catelogue_id";


    $rs1=mysqli_query($conn,$qry1);
    if($rs1)
    {
        header("location:viewcatelogue.php?successupdate=Catelogue updated successfully.");
        ob_flush();
    	exit();
    }
    else
    {
        header("location:viewcatelogue.php?errorupdate=Catelogue not updated.");
        ob_flush();
        exit();
    }
}
else
{
    require "finaluploadcatelogue.php";

    if (!$messageErr) {
        $catelogue_id=$_POST["txt_catelogueid"];
        $catelogue_name=$_POST["name"];
        $catelogue_description=$_POST["description"];
        $allimages= implode(',',$filearray);
        $active = 1;
        $qry1="UPDATE catelogue SET name='".$catelogue_name."',pic='".$allimages."' WHERE id=$catelogue_id";
      
        $rs1=mysqli_query($conn,$qry1);
        if($rs1)
        {
          header("location:viewcatelogue.php?successupdate=Catelogue updated successfully.");
          ob_flush();
          exit();
        }
        else
        {
           header("location:viewcatelogue.php?errorupdate=Catelogue not updated.");
           ob_flush();
          exit();
        }
    } else {
        header("location:viewcatelogue.php?errorfileinsert=Problem in file insertion");
        ob_flush();
        exit();
    }
}
echo $catelogue_id;

?>