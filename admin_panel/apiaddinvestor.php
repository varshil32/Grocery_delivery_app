<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");
require './dbconnection.php';

$_REQUEST = json_decode(array_keys($_POST)[0], true);
$name = $_REQUEST['name'];
$mobile = $_REQUEST['mobile'];
$city = $_REQUEST['city'];
$interested_in = $_REQUEST['interested_in'];
$active = 1;

if ($_REQUEST) {
    $sql = "INSERT INTO `investors`(`name`, `mobile`, `city`, `interested_in`, `active`) VALUES ('".$name."','".$mobile."','".$city."','".$interested_in."',$active)";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        echo json_encode(['message' => 'Investor Added Successfully.', 'response' => 'Ok', 'status' => 200]);
    }
} else {
    echo json_encode(['message' => 'Investor Not Added Successfully','response' => 'Internal Server Error', 'status' => 500]);
}
?>