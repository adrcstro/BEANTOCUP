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

if (isset($_POST['Name'], $_POST['Age'], $_POST['Gender'], $_POST['Phone'], $_POST['HomeAddress'], $_POST['Username'], $_POST['Password'])) {
    $Name = $_POST['Name'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $Phone = $_POST['Phone'];
    $HomeAddress = $_POST['HomeAddress'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    // Check if it's passenger data
    $passengerSql = "INSERT INTO passengertbl (Name, Age, Gender, Phone, HomeAddress, Username, Password) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $passengerStmt = $conn->prepare($passengerSql);

    // Bind parameters
    $passengerStmt->bind_param("sisssss", $Name, $Age, $Gender, $Phone, $HomeAddress, $Username, $Password);

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
