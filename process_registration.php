<?php

$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'user_registration'; 

$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];


$sql = "INSERT INTO user_registration (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $password);
if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
