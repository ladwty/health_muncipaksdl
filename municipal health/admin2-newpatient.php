<?php
include 'adminpanel.php';  // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $emergency_fname = $_POST['emergency_fname'];
    $emergency_last_name = $_POST['emergency_last_name'];
    $relationship = $_POST['relationship'];
    $emergency_phone = $_POST['emergency_phone'];
    $medications_radio = $_POST['medications_radio'];
    $medications = $_POST['medications'];
    $past_history = implode(', ', $_POST['past_history']);
    $smoke_status = $_POST['smoke_status'];
    $specialist = $_POST['specialist'];
    $physician = $_POST['physician'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $consent = $_POST['consent'];

    // Insert the data into the 'usersregister' table
    $query = "INSERT INTO usersregister (first_name, middle_name, last_name, date, sex, address, username, contact, emergency_fname, emergency_last_name, relationship, emergency_phone, medications_radio, medications, past_history, smoke_status, specialist, physician, appointment_date, appointment_time, consent)
              VALUES ('$first_name', '$middle_name', '$last_name', '$birthday', '$sex', '$address', '$username', '$contact', '$emergency_fname', '$emergency_last_name', '$relationship', '$emergency_phone', '$medications_radio', '$medications', '$past_history', '$smoke_status', '$specialist', '$physician', '$appointment_date', '$appointment_time', '$consent')";

    if (mysqli_query($conn, $query)) {
        echo "New patient appointment added successfully!";
        header("Location: admin-new-patient.php"); // Redirect to the patient management page
    } else {
        echo "Error: " . mysqli_error($conn); // Handle errors
    }

    // Close the connection
    mysqli_close($conn);
}
?>
