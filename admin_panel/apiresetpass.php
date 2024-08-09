<?php
    header('Access-Control-Allow-Origin: *');
    require './dbconnection.php';
    $new_pass = $_POST['newpass'];
 
   $qry = "UPDATE `users` SET `password` = '$new_pass' WHERE `id` = '2'";


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