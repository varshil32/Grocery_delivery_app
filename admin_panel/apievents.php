<?php 
header('Access-Control-Allow-Origin: *');
require './dbconnection.php';

$event_id = $_REQUEST['event_id'];

if ($plant_id) {
    $sql = "SELECT e.* FROM events e WHERE e.active = 1 AND e.id = $event_id";
} else {
    $sql = "SELECT e.* FROM events e WHERE e.active = 1";
}

$rs = mysqli_query($conn, $sql);

$dataArray = array();
if(mysqli_num_rows($rs) > 0) {
    while($row = mysqli_fetch_assoc($rs)) {
        $dataArray[$row['id']] = array_map("utf8_encode", $row);
    }
}

if ($dataArray) {
    echo json_encode(['message' => 'Events Fetched Successfully.','data' => $dataArray, 'response' => 'Ok', 'status' => 200]);
} else {
    echo json_encode(['message' => 'Events Not Fetched Successfully','response' => 'Internal Server Error', 'status' => 500]);
}
?>