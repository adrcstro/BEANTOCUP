
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


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fullName'], $_POST['dateplace'], $_POST['homeAddress'], $_POST['phone'], $_POST['email'], $_POST['modpay'], $_POST['prodname'], $_POST['size'], $_POST['quantity'], $_POST['total'])) {
    // Collect form data for the insertion
    $FullName = $_POST['fullName'];
    $Dateplace = $_POST['dateplace'];
    $HomeAddress = $_POST['homeAddress'];
    $Phone = $_POST['phone'];
    $Email = $_POST['email'];
    $Modpay = $_POST['modpay'];
    $Prodname = $_POST['prodname'];
    $Size = $_POST['size'];
    $Quantity = $_POST['quantity'];
    $Total = $_POST['total'];

    // Check if 'CostumerName' is not null before inserting
    if ($FullName !== null) {
        // Prepare and bind for the insertion
        $stmt = $conn->prepare("INSERT INTO ordertbl (CostumerName, DatePlaced, ShippingAddress, ContactNumber, EmailAddress, PaymentMethod, ItemsOrdered, Size, QTY, Amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", $FullName, $Dateplace, $HomeAddress, $Phone, $Email, $Modpay, $Prodname, $Size, $Quantity, $Total);

        // Execute the insertion statement
        if ($stmt->execute() === TRUE) {
            echo "Ordered Successfully";
        } else {
            echo "Error executing statement: " . $stmt->error;

            // Log the error
            error_log("Error executing SQL statement: " . $stmt->error);
        }

        // Close the insertion statement
        $stmt->close();
    } else {
        echo "Error: 'CostumerName' cannot be null.";
    }
} else {
    echo "Invalid request.";

    // Log the error
    error_log("Invalid request - POST data not set.");
}

// Close the database connection
$conn->close();
?>