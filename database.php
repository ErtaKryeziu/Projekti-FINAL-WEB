<?php 

$servername = "localhost";
$username1 = "root";
$password1 = "";
$database1 = "belle";


$conn = new mysqli($servername, $username1, $password1, $database1);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>