<?php
// Include your database connection code here
$host = "localhost";
$username = "root";
$password = "";
$database = "beantocup";

// Create a database connection
$your_db_connection = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (isset($_POST['menuID'])) {
    $menuID = mysqli_real_escape_string($your_db_connection, $_POST['menuID']);

    // Query to fetch data for the selected item
    $query = "SELECT MenuID, Name, Price, Body, Image FROM menu WHERE MenuID = '$menuID'";
    $result = mysqli_query($your_db_connection, $query);

    if ($result) {
        $itemData = mysqli_fetch_assoc($result);
        // Limit the body text to 20 words
        $itemData['LimitedBody'] = implode(' ', array_slice(str_word_count($itemData['Body'], 2), 0, 20));
        echo json_encode($itemData);
    } else {
        echo json_encode(['error' => 'Unable to fetch item data']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>
