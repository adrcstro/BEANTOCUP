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
        


            echo '<div class="container mt-4">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            
            // Restaurant Information
            echo '<div class="mb-4">';
            echo '<h2 class="card-title text-center">BEANtoCUP <i class="bi bi-cup-hot-fill"></i></h2>';
            echo '<div class="row">';
            echo '<div class="col text-center mt-0 "><p><strong>Address:</strong> 123 Main St, Cityville</p></div>';
            echo '<div class="col text-center mt-0 "><p><strong>Contact:</strong> (123) 456-7890</p></div>';
            echo '</div>';
            echo '</div>';
            echo '<hr class="border-bottom">';
                        
            // Order Information
            echo '<h3 class="card-title text-center">Order Receipt</h3>';
            echo '<p><strong>Customer Name:</strong> ' . $row["CostumerName"] . '</p>';
            echo '<p><strong>Date of Order:</strong> ' . $row["DatePlaced"] . '</p>';
            echo '<p><strong>Contact#:</strong> ' . $row["ContactNumber"] . '</p>';
            echo '<p><strong>Shipping Address:</strong> ' . $row["ShippingAddress"] . '</p>';
            echo '<p><strong>Email:</strong> ' . $row["EmailAddress"] . '</p>';
            echo '<hr class="border-bottom">';
                        
            // Ordered Items
            echo '<h3 class="card-title text-center">Ordered Items</h3>';
            echo '<p><strong>Items Ordered:</strong> ' . $row["ItemsOrdered"] . '</p>';
            echo '<p><strong>Size:</strong> ' . $row["Size"] . '</p>';
            echo '<p><strong>Quantity:</strong> ' . $row["QTY"] . '</p>';
            echo '<hr class="border-bottom">';
                        
            // Billing Information
           // Billing Information
echo '<h3 class="card-title text-center">Billing Information</h3>';
echo '<p><strong>Payment Method:</strong> ' . $row["PaymentMethod"] . '</p>';
echo '<p class="text-right font-weight-bold display-4">$' . $row["Amount"] . '</p>';
echo '</div>';
echo '</div>';
echo '</div>';

            



            

      }
    } else {
        echo "<p>No results found</p>";
    }
    $conn->close();
}
?>