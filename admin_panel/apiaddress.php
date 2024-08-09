<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include('./dbconnection.php');

if (isset($_POST['address'])) {
    $address = $_POST['address'];
}



$qry = "UPDATE `users` SET `address` = '$address' WHERE `id` = '1'";

$exe = mysqli_query($conn, $qry);


if ($exe) {
    echo json_encode("Success");
} else {
    echo json_encode("error");
}
exit;
