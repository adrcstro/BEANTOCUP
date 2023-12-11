<?php
require_once('connection.php');
// Set up your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beantocup";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form for customer registration has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect customer registration form data
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    // Prepare and bind for customer registration
    $customerSql = "INSERT INTO costumers (Name, Email, Username, Password) VALUES (?, ?, ?, ?)";
    $customerStmt = $conn->prepare($customerSql);
    $customerStmt->bind_param("ssss", $Name, $Email, $Username, $Password);

    // Execute the customer registration statement
    $customerResult = $customerStmt->execute();

    if ($customerResult) {
        echo 'Customer Data Successfully saved.';
    } else {
        echo 'There were errors while saving the Customer data.';
    }

    // Close the customer registration statement
    $customerStmt->close();
}

// Check if the form for admin insertion has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect admin insertion form data
    $input1 = $_POST['input1'];
    $input2 = $_POST['input2'];
    $datePicker = $_POST['datePicker'];
    $input3 = $_POST['input3'];

    // Prepare and bind for admin insertion
    $adminSql = "INSERT INTO admintbl (Admin, Username,  Password,DateCreated) VALUES (?, ?, ?, ?)";
    $adminStmt = $conn->prepare($adminSql);
    $adminStmt->bind_param("ssss", $input1, $input2, $datePicker, $input3);

    // Execute the admin insertion statement
    $adminResult = $adminStmt->execute();

    if ($adminResult) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $adminStmt . "<br>" . $conn->error;
    }

    // Close the admin insertion statement
    $adminStmt->close();
}

// Close the database connection
$conn->close();
?>
