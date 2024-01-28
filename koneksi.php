<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "webpro";

$conn = mysqli_connect($server, $username, $password, $dbname);

if($conn->connect_error)
{
    die("Connection error : " . $conn->connect_error);
}