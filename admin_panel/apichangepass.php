<?php
header('Access-Control-Allow-Origin: *');
require './dbconnection.php';
// echo $_POST['newpass'];

$new_pass = $_POST['newpass'];
$old_pass = $_POST['oldpass'];

$loginQry = "SELECT * FROM `users` WHERE `id` = '2' AND `password` = '" . $old_pass . "'";

$rs = mysqli_query($conn, $loginQry);
$count = mysqli_num_rows($rs);

//$arr=[];
if ($count == 1) 
{
    $qry = "UPDATE `users` SET `password` = '$new_pass' WHERE `id` = '2'";
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