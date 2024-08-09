<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: *");
    require './dbconnection.php';

    if(isset($_POST['firstname']))
    {
        $first_name = $_POST['firstname'];
    }
    else return;
    if(isset($_POST['lastname']))
    {
        $last_name = $_POST['lastname'];
    }
    else return;
    if(isset($_POST['mobile']))
    {
        $mobile_no = $_POST['mobile'];
    }
    else return;
    if(isset($_POST['address']))
    {
        $address = $_POST['address'];
    }
    else return;
    if(isset($_POST['password']))
    {
        $password = $_POST['password'];
    }
    else return;
    if(isset($_POST['email']))
    {
        $email = $_POST['email'];
    }
    else return;

    
//   print(json_encode($arr));

$loginQry = "SELECT * FROM `users` WHERE `mobile_no` = '".$mobile_no."' ";
$loginQry1 = "SELECT * FROM `users` WHERE  `email` = '".$email."' ";

$rs = mysqli_query($conn, $loginQry);
$count = mysqli_num_rows($rs);

$rs1 = mysqli_query($conn, $loginQry1);
$count1 = mysqli_num_rows($rs1);


if ($count == 0 && $count1 == 0)    
{
    $qry = "INSERT INTO `users` (`first_name`,`last_name`,`mobile_no`,`address`,`password`,`email`,`user_type`) VALUES('$first_name','$last_name','$mobile_no','$address','$password','$email','2')";

    $exe = mysqli_query($conn, $qry);
    if($exe)
    {
        echo json_encode("Success");
    }
    else
    {
        echo json_encode("Not Success");

    }
} 
else {

    echo json_encode("error");
}
