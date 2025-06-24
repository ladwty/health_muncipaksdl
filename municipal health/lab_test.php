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
    $has_conditions = ($_POST['healthConditions'] === 'yes') ? 1 : 0;
    $on_medications = ($_POST['medications'] === 'yes') ? 1 : 0;
    $has_allergies = ($_POST['allergies'] === 'yes') ? 1 : 0;
    $emergencyName = $_POST['emergency_name'];
    $relationship = $_POST['relationship'];
    $contact = $_POST['contact_number'];

    $sql = "INSERT INTO lab_tests 
        (file_path, service, appointment_date, appointment_time, has_conditions, on_medications, has_allergies, emergency_contact_name, emergency_contact_relationship, emergency_contact_phone)
        VALUES 
        ('$targetPath', '$service', '$date', '$time', $has_conditions, $on_medications, $has_allergies, '$emergencyName', '$relationship', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Submission successful!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
    }
    exit();
} else {
    echo "File upload failed.";
}
$conn->close();
?>
