<?php
// Include your database connection code here
$host = "localhost";
$username = "root";
$password = "";
$database = "beantocup";

// Create a database connection
$your_db_connection = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$your_db_connection) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['menuID'])) {
    $menuID = mysqli_real_escape_string($your_db_connection, $_POST['menuID']);

    // Query to fetch data for the selected item
    $query = "SELECT MenuID, Name, Price, Body, Image FROM menu WHERE MenuID = '$menuID'";
    $result = mysqli_query($your_db_connection, $query);

    if ($result) {
        $itemData = mysqli_fetch_assoc($result);
        echo json_encode($itemData);
    } else {
        echo json_encode(['error' => 'Unable to fetch item data']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>
