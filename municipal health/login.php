<?php
session_start();
header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "med-center");

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

$username = $data['username'] ?? '';
$password = $data['password'] ?? '';

// Query the users table
$stmt = $conn->prepare("SELECT * FROM users WHERE Username = ? AND Password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username; // This must match what landingpage.php checks
    echo json_encode(["success" => true, "message" => "Login successful"]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid credentials"]);
}

$stmt->close();
$conn->close();
?>
