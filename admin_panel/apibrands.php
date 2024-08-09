<?php 
header('Access-Control-Allow-Origin: *');
require './dbconnection.php';

$brand_id = $_REQUEST['brand_id'];

if ($brand_id) {
    $sql = "SELECT b.* FROM brands b WHERE b.active = 1 AND b.id = $brand_id";
} else {
    $sql = "SELECT b.* FROM brands b WHERE b.active = 1";
}

$rs = mysqli_query($conn, $sql);

$dataArray = array();
if(mysqli_num_rows($rs) > 0) {
    while($row = mysqli_fetch_assoc($rs)) {
        $dataArray[$row['id']] = array_map("utf8_encode", $row);
    }
}

if ($dataArray) {
    echo json_encode(['message' => 'Brands Fetched Successfully.','data' => $dataArray, 'response' => 'Ok', 'status' => 200]);
} else {
    echo json_encode(['message' => 'Brands Not Fetched Successfully','response' => 'Internal Server Error', 'status' => 500]);
}
?>