<?php
session_start(); 
header('Content-Type: application/json');
include 'db.php';

$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

if (!$data) {
    echo json_encode(["success" => false, "message" => "Invalid data"]);
    exit;
}

$username = trim($data['username'] ?? '');
$password = trim($data['password'] ?? '');

$stmt = $conn->prepare("SELECT password, first_name, role FROM usersregister WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    
    if (password_verify($password, $row['password'])) {

        $_SESSION["username"] = $username;
        $_SESSION["first_name"] = $row['first_name'];
        $_SESSION["role"] = $row['role'];

        echo json_encode([
            "success" => true,
            "message" => "Login successful",
            "role" => $row['role']
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "Incorrect password"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "User not found"]);
}
?>
