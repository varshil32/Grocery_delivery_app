<?php
require('./dbconnection.php');
$payment_id=$_POST['payment_id'];
$qry1="UPDATE payment SET active=0 WHERE id=$payment_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo $payment_id;
}
else
{
	echo "Error";
}
?>