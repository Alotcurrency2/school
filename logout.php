<?php
session_start();

// Destroy the session and redirect to the appropriate login page
session_destroy();
header("Location: index.php"); // Redirect to the student login by default
exit();
?>
