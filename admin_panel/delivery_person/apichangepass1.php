<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require '../dbconnection.php';
// echo $_POST['newpass'];
$u_id=4;
$new_pass = $_POST['newpass'];
$old_pass = $_POST['oldpass'];

$loginQry = "SELECT * FROM `users` WHERE `id` = '".$u_id."' AND `password` = '" . $old_pass . "'";

$rs = mysqli_query($conn, $loginQry);
$count = mysqli_num_rows($rs);

//$arr=[];
if ($count == 1) 
{
    $qry = "UPDATE `users` SET `password` = '$new_pass' WHERE `id` = '".$u_id."' ";
    $exe = mysqli_query($conn, $qry);
// $arr=[];
    if ($exe)
     {
        echo json_encode("Success");
    } 
    else
    {
        echo json_encode("Not Success");
    }
} 
else {

    echo json_encode("error");
}

//echo $new_pass;

//   print(json_encode($arr));
?>