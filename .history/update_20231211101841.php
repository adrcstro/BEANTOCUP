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

// Check if the form has been submitted for updating
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update Admin
    if (isset($_POST['input1'])) {
        updateAdmin($conn);
    }

    // Update Passenger
    if (isset($_POST['SelectCostumer'])) {
        updatePassenger($conn);
    }
}

// Close the database connection
$conn->close();

// Function to update admin record
function updateAdmin($conn) {
    $updated_admin = $_POST['input1'];
    $updated_username = $_POST['input2'];
    $updated_date = $_POST['datePicker'];
    $updated_password = $_POST['input3'];

    if (!empty($updated_admin)) {
        $sql = "UPDATE admintbl SET Username='$updated_username', Password='$updated_password', DateCreated='$updated_date' WHERE Admin='$updated_admin'";

        if ($conn->query($sql) === TRUE) {
            echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "success",
                    title: "Admin Updated Successfully",
                }).then(function() {
                    window.location.href = "admindash.php";
                });
            });
          </script>';
        } else {
            echo "<script>";
            echo "swal('Error', 'Error updating admin record: " . $conn->error . "', 'error');";
            echo "</script>";
        }
    } else {
        echo "<script>";
        echo "swal('Error', 'Please select an admin to update', 'error');";
        echo "</script>";
    }
}

// Function to update passenger record
function updatePassenger($conn) {
    $selectedCostumer = $_POST['SelectCostumer'];
    $CostumerEmail = $_POST['CostumerEmail'];
    $CostumerPhone = $_POST['CostumerPhone'];
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
?>
