<?php
include 'db.php';

$medications = $_POST['medications'];
$allergies = $_POST['allergies'];
$otherAllergies = $_POST['other_allergies'];
$concern = $_POST['recent_concern'];
$specialist = $_POST['specialist'];
$physician = $_POST['physician'];
$appointmentDate = $_POST['appointment_date'];
$appointmentTime = $_POST['appointment_time'];

$sql = "INSERT INTO returning_patients (medications, allergies, other_allergies, recent_concern, specialist, physician, appointment_date, appointment_time)
VALUES ('$medications', '$allergies', '$otherAllergies', '$concern', '$specialist', '$physician', '$appointmentDate', '$appointmentTime')";

if ($conn->query($sql) === TRUE) {
    echo "Returning patient record created.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
