<?php 
    include('./dbconnection.php');
    $productQry = "SELECT * FROM complaint_table WHERE active = 1";
    $rs = mysqli_query($conn,$productQry);


    if(isset($_POST['complaint']))
    {
        $complaint = $_POST['complaint'];
        
    }
    else return;
 
       
    $qry = "INSERT INTO `complaint_table` (`complaint`,`user_id`) VALUES ('$complaint','1') ";

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
    // if (mysqli_num_rows($rs) > 0) {
    //     while ($row = mysqli_fetch_assoc($rs)) {
    //         $data[] = $row;
    //     }
    // }

    // echo json_encode($data);
?>



