<?php 
header('Access-Control-Allow-Origin: *');
require './dbconnection.php';

$catelogue_id = $_REQUEST['catelogue_id'];

if ($catelogue_id) {
    $sql = "SELECT b.* FROM catelogue b WHERE b.active = 1 AND b.id = $catelogue_id";
} else {
    $sql = "SELECT b.* FROM catelogue b WHERE b.active = 1";
}

$rs = mysqli_query($conn, $sql);

$dataArray = array();
if(mysqli_num_rows($rs) > 0) {
    while($row = mysqli_fetch_assoc($rs)) {
        $dataArray[$row['id']] = array_map("utf8_encode", $row);
    }
}

if ($dataArray) {
    echo json_encode(['message' => 'Catelogues Fetched Successfully.','data' => $dataArray, 'response' => 'Ok', 'status' => 200]);
} else {
    echo json_encode(['message' => 'Catelogues Not Fetched Successfully','response' => 'Internal Server Error', 'status' => 500]);
}
?>