<?php
    header('Access-Control-Allow-Origin: *');
    require './dbconnection.php';

   
    $qry = "SELECT `first_name`, `profile_pic` FROM `users`";

    $result = $conn->query($qry);

// Check if user exists
if ($result->num_rows > 0) {
    // User exists, return user information
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    // User does not exist, return error message
    echo "User not found";
}
  print(json_encode($arr));

 
?>