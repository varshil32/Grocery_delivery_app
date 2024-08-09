<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");

require './dbconnection.php';

$_REQUEST = json_decode(array_keys($_POST)[0], true);
$fullName = $_REQUEST['full_name'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];
$description = $_REQUEST['description'];
$active = 1;


if ($_REQUEST) {
    $sql = "INSERT INTO `inquiry`(`user_name`, `mobile`, `email`, `description`, `active`) VALUES ('".$fullName."','".$mobile."','".$email."','".$description."',$active)";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        echo json_encode(['message' => 'Inquiry Added Successfully.', 'response' => 'Ok', 'status' => 200]);
    }
} else {
    echo json_encode(['message' => 'Inquiry Not Added Successfully','response' => 'Internal Server Error', 'status' => 500]);
}
?>