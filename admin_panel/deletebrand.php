<?php
require('./dbconnection.php');
$brand_id=$_POST['brand_id'];
$qry1="UPDATE brands SET active=0 WHERE id=$brand_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo $brand_id;
}
else
{
	echo "Error";
}
?>