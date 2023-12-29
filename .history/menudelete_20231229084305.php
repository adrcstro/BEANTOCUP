<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

<!-- Your other HTML code -->

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body>
    
</body>
</html>



<?php
require_once('connection.php');

function deleteRecord($tableName, $columnName, $recordID, $successMessage, $redirectURL)
{
    global $servername, $username, $password, $dbname;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        echo json_encode(array('type' => 'error', 'message' => 'Connection failed. Please try again.'));
    } else {
        // SQL to delete a record
        $sql = "DELETE FROM $tableName WHERE $columnName = '$recordID'";

        if ($conn->query($sql) === TRUE) {
            echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "success",
                    title: "' . $successMessage . '",
                }).then(function() {
                    window.location.href = "' . $redirectURL . '";
                });
            });
          </script>';
        } else {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "' . $conn->error . '",
                    });
                });
              </script>';
        }

        $conn->close();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the "Delete News" button is clicked
    if (isset($_POST['MenuID'])) {
        $selectednews = $_POST['MenuID'];
        deleteRecord('menu', 'MenuID', $selectednews, 'News Deleted Successfully', 'admindash.php');
    }

    // Check if the "Delete Order" button is clicked
    if (isset($_POST['delorID'])) {
        $orderid = $_POST['delorID'];
        deleteRecord('ordertbl', 'OrderID', $orderid, 'Order Deleted Successfully', 'admindash.php');
    }

    if (isset($_POST['cosdelorID'])) {
        $cosorderid = $_POST['cosdelorID'];
        deleteRecord('addtocarttbl', 'orderid', $cosorderid, 'Order Deleted Successfully', 'Costumerdash.php');
    }
}
?>

