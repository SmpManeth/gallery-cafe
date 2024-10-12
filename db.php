<?php
$servername = "localhost"; // Replace with your server details
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "thegallerycafe"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
