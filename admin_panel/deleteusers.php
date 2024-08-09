<?php
require('./dbconnection.php');
$user_id=$_POST['user_id'];
$qry1="UPDATE users SET active=0 WHERE id=$user_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo $user_id;
}
else
{
	echo "Error";
}
?>