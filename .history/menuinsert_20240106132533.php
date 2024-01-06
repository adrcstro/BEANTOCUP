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

if (isset($_POST['Menuheader'], $_POST['manuprice'], $_POST['menudescription'])) {
    $NewsHead = $_POST['Menuheader'];
    $NewsDate = $_POST['manuprice'];
    $BodyContent = $_POST['menudescription'];
   

    $NewsImageFile = $_FILES['menuimage']['name'];
    $NewsImageTmp = $_FILES['menuimage']['tmp_name'];

    // File upload functionality

    // SQL query to insert data into the database
    $sql = "INSERT INTO menu (Name, Price, Body, Image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $NewsHead, $NewsDate, $BodyContent, $NewsImageFile);

    if ($stmt->execute()) {
        move_uploaded_file($NewsImageTmp, "uploads/" . $NewsImageFile);
        // Display success message using SweetAlert
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "success",
                        title: "Menu Posted Successfully",
                    }).then(function() {
                        window.location.href = "admindash.php";
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





if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['newsneader'], $_POST['newstime'], $_POST['newsdate'], $_POST['bodycontent'])) {
    $NewsHead = $_POST['newsneader'];
    $newstime = $_POST['newstime'];
    $NewsDate = $_POST['newsdate'];
    $BodyContent = $_POST['bodycontent'];

    $NewsImageFile = $_FILES['newsimage']['name'];
    $NewsImageTmp = $_FILES['newsimage']['tmp_name'];

    // Prepare and bind for the third insertion
    $newsStmt = $conn->prepare("INSERT INTO shopnews (Header,Time, Date, Body, Image) VALUES (?, ?, ?, ?,?)");
    $newsStmt->bind_param('sssss', $NewsHead,$newstime, $NewsDate, $BodyContent, $NewsImageFile);

    // Execute the third insertion statement
    $newsResult = $newsStmt->execute();

    // Output success or error message using SweetAlert
    if ($newsResult) {
        move_uploaded_file($NewsImageTmp, "uploads/" . $NewsImageFile);
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "success",
                        title: "News Posted Successfully",
                    }).then(function() {
                        window.location.href = "admindash.php";
                    });
                });
              </script>';
    } else {
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

    // Close the third insertion statement
    $newsStmt->close();
}



















$conn->close();
?>
