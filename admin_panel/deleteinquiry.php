<?php
require('./dbconnection.php');
$inquiry_id=$_POST['inquiry_id'];
$qry1="UPDATE inquiry SET active=0 WHERE id=$inquiry_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo $inquiry_id;
}
else
{
	echo "Error";
}
?>