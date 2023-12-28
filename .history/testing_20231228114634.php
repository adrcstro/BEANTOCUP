<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

<!-- Your other HTML code -->

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body>
    
</body>
</html>

 

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beantocup";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





if (isset($_POST['fullName'], $_POST['prodname'], $_POST['size'], $_POST['quantity'], $_POST['total'])) {
    $custumername = $_POST['fullName'];
    $productname = $_POST['prodname'];
    $Sizes = $_POST['size'];
    $Quabtity = $_POST['quantity'];
    $Total = $_POST['total'];




    $imageFile = $_FILES['fileNameContainer']['name'];
    $imageTmp = $_FILES['fileNameContainer']['tmp_name'];

    // File upload functionality

    // SQL query to insert data into the database
    $sql = "INSERT INTO addtocarttbl (CostumerName, Ordername, orderoption, Qty ,Price,  Orderimage) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss',  $custumername, $productname,  $Sizes, $Quabtity,  $Total,  $imageFile);

    if ($stmt->execute()) {
        move_uploaded_file($imageTmp, "uploads/" .  $imageFile);
        // Display success message using SweetAlert
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "success",
                        title: "Menu Posted Successfully",
                    }).then(function() {
                        window.location.href = "Costumerdash.php";
                    });
                });
              </script>';
    }
     else {
        // Display error message using SweetAlert
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "' . $conn->error . '",
                    });
                });
              </script>';
    }
}

$conn->close();
?>



