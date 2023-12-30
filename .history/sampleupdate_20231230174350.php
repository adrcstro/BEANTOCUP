


<?php
require_once('Config.php');

// Set up your database connection details
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (isset($_POST['SelectPassenger'])) {
$Selectedstatus = $_POST['SelectOrderStatus'];
    $Orderstat = $_POST['orderstat'];

    if (!empty($Selectedstatus)) {
        $stmt = $conn->prepare("UPDATE ordertbl SET Status=? WHERE OrderID=?");
        $stmt->bind_param("si", $Selectedstatus, $Orderstat); // Assuming OrderID is an integer

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "Order Status Successfully Updated";
            } else {
                echo "No records were updated";
            }
        } else {
            echo "Error updating Status record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please select an order to update";
    }
}
}

?>