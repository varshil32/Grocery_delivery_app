<?php
require('./dbconnection.php');
$opening_id=$_POST["txt_openingid"];
$name=$_POST['name'];
$requirements=$_POST['requirements'];
$responsibilities=$_POST['responsibilities'];
$background=$_POST['background'];
$experience = $_POST['experience'];
// $qualification=$_POST['qualification'];
$industry=$_POST['industry'];
$area=$_POST['area'];

$language = implode(',',$_POST['language']);

// $qry1="UPDATE opening SET name='".$name."',requirements='".$requirements."',responsibilities='".$responsibilities."',background='".$background."',qualification='".$qualification."',experience='".$experience."',industry='".$industry."',area='".$area."',languages='".$language."' WHERE id=$opening_id";
$qry1="UPDATE opening SET name='".$name."',requirements='".$requirements."',responsibilities='".$responsibilities."',background='".$background."',experience='".$experience."',industry='".$industry."',area='".$area."',languages='".$language."' WHERE id=$opening_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
  header("location:viewjobopening.php?successupdate=Job opening updated successfully.");
  exit();
}
else
{
  header("location:viewjobopening.php?errorupdate=Job opening not updated.");
  exit();
}
?>