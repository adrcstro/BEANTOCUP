<?php
require_once('connection.php');

// Your existing database connection code
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

// Check if the form has been submitted for updating customers, admins, or news
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Update operation for customers
    if (isset($_POST['SelectCostumer'])) {
        updateCostumer($conn);
    }

    // Update operation for admins
    if (isset($_POST['input1'])) {
        updateAdmin($conn);
    }

    // Update operation for news
    if (isset($_POST['NewsID'])) {
        updateNews($conn);
    }
}

// Close the database connection
$conn->close();

function updateCostumer($conn) {
    $SelectedCostumer = $_POST['SelectCostumer'];
    $CostumerEmail = $_POST['CostumerEmail'];
    $CostumerPhone = $_POST['CostumerPhone'];
    $CostumerAddress = $_POST['CostumerAddress'];

    if (!empty($SelectedCostumer)) {
        $stmt = $conn->prepare("UPDATE costumers SET Email=?, Phone=?, HomeAddress=? WHERE Name=?");
        $stmt->bind_param("ssss", $CostumerEmail, $CostumerPhone, $CostumerAddress, $SelectedCostumer);

        if ($stmt->execute()) {
            echo "Costumer record updated successfully";
        } else {
            echo "Error updating costumer record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please select a costumer to update";
    }
}

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
            echo "swal('Error', 'Error updating record: " . $conn->error . "', 'error');";
            echo "</script>";
        }
    } else {
        echo "<script>";
        echo "swal('Error', 'Please select an admin to update', 'error');";
        echo "</script>";
    }
}

function updateNews($conn) {
    $newsid = $_POST['NewsID'];
    $headerofreport = $_POST['HeaderofNews'];
    $dateofreport = $_POST['DateofNews'];
    $bodytext = $_POST['Bodytext'];

    if (!empty($newsid)) {
        $stmt = $conn->prepare("UPDATE shopnews SET Header=?, Date=?, Body=? WHERE NewsID=?");
        $stmt->bind_param("ssss", $headerofreport, $dateofreport, $bodytext, $newsid);

        if ($stmt->execute()) {
            echo "News record updated successfully";
        } else {
            echo "Error updating news record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please select a news item to update";
    }
}
?>
