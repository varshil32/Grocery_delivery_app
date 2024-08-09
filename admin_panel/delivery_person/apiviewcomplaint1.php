<?php 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    include('../dbconnection.php');



    if(isset($_POST['complaint']))
    {
        $complaint = $_POST['complaint'];
        
    }
    else return;
 
       
    $qry = "INSERT INTO `complaint_table` (`complaint`,`user_id`) VALUES ('$complaint','4') ";

    $exe = mysqli_query($conn, $qry);
    $arr=[];
    if($exe)
    {
        $arr["Success"]="true";
    }
    else
    {
        $arr["Success"]="false";

    }
  print(json_encode($arr));
