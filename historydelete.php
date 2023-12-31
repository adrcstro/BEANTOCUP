<?php
// delete.php

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the order ID to delete from the POST data
    $orderToDelete = $_POST["orderToDelete"];

    // Perform the deletion in your database (modify this part based on your database structure)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beantocup";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Assuming ordertbl has a column named OrderID
    $deleteQuery = "DELETE FROM ordertbl WHERE OrderID = '$orderToDelete'";
    if ($conn->query($deleteQuery) === TRUE) {
        // Return a JSON success response
        echo json_encode(['success' => true]);
    } else {
        // Return a JSON error response
        echo json_encode(['success' => false, 'message' => $conn->error]);
    }

    // Close the database connection
    $conn->close();
} else {
    // If it's not a POST request, handle accordingly
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
