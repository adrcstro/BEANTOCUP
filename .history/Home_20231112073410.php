<?php

define('IPSTACK_API_KEY', '53a3db36275ef235f09aba06c9514119');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'plate-to-place-v-tracking');

function getIpDetails($ipAddress) {
    $apiKey = IPSTACK_API_KEY;
    $url = "http://api.ipstack.com/$ipAddress?access_key=$apiKey";

    $response = file_get_contents($url);

    if ($response === false) {
        // Handle API request failure
        echo "Error: Unable to make API request.";
        return null;
    }

    $ipDetails = json_decode($response, true);

    if ($ipDetails === null) {
        // Handle JSON decoding error
        echo "Error: Unable to decode JSON response.";
        return null;
    }

    return $ipDetails;
}

function saveIpDetailsToDatabase($ipDetails) {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $ipAddress = $conn->real_escape_string($ipDetails['ip']);
    $country = $conn->real_escape_string($ipDetails['country_name']);
    $region = $conn->real_escape_string($ipDetails['region_name']);
    $city = $conn->real_escape_string($ipDetails['city']);

    $sql = "INSERT INTO ip_details (ip_address, country, region, city) VALUES ('$ipAddress', '$country', '$region', '$city')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added to database successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Get the user's IP address dynamically
$userIpAddress = $_SERVER['REMOTE_ADDR'];

$ipDetails = getIpDetails($userIpAddress);

if ($ipDetails && isset($ipDetails['success']) && $ipDetails['success'] === true) {
    saveIpDetailsToDatabase($ipDetails);
    // Access the information in $ipDetails array
    // ...
} else {
    // Handle errors
    if (isset($ipDetails['error'])) {
        echo "Error: " . $ipDetails['error']['info'];
    } else {
        echo "Unable to retrieve IP information.";
    }
}

?>
