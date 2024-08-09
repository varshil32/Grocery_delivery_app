<?php 

include('./dbconnection.php');

if ($_REQUEST['submit']) {
    $email = $_REQUEST['email'];
    
    $pwdQry = "SELECT `password` from `users` WHERE `active` = 1 and `email`='".$email."'";
    $rs = mysqli_query($conn,$pwdQry);
    $row = mysqli_fetch_assoc($rs);
    $password = base64_decode($row['password']);
    header("location:./index.php?password=$password");
    exit;
} else {
    echo '<script>alert("You don\'t have rights of this page.")</script>';
    header("location:./index.php");
    exit;
}


?>