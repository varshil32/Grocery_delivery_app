<?php
require('./dbconnection.php');
$investor_id=$_POST['investor_id'];
$qry1="UPDATE investors SET active=0 WHERE id=$investor_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo $investor_id;
}
else
{
	echo "Error";
}
?>