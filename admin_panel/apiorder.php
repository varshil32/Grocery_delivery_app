<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require './dbconnection.php';

$sql = "SELECT * FROM payment_table WHERE active = 1 order by doi desc limit 4";
$rs = mysqli_query($conn, $sql);

class OrderItem
{
   public $order_id;
   public $amount;
   public $product_name;
   public $status;
   public $doi;

   public function __construct($order_id, $amount, $product_name, $status, $doi)
   {
      $this->order_id = $order_id;
      $this->product_name = $product_name;
      $this->amount = $amount;
      $this->status = $status;
      $this->doi = $doi;
   }
}

// $dataArray = array();
if (mysqli_num_rows($rs) > 0) {
   while ($row = mysqli_fetch_assoc($rs)) {
      $OrderItems[] = new OrderItem($row['order_id'], $row['amount'], $row['product_name'], $row['status'], $row['doi']);
   }
}

$jsonData = json_encode($OrderItems);

echo $jsonData;
exit;
