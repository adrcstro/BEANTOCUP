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

            echo '<div class="receipt-container">';

            // Restaurant Information
            echo '  <div class="restaurant-info">
            <h2>Restaurant Name</h2>
            <p class="address"><strong>Address:</strong> 123 Main St, Cityville</p>
            <p class="contact"><strong>Contact:</strong> (123) 456-7890</p>
            <hr>
        </div>
';
            
            
            // Order Information
            echo '  <div class="order-info">
            <h3>Order Receipt</h3>
            <p class="customer-name"><strong>Customer Name:</strong> <?= $row["CostumerName"] ?></p>
            <p class="order-date"><strong>Date of Order:</strong> <?= $row["DatePlaced"] ?></p>
            <p class="contact-number"><strong>Contact#:</strong> <?= $row["ContactNumber"] ?></p>
            <p class="shipping-address"><strong>Shipping Address:</strong> <?= $row["ShippingAddress"] ?></p>
            <p class="email"><strong>Email:</strong> <?= $row["EmailAddress"] ?></p>
            <hr>
';
           
            
            // Ordered Items
            echo '<h3>Ordered Items</h3>
            <p class="items-ordered"><strong>Items Ordered:</strong> <?= $row["ItemsOrdered"] ?></p>
            <p class="size"><strong>Size:</strong> <?= $row["Size"] ?></p>
            <p class="quantity"><strong>Quantity:</strong> <?= $row["QTY"] ?></p>
            <hr>
        </div>';
           
            
            // Billing Information
            echo '<div class="billing-info">
            <h3>Billing Information</h3>
            <p class="payment-method"><strong>Payment Method:</strong> <?= $row["PaymentMethod"] ?></p>
            <p class="total-amount"><strong>Total Amount:</strong> $<?= $row["Amount"] ?></p>
        </div>';
         
            
            echo '</div>';
            

      }
    } else {
        echo "<p>No results found</p>";
    }
    $conn->close();
}
?>