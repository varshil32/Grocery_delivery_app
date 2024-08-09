<?php
require('./dbconnection.php');


$category_id=$_POST['category_id'];


$qry1="UPDATE category_table SET active=0 WHERE id=$category_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo $category_id;
}
else
{
	echo "Error";
}
?>