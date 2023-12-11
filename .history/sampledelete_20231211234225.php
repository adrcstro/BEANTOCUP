<?php
require_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if either 'SelectNewsID' or 'MenuID' is set in the POST data
    if (isset($_POST['SelectNewsID'])) {
        $selectedID = $_POST['SelectNewsID'];
        $table = 'shopnews';
    } elseif (isset($_POST['MenuID'])) {
        $selectedID = $_POST['MenuID'];
        $table = 'menu';
    } else {
        echo json_encode(array('type' => 'error', 'message' => 'Invalid request.'));
        exit();
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        echo json_encode(array('type' => 'error', 'message' => 'Connection failed. Please try again.'));
    } else {
        // SQL to delete a record
        $sql = "DELETE FROM $table WHERE ID = $selectedID";

        if ($conn->query($sql) === TRUE) {
            echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "success",
                    title: "Record Deleted Successfully",
                }).then(function() {
                    window.location.href = "admindash.php";
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
?>
