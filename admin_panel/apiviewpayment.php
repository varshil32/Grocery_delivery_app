<?php 
    include('./dbconnection.php');
    $productQry = "SELECT * FROM payment     WHERE active = 1";
    $rs = mysqli_query($conn,$productQry);

    if (mysqli_num_rows($rs) > 0) {
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[] = $row;
        }
    }

    echo json_encode($data);
?>



