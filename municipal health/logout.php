<?php
session_start();
session_destroy();
<<<<<<< HEAD
echo json_encode(["success" => true]);
?>
=======
header("Location: login.html");
exit();
?>
>>>>>>> 3ce005aa9126fbf314dcb11f228531cb7da7fcf3
