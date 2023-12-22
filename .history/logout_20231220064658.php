<?php
session_start();

// Check if the user is already logged out
if (!isset($_SESSION['CostumerID'])) {
    header('Location: login.php'); // Redirect to the login page if not logged in
    exit();
}

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page after logout
header('Location: login.php');
exit();
?>
