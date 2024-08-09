<?php 

include('./dbconnection.php');

if ($_REQUEST['register']) {
    $fullName = $_REQUEST['fullName'];
    $email = $_REQUEST['email'];
    $password = base64_encode($_REQUEST['password']);
    $cPassword = base64_encode($_REQUEST['confirmpassword']);
    $active = 1;
    $user_type = 1;
;
    if ($password != $cPassword) {
        echo "<script>alert('Password and Confirm Password are not same.')</script>";
        header("location:./signup.php");
        exit();
    } else {
        $insertUserQry = "INSERT INTO users(`full_name`,`email`,`password`,`active`,`user_type`) VALUES('".$fullName."', '".$email."', '".$password."', $active, $user_type)";
        $rs = mysqli_query($conn,$insertUserQry);


        if ($rs) {
            header("location:./index.php");
            exit();
        } else {
            echo '<script>alert("Something wrong with data.please try again...")</script>';
            header("location:./signup.php");
            exit();
        }
    }
} else {
    echo '<script>alert("You don\'t have rights of this page.")</script>';
    header("location:./index.php");
    exit();
}


?>