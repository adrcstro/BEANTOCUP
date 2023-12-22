<?php
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

// Check if a search term is provided
if (isset($_POST['searchTerm']) && !empty($_POST['searchTerm'])) {
    $searchTerm = mysqli_real_escape_string($your_db_connection, $_POST['searchTerm']);

    // Query to search for products based on MenuID, Name, Price, Body, and Image
    $query = "SELECT MenuID, Name, Price, Body, Image FROM menu WHERE MenuID LIKE '%$searchTerm%' OR Name LIKE '%$searchTerm%' OR Price LIKE '%$searchTerm%' OR Body LIKE '%$searchTerm%' OR Image LIKE '%$searchTerm%'";
} else {
    // If no search term, fetch all data
    $query = "SELECT MenuID, Name, Price, Body, Image FROM menu";
}

$result = mysqli_query($your_db_connection, $query);

// Check if the query was successful
if ($result) {
    // Fetch data row by row
    while ($row = mysqli_fetch_assoc($result)) {
        $header = $row['Name'];
        $MEnuID = $row['MenuID'];
        $date = $row['Price'];
        $body = $row['Body'];
        $image = $row['Image'];

        // Add a CSS class for visibility control
        $visibilityClass = isset($_POST['searchTerm']) ? 'searched-item' : '';

        // Display data in Bootstrap cards with added CSS class
        echo '<div class="col-md-4 mb-5 ' . $visibilityClass . '">';
        echo '<div class="card custom-card d-flex flex-row">';
        echo '<img src="uploads/' . $image . '" class="card-img-left" alt="Card Image">';
        echo '<div class="card-body">';
        echo '<h5>' . $header . '</h5>';
        echo '<p>MenuID: ' . $MEnuID . '</p>';
        echo '<p class="card-text"><small class="text-muted">Price: ' . $date . '</small></p>';

        // Cut the text if it is longer than 250 characters
        $trimmed_body = strlen($body) > 10 ? substr($body, 0, 10) . '...' : $body;
        echo '<p class="card-text">' . $trimmed_body . ' <a href="#" class="read-more" data-toggle="modal" data-target="#readMoreModal' . $row['MenuID'] . '">Read More</a></p>';

        echo '<div class="card-buttons">';
        echo '<button class="btn btn  btn-sm-custom mr-1"><i class="fas fa-shopping-cart"></i></button>';
        echo '<button class="btn btn  btn-sm-custom mr-1"><i class="fas fa-shopping-bag"></i></button>';
        echo '</div>';

        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Modal for full text with added CSS class
        echo '<div class="modal fade ' . $visibilityClass . '" id="readMoreModal' . $row['MenuID'] . '" tabindex="-1" role="dialog" aria-labelledby="readMoreModalLabel' . $row['MenuID'] . '" aria-hidden="true">';
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
