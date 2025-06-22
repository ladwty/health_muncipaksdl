<?php
include 'db.php';

if ($_FILES['lab-request']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    $filename = basename($_FILES['lab-request']['name']);
    $targetPath = $uploadDir . $filename;
    move_uploaded_file($_FILES['lab-request']['tmp_name'], $targetPath);

    $service = $_POST['service'];
    $date = $_POST['appointment_date'];
    $time = $_POST['appointment_time'];
    $health = $_POST['healthConditions'];
    $meds = $_POST['medications'];
    $allergies = $_POST['allergies'];
    $emergencyName = $_POST['emergency_name'];
    $relationship = $_POST['relationship'];
    $contact = $_POST['contact_number'];

    $sql = "INSERT INTO lab_test_requests (filename, filepath, service_selected, appointment_date, appointment_time, health_condition_status, medication_status, allergy_status, emergency_contact_name, relationship, contact_number)
    VALUES ('$filename', '$targetPath', '$service', '$date', '$time', '$health', '$meds', '$allergies', '$emergencyName', '$relationship', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "Lab test request submitted.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "File upload failed.";
}
$conn->close();
?>
