<?php
session_start(); // Start the session

// Unset all of the session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page after logging out
header("Location: ../auth/login.php");
exit();
?>