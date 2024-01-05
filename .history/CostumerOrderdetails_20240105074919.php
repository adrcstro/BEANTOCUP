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
            echo '<div style="display: flex; flex-wrap: wrap;">';

// Input Fields
echo '<div style="flex: 1; margin-right: 20px;">';
echo '<p><input type="text" value="Costumer Name: ' . $row["CostumerName"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; margin-top: 20px; border-radius: 5px; width: 300px;"></p>';
echo '<p><input type="text" value="Date of Order: ' . $row["DatePlaced"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; border-radius: 5px; width: 300px;"></p>';
echo '<p><input type="text" value="Shipping Address: ' . $row["ShippingAddress"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; border-radius: 5px; width: 300px;"></p>';
echo '<p><input type="text" value="Contact Number: ' . $row["ContactNumber"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; border-radius: 5px; width: 300px;"></p>';
echo '<p><input type="text" value="Email Address: ' . $row["EmailAddress"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; border-radius: 5px; width: 300px;"></p>';
echo '<p><input type="text" value="Payment Method: ' . $row["PaymentMethod"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; border-radius: 5px; width: 300px;"></p>';
echo '<p><input type="text-area" value="Items Ordered: ' . $row["ItemsOrdered"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; border-radius: 5px; width: 300px;"></p>';

echo '<p><input type="text-area" value="Size: ' . $row["Size"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; border-radius: 5px; width: 300px;"></p>';
echo '<p><input type="text-area" value="Quantity: ' . $row["QTY"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; border-radius: 5px; width: 300px;"></p>';
echo '<p><input type="text-area" value="Total Amount: ' . $row["Amount"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; border-radius: 5px; width: 300px;"></p>';



echo '</div>';
echo '</div>';
      }
    } else {
        echo "<p>No results found</p>";
    }
    $conn->close();
}
?>