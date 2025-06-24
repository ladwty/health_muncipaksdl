<?php
include 'adminpanel.php';

if (isset($_GET['id'])) {
    $patientID = $_GET['id'];
    $query = "DELETE FROM usersregister WHERE ID = $patientID";
    
    if (mysqli_query($conn, $query)) {
        echo "Patient deleted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
