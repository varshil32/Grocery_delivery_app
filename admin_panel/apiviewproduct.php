<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include('./dbconnection.php');

if (!isset($_POST['sub_cat_id'])) {
    echo json_encode(array('error' => 'sub_cat_id parameter is missing'));
    exit;
}

$subCatId = $_POST['sub_cat_id'];
$subCatQry = "SELECT * FROM subcategory_table WHERE id = $subCatId AND active = 1";
$rs = mysqli_query($conn, $subCatQry);

class ProductItem
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $imagePath;

    public function __construct($id, $name, $description, $price, $imagePath)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->imagePath = $imagePath;
    }
}

$dataArray = array();
if (mysqli_num_rows($rs) > 0) {
    while ($row = mysqli_fetch_assoc($rs)) {
        $productQry = "SELECT * FROM product_table WHERE subcategory_id = $subCatId AND active = 1";
        $productRs = mysqli_query($conn, $productQry);
        if ($productRs && mysqli_num_rows($productRs) > 0) {
            while ($productRow = mysqli_fetch_assoc($productRs)) {
                $productItems[] = new ProductItem($productRow['id'], $productRow['product_name'], $productRow['product_description'], $productRow['product_price'], $productRow['product_pic']);
            }
        }
    }
}

if (isset($productItems)) {
    $jsonData = json_encode($productItems);
    echo $jsonData;
} else {
    echo json_encode(array('error' => 'No products found for subcategory ID ' . $subCatId));
}
exit;
