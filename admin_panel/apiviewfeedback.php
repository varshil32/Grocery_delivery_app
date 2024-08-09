<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include('./dbconnection.php');
//$productQry = "SELECT * FROM feedback_table WHERE active = 1";
// $rs = mysqli_query($conn,$productQry);
// $_POST['feedback']="abc";
if (isset($_POST['feedback'])) {
  $feedback = $_POST['feedback'];
}



$qry = "INSERT INTO `feedback_table` (`feedback`,`user_id`) VALUES ('$feedback','1') ";
// echo $qry;
// exit;
$exe = mysqli_query($conn, $qry);
// $count = mysqli_num_rows($exe);

//$arr=[];
if ($exe) {
  echo json_encode("Success");
} else {
  echo json_encode("error");
}
exit;
  // print(json_encode($arr));


    // if (mysqli_num_rows($rs) > 0) {
    //     while ($row = mysqli_fetch_assoc($rs)) {
    //         $data[] = $row;
    //     }
    // }

  //  echo json_encode($data);
