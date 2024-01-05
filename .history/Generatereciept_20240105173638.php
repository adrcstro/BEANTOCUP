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
        $this->Ln(6);
        $this->Cell(0, 10, $this->organizationName, 0, 1, 'C');
        $this->Ln(-4); // Adjust the line spacing as needed
        $this->Cell(0, 10, $this->organizationAddress, 0, 1, 'C');
        $this->Ln(-1); // Adjust the line spacing as needed

        // Title
    
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
                // Title
                $pdf->SetFont('times', 'B', 14);
                $pdf->Cell(0, 10, 'Order Receipt', 0, 1, 'C');

                // Set the spacing from the top
                $pdf->SetY(50);

                // Display customer information
                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(0, 10, 'Customer Information', 0, 1, 'L');
                $pdf->SetFont('times', '', 12);
                $pdf->MultiCell(0, 10, "Name: {$row['CostumerName']}\nDate Placed: {$row['DatePlaced']}\nShipping Address: {$row['ShippingAddress']}\nContact Number: {$row['ContactNumber']}\nEmail Address: {$row['EmailAddress']}", 0, 'L');

                // Display order details
                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(0, 10, 'Order Details', 0, 1, 'L');
                $pdf->SetFont('times', '', 12);
                $pdf->MultiCell(0, 10, "Payment Method: {$row['PaymentMethod']}\nItems Ordered: {$row['ItemsOrdered']}\nSize: {$row['Size']}\nQuantity: {$row['QTY']}\nAmount: {$row['Amount']}", 0, 'L');
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
