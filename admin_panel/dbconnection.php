<?php 
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "final_famiecare_doc";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo "Not Connected";
}
?>