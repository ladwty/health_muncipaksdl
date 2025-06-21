<?php
header('Content-Type: application/json');
include 'db.php';

$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

if (!$data) {
    file_put_contents("debug.txt", "Invalid JSON received: $raw\n", FILE_APPEND);
    echo json_encode(["success" => false, "message" => "No valid data received."]);
    exit;
}

$first = $data['firstName'] ?? '';
$middle = $data['middleName'] ?? '';
$last = $data['lastName'] ?? '';
$birth = $data['birthdate'] ?? '';
$sex = $data['sex'] ?? '';
$address = $data['address'] ?? '';
$username = $data['username'] ?? '';
$password = password_hash(trim($data['password']), PASSWORD_DEFAULT);
$contact = $data['contact'] ?? '';

file_put_contents("debug.txt", json_encode($data, JSON_PRETTY_PRINT) . "\n", FILE_APPEND);

$stmt = $conn->prepare("INSERT INTO usersregister (first_name, middle_name, last_name, date, sex, address, username, password, contact)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $first, $middle, $last, $birth, $sex, $address, $username, $password, $contact);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Registered successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Registration failed: " . $stmt->error]);
}
?>
