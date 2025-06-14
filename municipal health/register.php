include 'db.php';
$data = json_decode(file_get_contents("php://input"), true);

// Step 1: Insert into users
$username = $data['username'];
$password = password_hash($data['password'], PASSWORD_DEFAULT);
$role = $data['role'];

$stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password, $role);

if ($stmt->execute()) {
    $user_id = $stmt->insert_id; // Get inserted user ID

    // Step 2: Insert into user_profiles
    $stmt2 = $conn->prepare("INSERT INTO user_profiles 
        (user_id, first_name, middle_name, last_name, birthdate, sex, address, contact)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt2->bind_param("isssssss",
        $user_id,
        $data['first_name'],
        $data['middle_name'],
        $data['last_name'],
        $data['birthdate'],
        $data['sex'],
        $data['address'],
        $data['contact']
    );

    if ($stmt2->execute()) {
        echo json_encode(["success" => true, "message" => "Registered successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Profile creation failed"]);
    }

    $stmt2->close();
} else {
    echo json_encode(["success" => false, "message" => "Username may already exist"]);
}

$stmt->close();
$conn->close();
