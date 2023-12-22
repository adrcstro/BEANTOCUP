<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Access user information from the session
$userInfo = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $userInfo['Name']; ?>!</h2>
    
    <!-- Display user information -->
    <p>Customer ID: <?php echo $userInfo['CostumerID']; ?></p>
    <p>Email: <?php echo $userInfo['Email']; ?></p>
    <p>Phone: <?php echo $userInfo['Phone']; ?></p>
    <p>Home Address: <?php echo $userInfo['HomeAddress']; ?></p>
    <p>Username: <?php echo $userInfo['Username']; ?></p>

    <a href="logout.php">Logout</a>
</body>
</html>
