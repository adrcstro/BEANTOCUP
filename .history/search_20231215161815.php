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

// Query to search for products based on MenuID, Name, Price, Body, and Image
$query = "SELECT MenuID, Name, Price, Body, Image FROM menu WHERE MenuID LIKE '%$searchTerm%' OR Name LIKE '%$searchTerm%' OR Price LIKE '%$searchTerm%' OR Body LIKE '%$searchTerm%' OR Image LIKE '%$searchTerm%'";
$result = mysqli_query($your_db_connection, $query);

// Check if the query was successful
if ($result) {
    // Display the results in Bootstrap cards
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-md-4 mb-5">';
        echo '<div class="card custom-card d-flex flex-row">';
        echo '<img src="uploads/' . $row['Image'] . '" class="card-img-left" alt="Card Image">';
        echo '<div class="card-body">';
        echo '<h5>' . $row['Name'] . '</h5>';
        echo '<p>MenuID: ' .  $row['MenuID'] . '</p>';
        echo '<p class="card-text"><small class="text-muted">Price: ' . $row['Price'] . '</small></p>';
        echo '<p class="card-text">' . $row['Body'] . '</p>';
        echo '<div class="card-buttons">';
        echo '<button class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-cart"></i></button>';
        echo '<button class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-bag"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    // Free result set
    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($your_db_connection);
}

mysqli_close($your_db_connection);
?>
