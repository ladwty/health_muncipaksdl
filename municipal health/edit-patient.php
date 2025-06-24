<?php
include 'adminpanel.php';

// Check if patient ID is passed
if (isset($_GET['id'])) {
    $patientID = $_GET['id'];

    // Fetch patient data from database
    $query = "SELECT * FROM usersregister WHERE ID = $patientID";
    $result = mysqli_query($conn, $query);
    $patient = mysqli_fetch_assoc($result);

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "No patient selected!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient</title>
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
  </div>
</header>

<!-- Hero Banner -->
<section class="hero">
  <div class="logo-content">
    <img src="images/Group 8.svg" alt="Logo" class="logo">
    <h2 style="color:#116700" class="logo-name">Fifth Medical Center</h2>
  </div>
  <h1>Edit Patient Information</h1>
</section>

<!-- Edit Patient Form -->
<div class="containerTable">
  <form action="update-patient.php" method="POST">
    <input type="hidden" name="ID" value="<?php echo $patient['ID']; ?>">

    <label for="first_name">First Name</label>
    <input type="text" id="first_name" name="first_name" value="<?php echo $patient['first_name']; ?>" required>

    <label for="middle_name">Middle Name</label>
    <input type="text" id="middle_name" name="middle_name" value="<?php echo $patient['middle_name']; ?>">

    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" name="last_name" value="<?php echo $patient['last_name']; ?>" required>

    <label for="birthday">Birthday</label>
    <input type="date" id="birthday" name="birthday" value="<?php echo $patient['date']; ?>" required>

    <label for="sex">Sex</label>
    <select id="sex" name="sex" required>
      <option value="Male" <?php echo ($patient['sex'] == 'Male' ? 'selected' : ''); ?>>Male</option>
      <option value="Female" <?php echo ($patient['sex'] == 'Female' ? 'selected' : ''); ?>>Female</option>
    </select>

    <label for="address">Address</label>
    <input type="text" id="address" name="address" value="<?php echo $patient['address']; ?>" required>

    <label for="username">Username</label>
    <input type="text" id="username" name="username" value="<?php echo $patient['username']; ?>" required>

    <label for="contact">Contact</label>
    <input type="text" id="contact" name="contact" value="<?php echo $patient['contact']; ?>" required>

    <button type="submit">Update Patient</button>
  </form>
</div>

</body>
</html>
