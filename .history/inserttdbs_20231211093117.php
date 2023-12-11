<?php
require_once('connection.php');

// Set up your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beantocup";

// Create a new instance of the mysqli class for database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted for the first insertion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Name'], $_POST['Email'], $_POST['Phone'], $_POST['HomeAddress'], $_POST['Username'], $_POST['Password'])) {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $HomeAddress = $_POST['HomeAddress'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];



    // Prepare and bind for the first insertion
    $customerStmt = $conn->prepare("INSERT INTO costumers (Name, Email,Phone,HomeAddress, Username, Password) VALUES (?, ?, ?, ?,?, ?)");
    $customerStmt->bind_param("ssssss", $Name, $Email,$Phone,$HomeAddress, $Username, $Password);

    // Execute the first insertion statement
    $customerResult = $customerStmt->execute();

    if ($customerResult) {
        echo 'Customer Data Successfully saved.';
    } else {
        echo 'There were errors while saving the Customer data.';
    }

    // Close the first insertion statement
    $customerStmt->close();
}

// Check if the form has been submitted for the second insertion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['input1'], $_POST['input2'], $_POST['datePicker'], $_POST['input3'])) {
    // Collect form data for the second insertion
    $input1 = $_POST['input1'];
    $input2 = $_POST['input2'];
    $datePicker = $_POST['datePicker'];
    $input3 = $_POST['input3'];
    // Check if 'Admin' is not null before inserting
    if ($input1 !== null) {
        // Prepare and bind for the second insertion
        $stmt = $conn->prepare("INSERT INTO admintbl (Admin, Username, DateCreated, Password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $input1, $input2, $datePicker, $input3);

        // Execute the second insertion statement
        if ($stmt->execute() === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the second insertion statement
        $stmt->close();
    } else {
        echo "Error: 'Admin' cannot be null.";
    }
}

// Close the database connection
$conn->close();
?>
   