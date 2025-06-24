<?php
include 'db.php';

$medications = $_POST['medications'];
// Convert allergies array to comma-separated string
$allergies = isset($_POST['allergies']) ? (is_array($_POST['allergies']) ? implode(', ', $_POST['allergies']) : $_POST['allergies']) : '';
$otherAllergies = $_POST['other_allergies'];
$concern = $_POST['recent_concern'];
$specialist = $_POST['specialist'];
$physician = $_POST['physician'];
$appointmentDate = $_POST['appointment_date'];
$appointmentTime = $_POST['appointment_time'];

$sql = "INSERT INTO returning_patients (medications, allergies, other_allergies, recent_concern, specialist, physician, appointment_date, appointment_time)
VALUES ('$medications', '$allergies', '$otherAllergies', '$concern', '$specialist', '$physician', '$appointmentDate', '$appointmentTime')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Submission successful!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
}
exit();
$conn->close();
?>
