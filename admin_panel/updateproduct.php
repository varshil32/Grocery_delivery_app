<?php
ob_start();
require('./dbconnection.php');
$product_id=$_POST["txt_productid"];
$product_name=$_POST["name"];
$product_price = $_POST['price'];
$product_description=$_POST["description"];
$category_id=$_POST['category_id'] ? $_POST['category_id'] : 0;
$subcategory_id=$_POST['subcategory_id'] ? $_POST['subcategory_id'] : 0;
$allimages = "";

// if($_FILES["fileToUploadProduct"]["name"]=="")

$selectQry = "SELECT * FROM product_table where id=$product_id";
$rs = mysqli_query($conn,$selectQry);
$row = mysqli_fetch_assoc($rs);
$allimages = $row['pic'];

if ($_FILES['fileToUploadProduct']['name'][0] && !empty($_FILES['fileToUploadProduct']['name'][0])) {
  require "finaluploadproduct.php";
  $allimages= implode(',',$filearray);
  if ($messageErr) {
    header("location:viewproducts.php?errorfileinsert=Problem in file insertion");
    exit();
  }
} 


$qry1="UPDATE product_table SET product_name='".$product_name."',product_description='".$product_description."',product_pic='".$allimages."',
  category_id='".$category_id."',subcategory_id='".$subcategory_id."',product_price='".$product_price."' WHERE id='".$product_id."'";
  
  
  $rs1=mysqli_query($conn,$qry1);
  if($rs1)
  {
      header("location:viewproducts.php?successupdate=Product updated successfully.");
      ob_end_flush();
      exit();
  }
  else
  {
      header("location:viewproducts.php?errorupdate=Product not updated.");
      ob_end_flush();
      exit();
  }
?>