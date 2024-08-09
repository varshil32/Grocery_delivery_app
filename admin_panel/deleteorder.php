<?php
require('./dbconnection.php');
$order_id=$_POST['order_id'];
$qry1="UPDATE `order` SET `active`=0 WHERE `id`=$order_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo $order_id;
}
else
{
	echo "Error";
}
?>