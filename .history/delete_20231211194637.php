<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

<!-- Your other HTML code -->

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body>
    
</body>
</html>




<?php
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "beantocup";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        echo json_encode(array('type' => 'error', 'message' => 'Connection failed. Please try again.'));
    } else {
        if (isset($_POST['input1'])) {
            // Delete admin record
            $selectedAdmin = $_POST['input1'];
            $sql = "DELETE FROM admintbl WHERE Admin = '$selectedAdmin'";
            $messageSuccess = 'The selected admin has been deleted.';
        } elseif (isset($_POST['SelectCostumer'])) {
            // Delete customer record
            $selectedPassenger = $_POST['SelectCostumer'];
            $sql = "DELETE FROM costumers WHERE Name = '$selectedPassenger'";
            $messageSuccess = 'The selected record has been deleted.';
        } elseif (isset($_POST['SelectNewsID'])) {
            // Delete news record
            $selectedNews = $_POST['SelectNewsID'];
            $sql = "DELETE FROM newsandevents WHERE NewsID = '$selectedNews'";
            $messageSuccess = 'News Deleted Successfully.';
        } else {
            // No valid form field found
            echo json_encode(array('type' => 'error', 'message' => 'Invalid form data.'));
            exit();
        }

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo json_encode(array('type' => 'success', 'message' => $messageSuccess));
        } else {
            echo json_encode(array('type' => 'error', 'message' => 'Error deleting record. Please try again.'));
        }

        $conn->close();
    }
}
?>
