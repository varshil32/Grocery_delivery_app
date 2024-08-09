<?php 
header('Access-Control-Allow-Origin: *');
require './dbconnection.php';

$category_id = $_REQUEST['category_id'];
$subcategory_id = $_REQUEST['subcategory_id'];
$product_id = $_REQUEST['product_id'];
$downloadCall = $_REQUEST['download_call'];

if ($category_id && !$subcategory_id && !$product_id) {
    $sql = "SELECT p.* FROM products p WHERE p.active = 1 AND p.category_id = $category_id";
} 
if ($category_id && $subcategory_id && !$product_id) {
    $sql = "SELECT p.* FROM products p WHERE p.active = 1 AND p.subcategory_id = $subcategory_id AND p.category_id = $category_id";
}
if ($category_id && $subcategory_id && $product_id) {
    $sql = "SELECT p.* FROM products p WHERE p.active = 1 WHERE p.id = $product_id AND p.subcategory_id = $subcategory_id AND p.category_id = $category_id";
}
if (!$category_id && !$subcategory_id && !$product_id) {
    $sql = "SELECT p.* FROM products p WHERE p.active = 1";
}

if ($downloadCall) {
    $sql = "SELECT p.name,p.brochure,sub.name FROM products p LEFT JOIN subcategories sub ON p.subcategory_id = sub.id WHERE p.active = 1";
}

$rs = mysqli_query($conn, $sql);

$dataArray = array();
if(mysqli_num_rows($rs) > 0) {
    while($row = mysqli_fetch_assoc($rs)) {
        $dataArray[$row['id']] = array_map("utf8_encode", $row);
    }
}

if ($dataArray) {
    echo json_encode(['message' => 'Products Fetched Successfully.','data' => $dataArray, 'response' => 'Ok', 'status' => 200]);
} else {
    echo json_encode(['message' => 'Products Not Fetched Successfully','response' => 'Internal Server Error', 'status' => 500]);
}
?>