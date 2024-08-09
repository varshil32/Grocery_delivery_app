<?php 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    include('../dbconnection.php');
  
    if(isset($_POST['feedback']))
    {
        $feedback = $_POST['feedback'];
        
    }
   
 
       
    $qry = "INSERT INTO `feedback_table` (`feedback`,`user_id`) VALUES ('$feedback','4') ";
    
    $exe = mysqli_query($conn, $qry);



if ($exe) {
    echo json_encode("Success");
    
    } 
    else {
        
        echo json_encode("error");
    }
