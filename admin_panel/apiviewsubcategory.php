<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include('./dbconnection.php');
$subCatId = $_POST['cat_id'];
$subCatQry = "SELECT * FROM subcategory_table subcat LEFT JOIN category_table cat ON subcat.category_id = cat.id WHERE subcat.category_id = $subCatId AND subcat.active = 1";
$rs = mysqli_query($conn, $subCatQry);

class SubCategoryItem
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
        $subcategoryItems[] = new SubCategoryItem($row['id'], $row['subcategory_name'], $row['subcategory_pic']);
    }
}

$jsonData = json_encode($subcategoryItems);

echo $jsonData;
exit;
