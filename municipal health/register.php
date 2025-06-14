<?php
session_start();
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$username = $data['username'];
$password = $data['password'];

if (empty($username) || empty($password)) {
  echo json_encode(["success" => false, "message" => "All fields are required"]);
  exit;
}

$hashed = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashed);

if ($stmt->execute()) {
  echo json_encode(["success" => true, "message" => "Registered successfully"]);
} else {
  echo json_encode(["success" => false, "message" => "Username already exists"]);
}
?>
