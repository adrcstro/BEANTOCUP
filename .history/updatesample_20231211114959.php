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
    $SelectedCostumer = $_POST['SelectCostumer'];
    $CostumerEmail = $_POST['CostumerEmail'];
    $CostumerPhone = $_POST['CostumerPhone'];
    $CostumerAddress = $_POST['CostumerAddress'];

    if (!empty($SelectedCostumer)) {
        $stmt = $conn->prepare("UPDATE costumers SET Email=?, Phone=?, HomeAddress=? WHERE Name=?");
        $stmt->bind_param("ssss", $CostumerEmail, $CostumerPhone, $CostumerAddress, $SelectedCostumer);

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
