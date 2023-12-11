<?php
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "beantocup";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['SelectCostumer'])) {
    $selectedCostumer = $_POST['SelectCostumer'];
    $CostumerEmail = $_POST['CostumerEmail'];
    $costumerPhone = $_POST['CostumerPhone'];
    $CostumerAddress = $_POST['CostumerAddress'];

    if (!empty($selectedCostumer)) {
        $stmt = $conn->prepare("UPDATE costumers SET Email=?, Phone=?, HomeAddress=? WHERE Name=?");
        $stmt->bind_param("ssss", $CostumerEmail, $CostumerPhone, $CostumerAddress, $selectedCostumer);

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


$conn->close();
?>
