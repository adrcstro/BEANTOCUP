 
<?php
require_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedcosid = isset($_POST['Costuorderid']) ? $_POST['Costuorderid'] : null;
    $selectedAdmin = isset($_POST['cosdelorID']) ? $_POST['cosdelorID'] : null;
    $selectedorderhistory  = isset($_POST['CosOrderhistory']) ? $_POST['CosOrderhistory'] : null;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        echo json_encode(array('type' => 'error', 'message' => 'Connection failed. Please try again.'));
    } else {
        
        $cosid = "DELETE FROM ordertbl WHERE OrderID  = '$selectedcosid'";
   
        $adminSql = "DELETE FROM addtocarttbl WHERE orderid = '$selectedAdmin'";

$historysql = "DELETE FROM ordertbl WHERE OrderID  = '$selectedorderhistory '";


        if ($conn->query($cosid) === TRUE && $conn->query($adminSql) === TRUE && $conn->query($historysql) === TRUE) {
            echo json_encode(array('type' => 'success', 'message' => 'Succesfully Deleted'));
        } else {
            echo json_encode(array('type' => 'error', 'message' => 'Error deleting record. Please try again.'));
        }

        $conn->close();
    }
}
?>










