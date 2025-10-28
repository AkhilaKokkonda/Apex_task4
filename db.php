<?php
$host = "localhost";
$port = "3307"; // your port here
$user = "root";
$pass = "";
$dbname = "foodhub_db";

$conn = mysqli_connect($host, $user, $pass, $dbname, $port);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
