<?php
require('./dbconnection.php');
$plant_id=$_POST['plant_id'];
$qry1="UPDATE plants SET active=0 WHERE id=$plant_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo $plant_id;
}
else
{
	echo "Error";
}
?>