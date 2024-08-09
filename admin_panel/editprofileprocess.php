<?php 

include('./dbconnection.php');

if ($_REQUEST['register']) {
    
    
    $id = $_REQUEST['id'];
    $firstName = $_REQUEST['firstName'];
    $lastName = $_REQUEST['lastName'];
    $email = $_REQUEST['email'];
    $password = base64_encode($_REQUEST['password']);
    $cPassword = base64_encode($_REQUEST['confirmpassword']);
    $gender = $_REQUEST['gender'];
    $mobile_no = $_REQUEST['mobile'];
    $address = $_REQUEST['address'];
    $active = 1;
    $user_type = 1;

    $fullName = $firstName . " " . $lastName;
    $_COOKIE['fullName'] = $fullName;
    setcookie("fullName", $fullName, time() +86400);
    
    if ($password != $cPassword) {
        echo "<script>alert('Password and Confirm Password are not same.')</script>";
        header("location:./profile.php");
        exit;
    } else {
        $updateUserQry =  "UPDATE users SET `first_name` = '".$firstName."',`last_name` = '".$lastName."', `email` = '".$email."', `password` = '".$password."', `active` = $active, `user_type` =  $user_type, `mobile_no` = '".$mobile."', `address` = '".$address."' WHERE `id` = $id";
        $rs = mysqli_query($conn,$updateUserQry);


        if ($rs) {
            header("location:./profile.php?successprofile=Profile Updated Successfully&id=$id&callfor=profile");
            exit;
        } else {
            header("location:./profile.php?successerrprofile=Profile not Updated Successfully&id=$id&callfor=profile");
            exit;
        }
    }
} else {
    header("location:./index.php");
    exit;
}


?>