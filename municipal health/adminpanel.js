function editPatient(patientID) {
    window.location.href = "edit-patient.php?id=" + patientID;
}

function deletePatient(patientID) {
    if (confirm("Are you sure you want to delete this patient?")) {
        window.location.href = "delete-patient.php?id=" + patientID;
    }
}


