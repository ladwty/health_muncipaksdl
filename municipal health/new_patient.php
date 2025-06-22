<?php
include 'db.php';

// Get and sanitize POST data
$firstName = isset($_POST['emergency_fname']) ? mysqli_real_escape_string($conn, $_POST['emergency_fname']) : '';
$lastName = isset($_POST['emergency_last_name']) ? mysqli_real_escape_string($conn, $_POST['emergency_last_name']) : '';
$relationship = isset($_POST['relationship']) ? mysqli_real_escape_string($conn, $_POST['relationship']) : '';
$phone = isset($_POST['emergency_phone']) ? mysqli_real_escape_string($conn, $_POST['emergency_phone']) : '';
$isMedicated = isset($_POST['medications_radio']) ? mysqli_real_escape_string($conn, $_POST['medications_radio']) : '';
$medications = isset($_POST['medications']) ? mysqli_real_escape_string($conn, $_POST['medications']) : '';
if (isset($_POST['past_history'])) {
    if (is_array($_POST['past_history'])) {
        $history = mysqli_real_escape_string($conn, implode(', ', $_POST['past_history']));
    } else {
        $history = mysqli_real_escape_string($conn, $_POST['past_history']);
    }
} else {
    $history = '';
}
$otherHistory = isset($_POST['other_history']) ? mysqli_real_escape_string($conn, $_POST['other_history']) : '';
$smoke = isset($_POST['smoke_status']) ? mysqli_real_escape_string($conn, $_POST['smoke_status']) : '';
$smokeOther = isset($_POST['smoke_other']) ? mysqli_real_escape_string($conn, $_POST['smoke_other']) : '';
$specialist = isset($_POST['specialist']) ? mysqli_real_escape_string($conn, $_POST['specialist']) : '';
$physician = isset($_POST['physician']) ? mysqli_real_escape_string($conn, $_POST['physician']) : '';
$appointmentDate = isset($_POST['appointment_date']) ? mysqli_real_escape_string($conn, $_POST['appointment_date']) : '';
$appointmentTime = isset($_POST['appointment_time']) ? mysqli_real_escape_string($conn, $_POST['appointment_time']) : '';
$consent = isset($_POST['consent']) ? 1 : 0; // Consent is checked, set to 1, else 0

// Prepare the SQL query to insert data using prepared statements
$stmt = $conn->prepare("INSERT INTO new_patients (
    emergency_fname,
    emergency_lname,
    relationship,
    emergency_phone,
    is_on_medications,
    medication_list,
    past_medical_history,
    other_history,
    smoking_status,
    other_smoking_info,
    specialist,
    physician,
    appointment_date,
    appointment_time,
    consent_given
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    die("Prepare failed: " . htmlspecialchars($conn->error));
}

$stmt->bind_param(
    "ssssssssssssssi",
    $firstName,
    $lastName,
    $relationship,
    $phone,
    $isMedicated,
    $medications,
    $history,
    $otherHistory,
    $smoke,
    $smokeOther,
    $specialist,
    $physician,
    $appointmentDate,
    $appointmentTime,
    $consent
);

// Execute the query and check for success
if ($stmt->execute()) {
    echo "New patient record created successfully";
} else {
    echo "Error: " . htmlspecialchars($stmt->error);
}

// Close the statement and database connection
$stmt->close();
$conn->close();
