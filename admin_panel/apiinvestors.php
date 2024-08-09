<?php 
header('Access-Control-Allow-Origin: *');
require './dbconnection.php';

$investor_id = $_REQUEST['investor_id'];

if ($investor_id) {
    $sql = "SELECT i.* FROM investors i WHERE i.active = 1 AND i.id = $investor_id";
} else {
    $sql = "SELECT i.* FROM investors i WHERE i.active = 1";
}

$rs = mysqli_query($conn, $sql);

$dataArray = array();
if(mysqli_num_rows($rs) > 0) {
    while($row = mysqli_fetch_assoc($rs)) {
        $dataArray[$row['id']] = array_map("utf8_encode", $row);
    }
}

if ($dataArray) {
    echo json_encode(['message' => 'Investors Fetched Successfully.','data' => $dataArray, 'response' => 'Ok', 'status' => 200]);
} else {
    echo json_encode(['message' => 'Investors Not Fetched Successfully','response' => 'Internal Server Error', 'status' => 500]);
}
?>