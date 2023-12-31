 
<?php
require_once('Config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedAdmin = isset($_POST['Costuorderid']) ? $_POST['Costuorderid'] : null;
  
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        echo json_encode(array('type' => 'error', 'message' => 'Connection failed. Please try again.'));
    } else {
        // SQL to delete a record from admintbl
        $adminSql = "DELETE FROM ordertbl WHERE OrderID  = '$selectedAdmin'";
        // SQL to delete a record from driverstbl
      

        if ($conn->query($adminSql)) {
            echo json_encode(array('type' => 'success', 'message' => 'Records have been deleted.'));
        } else {
            echo json_encode(array('type' => 'error', 'message' => 'Error deleting record. Please try again.'));
        }

        $conn->close();
    }
}
?>










