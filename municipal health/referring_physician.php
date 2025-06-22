<?php
include 'db.php';

$email = $_POST['email'];
$firstName = $_POST['patient_first_name'];
$lastName = $_POST['patient_last_name'];
$birthDate = $_POST['birth_date'];
$sex = $_POST['sex'];
$phone = $_POST['phone'];
$emergencyContact = $_POST['emergency_contact_name'];
$emergencyPhone = $_POST['emergency_contact_number'];
$diagnosis = $_POST['diagnosis'];
$history = $_POST['medical_history'];
$familyHistory = $_POST['family_history'];
$referral = $_POST['referral_reason'];
$comments = $_POST['additional_comments'];
$specialist = $_POST['specialist'];
$physician = $_POST['physician'];

$sql = "INSERT INTO referring_physicians (email, patient_first_name, patient_last_name, birth_date, sex, phone, emergency_contact_name, emergency_contact_number, diagnosis, medical_history, family_history, referral_reason, additional_comments, specialist, physician)
VALUES ('$email', '$firstName', '$lastName', '$birthDate', '$sex', '$phone', '$emergencyContact', '$emergencyPhone', '$diagnosis', '$history', '$familyHistory', '$referral', '$comments', '$specialist', '$physician')";

if ($conn->query($sql) === TRUE) {
    echo "Referral submitted.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
