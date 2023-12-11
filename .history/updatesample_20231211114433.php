<?php
require_once('connection.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (isset($_POST['SelectCostumer'])) {
    $selectedCostumer = $_POST['SelectCostumer'];
    $costumerEmail = $_POST['CostumerEmail'];
    $costumerPhone = $_POST['CostumerPhone'];
    $costumerAddress = $_POST['CostumerAddress'];

    if (!empty($selectedCostumer)) {
        $stmt = $conn->prepare("UPDATE costumers SET Email=?, Phone=?, HomeAddress=? WHERE Name=?");
        $stmt->bind_param("ssss", $costumerEmail, $costumerPhone, $costumerAddress, $selectedCostumer);

        if ($stmt->execute()) {
            echo "Passenger record updated successfully";
        } else {
            echo "Error updating passenger record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please select a passenger to update";
    }
}
}

$conn->close();
?>
