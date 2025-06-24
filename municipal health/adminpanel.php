<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "med-center";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function fetchusersregister() {
    global $conn;
    $sql = "SELECT * FROM usersregister "; // Adjust table name if needed
    return mysqli_query($conn, $sql);
}


?>
<script>
function editPatient(patientID) {
    window.location.href = "edit-patient.php?id=" + patientID;
}

function deletePatient(patientID) {
    if (confirm("Are you sure you want to delete this patient?")) {
        window.location.href = "delete-patient.php?id=" + patientID;
    }
}
</script>
<?php

?>
