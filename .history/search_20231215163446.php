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
        $header = $row['Name'];
        $MEnuID = $row['MenuID'];
        $date = $row['Price'];
        $body = $row['Body'];
        $image = $row['Image'];

        echo '<div class="col-md-4 mb-5">';
        echo '<div class="card custom-card d-flex flex-row">'; // Add d-flex and flex-row classes
        echo '<img src="uploads/' . $image . '" class="card-img-left" alt="Card Image">'; // Change class to card-img-left
        echo '<div class="card-body">';
        echo '<h5>' . $header . '</h5>';
        echo '<p>MenuID: ' .  $MEnuID . '</p>';
        echo '<p class="card-text"><small class="text-muted">Price: ' . $date . '</small></p>';
        
        // Cut the text if it is longer than 250 characters
        $trimmed_body = strlen($body) > 10 ? substr($body, 0, 10) . '...' : $body;
        echo '<p class="card-text">' . $trimmed_body . ' <a href="#" class="read-more" data-toggle="modal" data-target="#readMoreModal' . $row['MenuID'] . '">Read More</a></p>';
        
        echo '<div class="card-buttons">';
        echo '<button class="btn btn  btn-sm-custom mr-1"><i class="fas fa-shopping-cart"></i></button>'; // Added custom class btn-sm-custom
        echo '<button class="btn btn  btn-sm-custom mr-1"><i class="fas fa-shopping-bag"></i></button>';
        echo '</div>';
        


        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Modal for full text
        echo '<div class="modal fade" id="readMoreModal' . $row['MenuID'] . '" tabindex="-1" role="dialog" aria-labelledby="readMoreModalLabel' . $row['MenuID'] . '" aria-hidden="true">';
        echo '<div class="modal-dialog read-more-modal" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h5 class="modal-title" id="readMoreModalLabel' . $row['MenuID'] . '">' . $header . '</h5>';
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo '<p>' . $body . '</p>';
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
