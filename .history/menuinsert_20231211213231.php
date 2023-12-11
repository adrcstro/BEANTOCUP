
<?php


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
$conn->close();
?>
   