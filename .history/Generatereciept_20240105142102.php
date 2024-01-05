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

        // Organization details
        $this->Cell(0, 10, $this->organizationName, 0, 1, 'C');
        $this->Ln(-3); // Adjust the line spacing as needed
        $this->Cell(0, 10, $this->organizationAddress, 0, 1, 'C');
        $this->Ln(-3); // Adjust the line spacing as needed

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
                // Output order details
                $pdf->Cell(0, 10, "--------------------------------", 0, 1, 'C');
                $pdf->Cell(0, 10, "   7-Eleven Receipt   ", 0, 1, 'C');
                $pdf->Cell(0, 10, "--------------------------------", 0, 1, 'C');
                $pdf->Cell(0, 10, "Date: " . $row['DatePlaced'], 0, 1);
                $pdf->Cell(0, 10, "Order ID: " . $searchID, 0, 1);
                $pdf->Cell(0, 10, "--------------------------------", 0, 1);

                // Output items in a table
                $pdf->SetFillColor(200, 220, 255); // Set the background color for the first row
                $pdf->Cell(40, 10, "Items", 1, 0, 'C', true);
                $pdf->Cell(20, 10, "Size", 1, 0, 'C', true);
                $pdf->Cell(20, 10, "Qty", 1, 0, 'C', true);
                $pdf->Cell(30, 10, "Amount", 1, 1, 'C', true);

                // Output actual order data
                $pdf->Cell(40, 10, $row['ItemsOrdered'], 1);
                $pdf->Cell(20, 10, $row['Size'], 1);
                $pdf->Cell(20, 10, $row['QTY'], 1);
                $pdf->Cell(30, 10, $row['Amount'], 1, 1);

                // Output total amount
                $pdf->Cell(0, 10, "Total: " . $row['Amount'], 0, 1, 'R');
                $pdf->Cell(0, 10, "--------------------------------", 0, 1, 'C');
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
