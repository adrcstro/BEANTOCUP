<?php
require_once('connection.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beantocup";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['Name'], $_POST['Email'], $_POST['Username'], $_POST['Password'])) {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
   

    // Check if it's passenger data
    $costumerSql = "INSERT INTO costumers (Name, Email, Username, Password ) VALUES (?, ?, ?, ?)";
    $passengerStmt = $conn->prepare($costumerSql);

    // Bind parameters
    $passengerStmt->bind_param("ssss", $Name, $Username, $Username, $Password);

    // Execute the statement
    $passengerResult = $passengerStmt->execute();

    if ($passengerResult) {
        echo 'Passenger Data Successfully saved.';
    } else {
        echo 'There were errors while saving the passenger data.';
    }

    // Close the statement
    $passengerStmt->close();
}

// Close the connection
$conn->close();
?>
