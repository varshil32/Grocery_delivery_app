<?php
require('./dbconnection.php');
$event_id=$_POST['event_id'];
$qry1="UPDATE events SET active=0 WHERE id=$event_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo $event_id;
}
else
{
	echo "Error";
}
?>
