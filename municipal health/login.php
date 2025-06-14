<?php
session_start();
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
