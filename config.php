<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "kita_kerja";

$conn = mysqli_connect($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>