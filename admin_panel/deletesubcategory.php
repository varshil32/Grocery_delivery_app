<?php
require('./dbconnection.php');
$subcategory_id=$_POST['subcategory_id'];
$qry1="UPDATE subcategory_table SET active=0 WHERE id=$subcategory_id";
$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo $subcategory_id;
}
else
{
	echo "Error";
}
?>
