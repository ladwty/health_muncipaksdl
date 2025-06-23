<?php
include 'db.php';

$email = $_POST['email'];
$firstName = $_POST['patient_fname'];
$lastName = $_POST['patient_lname'];
$birthDate = $_POST['birthdate'];
$sex = $_POST['sex'];
$phone = $_POST['phone'];
$emergencyContact = $_POST['emergency_contact_name'];
$emergencyPhone = $_POST['emergency_contact_number'];
$diagnosis = $_POST['diagnosis'];
$history = $_POST['medical_history'];
$familyHistory = $_POST['family_history'];
$referral = $_POST['reason_for_referral'];
$comments = $_POST['additional_comments'];
$specialist = $_POST['specialist'];
$physician = $_POST['physician'];

// If you have a consent checkbox in your form, use this:
$consent = isset($_POST['consent_given']) ? 1 : 0;

$sql = "INSERT INTO referring_physicians (
    email, patient_fname, patient_lname, birthdate, sex, phone_number, emergency_contact_name, emergency_contact_number, diagnosis, medical_history, family_history, reason_for_referral, additional_comments, specialist, physician, consent_given
) VALUES (
    '$email', '$firstName', '$lastName', '$birthDate', '$sex', '$phone', '$emergencyContact', '$emergencyPhone', '$diagnosis', '$history', '$familyHistory', '$referral', '$comments', '$specialist', '$physician', '$consent'
)";

if ($conn->query($sql) === TRUE) {
    echo "Referral submitted.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
