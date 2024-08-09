<?php
require('./dbconnection.php');
$achievement_id=$_POST['achievement_id'];
$qry1="UPDATE achievements SET active=0 WHERE id=$achievement_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo $achievement_id;
}
else
{
	echo "Error";
}
?>