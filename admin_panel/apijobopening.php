<?php 
header('Access-Control-Allow-Origin: *');
require './dbconnection.php';

$opening_id = $_REQUEST['opening_id'];

if ($plant_id) {
    $sql = "SELECT o.* FROM opening o WHERE o.active = 1 AND o.id = $opening_id";
} else {
    $sql = "SELECT o.* FROM opening o WHERE o.active = 1";
}

$rs = mysqli_query($conn, $sql);

$dataArray = array();
if(mysqli_num_rows($rs) > 0) {
    while($row = mysqli_fetch_assoc($rs)) {
        $dataArray[$row['id']] = array_map("utf8_encode", $row);
    }
}

if ($dataArray) {
    echo json_encode(['message' => 'Job Opening Fetched Successfully.','data' => $dataArray, 'response' => 'Ok', 'status' => 200]);
} else {
    echo json_encode(['message' => 'Job Opening Not Fetched Successfully','response' => 'Internal Server Error', 'status' => 500]);
}
?>