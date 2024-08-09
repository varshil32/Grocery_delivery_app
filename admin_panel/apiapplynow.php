<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");

require './dbconnection.php';

$_REQUEST = json_decode(array_keys($_POST)[0], true);
$fullName = $_REQUEST['full_name']; 
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];
$about = $_REQUEST['about'];
$positionApplied = $_REQUEST['position_applied'];
$currentSalary = $_REQUEST['current_salary'];
$expectedSalary = $_REQUEST['expected_salary'];
$active = 1;


print_r($_POST);exit;
$base_64content = base64_decode($_REQUEST['image']);

$base_64content = $_REQUEST['image'];


$image_base64 = base64_decode($base_64content);
$file = "img/upload/applicants/". time() . "_CV.pdf";
if (file_put_contents($file, $image_base64)) {
    chmod($file,0777);
}   

if ($_REQUEST) {
    $sql = "INSERT INTO `applicants`(`name`, `phone`, `email`, `about`, `position`, `current_salary`, `expected_salary`, `cv`, `active`) VALUES ('".$fullName."','".$mobile."','".$email."','".$about."','".$positionApplied."','".$currentSalary."','".$expectedSalary."' ,'".$file."'  ,$active)";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        echo json_encode(['message' => 'Applicants Details Added Successfully.', 'response' => 'Ok', 'status' => 200]);
    }
} else {
    echo json_encode(['message' => 'Applicants Details Not Added Successfully','response' => 'Internal Server Error', 'status' => 500]);
}
?>