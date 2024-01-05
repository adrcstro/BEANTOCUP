<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-wVv0y5xLZu6dzZLAMcSfGSE1xFkZDO9Q6M/QmbUihd2eR5Zbty2U2ls4lDds1xs8KzPQfZ85teW3cvPmmAmFYg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    
</body>
</html>



<?php
require_once('connection.php');

if (isset($_GET['search'])) {
    $searchText = $_GET['search'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 
    $sql = "SELECT   CostumerName, DatePlaced, 	ShippingAddress,ContactNumber, EmailAddress,PaymentMethod,ItemsOrdered,Size,QTY,Amount FROM ordertbl WHERE OrderID LIKE '%$searchText%'";
    $result = $conn->query($sql);




    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo '<div style="display: flex; flex-wrap: wrap; border: 1px solid #ccc; padding: 15px; border-radius: 10px; max-width: 400px; margin: 20px auto;">';

            // Restaurant Information
            echo '<div style="flex: 1;">';
            echo '<h2>Restaurant Name</h2>';
            echo '<p><strong>Address:</strong> 123 Main St, Cityville</p>';
            echo '<p><strong>Contact:</strong> (123) 456-7890</p>';
            echo '<hr>';
            
            // Order Information
            echo '<h3>Order Receipt</h3>';
            echo '<p><strong>Customer Name:</strong> ' . $row["CostumerName"] . '</p>';
            echo '<p><strong>Date of Order:</strong> ' . $row["DatePlaced"] . '</p>';
            echo '<p><strong>Contact#:</strong> ' . $row["ContactNumber"] . '</p>';
            echo '<p><strong>Shipping Address:</strong> ' . $row["ShippingAddress"] . '</p>';
            echo '<p><strong>Email:</strong> ' . $row["EmailAddress"] . '</p>';
            
            echo '<hr>';
            
            // Ordered Items
            echo '<h3>Ordered Items</h3>';
            echo '<p><strong>Items Ordered:</strong> ' . $row["ItemsOrdered"] . '</p>';
            echo '<p><strong>Size:</strong> ' . $row["Size"] . '</p>';
            echo '<p><strong>Quantity:</strong> ' . $row["QTY"] . '</p>';
            echo '<hr>';
            
            // Billing Information
            echo '<h3>Billing Information</h3>';
            echo '<p><strong>Payment Method:</strong> ' . $row["PaymentMethod"] . '</p>';
            echo '<p><strong>Total Amount:</strong> $' . $row["Amount"] . '</p>';
            echo '</div>';
            
            echo '</div>';
            

      }
    } else {
        echo "<p>No results found</p>";
    }
    $conn->close();
}
?>