<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beantocup";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        echo json_encode(array('type' => 'error', 'message' => 'Connection failed. Please try again.'));
    } else {
        if (isset($_POST['input1'])) {
            // Delete admin record
            $selectedAdmin = $_POST['input1'];
            $sql = "DELETE FROM admintbl WHERE Admin = '$selectedAdmin'";
            $messageSuccess = 'The selected admin has been deleted.';
        } elseif (isset($_POST['SelectCostumer'])) {
            // Delete customer record
            $selectedPassenger = $_POST['SelectCostumer'];
            $sql = "DELETE FROM costumers WHERE Name = '$selectedPassenger'";
            $messageSuccess = 'The selected record has been deleted.';
        } elseif (isset($_POST['MenuID'])) {
            // Delete menu record
            $selectedMenu = $_POST['MenuID'];
            $sql = "DELETE FROM menu WHERE MenuID = '$selectedMenu'";
            $messageSuccess = 'The selected menu item has been deleted.';
        } elseif (isset($_POST['trackuporderID'])) {
            // Track and update order status
            $selectedorder = $_POST['trackuporderID'];
            $sql = "DELETE FROM ordertbl WHERE OrderID  = '$selectedorder'";
            $messageSuccess = 'The selected Order has been Cancelled.';
        } else {
            // No valid form field found
            echo json_encode(array('type' => 'error', 'message' => 'Invalid form data.'));
            exit();
        }

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            // Use SweetAlert to display success message
            echo "<script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '$messageSuccess',
                  });
                  </script>";
        } else {
            // Use SweetAlert to display error message
            echo "<script>
                  Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error deleting record. Please try again.',
                  });
                  </script>";
        }

        $conn->close();
    }
}
?>
