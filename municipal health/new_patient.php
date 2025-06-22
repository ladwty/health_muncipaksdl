<?php
include 'db.php';

$firstName = $_POST['emergency_first_name'];
$lastName = $_POST['emergency_last_name'];
$relationship = $_POST['relationship'];
$phone = $_POST['emergency_phone'];
$isMedicated = $_POST['medications_radio'];
$medications = $_POST['medications'];
$history = $_POST['past_history'];
$smoke = $_POST['smoke_status'];
$smokeOther = $_POST['smoke_other'];
$specialist = $_POST['specialist'];
$physician = $_POST['physician'];
$appointmentDate = $_POST['appointment_date'];
$appointmentTime = $_POST['appointment_time'];

$sql = "INSERT INTO new_patients (emergency_first_name, emergency_last_name, relationship, emergency_phone, is_taking_medications, medications, past_history, smoke_status, smoke_others, specialist, physician, appointment_date, appointment_time) 
VALUES ('$firstName', '$lastName', '$relationship', '$phone', '$isMedicated', '$medications', '$history', '$smoke', '$smokeOther', '$specialist', '$physician', '$appointmentDate', '$appointmentTime')";

if ($conn->query($sql) === TRUE) {
    echo "New patient record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
