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
$organizationName = "BEANtoCUP";
$organizationAddress = "123 Main Street, Cityville, State, 12345";
$organizationContactNumber = "+1 (555) 123-4567";

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
    private $organizationContactNumber;

    // Constructor to set organization details
    public function __construct($organizationName, $organizationAddress, $organizationContactNumber)
    {
        parent::__construct();
        $this->organizationName = $organizationName;
        $this->organizationAddress = $organizationAddress;
        $this->organizationContactNumber = $organizationContactNumber;
    }

    // Additional method for setting the font for content
    public function SetContentFont()
    {
        // Set monospaced sans-serif font for content
        $this->SetFont('courier', '', 12);
    }

    // Page header
    public function Header()
    {
        // Set monospaced sans-serif font for header
        $this->SetContentFont();

        // Logo

        // Organization details
        $this->Ln(6);

        // Display organization name
        $this->Cell(0, 30, $this->organizationName, 0, 1, 'C');

        // Center organization address and contact number on the same row with a vertical line
        $this->Ln(-10); // Adjust the line spacing as needed
        $this->Cell(0, -50, $this->organizationAddress . ' | Contact Number: ' . $this->organizationContactNumber, 0, 1, 'C');
        $this->Ln(-1); // Adjust the line spacing as needed

        // Title
        $this->Line(10, 35, 200, 35);
    }

    // Page footer
    public function Footer()
    {
        // Position at 1.5 cm from the bottom
        $this->SetY(-15);

        // Set font
        $this->SetFont('courier', 'I', 8);

        // Page number

        // Add custom text
        $this->Ln(5); // Add some space before the custom text
        $this->SetFont('courier', 'BI', 12); // Set font to bold and italic
        $this->Cell(0, -40, 'Thank you for Using BeantoCup. Come again!', 0, 1, 'C');
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
            $pdf = new PDF($organizationName, $organizationAddress, $organizationContactNumber);

            // Add a page
            $pdf->AddPage();

            // Set font for content
            $pdf->SetContentFont();

            while ($row = $result->fetch_assoc()) {
                // Title
                $pdf->SetFont('courier', 'B', 14);
                $pdf->Cell(0, 70, 'Order Receipt', 0, 1, 'C');

                // Set the spacing from the top
                $pdf->SetY(50);

                // Display customer information
                $pdf->SetFont('courier', 'B', 12);
                $pdf->Cell(0, 10, 'Customer Information', 0, 1, 'L');
                $pdf->SetFont('courier', '', 12);
                $pdf->MultiCell(0, 10, "Name: {$row['CostumerName']}\nDate Placed: {$row['DatePlaced']}\nShipping Address: {$row['ShippingAddress']}\nContact Number: {$row['ContactNumber']}\nEmail Address: {$row['EmailAddress']}", 0, 'L');

                // Display order details as a table
                $pdf->SetFont('courier', 'B', 16); // Adjust the font size and style as needed
                $pdf->SetY(90); // Adjust the Y position from the top
                $pdf->Cell(0, 10, 'Order Summary', 0, 1, 'C'); // Change 'L' to 'C' for center alignment

                $pdf->SetFont('courier', '', 12);

                // Define the column widths
                $columnWidths = array(100, 60, 30, 40);
                $cellHeight = 10;

                // First-row headers
                $headers = array('Items Ordered', 'Size', 'Quantity');

                // Second-row data
                $data = array(
                    $row['ItemsOrdered'],
                    $row['Size'],
                    $row['QTY'],
                );

                // Loop through headers and data to create the table
                for ($i = 0; $i < count($headers); $i++) {
                    // Set cell height
                    $cellHeight = 10;

                    // Add cell with specified width, content, and border
                    $pdf->Cell($columnWidths[$i], $cellHeight, $headers[$i], '1', 0, 'C');
                }

                // Move to the next line to start the second row
                $pdf->Ln();

                $cellHeight = 100;

                $x = 10; // adjust as needed
                $y = 110; // adjust as needed

                for ($i = 0; $i < count($data); $i++) {
                    // Use MultiCell with adjusted X and Y positions
                    $pdf->MultiCell($columnWidths[$i], $cellHeight, $data[$i], '1', 'L', false, 1, $x, $y);

                    // Update X position for the next cell
                    $x += $columnWidths[$i];
                }

                $pdf->Ln(10);

                $pdf->SetFont('courier', 'B', 12);
                $pdf->Cell(0, 10, 'Payment Method: ' . $row['PaymentMethod'], 0, 0, 'L'); // Display Payment Method
                $pdf->SetX($pdf->GetPageWidth() - $pdf->GetStringWidth('Amount: ' . $row['Amount']) - 30); // Set X position to align with the right margin
                $pdf->Cell(0, 10, 'Total Amount: $' . $row['Amount'], 0, 1, 'L'); // Display Amount
            }

            // Output the PDF to the browser
            $pdf->Output();
        } else {
            echo "No records found for the given order ID.";
        }
    } else {
        echo "Invalid input.";
    }
}

$conn->close();
?>
