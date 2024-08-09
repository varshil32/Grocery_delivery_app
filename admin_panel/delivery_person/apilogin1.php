<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require '../dbconnection.php';


$phone = $_POST['phone'];
$password = $_POST['password'];



$loginQry = "SELECT * FROM users WHERE `mobile_no` = '" . $phone . "' AND `password` = '"  . $password . "' AND `user_type` = '3' ";

$rs = mysqli_query($conn, $loginQry);
$count = mysqli_num_rows($rs);
if ($count == 1)
{
    echo json_encode("success");
} else 
{
    echo json_encode("error");
}
// if(!empty($loginQry))
// {
//     $arr["Success"]="true";
// }
// else
// {
//     $arr["Success"]="false";
// }



//print(json_encode($arr));
