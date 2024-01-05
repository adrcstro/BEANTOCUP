<?php
// Include your database connection file
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beantocup";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['user_type'];

    // You should hash the password in a real-world scenario
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Define the table and dashboard based on the selected user type
    if ($userType == 'admin') {
        $table = 'admintbl';
        $dashboard = 'admindash.php';
    } else {
        $table = 'costumers';
        $dashboard = 'Costumerdash.php';
    }

    // SQL query to check if the user exists with the provided credentials and user type
    $query = "SELECT * FROM $table WHERE Username = '$username' AND Password = '$password'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if there is a matching user
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $row = mysqli_fetch_assoc($result);

        // Get user information
        $loggedInCostumerID = $row['CostumerID'];
        $loggedInUsername = $username;

        // Redirect to the appropriate dashboard with user information in the URL
        header("Location: $dashboard?CostumerID=$loggedInCostumerID&username=$loggedInUsername");
        
        exit();
    } else {
        // No matching user found
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>swal('Invalid Username or Password', '', 'error');</script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BEANtoCUP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="x-icon" href="images/webiconss.png">
    
</head>

<body>

</body>

</html>





<?php
// generate_pdf.php

// Include the TCPDF library
require_once('tcpdf.php');

// Your database connection details
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "beantocup";

// Organization details
$organizationName = "Republic of the Philippines";
$organizationAddress = "City of Manila";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

class PDF extends TCPDF
{
    private $organizationName;
    private $organizationAddress;

    // Constructor to set organization details
    public function __construct($organizationName, $organizationAddress)
    {
        parent::__construct();
        $this->organizationName = $organizationName;
        $this->organizationAddress = $organizationAddress;
    }

    // Page header
    public function Header()
    {
        // Set font
        $this->SetFont('times', 'B', 12);

        // Logo

        // Organization details
        $this->Cell(0, 10, $this->organizationName, 0, 1, 'C');
        $this->Ln(-1); // Adjust the line spacing as needed
        $this->Cell(0, 10, $this->organizationAddress, 0, 1, 'C');
        $this->Ln(-1); // Adjust the line spacing as needed

        // Title
        $this->Cell(0, 10, 'Barangay-409 Sampaloc Manila', 0, 1, 'C');
        $this->Line(10, 35, 200, 35);
    }

    // Page footer
    public function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);

        // Set font
        $this->SetFont('times', 'I', 8);

        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . ' / ' . $this->getAliasNbPages(), 0, 0, 'C');
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the search form submission
    if (isset($_POST["Cosreceipt"])) {
        $searchID = mysqli_real_escape_string($conn, $_POST["Cosreceipt"]);

        // Fetch data from the database based on the search ID
        $sql = "SELECT CostumerName, DatePlaced, ShippingAddress, ContactNumber, EmailAddress, PaymentMethod, ItemsOrdered, Size, QTY, Amount FROM ordertbl WHERE OrderID = '$searchID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Create PDF instance with organization details
            $pdf = new PDF($organizationName, $organizationAddress);

            // Add a page
            $pdf->AddPage();

            // Set font
            $pdf->SetFont('times', '', 12);

            while ($row = $result->fetch_assoc()) {
                // Letter content resembling a police report
                $letterContent = "COMPLAINED REPORT\n\n";

                // Append relevant details to the letter content
                $letterContent .= "Costumer Name: " . $row['CostumerName'] . "\n";
                $letterContent .= "Date Placed: " . $row['DatePlaced'] . "\n";
                $letterContent .= "Shipping Address: " . $row['ShippingAddress'] . "\n";
                $letterContent .= "Contact Number: " . $row['ContactNumber'] . "\n";
                $letterContent .= "Email Address: " . $row['EmailAddress'] . "\n";
                $letterContent .= "Payment Method: " . $row['PaymentMethod'] . "\n";
                $letterContent .= "Items Ordered: " . $row['ItemsOrdered'] . "\n";
                $letterContent .= "Size: " . $row['Size'] . "\n";
                $letterContent .= "Quantity: " . $row['QTY'] . "\n";
                $letterContent .= "Amount: " . $row['Amount'] . "\n";

                // Set the spacing from the top
                $pdf->SetY(50);

                // Output the letter content to the PDF
                $pdf->MultiCell(0, 12, $letterContent);

                // Add a table with two columns and two rows
                $pdf->SetFillColor(200, 220, 255); // Set the background color for the first row
            }

            // Output the PDF to the browser
            $pdf->Output();
        } else {
            echo "No records found for the given order id.";
        }
    } else {
        echo "Invalid input.";
    }
}

$conn->close();
?>
