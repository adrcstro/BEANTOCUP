<?php
// search.php

// Replace these with your actual database connection details
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

// Get the search term from the AJAX request
$searchTerm = mysqli_real_escape_string($your_db_connection, $_POST['searchTerm']);

// Query to search for products based on the name
$query = "SELECT Name FROM menu WHERE Name LIKE '%$searchTerm%'";
$result = mysqli_query($your_db_connection, $query);

// Check if the query was successful
if ($result) {
    // Display the results
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<p>' . $row['Name'] . '</p>';
    }

    // Free result set
    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($your_db_connection);
}

mysqli_close($your_db_connection);
?>
