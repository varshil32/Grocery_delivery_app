<?php
require('./dbconnection.php');
$feedback_id=$_POST['feedback_id'];
$qry1="UPDATE feedback SET active=0 WHERE id=$feedback_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo $feedback_id;
}
else
{
	echo "Error";
}
?>