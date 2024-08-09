<?php
require('./dbconnection.php');
$complaint_id=$_POST['complaint_id'];
$qry1="UPDATE complaint SET active=0 WHERE id=$complaint_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo $complaint_id;
}
else
{
	echo "Error";
}
?>