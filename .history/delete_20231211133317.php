<?php
require_once('Config.php');

$servername1 = "localhost"; // Replace with your server name for the first script
$username1 = "root"; // Replace with your username for the first script
$password1 = ""; // Replace with your password for the first script
$dbname1 = "beantocup";

$servername2 = "localhost"; // Replace with your server name for the second script
$username2 = "root"; // Replace with your username for the second script
$password2 = ""; // Replace with your password for the second script
$dbname2 = "beantocup"; // Replace with the appropriate database name for the second script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedAdmin = $_POST['input1'];
    $selectedPassenger = $_POST['SelectCostumer'];

    // Create connection for the first script
    $conn1 = new mysqli($servername1, $username1, $password1, $dbname1);

    // Create connection for the second script
    $conn2 = new mysqli($servername2, $username2, $password2, $dbname2);

    // Check connections
    if ($conn1->connect_error || $conn2->connect_error) {
        echo json_encode(array('type' => 'error', 'message' => 'Connection failed. Please try again.'));
    } else {
        // SQL to delete record from the first table
        $sql1 = "DELETE FROM admintbl WHERE Admin = '$selectedAdmin'";

        // SQL to delete record from the second table
        $sql2 = "DELETE FROM costumers WHERE Name = '$selectedPassenger'";

        // Execute the first query
        if ($conn1->query($sql1) === TRUE) {
            echo json_encode(array('type' => 'success', 'message' => 'The selected admin has been deleted.'));
        } else {
            echo json_encode(array('type' => 'error', 'message' => 'Error deleting admin record. Please try again.'));
        }

        // Execute the second query
        if ($conn2->query($sql2) === TRUE) {
            echo json_encode(array('type' => 'success', 'message' => 'The selected record has been deleted.'));
        } else {
            echo json_encode(array('type' => 'error', 'message' => 'Error deleting passenger record. Please try again.'));
        }

        // Close connections
        $conn1->close();
        $conn2->close();
    }
}
?>
