<?php
$host = "127.0.0.1";
$dbuser = "root";
$dbpass = "VinTheProgrammer2005*";
$dbname = "find_it_db";

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
