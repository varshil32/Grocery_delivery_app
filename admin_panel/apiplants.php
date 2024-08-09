<?php 
header('Access-Control-Allow-Origin: *');
require './dbconnection.php';

$plant_id = $_REQUEST['plant_id'];

if ($plant_id) {
    $sql = "SELECT p.* FROM plants p WHERE p.active = 1 AND p.id = $plant_id";
} else {
    $sql = "SELECT p.* FROM plants p WHERE p.active = 1";
}

$rs = mysqli_query($conn, $sql);

$dataArray = array();
if(mysqli_num_rows($rs) > 0) {
    while($row = mysqli_fetch_assoc($rs)) {
        $dataArray[$row['id']] = array_map("utf8_encode", $row);
    }
}

if ($dataArray) {
    echo json_encode(['message' => 'Plants Fetched Successfully.','data' => $dataArray, 'response' => 'Ok', 'status' => 200]);
} else {
    echo json_encode(['message' => 'Plants Not Fetched Successfully','response' => 'Internal Server Error', 'status' => 500]);
}
?>