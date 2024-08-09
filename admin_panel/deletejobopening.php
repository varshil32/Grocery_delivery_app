<?php
require('./dbconnection.php');
$opening_id=$_POST['opening_id'];
$qry1="UPDATE opening SET active=0 WHERE id=$opening_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo $opening_id;
}
else
{
	echo "Error";
}
?>
