 
<?php
require_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedAdmin = isset($_POST['cosdelorID']) ? $_POST['cosdelorID'] : null;
   
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo json_encode(array('type' => 'error', 'message' => 'Connection failed. Please try again.'));
    } else {
        $adminSql = "DELETE FROM addtocarttbl WHERE orderid = '$selectedAdmin'";

        if ($conn->query($adminSql)) {
            echo json_encode(array('type' => 'success', 'message' => 'Records have been deleted.'));
        } else {
            echo json_encode(array('type' => 'error', 'message' => 'Error deleting record. Please try again.'));
        }

        $conn->close();
    }
}
?>











