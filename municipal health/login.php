<?php
session_start();
<<<<<<< HEAD
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$username = $data['username'];
$password = $data['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
  $_SESSION['user'] = $user['username'];
  echo json_encode(["success" => true, "message" => "Login successful"]);
} else {
  echo json_encode(["success" => false, "message" => "Invalid credentials"]);
}
?>
=======
header("Content-Type: application/json");

// Get raw POST data
$data = json_decode(file_get_contents("php://input"), true);

// Sample DB connection (edit these)
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "med-center"; // change this

$conn = new mysqli($host, $user, $pass, $dbname);

// Check DB connection
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit();
}

// Sanitize input
$username = $conn->real_escape_string($data['username']);
$password = $conn->real_escape_string($data['password']);

// Query user
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $_SESSION['username'] = $username;
    echo json_encode(["status" => "success", "message" => "Login successful"]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid credentials"]);
}

$conn->close();
?>
>>>>>>> 3ce005aa9126fbf314dcb11f228531cb7da7fcf3
