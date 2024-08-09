<?php 
header('Access-Control-Allow-Origin: *');
require './dbconnection.php';

$fullName = $_REQUEST['full_name'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];
$about = $_REQUEST['about'];
$positionApplied = $_REQUEST['position_applied'];
$currentSalary = $_REQUEST['current_salary'];
$expectedSalary = $_REQUEST['expected_salary'];
$cv = "http://test.com";
$active = 1;

if ($_REQUEST) {
    $sql = "INSERT INTO `applicants`(`name`, `phone`, `email`, `about`, `position`, `current_salary`, `expected_salary`, `cv`, `active`) VALUES ('".$fullName."','".$mobile."','".$email."','".$about."','".$positionApplied."','".$currentSalary."','".$expectedSalary."','".$cv."',$active)";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        echo json_encode(['message' => 'Applicants Details Added Successfully.', 'response' => 'Ok', 'status' => 200]);
    }
} else {
    echo json_encode(['message' => 'Applicants Details Not Added Successfully','response' => 'Internal Server Error', 'status' => 500]);
}
?>