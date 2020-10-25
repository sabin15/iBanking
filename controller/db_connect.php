<?php
$server_name = "18.206.243.25";
$user_name = "ibanking";
$password = "Delta@1234";
$database_name = "ibanking";
// Create connection
$conn = new mysqli($server_name, $user_name, $password,$database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>