<?php
include 'adminpanel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $patientID = $_POST['ID'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $birthday = $_POST['birthday'];
    $sex = $_POST['sex'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];

    // Update query
    $query = "UPDATE usersregister SET 
              first_name = '$first_name',
              middle_name = '$middle_name',
              last_name = '$last_name',
              date = '$birthday',
              sex = '$sex',
              address = '$address',
              username = '$username',
              contact = '$contact'
              WHERE ID = $patientID";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        echo "Patient updated successfully!";
        header("Location: admin-new-patient.php"); // Redirect back to the patient management page
    } else {
        echo "Error updating patient: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
