<?php
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Headers: *");
    require '../dbconnection.php';
    $u_id=4;
    $new_pass = $_POST['newpass'];
   
   $qry = "UPDATE `users` SET `password` = '$new_pass' WHERE `id` = '".$u_id."' ";


    $exe = mysqli_query($conn, $qry);
    // $arr=[];
    if($exe)
    {
        echo json_encode("Success");
    }
    else
    {
        echo json_encode("Not Success");

    }
//   print(json_encode($arr));
?>