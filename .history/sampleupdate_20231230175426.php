<?php
// update.php

require_once('connection.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the values from the AJAX request
$orderId = $_POST['orderId'];
$newStatus = $_POST['newStatus'];

// Update the status in the database
$sql = "UPDATE ordertbl SET Status='$newStatus' WHERE OrderID='$orderId'";

if ($conn->query($sql) === TRUE) {
    echo "Status updated successfully";
} else {
    echo "Error updating status: " . $conn->error;
}

$conn->close();
?>
