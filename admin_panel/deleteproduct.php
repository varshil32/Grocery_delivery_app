<?php
include('./dbconnection.php');
$product_id=$_POST['product_id'];

$qry1="UPDATE product_table SET active=0 WHERE id=$product_id";
$rs1=mysqli_query($conn,$qry1);

if($rs1) {
	echo $product_id;
} else {
    echo "Error";
}
?>