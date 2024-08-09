<?php
require('./dbconnection.php');
$catelogue_id=$_POST['catelogue_id'];
$qry1="UPDATE catelogue SET active=0 WHERE id=$catelogue_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo $catelogue_id;
}
else
{
	echo "Error";
}
?>