<?php 
header('Access-Control-Allow-Origin: *');
require './dbconnection.php';

$achievement_id = $_REQUEST['achievement_id'];

if ($achievement_id) {
    $sql = "SELECT a.* FROM achievements a WHERE a.active = 1 AND a.id = $achievement_id";
} else {
    $sql = "SELECT a.* FROM achievements a WHERE a.active = 1";
}

$rs = mysqli_query($conn, $sql);

$dataArray = array();
if(mysqli_num_rows($rs) > 0) {
    while($row = mysqli_fetch_assoc($rs)) {
        $dataArray[$row['id']] = array_map("utf8_encode", $row);
    }
}

if ($dataArray) {
    echo json_encode(['message' => 'Achievements Fetched Successfully.','data' => $dataArray, 'response' => 'Ok', 'status' => 200]);
} else {
    echo json_encode(['message' => 'Achievements Not Fetched Successfully','response' => 'Internal Server Error', 'status' => 500]);
}
?>