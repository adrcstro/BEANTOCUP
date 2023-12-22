<?php
session_start();
require_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BEANtoCUP</title>
  <link rel="stylesheet" href="admin.css">
  <link rel="shortcut icon" type="x-icon" href="images/webiconss.png">
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body>
<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
            <h3 style="text-align: center; color: #E48F45;">BEANtoCUP <i class="bi bi-cup-hot-fill"></i></h3>


            </a>
            <!-- User menu (mobile) -->
            
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showAdmin()">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>
                
                 
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showCostumers()">
                            <i class="bi bi-people"></i> Costumers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showOrders()">
                        <i class="bi bi-cart-plus"></i></i> Orders
                        </a>
                    </li>
                   <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showNews()">
                        <i class="bi bi-megaphone"></i> Announcements
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showMenu()">
                            <i class="bi bi-cup-hot"></i> Menu
                        </a>
                    </li> 
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-5 opacity-20">
                <!-- Navigation -->
             
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" onclick="return confirm('Are you sure you want to logout?')">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




    
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header  class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div style="text-align: center;" class="col-12 mb-4 mb-sm-0" id="headertextdash">
                            <h1 class="h2 mb-0 ls-tight">WELCOME BEAN2CUP ORDERING MANAGEMENT</h1>
                        </div>
                        <!-- Actions -->
                      
                    </div>
                    <!-- Nav -->
                    <ul class="nav nav-tabs mt-4 overflow-x border-0">
                     
                    </ul>
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div  id="Passengers-table" style="display:none;" class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Costumer's Personal Information</h5>
                    </div>
                    <div class="table-responsive">
                    <?php


// ... (existing code)

// Use session_id() to create a unique session identifier for each user
$sessionIdentifier = session_id();
echo "Session Identifier: $sessionIdentifier<br>";

// ... (rest of the code)

// Display user details from the session
$userData = $_SESSION['user_data'][$sessionIdentifier][$loggedInUsername];

var_dump($userData);  // Use var_dump for detailed variable information

echo "<p>hi, $loggedInUsername!</p>";
echo "<p>Welcome, {$userData['Name']}!</p>";

// ... (rest of the code)
?>




                    </div>
                    <div class="card-footer border-0 py-3 d-flex justify-content-center flex-wrap">
<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal" data-target="#Passengerupdate">
    <i class="bi bi-pencil"></i> Update
</button>

<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal"  data-target="#passengerdelete">
    <i class="bi bi-trash"></i> Delete
</button>

 <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" id="refreshButton2">
        <i class="bi bi-arrow-clockwise"></i> Refresh
    </button>
<script>
        document.getElementById("refreshButton2").addEventListener("click", function() {
            // Add your refresh functionality here
            // For example, you can reload the current page with the following line
            location.reload();
        });
    </script>
                    </div>
                </div>



                <div class="modal fade" id="Passengerupdate">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Update Costumer Information</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


                <!-- Modal Body -->
                <div class="modal-body">
                <form id="updateForm" method="post">
                <label for="SelectCostumer">Select Passenger Infomation</label>
                        <select name="SelectCostumer" id="SelectCostumer" class="form-control" required>
                            <option value="" disabled selected>Select an option</option>
                            <?php
                      

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT Name FROM costumers";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<option value="'.$row["Name"].'">'.$row["Name"].'</option>';
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>
                        </select>
            
    <div class="form-group">
        <label id="CostumerEmail" for="CostumerEmail">Email</label>
        <input type="text" name="CostumerEmail" class="form-control" required>
    </div>
    <div class="form-group">
        <label id="CostumerPhone" for="CostumerPhone">Phone</label>
        <input name="CostumerPhone" type="text" class="form-control" required>
    </div>
    <div class="form-group">
        <label id="CostumerAddress" for="CostumerAddress">Home Address</label>
        <input name="CostumerAddress" type="text" class="form-control" required>
    </div>
</form>
</div>
<div class="modal-footer">
                    <button style="background-color: #E48F45; color: #fff;"type="button" class="btn btn" data-dismiss="modal">Close</button>
                    <button style="background-color: #E48F45; color: #fff;" id="PassengerRegister" type="button" class="btn btn" >Save Costumer</button>
                </div>

            </div>
        </div>
    </div>


    <script>
 $(document).ready(function() {
    $("#PassengerRegister").click(function() {
        var Selectcostumer = $("#SelectCostumer").val();
        var CostumerEmail = $("input[name='CostumerEmail']").val();
        var CostumerPhone = $("input[name='CostumerPhone']").val();
        var CostumerAddress = $("input[name='CostumerAddress']").val();

        $.post(
            "update.php",
            {
                SelectCostumer: Selectcostumer,
                CostumerEmail: CostumerEmail,
                CostumerPhone: CostumerPhone,
                CostumerAddress: CostumerAddress
            },
            function(data, status) {
                if (status === 'success') {
            Swal.fire({
              title: 'Updated Successfully!',
              icon: 'success',
              confirmButtonText: 'Okay'
            }).then((result) => {
              if (result.isConfirmed) {
                $(".swal2-popup").addClass('light-theme');
              }
            });
          } else {
            // Handle error here
            Swal.fire({
              title: 'Error!',
              text: 'There was an error while updating the record.',
              icon: 'error',
              confirmButtonText: 'Okay'
            }).then((result) => {
              if (result.isConfirmed) {
                $(".swal2-popup").addClass('light-theme');
              }
            });
          }

            }
        );
    });
});
</script>


<div class="modal fade" id="passengerdelete">
    <div class="modal-dialog">
        <div class="modal-content">
        <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Delete Costumer Information</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

            <div class="modal-body">
                <form id="PassengerDelete" action="sampledelete.php" method="post">
                    <div class="form-group">
                        <label for="SelectCostumer">Delete Selected Passenger </label>
                        <select name="SelectCostumer" id="SelectCostumer" class="form-control" required>
                            <option value="" disabled selected>Select an option</option>
                            <?php
                            // Your PHP code for populating the select options
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT Name FROM costumers";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<option value="'.$row["Name"].'">'.$row["Name"].'</option>';
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn" data-dismiss="modal">Close</button>
                        <button style="background-color: #E48F45; color: #fff;" id="PassengerDelete" type="submit" class="btn btn">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
        $(document).ready(function() {
            $('#PassengerDelete').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'delete.php', // Make sure this is the correct path to your delete.php file
                    data: formData,
                    dataType: 'json', // Set the dataType to 'json' to parse the JSON response
                    success: function(response) {
                        showAlert(response.type, response.message);
                    },
                    error: function() {
                        showAlert('error', 'Something went wrong. Please try again.');
                    }
                });
            });

            function showAlert(type, message) {
                Swal.fire({
                    title: type.charAt(0).toUpperCase() + type.slice(1),
                    text: message,
                    icon: type,
                    confirmButtonText: 'OK',
                });
            }
        });
    </script>


<!-- ... News  ... ---------------------------------------------------------------------------------------------------------------->


<div  id="createnews" style="display:none;" class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Shop News Announcements</h5>
                    </div>
                    <div class="table-responsive">
                    <div class="container mt-5 mb-5">
    <div class="row">
    <?php
        // Replace these with your actual database connection details
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "beantocup";

        // Create a database connection
        $your_db_connection = mysqli_connect($host, $username, $password, $database);

        // Check the connection
        if (!$your_db_connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch data from the "newsandevents" table
        $query = "SELECT NewsID, Header, Date, Body, Image FROM  shopnews";
        $result = mysqli_query($your_db_connection, $query);

        // Check if the query was successful
        if ($result) {
            // Fetch data row by row
            while ($row = mysqli_fetch_assoc($result)) {
                $header = $row['Header'];
                $date = $row['Date'];
                $body = $row['Body'];
                $image = $row['Image'];

                // Display data in Bootstrap cards
                echo '<div class="col-md-4 mb-5">';
                echo '<div class="cardss card-with-shadow">'; // Added the "card-with-shadow" class
                echo '<img src="uploads/' . $image . '" class="card-img-top" alt="Card Image">';
                echo '<div class="card-body">';
                echo '<h5>' . $header . '</h5>';
                echo '<p class="card-text"><small class="text-muted">' . $date . '</small></p>';
                
                // Cut the text if it is longer than 250 characters
                $trimmed_body = strlen($body) > 90 ? substr($body, 0, 90) . '...' : $body;
                echo '<p class="card-text">' . $trimmed_body . ' <a href="#" class="read-more" data-toggle="modal" data-target="#readMoreModal' . $row['NewsID'] . '">Read More</a></p>';
                
                // Move the title here
              
                
                echo '</div>';
                echo '</div>';
                echo '</div>';

                // Modal for full text
                echo '<div class="modal fade" id="readMoreModal' . $row['NewsID'] . '" tabindex="-1" role="dialog" aria-labelledby="readMoreModalLabel' . $row['NewsID'] . '" aria-hidden="true">';
                echo '<div class="modal-dialog read-more-modal" role="document">';
                echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                echo '<h5 class="modal-title" id="readMoreModalLabel' . $row['NewsID'] . '">' . $header . '</h5>';
                echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                echo '<span aria-hidden="true">&times;</span>';
                echo '</button>';
                echo '</div>';
                echo '<div class="modal-body">';
                echo '<p>' . $body . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

            // Free result set
            mysqli_free_result($result);
        } else {
            // Handle the error if the query fails
            echo "Error: " . mysqli_error($your_db_connection);
        }

        // Close the database connection
        mysqli_close($your_db_connection);
    ?>
    </div>
</div>
<script>
    // Initialize Bootstrap tooltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>



                    </div>
                    <div class="card-footer border-0 py-3 d-flex justify-content-center flex-wrap">
             

             </div>
    </div>





                
                <!-- Modal Body -->
             

<!-- ...MEnu ... ---------------------------------------------------------------------------------------------------------------->


<div id="Menu" style="display:none;">  

<div    class="row g-6 mb-6">
  
<div class="menu-btns">
      <button type="button" class="menu-btn" data-toggle="modal"  data-target="#hotcoffees" id="featured"><i class="fa-solid fa-mug-hot"></i></i>Hot Coffee's</button>
      <button type="button" class="menu-btn" data-toggle="modal"  data-target="#Pastries" id="today-special"><i class="fa-solid fa-cake-candles"></i>Pastries</button>
      <button type="button" class="menu-btn" data-toggle="modal"  data-target="#IceCoffees" id="new-arrival"><i class="fa-solid fa-mug-saucer"></i>Ice Coffee's</button>
      <button type="button" class="menu-btn" data-toggle="modal"  data-target="#BlendedCoffees"id="Blended-Coffee"><i class="fa-solid fa-blender"></i>Blended Coffee's</button>
      <button type="button" class="menu-btn" data-toggle="modal"  data-target="#hotteas"id="Hot-tea"><i class="fa-brands fa-envira"></i>Hot Tea's</button>
  </div>

  <div class="modal fade" id="hotcoffees">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div style="background-color: #E48F45;" class="modal-header">
                <h4 style="color: #fff;" class="modal-title">Hot Coffee's</h4>
                <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
            <?php
$host = "localhost";
$username = "root";
$password = "";
$database = "beantocup";

$your_db_connection = mysqli_connect($host, $username, $password, $database);

if (!$your_db_connection) die("Connection failed: " . mysqli_connect_error());

$searchTerm = isset($_POST['searchTerm']) && !empty($_POST['searchTerm']) ? mysqli_real_escape_string($your_db_connection, $_POST['searchTerm']) : '';

$query = "SELECT MenuID, Name, Price, Body, Image FROM menu WHERE MenuID IN (14, 15, 16, 17, 18, 19) AND (MenuID LIKE '%$searchTerm%' OR Name LIKE '%$searchTerm%' OR Price LIKE '%$searchTerm%' OR Body LIKE '%$searchTerm%' OR Image LIKE '%$searchTerm%')";

$result = mysqli_query($your_db_connection, $query);

if ($result) {
    echo '<div class="row">';
    while ($row = mysqli_fetch_assoc($result)) {
        $header = $row['Name'];
        $MEnuID = $row['MenuID'];
        $date = $row['Price'];
        $body = strlen($row['Body']) > 10 ? substr($row['Body'], 0, 10) . '...' : $row['Body'];
        $image = $row['Image'];

        echo '<div class="col-md-4 mb-5"><div class="card custom-card d-flex flex-row">';
        echo '<img src="uploads/' . $image . '" class="card-img-left" alt="Card Image">';
        echo '<div class="card-body"><h5>' . $header . '</h5>';
        echo '<p>MenuID: ' . $MEnuID . '</p><p class="card-text"><small class="text-muted">Price: ' . $date . '</small></p>';
        echo '<p class="card-text">' . $body . ' <a href="#" class="read-more" data-toggle="modal" data-target="#readMoreModal' . $MEnuID . '">Read More</a></p>';
        echo '<div class="card-buttons"><button class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-cart"></i></button>';
        echo '<button class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-bag"></i></button></div></div></div></div>';

        echo '<div class="modal fade" id="readMoreModal' . $MEnuID . '" tabindex="-1" role="dialog" aria-labelledby="readMoreModalLabel' . $MEnuID . '" aria-hidden="true">';
        echo '<div class="modal-dialog read-more-modal" role="document"><div class="modal-content"><div class="modal-header">';
        echo '<h5 class="modal-title" id="readMoreModalLabel' . $MEnuID . '">' . $header . '</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span></button></div><div class="modal-body"><p>' . $row['Body'] . '</p></div></div></div></div>';
    }
    echo '</div>';

    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($your_db_connection);
}

mysqli_close($your_db_connection);
?>


            </div>

            <!-- Modal Footer -->
            <div style="justify-content: center;" class="modal-footer text-center">
            <button id="btnhover" style="border-color: #E48F45;" data-dismiss="modal" data-toggle="modal"  data-target="#Pastries"   type="button" class="btn  btn-sm m-1">
            <i class="bi bi-arrow-90deg-right"></i> Next</button>
            </div>

        </div>
    </div>
</div>





<div class="modal fade" id="Pastries">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div style="background-color: #E48F45;" class="modal-header">
                <h4 style="color: #fff;" class="modal-title">Pastries</h4>
                <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
            <?php
$host = "localhost";
$username = "root";
$password = "";
$database = "beantocup";

$your_db_connection = mysqli_connect($host, $username, $password, $database);

if (!$your_db_connection) die("Connection failed: " . mysqli_connect_error());

$searchTerm = isset($_POST['searchTerm']) && !empty($_POST['searchTerm']) ? mysqli_real_escape_string($your_db_connection, $_POST['searchTerm']) : '';

$query = "SELECT MenuID, Name, Price, Body, Image FROM menu WHERE MenuID IN (20, 21,22, 23, 34, 25) AND (MenuID LIKE '%$searchTerm%' OR Name LIKE '%$searchTerm%' OR Price LIKE '%$searchTerm%' OR Body LIKE '%$searchTerm%' OR Image LIKE '%$searchTerm%')";

$result = mysqli_query($your_db_connection, $query);

if ($result) {
    echo '<div class="row">';
    while ($row = mysqli_fetch_assoc($result)) {
        $header = $row['Name'];
        $MEnuID = $row['MenuID'];
        $date = $row['Price'];
        $body = strlen($row['Body']) > 10 ? substr($row['Body'], 0, 10) . '...' : $row['Body'];
        $image = $row['Image'];

        echo '<div class="col-md-4 mb-5"><div class="card custom-card d-flex flex-row">';
        echo '<img src="uploads/' . $image . '" class="card-img-left" alt="Card Image">';
        echo '<div class="card-body"><h5>' . $header . '</h5>';
        echo '<p>MenuID: ' . $MEnuID . '</p><p class="card-text"><small class="text-muted">Price: ' . $date . '</small></p>';
        echo '<p class="card-text">' . $body . ' <a href="#" class="read-more" data-toggle="modal" data-target="#readMoreModal' . $MEnuID . '">Read More</a></p>';
        echo '<div class="card-buttons"><button class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-cart"></i></button>';
        echo '<button class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-bag"></i></button></div></div></div></div>';

        echo '<div class="modal fade" id="readMoreModal' . $MEnuID . '" tabindex="-1" role="dialog" aria-labelledby="readMoreModalLabel' . $MEnuID . '" aria-hidden="true">';
        echo '<div class="modal-dialog read-more-modal" role="document"><div class="modal-content"><div class="modal-header">';
        echo '<h5 class="modal-title" id="readMoreModalLabel' . $MEnuID . '">' . $header . '</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span></button></div><div class="modal-body"><p>' . $row['Body'] . '</p></div></div></div></div>';
    }
    echo '</div>';

    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($your_db_connection);
}

mysqli_close($your_db_connection);
?>


            </div>

            <!-- Modal Footer -->
            <div style="justify-content: center;" class="modal-footer text-center">
            <button id="btnhover" style="border-color: #E48F45;" data-dismiss="modal" data-toggle="modal"  data-target="#hotcoffees"   type="button" class="btn  btn-sm m-1">
            <i class="bi bi-arrow-90deg-left"></i> Back</button>
            <button id="btnhover" style="border-color: #E48F45;" data-dismiss="modal" data-toggle="modal"  data-target="#IceCoffees" type="button" class="btn  btn-sm m-1">
            <i class="bi bi-arrow-90deg-right"></i> Next</button>
            </div>

        </div>
    </div>
</div>
   


<div class="modal fade" id="IceCoffees">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div style="background-color: #E48F45;" class="modal-header">
                <h4 style="color: #fff;" class="modal-title">Ice Coffee's</h4>
                <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
            <?php
$host = "localhost";
$username = "root";
$password = "";
$database = "beantocup";

$your_db_connection = mysqli_connect($host, $username, $password, $database);

if (!$your_db_connection) die("Connection failed: " . mysqli_connect_error());

$searchTerm = isset($_POST['searchTerm']) && !empty($_POST['searchTerm']) ? mysqli_real_escape_string($your_db_connection, $_POST['searchTerm']) : '';

$query = "SELECT MenuID, Name, Price, Body, Image FROM menu WHERE MenuID IN (26, 27,28, 29, 30, 31) AND (MenuID LIKE '%$searchTerm%' OR Name LIKE '%$searchTerm%' OR Price LIKE '%$searchTerm%' OR Body LIKE '%$searchTerm%' OR Image LIKE '%$searchTerm%')";

$result = mysqli_query($your_db_connection, $query);

if ($result) {
    echo '<div class="row">';
    while ($row = mysqli_fetch_assoc($result)) {
        $header = $row['Name'];
        $MEnuID = $row['MenuID'];
        $date = $row['Price'];
        $body = strlen($row['Body']) > 10 ? substr($row['Body'], 0, 10) . '...' : $row['Body'];
        $image = $row['Image'];

        echo '<div class="col-md-4 mb-5"><div class="card custom-card d-flex flex-row">';
        echo '<img src="uploads/' . $image . '" class="card-img-left" alt="Card Image">';
        echo '<div class="card-body"><h5>' . $header . '</h5>';
        echo '<p>MenuID: ' . $MEnuID . '</p><p class="card-text"><small class="text-muted">Price: ' . $date . '</small></p>';
        echo '<p class="card-text">' . $body . ' <a href="#" class="read-more" data-toggle="modal" data-target="#readMoreModal' . $MEnuID . '">Read More</a></p>';
        echo '<div class="card-buttons"><button class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-cart"></i></button>';
        echo '<button class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-bag"></i></button></div></div></div></div>';

        echo '<div class="modal fade" id="readMoreModal' . $MEnuID . '" tabindex="-1" role="dialog" aria-labelledby="readMoreModalLabel' . $MEnuID . '" aria-hidden="true">';
        echo '<div class="modal-dialog read-more-modal" role="document"><div class="modal-content"><div class="modal-header">';
        echo '<h5 class="modal-title" id="readMoreModalLabel' . $MEnuID . '">' . $header . '</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span></button></div><div class="modal-body"><p>' . $row['Body'] . '</p></div></div></div></div>';
    }
    echo '</div>';

    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($your_db_connection);
}

mysqli_close($your_db_connection);
?>


            </div>

            <!-- Modal Footer -->
            <div style="justify-content: center;" class="modal-footer text-center">
            <button id="btnhover" style="border-color: #E48F45;" data-dismiss="modal" data-toggle="modal"  data-target="#Pastries"   type="button" class="btn  btn-sm m-1">
            <i class="bi bi-arrow-90deg-left"></i> Back</button>
            <button id="btnhover" style="border-color: #E48F45;" data-dismiss="modal" data-toggle="modal"  data-target="#BlendedCoffees" type="button" class="btn  btn-sm m-1">
            <i class="bi bi-arrow-90deg-right"></i> Next</button>
            </div>

        </div>
    </div>
</div>
   

<div class="modal fade" id="BlendedCoffees">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div style="background-color: #E48F45;" class="modal-header">
                <h4 style="color: #fff;" class="modal-title">Blended Coffee's</h4>
                <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
            <?php
$host = "localhost";
$username = "root";
$password = "";
$database = "beantocup";

$your_db_connection = mysqli_connect($host, $username, $password, $database);

if (!$your_db_connection) die("Connection failed: " . mysqli_connect_error());

$searchTerm = isset($_POST['searchTerm']) && !empty($_POST['searchTerm']) ? mysqli_real_escape_string($your_db_connection, $_POST['searchTerm']) : '';

$query = "SELECT MenuID, Name, Price, Body, Image FROM menu WHERE MenuID IN (32, 33,34, 35, 36, 37) AND (MenuID LIKE '%$searchTerm%' OR Name LIKE '%$searchTerm%' OR Price LIKE '%$searchTerm%' OR Body LIKE '%$searchTerm%' OR Image LIKE '%$searchTerm%')";

$result = mysqli_query($your_db_connection, $query);

if ($result) {
    echo '<div class="row">';
    while ($row = mysqli_fetch_assoc($result)) {
        $header = $row['Name'];
        $MEnuID = $row['MenuID'];
        $date = $row['Price'];
        $body = strlen($row['Body']) > 10 ? substr($row['Body'], 0, 10) . '...' : $row['Body'];
        $image = $row['Image'];

        echo '<div class="col-md-4 mb-5"><div class="card custom-card d-flex flex-row">';
        echo '<img src="uploads/' . $image . '" class="card-img-left" alt="Card Image">';
        echo '<div class="card-body"><h5>' . $header . '</h5>';
        echo '<p>MenuID: ' . $MEnuID . '</p><p class="card-text"><small class="text-muted">Price: ' . $date . '</small></p>';
        echo '<p class="card-text">' . $body . ' <a href="#" class="read-more" data-toggle="modal" data-target="#readMoreModal' . $MEnuID . '">Read More</a></p>';
        echo '<div class="card-buttons"><button class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-cart"></i></button>';
        echo '<button class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-bag"></i></button></div></div></div></div>';

        echo '<div class="modal fade" id="readMoreModal' . $MEnuID . '" tabindex="-1" role="dialog" aria-labelledby="readMoreModalLabel' . $MEnuID . '" aria-hidden="true">';
        echo '<div class="modal-dialog read-more-modal" role="document"><div class="modal-content"><div class="modal-header">';
        echo '<h5 class="modal-title" id="readMoreModalLabel' . $MEnuID . '">' . $header . '</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span></button></div><div class="modal-body"><p>' . $row['Body'] . '</p></div></div></div></div>';
    }
    echo '</div>';

    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($your_db_connection);
}

mysqli_close($your_db_connection);
?>


            </div>

            <!-- Modal Footer -->
            <div style="justify-content: center;" class="modal-footer text-center">
            <button id="btnhover" style="border-color: #E48F45;" data-dismiss="modal" data-toggle="modal"  data-target="#IceCoffees"   type="button" class="btn  btn-sm m-1">
            <i class="bi bi-arrow-90deg-left"></i> Back</button>
            <button id="btnhover" style="border-color: #E48F45;" data-dismiss="modal" data-toggle="modal"  data-target="#hotteas" type="button" class="btn  btn-sm m-1">
            <i class="bi bi-arrow-90deg-right"></i> Next</button>
            </div>

        </div>
    </div>
</div>
   
<div class="modal fade" id="hotteas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div style="background-color: #E48F45;" class="modal-header">
                <h4 style="color: #fff;" class="modal-title">Hot Tea</h4>
                <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
            <?php
$host = "localhost";
$username = "root";
$password = "";
$database = "beantocup";

$your_db_connection = mysqli_connect($host, $username, $password, $database);

if (!$your_db_connection) die("Connection failed: " . mysqli_connect_error());

$searchTerm = isset($_POST['searchTerm']) && !empty($_POST['searchTerm']) ? mysqli_real_escape_string($your_db_connection, $_POST['searchTerm']) : '';

$query = "SELECT MenuID, Name, Price, Body, Image FROM menu WHERE MenuID IN (38,40, 41, 42, 43,44) AND (MenuID LIKE '%$searchTerm%' OR Name LIKE '%$searchTerm%' OR Price LIKE '%$searchTerm%' OR Body LIKE '%$searchTerm%' OR Image LIKE '%$searchTerm%')";

$result = mysqli_query($your_db_connection, $query);

if ($result) {
    echo '<div class="row">';
    while ($row = mysqli_fetch_assoc($result)) {
        $header = $row['Name'];
        $MEnuID = $row['MenuID'];
        $date = $row['Price'];
        $body = strlen($row['Body']) > 10 ? substr($row['Body'], 0, 10) . '...' : $row['Body'];
        $image = $row['Image'];

        echo '<div class="col-md-4 mb-5"><div class="card custom-card d-flex flex-row">';
        echo '<img src="uploads/' . $image . '" class="card-img-left" alt="Card Image">';
        echo '<div class="card-body"><h5>' . $header . '</h5>';
        echo '<p>MenuID: ' . $MEnuID . '</p><p class="card-text"><small class="text-muted">Price: ' . $date . '</small></p>';
        echo '<p class="card-text">' . $body . ' <a href="#" class="read-more" data-toggle="modal" data-target="#readMoreModal' . $MEnuID . '">Read More</a></p>';
        echo '<div class="card-buttons"><button class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-cart"></i></button>';
        echo '<button class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-bag"></i></button></div></div></div></div>';

        echo '<div class="modal fade" id="readMoreModal' . $MEnuID . '" tabindex="-1" role="dialog" aria-labelledby="readMoreModalLabel' . $MEnuID . '" aria-hidden="true">';
        echo '<div class="modal-dialog read-more-modal" role="document"><div class="modal-content"><div class="modal-header">';
        echo '<h5 class="modal-title" id="readMoreModalLabel' . $MEnuID . '">' . $header . '</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span></button></div><div class="modal-body"><p>' . $row['Body'] . '</p></div></div></div></div>';
    }
    echo '</div>';

    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($your_db_connection);
}

mysqli_close($your_db_connection);
?>


            </div>

            <!-- Modal Footer -->
            <div style="justify-content: center;" class="modal-footer text-center">
            <button id="btnhover" style="border-color: #E48F45;" data-dismiss="modal" data-toggle="modal"  data-target="#BlendedCoffees"   type="button" class="btn  btn-sm m-1">
            <i class="bi bi-arrow-90deg-left"></i> Back</button>
           
            </div>

        </div>
    </div>
</div>




<div  class="card shadow border-0 mb-7">
<div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Menu</h5>
    <div class="input-group mb-3" style="width: 400px;">
    <input type="text" class="form-control" placeholder="Search Menu" id="searchInput" aria-label="Recipient's username" aria-describedby="button-addon2">
    <button style="background-color: #E48F45; color: #fff;" class="btn btn-outline-secondary custom-width-btn" type="button" id="button-addon2">
        <i class="bi bi-search"></i> <!-- Bootstrap search icon -->
    </button>
</div>
</div>



                    
              

                    <div class="table-responsive">
    <div class="container mt-5 mb-5">
        <div class="row">
        <div id="searchResults"></div>
        <?php
// Replace these with your actual database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "beantocup";

// Create a database connection
$your_db_connection = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$your_db_connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if a search term is provided
if(isset($_POST['searchTerm']) && !empty($_POST['searchTerm'])) {
    $searchTerm = mysqli_real_escape_string($your_db_connection, $_POST['searchTerm']);

    // Query to search for products based on MenuID, Name, Price, Body, and Image
    $query = "SELECT MenuID, Name, Price, Body, Image FROM menu WHERE MenuID LIKE '%$searchTerm%' OR Name LIKE '%$searchTerm%' OR Price LIKE '%$searchTerm%' OR Body LIKE '%$searchTerm%' OR Image LIKE '%$searchTerm%'";
} else {
    // If no search term, fetch all data
    $query = "SELECT MenuID, Name, Price, Body, Image FROM menu";
}

$result = mysqli_query($your_db_connection, $query);

// Check if the query was successful
if ($result) {
    // Fetch data row by row
    while ($row = mysqli_fetch_assoc($result)) {
        $header = $row['Name'];
        $MEnuID = $row['MenuID'];
        $date = $row['Price'];
        $body = $row['Body'];
        $image = $row['Image'];

        // Display data in Bootstrap cards
        echo '<div class="col-md-4 mb-5">';
        echo '<div class="card custom-card d-flex flex-row">';
        echo '<img src="uploads/' . $image . '" class="card-img-left" alt="Card Image">';
        echo '<div class="card-body">';
        echo '<h5>' . $header . '</h5>';
        echo '<p>MenuID: ' .  $MEnuID . '</p>';
        echo '<p class="card-text"><small class="text-muted">Price: ' . $date . '</small></p>';
        
        // Cut the text if it is longer than 250 characters
        $trimmed_body = strlen($body) > 10 ? substr($body, 0, 10) . '...' : $body;
        echo '<p class="card-text">' . $trimmed_body . ' <a href="#" class="read-more" data-toggle="modal" data-target="#MenureadMoreModal' . $row['MenuID'] . '">Read More</a></p>';
        
        echo '<div class="card-buttons">';
        echo '<button  class="btn btn  btn-sm-custom mr-1"><i class="fas fa-shopping-cart"></i></button>'; // Added custom class btn-sm-custom
       // Add data-id attribute with the MenuID value
echo '<button data-toggle="modal" data-target="#BuyNow" class="btn btn-sm-custom mr-1 buy-now-btn" data-id="' . $MEnuID . '"><i class="fas fa-shopping-bag"></i></button>';

        echo '</div>';

        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Modal for full text
        echo '<div  class="modal fade" id="MenureadMoreModal' . $row['MenuID'] . '" tabindex="-1" role="dialog" aria-labelledby="readMoreModalLabel' . $row['MenuID'] . '" aria-hidden="true">';
        echo '<div class="modal-dialog read-more-modal" role="document">';
        echo '<div class="modal-content">';
        echo '<div style="background-color: #E48F45;" class="modal-header">';
        echo '<h5 style="color: #fff;" class="modal-title" id="readMoreModalLabel' . $row['MenuID'] . '">' . $header . '</h5>';
        echo '<button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo '<p>' . $body . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        
    }

    // Free result set
    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($your_db_connection);
}

mysqli_close($your_db_connection);
?>

    </div>
</div>
<script>
    // Initialize Bootstrap tooltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<div class="card-footer border-0 py-3 d-flex justify-content-center flex-wrap">
             

             </div>
    </div>
                 
    </div>


    
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function(){
    $("#searchInput").on("input", function(){
        var searchTerm = $(this).val();
        
        if(searchTerm !== ''){
            $.ajax({
                url: 'search.php', // Create a PHP file (search.php) to handle the search logic
                type: 'POST',
                data: {searchTerm: searchTerm},
                success: function(response){
                    $("#searchResults").html(response);
                }
            });
        } else {
            $("#searchResults").html('');
        }
    });
});
</script>


<div class="modal fade" id="BuyNow">
    <div class="modal-dialog ">
        <div class="modal-content">

            <!-- Modal Header -->
            <div style="background-color: #E48F45;" class="modal-header">
                <h4 style="color: #fff;" class="modal-title">Hot Tea</h4>
                <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                
            </div>
            <div class="d-flex flex-column align-items-center mb-2">
    <h5 style="text-align: center; margin-bottom: 5px;">Options/Size</h5>
    <div class="d-flex justify-content-center">
        <button style="background-color: transparent; color: #E48F45; border: 1px solid #E48F45;" type="button" class="btn btn-sm m-1">
            Small
        </button>
        <button style="background-color: transparent; color: #E48F45; border: 1px solid #E48F45;" type="button" class="btn btn-sm m-1">
            Medium
        </button>
        <button style="background-color: transparent; color: #E48F45; border: 1px solid #E48F45;" type="button" class="btn btn-sm m-1">
            Large
        </button>
    </div>
</div>

<div class="container mt-2 mb-4">
  <div class="row">
    <div class="col-md-6 mx-auto text-center">
      <label style="color: #000000;" for="quantity">Quantity:</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <button style="background-color: #E48F45; color: #fff;" class="btn btn-outline-secondary" type="button" id="decrease-btn">-</button>
        </div>
        <input type="text" class="form-control text-center" id="quantity" value="1" readonly>
        <div class="input-group-append">
          <button style="background-color: #E48F45; color: #fff;" class="btn btn-outline-secondary" type="button" id="increase-btn">+</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // JavaScript to handle quantity button functionality
  $(document).ready(function () {
    var quantityInput = $('#quantity');

    $('#increase-btn').click(function () {
      var currentValue = parseInt(quantityInput.val());
      quantityInput.val(currentValue + 1);
    });

    $('#decrease-btn').click(function () {
      var currentValue = parseInt(quantityInput.val());
      if (currentValue > 1) {
        quantityInput.val(currentValue - 1);
      }
    });
  });
</script>




            <!-- Modal Footer -->
            <div  class="modal-footer text-center">
            <button   style="background-color: #E48F45; color: #fff;" data-dismiss="modal" data-toggle="modal"  data-target="#"   type="button" class="btn  btn-sm m-1">
            <i class="fas fa-shopping-cart"></i> Add to Cart</button>
            <button  style="background-color: #E48F45; color: #fff;" data-dismiss="modal" data-toggle="modal"  data-target="#"   type="button" class="btn  btn-sm m-1">
            <i class="fas fa-shopping-bag"></i> Order Now</button>
            </div>

        </div>
    </div>
</div>


<script>
// Use jQuery to handle the click event for the Buy Now buttons
$(document).on('click', '.buy-now-btn', function() {
    // Get the MenuID from the clicked button
    var menuID = $(this).data('id');

    // AJAX request to fetch data for the selected item
    $.ajax({
        type: 'POST',
        url: 'fetch_item_data.php', // Create a separate PHP file for handling the AJAX request
        data: { menuID: menuID },
        dataType: 'json',
        success: function(data) {
            // Update the modal content with the fetched data
            $('#BuyNow .modal-title').text(data.Name);
            $('#BuyNow .modal-body').html(`
                <div class="row">
                    <div class="col-md-6">
                        <p>MenuID: ${data.MenuID}</p>
                        <p>Name: ${data.Name}</p>
                        <p>Price: ${data.Price}</p>
                        <p id="limitedBody">${data.LimitedBody}</p>
                        <a href="#" id="readMoreLink">Read More</a>
                        <!-- Add other fields as needed -->
                    </div>
                    <div class="col-md-6 text-right">
                        <img src="uploads/${data.Image}" alt="Item Image" style="max-width: 100%; height: auto; border-radius: 20px;    ">
                    </div>
                </div>
            `);

            // Add click event for Read More
            $('#readMoreLink').on('click', function(e) {
                e.preventDefault();
                // Update the modal content with the full body text
                $('#MenureadMoreModal .modal-title').text(data.Name);
                $('#MenureadMoreModal .modal-body').html(`<p>${data.Body}</p>`);
                // Show the Read More modal
                $('#MenureadMoreModal').modal('show');
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
</script>


<!-- Modal for Read More -->
<div class="modal fade" id="MenureadMoreModal" tabindex="-1" role="dialog" aria-labelledby="MenureadMoreModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div style="background-color: #E48F45;" class="modal-header">
                <h4 style="color: #fff;" class="modal-title">Read More</h4>
            </div>

            <div class="modal-body">
                <!-- Content will be dynamically added here via JavaScript -->
            </div>
            
        </div>
    </div>
</div>








<!-- ... ordertbl ... ---------------------------------------------------------------------------------------------------------------->



<div  id="Order" style="display:none;" class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Shopping Cart</h5>
                    </div>
                    <div class="table-responsive">
                 


                    </table>



                    </div>
                    <div class="card-footer border-0 py-3 d-flex justify-content-center flex-wrap">
                    <button style="background-color: #E48F45; color: #fff;"  type="button" class="btn btn btn-sm m-1" data-toggle="modal" data-target="#CreateNEws">
    <i class="bi bi-plus"></i> Create
</button>

<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal"  data-target="#editnews">
    <i class="bi bi-pencil"></i> Edit
</button>

<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal" data-target="#deletenews">
    <i class="bi bi-trash"></i> Delete
</button>

<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" id="refreshButton10">
    <i class="bi bi-arrow-clockwise"></i> Refresh
</button>

<script>
        document.getElementById("refreshButton10").addEventListener("click", function() {
            location.reload();
        });
    </script>
    </div>
    </div>



<!-- ... Admintbl ... ---------------------------------------------------------------------------------------------------------------->




                <div  id="Admin-table" class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">How To Order</h5>
 </div>
<div class="table-responsive">

<div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="Images/order.svg" class="img-fluid mb-5">
        
        </div>
         <div class="col-md-6">
         <h2 class="mt-7 text-center" id="FAQ"> Frequently Asked Questions</h2>
         <div class="accordion accordion-flush p-3" id="accordionFlushExample">
          <div class="accordion-item bg-white shadow">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              How do you initiate to Order a coffee  on the Beantocup web app?
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">To begin the coffee ordering process on the Beantocup Ordering Management web application, log in to your account and navigate to the "Order" section. Here, you can select your preferred coffee type, size, and any additional customization options before adding it to your cart.</div>
            </div>
          </div>
          <div class="accordion-item shadow">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              How can users confirm their  order before finalizing the transaction on the Web App.
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Before finalizing the order, users can review their selected coffee items in the shopping cart. The Beantocup Ordering Management web application provides a detailed summary of the order, including the chosen coffee type, size, and any customizations. Users can make any necessary adjustments or additions at this stage before confirming the order.</div>
            </div>
          </div>
          <div class="accordion-item shadow">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              What payment options are available on Beantocup Ordering Management?
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Choose from credit/debit cards or digital wallets during checkout, enter details securely, and receive an order confirmation once payment is successful.</div>
            </div>
          </div>

          <div class="accordion-item shadow">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
              Can users track the status of their coffee order on the Beantocup web app?
              </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">users can track their coffee order in real-time by accessing the "Order Status" section on the Beantocup web app. The application provides live updates on the preparation, brewing, and delivery stages, ensuring transparency throughout the entire process.</div>
            </div>
          </div>
        
          

        </div>
         </div>
    </div>
  </div>




                    </div>
                    <div class="card-footer border-0 py-3 d-flex justify-content-center flex-wrap">
                  
                    <button id="btnhover" style="border-color: #E48F45; "  type="button" class="btn  btn-sm m-1"  onclick="showMenu()" >
                    <i class="bi bi-cup-hot-fill"></i> View Menu</button>


<button id="btnhover" style="border-color: #E48F45;" type="button" class="btn  btn-sm m-1" onclick="showNews()">
<i class="bi bi-megaphone-fill"></i></i> View News
</button>



</div>
</div>
            </div>
        </main>
    </div>
</div>
  

<!-- ... Existing HTML code ... -->






<!-- Create Admin Modal -->
















<!-- jQuery (CDN) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="cosyumerdash.js"></script>
</body>
</html>
