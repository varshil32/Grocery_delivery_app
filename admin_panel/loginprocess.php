<?php 

include('./dbconnection.php');

if ($_REQUEST['submit']) {
    $email = $_REQUEST['email'];
    $password = base64_encode($_REQUEST['password']);

    $loginQry = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'";
    $rs = mysqli_query($conn,$loginQry);

    if(mysqli_num_rows($rs) > 0) {
        $row = mysqli_fetch_assoc($rs);

        session_start();
        $_SESSION['firstName'] = $row['first_name'];
        $_SESSION['lastName'] = $row['last_name'];
        $_SESSION['userName'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['userId'] = $row['id'];
        $fullName = $_SESSION['firstName'] . " " . $_SESSION['lastName'];
        setcookie("fullName", $fullName, time() +86400);
        setcookie("userId", $row['id'], time() + 86400);
        header("location:./viewcategories.php");
        exit;
    } else {
        echo '<script>alert("Username or Password is wrong. please try again...")</script>';
        header("location:./index.php");
        exit;
    }
} else {
    echo '<script>alert("You don\'t have rights of this page.")</script>';
    header("location:./index.php");
    exit;
}


?>