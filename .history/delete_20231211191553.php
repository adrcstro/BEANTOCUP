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

function deleteNews($selectedNews, $conn) {
    $sql = "DELETE FROM newsandevents WHERE NewsID= '$selectedNews'";
    
    if ($conn->query($sql) === TRUE) {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "success",
                    title: "News Deleted Successfully",
                }).then(function() {
                    window.location.href = "admin.php";
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
}

function deleteAdmin($selectedAdmin, $conn) {
    $sql = "DELETE FROM admintbl WHERE Admin = '$selectedAdmin'";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('type' => 'success', 'message' => 'The selected admin has been deleted.'));
    } else {
        echo json_encode(array('type' => 'error', 'message' => 'Error deleting record. Please try again.'));
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo json_encode(array('type' => 'error', 'message' => 'Connection failed. Please try again.'));
    } else {
        if (isset($_POST['SelectNewsID'])) {
            // Delete operation for newsandevents table
            $selectedNews = $_POST['SelectNewsID'];
            deleteNews($selectedNews, $conn);
        } elseif (isset($_POST['input1'])) {
            // Delete operation for admintbl table
            $selectedAdmin = $_POST['input1'];
            deleteAdmin($selectedAdmin, $conn);
        }

        $conn->close();
    }
}
?>
