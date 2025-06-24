<?php
include 'adminpanel.php';  // Include the database connection

// Only show users who have at least one appointment in lab_tests
$query = "
    SELECT u.*
    FROM usersregister u
    INNER JOIN lab_tests n ON u.ID = n.id
    GROUP BY u.ID
";
$patients = mysqli_query($conn, $query);

if (!$patients) {
    die("Error: " . mysqli_error($conn));
}

// Fetch all patients and process them
function fetchPatients() {
    global $patients;
    return $patients;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratory Management</title>
    <link rel="stylesheet" href="admin-user-style.css">
</head>
<body>

  <!-- Navbar -->
  <header class="navbar">
    <div class="nav-wrapper">
      <a href="landingpage.php" class="logo">
        <img src="images/Group 8.svg" alt="Logo" />
        <div style="text-align: center; color: #187B5D;">
          <h2 style="margin: 0; font-size: 22px;">Medical Center of Tandang Sora</h2>
          <p style="font-size: 20px; margin: 0; margin-top: 5px; font-weight: 500;">City of Quezon</p>
        </div>
      </a>
      <div class="nav-right">
        <ul class="nav-links">
          <li class="nav-link"><a href="dashboard-admin.html">Dashboard</a></li>
        </ul>
        <div class="nav-buttons">
          <a href="LogIn.html" class="btn login-btn">
            <img src="images/user.png" class="icon"> Log In
          </a>
        </div>
      </div>
    </div>
  </header>

  <!-- Hero Banner -->
  <section class="hero">
    <div class="logo-content">
      <img src="images/Group 8.svg" alt="Logo" class="logo">
      <h2 style="color:#116700" class="logo-name">Fifth Medical Center</h2>
    </div>
    <h1>Laboratory Test  Management</h1>
  </section>

  <br><br>

  <!-- Display Patient Data in Table -->
  <div class="containerTable">   
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Last Name</th>
          <th>Birthday</th>
          <th>Sex</th>
          <th>Address</th>
          <th>Username</th>
          <th>Contact</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $patients = fetchPatients();  // Fetch patient data from the database

          // Loop through the result and display the patient data
          while ($patient = mysqli_fetch_assoc($patients)) {
            echo "<tr>
                    <td>{$patient['ID']}</td>
                    <td>{$patient['first_name']}</td>
                    <td>{$patient['middle_name']}</td>
                    <td>{$patient['last_name']}</td>
                    <td>{$patient['date']}</td>
                    <td>{$patient['sex']}</td>
                    <td>{$patient['address']}</td>
                    <td>{$patient['username']}</td>
                    <td>{$patient['contact']}</td>
                    <td>
                      <button class='edit-btn' onclick='editPatient({$patient['ID']})'>Edit</button>
                      <button class='delete-btn' onclick='deletePatient({$patient['ID']})'>Delete</button>
                    </td>
                  </tr>";
          }
          mysqli_close($conn); // Close the database connection after fetching the data
        ?>
      </tbody>
    </table>
  </div>

  <script>
    // Function to edit patient
    function editPatient(patientID) {
        window.location.href = "edit-patient.php?id=" + patientID;
    }

    // Function to delete patient
    function deletePatient(patientID) {
        if (confirm("Are you sure you want to delete this patient?")) {
            window.location.href = "delete-patient.php?id=" + patientID;
        }
    }
  </script>

</body>
</html>
