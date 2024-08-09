<?php
header('Access-Control-Allow-Origin: *');
require './dbconnection.php';

$sql = "SELECT * FROM category_table WHERE active = 1";
$rs = mysqli_query($conn, $sql);

class CategoryItem
{
  public $id;
  public $name;
  public $imagePath;

  public function __construct($id, $name, $imagePath)
  {
    $this->id = $id;
    $this->name = $name;
    $this->imagePath = $imagePath;
  }
}

$dataArray = array();
if (mysqli_num_rows($rs) > 0) {
  while ($row = mysqli_fetch_assoc($rs)) {
    $categoryItems[] = new CategoryItem($row['id'], $row['category_name'], $row['category_pic']);
  }
}

$jsonData = json_encode($categoryItems);

echo $jsonData;
exit;
