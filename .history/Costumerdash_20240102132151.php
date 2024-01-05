<?php
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
                        <i class="bi bi-cart-plus"></i></i> Menu Cart
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showMenu()">
                            <i class="bi bi-cup-hot"></i> Menu
                        </a>
                    </li> 

                    <li class="nav-item">
                        <a class="nav-link" href="#"  onclick="showtrack()">
                        <i class="bi bi-geo-alt"></i> Track Orders
                        </a>
                    </li> 


                   <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showNews()">
                        <i class="bi bi-megaphone"></i> Announcements
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
    <a class="nav-link" href="#" onclick="logout()">
        <i class="bi bi-box-arrow-left"></i> Logout
    </a>
</li>

                </ul>
            </div>
        </div>
    </nav>


    <script>
function logout() {
    // Display a confirmation dialog
    var confirmLogout = confirm('Are you sure you want to logout?');

    // If the user confirms the logout, redirect to logout.php
    if (confirmLogout) {
        window.location.href = 'logout.php';
    }
}
</script>


    
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
// Include your database connection file
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beantocup";
$conn = new mysqli($servername, $username, $password, $dbname);

// Retrieve user information from URL parameters
$loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
$loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

// Check if both CostumerID and username are present
if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
    // Fetch user details from the database using CostumerID
    $query = "SELECT Name, Email, Phone, HomeAddress FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
    $result = mysqli_query($conn, $query);

    // Check if there is a matching user
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $userData = mysqli_fetch_assoc($result);
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-md-6">';
echo  '<img src="Images/personalinfo.svg" class="img-fluid mb-5 mt-2">';
echo "</div>";
echo '<div class="col-md-6">';
echo '<h2 class="mt-7 text-center" id="FAQ">Edit Your Personal Information</h2>';
echo "<div class='container mt-2'>";
echo "<form>";
echo "<div class='mb-3'>";
echo "<input type='text'  id='loggedInUsername' value=Welcome:$loggedInUsername class='form-control' readonly>";
echo "</div>";
echo "<div class='mb-3'>";
echo "<input type='text' id='fullName' value='{$userData['Name']}' class='form-control' readonly>";
echo "</div>";
echo "<div class='mb-3'>";
echo "<input type='text' id='customerID' value=CostumerID:$loggedInCostumerID class='form-control' readonly>";
echo "</div>";
echo "<div class='mb-3'>";
echo "<input type='text' id='email' value=Email:{$userData['Email']} class='form-control' readonly>";
echo "</div>";
echo "<div class='mb-3'>";
echo "<input type='text' id='phone' value=Phone:{$userData['Phone']} class='form-control' readonly>";
echo "</div>";
echo "<div class='mb-3'>";
echo "<input type='text' id='homeAddress' value=HomeAddress:{$userData['HomeAddress']} class='form-control' readonly>";
echo "</div>";
echo "</form>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
    } else {
        // No matching user found
        echo "Error fetching user details.";
    }
} else {
    // CostumerID or username missing, redirect to login
    header("Location: login.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
                    </div>
                    <div class="card-footer border-0 py-3 d-flex justify-content-center flex-wrap">
<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal" data-target="#Passengerupdate">
    <i class="bi bi-pencil"></i> Update
</button>

<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal"  data-target="#passengerdelete">
    <i class="bi bi-trash"></i> Delete Account
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beantocup";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
$loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

// Check if both CostumerID and username are present
if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
    // Fetch user details from the database using CostumerID
    $query = "SELECT Name FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
    $result = mysqli_query($conn, $query);

    // Check if there is a matching user
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $userData = mysqli_fetch_assoc($result);

        // Display the Name
        echo '<option value="' . $userData["Name"] . '">' . $userData["Name"] . '</option>';
    } else {
        // No matching user found based on CostumerID
        echo "Error fetching user details.";
    }
} else {
    // CostumerID or username missing, redirect to login
    header("Location: login.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beantocup";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
$loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

// Check if both CostumerID and username are present
if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
    // Fetch user details from the database using CostumerID
    $query = "SELECT Name FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
    $result = mysqli_query($conn, $query);

    // Check if there is a matching user
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $userData = mysqli_fetch_assoc($result);

        // Display the Name
        echo '<option value="' . $userData["Name"] . '">' . $userData["Name"] . '</option>';
    } else {
        // No matching user found based on CostumerID
        echo "Error fetching user details.";
    }
} else {
    // CostumerID or username missing, redirect to login
    header("Location: login.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
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
                    if (response.type === 'success') {
                        // Show the success alert
                        showAlert(response.type, response.message, function() {
                            // Redirect to login.php after clicking OK
                            window.location.href = 'login.php';
                        });
                    } else {
                        // Show the error alert
                        showAlert(response.type, response.message);
                    }
                },
                error: function() {
                    showAlert('error', 'Something went wrong. Please try again.');
                }
            });
        });

        function showAlert(type, message, callback) {
            Swal.fire({
                title: type.charAt(0).toUpperCase() + type.slice(1),
                text: message,
                icon: type,
                confirmButtonText: 'OK',
            }).then(function(result) {
                // Execute the callback function after clicking OK
                if (result.isConfirmed && typeof callback === 'function') {
                    callback();
                }
            });
        }
    });
</script>





<!-- ...track orders ... ---------------------------------------------------------------------------------------------------------------->




<div  id="trackorders-table" style="display:none;" class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Track Latest Orders</h5>
                    </div>
                    <div class="table-responsive">
        

                    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beantocup";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
$loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

// Check if both CostumerID and username are present
if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
    // Fetch user details from the database using CostumerID
    $query = "SELECT Name, Email, Phone, HomeAddress FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
    $result = mysqli_query($conn, $query);

    // Check if there is a matching user
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $userData = mysqli_fetch_assoc($result);
    
        // Fetch data from the addtocarttbl table for a specific CostumerName
        $desiredCustomerName = $userData['Name'];
        $sql = "SELECT * FROM ordertbl WHERE CostumerName = '$desiredCustomerName' ORDER BY OrderID DESC";
        $result = $conn->query($sql);
    
        $totalAmount = 0; // Initialize total amount variable
    
        if ($result->num_rows > 0) {
            echo '<table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>Order-ID</th>
                            <th>Items Ordered</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Date Ordered</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>'; // added tbody for better structure
    
            // Output data of each row
            // Output data of each row
while ($row = $result->fetch_assoc()) {
    // Check if the order status is not "DELIVERED"
    if ($row["Status"] !== "Delivered") {
        echo '<tr>
                <td>' . $row["OrderID"] . '</td>
                <td>' . $row["ItemsOrdered"] . '</td>
                <td>' . $row["Size"] . '</td>
                <td>' . $row["QTY"] . '</td>
                <td>' . $row["DatePlaced"] . '</td>
                <td>' . $row["PaymentMethod"] . '</td>
                <td>' . $row["Status"] . '</td>
            </tr>';

        // Accumulate the amount for total calculation
        $totalAmount += $row["Amount"];
    }
}

echo '</tbody></table>';

        } else {
            echo '<h2>No Delivered Orders</h2>';
        }
        // Display the total amount outside the table with padding and centering
        echo '<div style="padding: 20px; text-align: center;">Total Amount: $' . $totalAmount . '</div>';

        echo '<div class="container text-center notice-container mb-5">
        <h3>Important Notice!</h3>
        <div class="legend-item">
        If the Status stated in your Order is "blank" or "empty", it is Eligible for Update and Cancellation of Order.
        If the order status has an input like On Process, In Transit, or Delivered, it is not capable of editing and canceling your Order.
        </div>
    </div>';
    } else {
        // No matching user found based on CostumerID
        echo "Error fetching user details.";
    }
    
} else {
    // CostumerID or username missing, redirect to login
    header("Location: login.php");
    exit();
}
// Inside the loop that outputs the table rows


// Close the database connection
mysqli_close($conn);
?>
 



                    </div>
                    <div class="card-footer border-0 py-3 d-flex justify-content-center flex-wrap">


                    
<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal" data-target="#edittracklatestorder">
    <i class="bi bi-pencil"></i> Update
</button>

<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal"  data-target="#cancelorder">
<i class="bi bi-bag-x"></i> Cancel Order</button>

  



 <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" id="refreshButton12">
        <i class="bi bi-arrow-clockwise"></i> Refresh
    </button>
<script>
        document.getElementById("refreshButton12").addEventListener("click", function() {
            // Add your refresh functionality here
            // For example, you can reload the current page with the following line
            location.reload();
        });
    </script>
                    </div>
                </div>




                <div class="modal fade" id="edittracklatestorder">
        <div id="addordersize" class="modal-dialog">
            <div  class="modal-content">

                <!-- Modal Header -->
                <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Edit Shipping Information</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                <form id="updateForm" action="Costumerdash.php"  method="post">
              
            
                        <div class="container">
        <div class="row">
           
            <label for="trackuporderID">Search Order-ID</label>
            <select name="trackuporderID" id="trackuporderID" class="form-control" required>
    <option value="" disabled selected>Select Order ID</option>
    
    <?php
    // Modified PHP code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beantocup";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
    $loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

    // Check if both CostumerID and username are present
    if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
        // Fetch user details from the database using CostumerID
        $query = "SELECT Name, Email, Phone, HomeAddress FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
        $result = mysqli_query($conn, $query);

        // Check if there is a matching user
        if (mysqli_num_rows($result) > 0) {
            // Fetch the user data
            $userData = mysqli_fetch_assoc($result);

            // Fetch data from the addtocarttbl table for a specific CostumerName
            $desiredCustomerName = $userData['Name'];
            $sql = "SELECT OrderID  FROM  ordertbl WHERE CostumerName = '$desiredCustomerName'"  ;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Fetch the Order Status for the current OrderID
                    $orderId = $row["OrderID"];
                    $statusQuery = "SELECT Status FROM ordertbl WHERE OrderID = '$orderId'";
                    $statusResult = $conn->query($statusQuery);
            
                    if ($statusResult->num_rows > 0) {
                        $statusData = $statusResult->fetch_assoc();
                        $orderStatus = $statusData["Status"];
            
                        // Only display the option if the status is none of 'In Transit', 'On Process', 'Delivered'
                        if ($orderStatus !== 'Intransit' && $orderStatus !== 'Order Process' && $orderStatus !== 'Delivered') {
                            echo '<option value="' . $orderId . '">' . $orderId . '</option>';
                        }
                    }
                }
            } else {
                echo "0 results";
            }
            
            
        } else {
            // No matching user found based on CostumerID
            echo "Error fetching user details.";
        }
    } else {
        // CostumerID or username missing, redirect to login
        header("Location: login.php");
        exit();
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</select>
                
<div class="col-md-6">

                <div class="form-group">
                    <label id="trackupaddorDateOrdered" for="trackupaddorDateOrdered">Date Ordered</label>
                    <input type="date" name="trackupaddorDateOrdered" class="form-control" required>
                </div>
                 <div class="form-group">
                    <label id="trackupaddorShippingAddress" for="trackupaddorShippingAddress">Shipping Address</label>
                    <input name="trackupaddorShippingAddress" type="text" class="form-control" required>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label id="trackupaddorContactNumber" for="trackupaddorContactNumber">Contact Number</label>
                    <input name="trackupaddorContactNumber" type="text" class="form-control" required>
                </div>

                <div class="form-group">
                    <label id="trackupaddorEmailAddress" for="trackupaddorEmailAddress">Email</label>
                    <input name="trackupaddorEmailAddress" type="text" class="form-control" required>
                </div>
         

            </div>




        </div>
    </div>
 
    
</form>
</div>
<div class="modal-footer">
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn" data-dismiss="modal">Close</button>
                    <button style="background-color: #E48F45; color: #fff;" id="trackorderUpdate" type="button" class="btn btn">Update Details</button>
                </div>

            </div>
        </div>
    </div>



    <script>
  $(document).ready(function() {
    $("#trackorderUpdate").click(function() {
            var trackuporderID = $("#trackuporderID").val();
            var trackupaddorDateOrdered = $("input[name='trackupaddorDateOrdered']").val();
            var trackupaddorShippingAddress = $("input[name='trackupaddorShippingAddress']").val();
            var trackupaddorContactNumber = $("input[name='trackupaddorContactNumber']").val();
            var trackupaddorEmailAddress = $("input[name='trackupaddorEmailAddress']").val();
          


      $.post(
        "update.php", // Replace with the actual file name for update
        {
            trackuporderID: trackuporderID,
            trackupaddorDateOrdered: trackupaddorDateOrdered,
            trackupaddorShippingAddress: trackupaddorShippingAddress,
            trackupaddorContactNumber: trackupaddorContactNumber,
            trackupaddorEmailAddress: trackupaddorEmailAddress
               
        },
        function(data, status) {
          if (status === 'success') {
            Swal.fire({
              title: 'Order Updated Successfully!',
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



<div class="modal fade" id="cancelorder">
    <div class="modal-dialog">
        <div class="modal-content">
        <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Cancel your Order</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            <div class="modal-body">
                <form id="Delete" action="trackdelete.php" method="post">
                    <div class="form-group">
                        <label for="Costuorderid">Delete Selected Order</label>
                        <select name="Costuorderid" id="Costuorderid" class="form-control" required>
                            <option value="" disabled selected>Select an option</option>
                            <?php
    // Modified PHP code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beantocup";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
    $loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

    // Check if both CostumerID and username are present
    if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
        // Fetch user details from the database using CostumerID
        $query = "SELECT Name, Email, Phone, HomeAddress FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
        $result = mysqli_query($conn, $query);

        // Check if there is a matching user
        if (mysqli_num_rows($result) > 0) {
            // Fetch the user data
            $userData = mysqli_fetch_assoc($result);

            // Fetch data from the addtocarttbl table for a specific CostumerName
            $desiredCustomerName = $userData['Name'];
            $sql = "SELECT OrderID  FROM  ordertbl WHERE CostumerName = '$desiredCustomerName'"  ;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Fetch the Order Status for the current OrderID
                    $orderId = $row["OrderID"];
                    $statusQuery = "SELECT Status FROM ordertbl WHERE OrderID = '$orderId'";
                    $statusResult = $conn->query($statusQuery);
            
                    if ($statusResult->num_rows > 0) {
                        $statusData = $statusResult->fetch_assoc();
                        $orderStatus = $statusData["Status"];
            
                        // Only display the option if the status is none of 'In Transit', 'On Process', 'Delivered'
                        if ($orderStatus !== 'Intransit' && $orderStatus !== 'Order Process' && $orderStatus !== 'Delivered') {
                            echo '<option value="' . $orderId . '">' . $orderId . '</option>';
                        }
                    }
                }
            } else {
                echo "0 results";
            }
            
            
        } else {
            // No matching user found based on CostumerID
            echo "Error fetching user details.";
        }
    } else {
        // CostumerID or username missing, redirect to login
        header("Location: login.php");
        exit();
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn" data-dismiss="modal">Close</button>
                        <button style="background-color: #E48F45; color: #fff;" id="Cosorderdelte" type="submit" class="btn btn">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {
    $('#Delete').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'trackdelete.php',
            data: formData,
            dataType: 'json',
            success: function(response) {
                console.log(response); // Log the response to the console for debugging
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







                <div  id="history-table" style="display:none;" class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Order History</h5>
                    </div>
                    <div class="table-responsive">
        
                    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beantocup";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
$loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

// Check if both CostumerID and username are present
if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
    // Fetch user details from the database using CostumerID
    $query = "SELECT Name, Email, Phone, HomeAddress FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
    $result = mysqli_query($conn, $query);

    // Check if there is a matching user
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $userData = mysqli_fetch_assoc($result);

        // Fetch data from the addtocarttbl table for a specific CostumerName
        $desiredCustomerName = $userData['Name'];
        $sql = "SELECT * FROM ordertbl WHERE CostumerName = '$desiredCustomerName' AND Status = 'Delivered' ORDER BY OrderID DESC";
        $result = $conn->query($sql);

        $totalAmount = 0; // Initialize total amount variable

        if ($result->num_rows > 0) {
            echo '<table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>Order-ID</th>
                            <th>Items Ordered</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Date Ordered</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Confirmation</th>
                        </tr>
                    </thead>
                    <tbody>'; // added tbody for better structure

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                        
                        <td>' . $row["OrderID"] . '</td>
                        <td>' . $row["ItemsOrdered"] . '</td>
                        <td>' . $row["Size"] . '</td>
                        <td>' . $row["QTY"] . '</td>
                        <td>' . $row["DatePlaced"] . '</td>
                        <td>' . $row["PaymentMethod"] . '</td>
                        <td>' . $row["Status"] . '</td>
                        <td>' . $row["CostumerConfirm"] . '</td>


                    </tr>';

                // Accumulate the amount for total calculation
                $totalAmount += $row["Amount"];
            }

            echo '</tbody></table>';
        } else {
            echo '<h2>No Delivered Orders</h2>';
        }
        // Display the total amount outside the table with padding and centering
        echo '<div style="padding: 20px; text-align: center;">Total Amount of Orders to Our Shop: $' . $totalAmount . '</div>';
    } else {
        // No matching user found based on CostumerID
        echo "Error fetching user details.";
    }

} else {
    // CostumerID or username missing, redirect to login
    header("Location: login.php");
    exit();
}
// Inside the loop that outputs the table rows

// Close the database connection
mysqli_close($conn);
?>


                    </div>
                    <div class="card-footer border-0 py-3 d-flex justify-content-center flex-wrap">


                    
<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal" data-target="#ConfirmOrder">
<i class="bi bi-bag-check"></i> Order Recieve
</button>

<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal"  data-target="#RateourSHop">
<i class="bi bi-star"></i> Rate</button>

    <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal"  data-target="#Deleteorderhistory">
    <i class="bi bi-trash"></i> Delete Order History</button>



 <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" id="refreshButton14">
        <i class="bi bi-arrow-clockwise"></i> Refresh
    </button>
<script>
        document.getElementById("refreshButton14").addEventListener("click", function() {
            // Add your refresh functionality here
            // For example, you can reload the current page with the following line
            location.reload();
        });
    </script>
                    </div>
                </div>



                <div class="modal fade" id="ConfirmOrder">
        <div class="modal-dialog" id="orderprocessmodal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Confirm Order</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                <form id="updateForm" action="update.php"  method="post">
                <label for="Confirmorderid">Select Order ID to Confirm</label>
                        <select name="Confirmorderid" id="Confirmorderid" class="form-control" required>
                            <option value="" disabled selected>Select Order ID</option>
                       

                            <?php
    // Modified PHP code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beantocup";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
    $loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

    // Check if both CostumerID and username are present
    if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
        // Fetch user details from the database using CostumerID
        $query = "SELECT Name, Email, Phone, HomeAddress FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
        $result = mysqli_query($conn, $query);

        // Check if there is a matching user
        if (mysqli_num_rows($result) > 0) {
            // Fetch the user data
            $userData = mysqli_fetch_assoc($result);

            // Fetch data from the addtocarttbl table for a specific CostumerName
            $desiredCustomerName = $userData['Name'];
            $sql = "SELECT OrderID  FROM  ordertbl WHERE CostumerName = '$desiredCustomerName'"  ;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Fetch the Order Status for the current OrderID
                    $orderId = $row["OrderID"];
                    $statusQuery = "SELECT Status FROM ordertbl WHERE OrderID = '$orderId'";
                    $statusResult = $conn->query($statusQuery);
            
                    if ($statusResult->num_rows > 0) {
                        $statusData = $statusResult->fetch_assoc();
                        $orderStatus = $statusData["Status"];
            
                        // Only display the option if the status is none of 'In Transit', 'On Process', 'Delivered'
                        if ($orderStatus == 'Delivered') {
                            echo '<option value="' . $orderId . '">' . $orderId . '</option>';
                        }
                    }
                }
            } else {
                echo "0 results";
            }
            
            
        } else {
            // No matching user found based on CostumerID
            echo "Error fetching user details.";
        }
    } else {
        // CostumerID or username missing, redirect to login
        header("Location: login.php");
        exit();
    }

    // Close the database connection
    mysqli_close($conn);
    ?>






                        </select>
          

                        <div class="row d-flex justify-content-center align-items-center mt-4 mb-4">
    <div class="col-md-4 mb-4">
        <div id="orderReceiveCard" class="card shadow uniwqe">
            <img src="../Images/recieve.svg" class="card-img-top" alt="Card Image">
            <div class="card-body">
                <h5 class="card-title">Order Receive</h5>
                <p class="card-text">Order Complete</p>
                <div class="shortcutbtn mt-2 d-flex justify-content-center align-items-center">
                    <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1"
                    onclick="updateConfi('Receive')">
                        <span class="pe-2">
                            <i class="bi bi-check-circle-fill"></i>
                        </span>
                        <span>Select</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div id="notReceiveCard" class="card shadow uniwqe">
            <img src="../Images/notrecieve.svg" class="card-img-top" alt="Card Image">
            <div class="card-body">
                <h5 class="card-title">Order not Receive</h5>
                <p class="card-text">Order not Arrive</p>
                <div class="shortcutbtn mt-2 d-flex justify-content-center align-items-center">
                    <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1"
                    onclick="updateConfi('Not Receive')">
                        <span class="pe-2">
                            <i class="bi bi-x-circle-fill"></i>
                        </span>
                        <span>Select</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



<div style="width: 80%; margin: auto; display:block;  margin-bottom: 10px;">
    <label for="newconfirm"></label>
    <input class="form-control mx-auto" name="newconfirm" id="newconfirm" style="width: 100%;">
</div>

<script>
    function updateConfi(rating) {
        document.getElementById("newconfirm").value = rating + "";
        // You can customize this value as per your requirement
    }
</script>





                    </form>
</div>
<div class="modal-footer">
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn" data-dismiss="modal">Close</button>
                    <button  style="background-color: #E48F45; color: #fff;" id="setConfermation" type="button" class="btn btn">Confirm</button>
                </div>

            </div>
        </div>
    </div>


    <script>
    $(document).ready(function() {
    $("#setConfermation").click(function() {
      var Confirmorderid = $("#Confirmorderid").val();
      var newconfirm = $("input[name='newconfirm']").val();
      
     
      $.post(
        "update.php", // Replace with the actual file name for update
        {
            Confirmorderid : Confirmorderid,
            newconfirm:newconfirm
           
         
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






<div class="modal fade" id="RateourSHop">
        <div class="modal-dialog" id="Shoprating">
            <div class="modal-content">

                <!-- Modal Header -->
                <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Rate Us</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                <form id="updateForm" action="Costumerdash.php"  method="post">
               
                <div class="row d-flex justify-content-center align-items-center mt-4 mb-4">
   
                <div class="col-md-3 mb-4">
        <div id="orderReceiveCard" class="card shadow uniwqe">
            <div class="text-center">
                <img src="../Images/recieve.svg" class="card-img-top w-65" alt="Card Image">
            </div>
            <div class="card-body text-center p-2 mt-n2"> <!-- Added 'mt-n2' class for negative margin -->
                <h5 class="card-title m-0">Poor Service</h5>
                <p class="card-text m-0">Service is slow, inattentive, or unfriendly, negatively impacting the overall experience.</p>
                <div class="shortcutbtn mt-2 d-flex justify-content-center align-items-center">
                    <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1" data-toggle="modal" data-target="#commentsArea" onclick="updateratings('Poor')">
                        <span class="pe-2">
                        <i class="bi bi-star-fill"></i>
                        </span>
                        <span>Poor</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div id="orderReceiveCard" class="card shadow uniwqe">
            <div class="text-center">
                <img src="../Images/recieve.svg" class="card-img-top w-65" alt="Card Image">
            </div>
            <div class="card-body text-center p-2 mt-n2"> <!-- Added 'mt-n2' class for negative margin -->
                <h5 class="card-title m-0">Average Service</h5>
                <p class="card-text m-0">Service is acceptable but may lack attentiveness or a friendly touch lack attentiveness.</p>
                <div class="shortcutbtn mt-2 d-flex justify-content-center align-items-center">
                    <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1" data-toggle="modal" data-target="#commentsArea" onclick="updateratings('Fair')">
                        <span class="pe-2">
                        <i class="bi bi-star-fill"></i>
                        </span>
                        <span>Fair</span>
                    </a>
                </div>
            </div>
        </div>
    </div>  
    <div class="col-md-3 mb-4">
        <div id="orderReceiveCard" class="card shadow uniwqe">
            <div class="text-center">
                <img src="../Images/recieve.svg" class="card-img-top w-65" alt="Card Image">
            </div>
            <div class="card-body text-center p-2 mt-n2"> <!-- Added 'mt-n2' class for negative margin -->
                <h5 class="card-title m-0">Good Service</h5>
                <p class="card-text m-0">The staff is attentive, friendly, and efficient, contributing positively to the overall experience.</p>
                <div class="shortcutbtn mt-2 d-flex justify-content-center align-items-center">
                    <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1" data-toggle="modal" data-target="#commentsArea" onclick="updateratings('Very Good')">
                        <span class="pe-2">
                        <i class="bi bi-star-fill"></i>
                        </span>
                        <span>Very Good</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Repeat the above structure for other cards with necessary modifications -->
    <div class="col-md-3 mb-4">
        <div id="orderReceiveCard" class="card shadow uniwqe">
            <div class="text-center">
                <img src="../Images/recieve.svg" class="card-img-top w-65" alt="Card Image">
            </div>
            <div class="card-body text-center p-2 mt-n2"> <!-- Added 'mt-n2' class for negative margin -->
                <h5 class="card-title m-0">Outstanding Service</h5>
                <p class="card-text m-0">Service is exceptional, with attentive and friendly staff who go above and beyond to make the visit </p>
                <div class="shortcutbtn mt-2 d-flex justify-content-center align-items-center">
                    <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1"  data-toggle="modal" data-target="#commentsArea" onclick="updateratings('Excellent')">
                        <span class="pe-2">
                        <i class="bi bi-star-fill"></i>
                        </span>
                        <span>Excellent</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>


<div id="commentsArea" style="display:none; width: 80%; margin: 0 auto;">
    <label for="comments">Comments:</label>
    <textarea class="form-control mx-auto" name="comments" id="comments" style="width: 100%;" placeholder="Comments"></textarea>
    <!-- Adjust the 'width' and 'margin' values as needed -->
</div>

<script>
    function showCommentsArea(rating) {
        // Show the comments area when a button is clicked
        document.getElementById('commentsArea').style.display = 'block';

        // You can use the 'rating' parameter to do something specific for each rating if needed
        // For example, you can store the rating in a variable or perform additional actions based on the rating
    }
</script>

                
<div style="width: 80%; margin: auto; display:none;  margin-bottom: 10px;">
    <label for="Rateshop"></label>
    <input class="form-control mx-auto" name="Rateshop" id="Rateshop" style="width: 100%;">
</div>

<script>
    function updateratings(rating) {
        document.getElementById("Rateshop").value = rating + "";
        // You can customize this value as per your requirement
    }
</script>




<?php
// Include your database connection file
require_once('connection.php');
$conn = new mysqli($servername, $username, $password, $dbname);

// Retrieve user information from URL parameters
$loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
$loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

// Check if both CostumerID and username are present
if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
    // Fetch user details from the database using CostumerID
    $query = "SELECT Name FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
    $result = mysqli_query($conn, $query);

    // Check if there is a matching user
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $userData = mysqli_fetch_assoc($result);
        
        // Display the full name inside an input field
        echo '<input style="display:none;"  type="text" id="RateName" name="RateName" value="' . $userData['Name'] . '" class="form-control" readonly>';
    } else {
        // No matching user found
        echo "Error fetching user details.";
    }
} else {
    // CostumerID or username missing, redirect to login
    header("Location: login.php");
    exit();
}

mysqli_close($conn);
?>


                    </form>
</div>
<div class="modal-footer">
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn" data-dismiss="modal">Close</button>
                    <button  style="background-color: #E48F45; color: #fff;" id="setrating" type="button" class="btn btn">Submit Rating</button>
                </div>

            </div>
        </div>
    </div>


    <script>
    $(document).ready(function(){
        $("#setrating").click(function(){
            var RateName = $("input[name='RateName']").val();
            var Rateshop = $("input[name='Rateshop']").val();
            var comments = $("textarea[name='comments']").val();
           
            $.post("inserttdbs.php",
            {
                RateName : RateName ,
                Rateshop: Rateshop,
                comments:  comments
                
            },
            function(data, status){
                Swal.fire({
                    title: 'Success!',
                    text: 'Rate Sent Succesfully',
                    icon: 'success',
                    confirmButtonText: 'Okay',
                });
                // Apply custom class for light theme
                $(".swal2-popup").addClass('light-theme');
            });
        });
    });
</script>



<div class="modal fade" id="Deleteorderhistory">
    <div class="modal-dialog">
        <div class="modal-content">
        <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Delete Order History</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            <div class="modal-body">
            <form id="CosorderdeleteForm" action="historydelete.php" method="post">
                    <div class="form-group">
                        <label for="CosOrderhistory">Delete Selected Order History</label>
                        <select name="CosOrderhistory" id="CosOrderhistory" class="form-control" required>
                            <option value="" disabled selected>Select an option</option>
                           
                            <?php
    // Modified PHP code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beantocup";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
    $loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

    // Check if both CostumerID and username are present
    if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
        // Fetch user details from the database using CostumerID
        $query = "SELECT Name, Email, Phone, HomeAddress FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
        $result = mysqli_query($conn, $query);

        // Check if there is a matching user
        if (mysqli_num_rows($result) > 0) {
            // Fetch the user data
            $userData = mysqli_fetch_assoc($result);

            // Fetch data from the addtocarttbl table for a specific CostumerName
            $desiredCustomerName = $userData['Name'];
            $sql = "SELECT OrderID  FROM  ordertbl WHERE CostumerName = '$desiredCustomerName'"  ;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Fetch the Order Status for the current OrderID
                    $orderId = $row["OrderID"];
                    $statusQuery = "SELECT Status FROM ordertbl WHERE OrderID = '$orderId'";
                    $statusResult = $conn->query($statusQuery);
            
                    if ($statusResult->num_rows > 0) {
                        $statusData = $statusResult->fetch_assoc();
                        $orderStatus = $statusData["Status"];
            
                        // Only display the option if the status is none of 'In Transit', 'On Process', 'Delivered'
                        if ($orderStatus == 'Delivered') {
                            echo '<option value="' . $orderId . '">' . $orderId . '</option>';
                        }
                    }
                }
            } else {
                echo "0 results";
            }
            
            
        } else {
            // No matching user found based on CostumerID
            echo "Error fetching user details.";
        }
    } else {
        // CostumerID or username missing, redirect to login
        header("Location: login.php");
        exit();
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
            



                        </select>
                    </div>

                    <div class="modal-footer">
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn" data-dismiss="modal">Close</button>
        <!-- Add an onclick event to call the JavaScript function for handling deletion -->
        <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn" onclick="deleteSelectedOrder()">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add this script tag in the head or before the closing body tag -->


<!-- Add this script tag in the head or before the closing body tag -->


<script>
function deleteSelectedOrder() {
    var selectedOrder = $("#CosOrderhistory").val();

    // Check if an order is selected
    if (selectedOrder !== null && selectedOrder !== "") {
        // Make an AJAX request to delete.php
        $.ajax({
            type: "POST",
            url: "historydelete.php",
            data: { orderToDelete: selectedOrder },
            success: function(response) {
                // Parse the JSON response from the server
                var responseData = JSON.parse(response);

                // Check if the deletion was successful
                if (responseData.success) {
                    // Display SweetAlert success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Deleted',
                        text: 'The selected order has been deleted successfully!',
                    });
                } else {
                    // Display SweetAlert error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error deleting order: ' + responseData.message,
                    });
                }
            },
            error: function(error) {
                // Handle errors if the AJAX request fails
                console.error("AJAX request failed: ", error);
            }
        });
    } else {
        // Handle the case when no order is selected
        Swal.fire({
            icon: 'warning',
            title: 'No Order Selected',
            text: 'Please select an order to delete.',
        });
    }
}
</script>









<!-- ...track orders ... ---------------------------------------------------------------------------------------------------------------->






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
        $query = "SELECT NewsID, Header,Time, Date, Body, Image FROM shopnews";
        $result = mysqli_query($your_db_connection, $query);

        // Check if the query was successful
        if ($result) {
            // Fetch data row by row
            while ($row = mysqli_fetch_assoc($result)) {
                $header = $row['Header'];
                $time = $row['Time'];
                $date = $row['Date'];
                $body = $row['Body'];
                $image = $row['Image'];

                // Display data in Bootstrap cards
                echo '<div class="col-md-4 mb-4 newscard">';
                echo '<div class="card h-100 border rounded shadow-sm d-flex flex-column align-items-stretch">';
                echo '<img src="uploads/' . $image . '" class="card-img-top img-fluid" style="height: 200px;" alt="Card Image">';
                echo '<div class="card-body mt-0 flex-grow-1">';
                echo '<div class="d-flex justify-content-between">';
                echo '<p class="card-text"><small class="text-muted">' . date('F j, Y', strtotime($date)) . ' | ' . date('g:i A', strtotime($time)) . '</small></p>';
                echo '</div>';
                echo '<h5 class="card-title">' . $header . '</h5>';
                $trimmed_body = strlen($body) > 90 ? substr($body, 0, 90) . '...' : $body;
                echo '<p class="card-text">' . $trimmed_body . '</p>';
                echo '</div>';
                echo '<div style="border:none;" class="card-footer text-center bg-transparent">';
                echo '<a href="#" class="read-more-btn btn btn" data-toggle="modal" data-target="#readMoreModal' . $row['NewsID'] . '">Read More  <i class="bi bi-arrow-right-square"></i></a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                
                // Rest of your code remains the same...
                
                // Modal for full text
                echo '<div class="modal fade newscard" id="readMoreModal' . $row['NewsID'] . '" tabindex="-1" role="dialog" aria-labelledby="readMoreModalLabel' . $row['NewsID'] . '" aria-hidden="true">';
                echo '<div class="modal-dialog" role="document">';
                echo '<div class="modal-content">';
                echo '<div style="background-color: #E48F45;" class="modal-header">';
                echo '<h5 style="color: #fff;" class="modal-title">' . $header . '</h5>';
                echo '<button style="background-color: #E48F45; color: #fff; border:none;" type="button" class="close" data-dismiss="modal" aria-label="Close">';
                echo '<span aria-hidden="true">&times;</span>';
                echo '</button>';
                echo '</div>';
                echo '<div class="modal-body">';
                echo '<img src="uploads/' . $image . '" class="card-img-top img-fluid" style="height: 200px;" alt="Card Image">';
                echo '<div>';
                echo '<p class="card-text mt-4"><small class="text-muted">' . date('F j, Y', strtotime($date)) . ' | ' . date('g:i A', strtotime($time)) . '</small></p>';
                echo '</div>';
                echo '<p class="lead">' . $body . '</p>';
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

<div class="row g-6 mb-6">
  
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
        
        echo '<div class="card-buttons"><button data-toggle="modal" data-dismiss="modal" data-target="#BuyNow" class="btn btn-sm-custom mr-1 buy-now-btn" data-id="' . $MEnuID . '" onclick="hideInputFields()"> <i class="fas fa-shopping-bag"></i> Order Now</button>';
        echo '<button  style="display:none;" class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-bag"></i></button></div></div></div></div>';

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
        
        echo '<div class="card-buttons"><button data-toggle="modal" data-dismiss="modal" data-target="#BuyNow" class="btn btn-sm-custom mr-1 buy-now-btn" data-id="' . $MEnuID . '" onclick="hideInputFields()"> <i class="fas fa-shopping-bag"></i> Order Now</button>';
        echo '<button  style="display:none;" class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-bag"></i></button></div></div></div></div>';

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
        
        echo '<div class="card-buttons"><button data-toggle="modal" data-dismiss="modal" data-target="#BuyNow" class="btn btn-sm-custom mr-1 buy-now-btn" data-id="' . $MEnuID . '" onclick="hideInputFields()"> <i class="fas fa-shopping-bag"></i> Order Now</button>';
        echo '<button  style="display:none;" class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-bag"></i></button></div></div></div></div>';

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

        echo '<div class="card-buttons"><button data-toggle="modal" data-dismiss="modal" data-target="#BuyNow" class="btn btn-sm-custom mr-1 buy-now-btn" data-id="' . $MEnuID . '" onclick="hideInputFields()"> <i class="fas fa-shopping-bag"></i> Order Now</button>';
        echo '<button  style="display:none;" class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-bag"></i></button></div></div></div></div>';

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

        echo '<div class="card-buttons"><button data-toggle="modal" data-dismiss="modal" data-target="#BuyNow" class="btn btn-sm-custom mr-1 buy-now-btn" data-id="' . $MEnuID . '" onclick="hideInputFields()"> <i class="fas fa-shopping-bag"></i> Order Now</button>';
        echo '<button  style="display:none;" class="btn btn btn-sm-custom mr-1"><i class="fas fa-shopping-bag"></i></button></div></div></div></div>';

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
    <h5 class="mb-0">Menuw</h5>
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
      // Added custom class btn-sm-custom
       // Add data-id attribute with the MenuID value
       echo '<button data-toggle="modal" data-target="#BuyNow" class="btn btn-sm-custom mr-1 buy-now-btn" data-id="' . $MEnuID . '" onclick="hideInputFields()"> <i class="fas fa-shopping-bag"></i> Order Now</button>';

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
    <div class="modal-dialog" id="ordermodal">
        <div class="modal-content">

            <!-- Modal Header -->
            <div style="background-color: #E48F45;" class="modal-header">
                <h4 style="color: #fff;" class="modal-title"></h4>
                <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
            </div>
        
            <form action="Costumerdash.php"  method="post">
                
<div id="fileNameContainer" class="text-center mt-3"></div>

<script>
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

            // Extract the file name from the image path
            var fileName = data.Image.split('/').pop();

            // Update the content of the fileNameContainer element with an input field
            $('#fileNameContainer').html(`
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <input id="fileNameContainer" for="fileNameContainer" name="fileNameContainer" style="display: none;"  type="text" class="form-control text-center" value="${fileName}" readonly>
                    </div>
                </div>
            `);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
</script>


<input style="display: none;" type="text" id="prodname" name="prodname" for="prodname" class="form-control productname center-input"/>

            <?php
// Include your database connection file
require_once('connection.php');
$conn = new mysqli($servername, $username, $password, $dbname);

// Retrieve user information from URL parameters
$loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
$loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

// Check if both CostumerID and username are present
if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
    // Fetch user details from the database using CostumerID
    $query = "SELECT Name, Email, Phone, HomeAddress FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
    $result = mysqli_query($conn, $query);

    // Check if there is a matching user
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $userData = mysqli_fetch_assoc($result);

        echo '<div id="customerDetails">';
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-md-17">';
        echo '<h2 class="mt-7 text-center" id="FAQ">Order Information</h2>';
        echo "<div class='container mt-2'>";
        echo "<div class='mb-3'>";
        echo "<label id='fullName'  for='fullName'><i class='fas fa-user'></i> Full Name</label>";
        echo "<input type='text' name='fullName' value='{$userData['Name']}' class='form-control'  style='background-color: #fff;'>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label id='email' for='email'><i class='fas fa-envelope'></i> Email</label>";
        echo "<input type='text' name='email' value='{$userData['Email']}' class='form-control'  style='background-color: #fff;'>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label id='phone'  for='phone'><i class='fas fa-phone'></i> Phone</label>";
        echo "<input type='text' name='phone' value='{$userData['Phone']}' class='form-control' style='background-color: #fff;'>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label id='homeAddress' for='homeAddress'><i class='fas fa-home'></i> Home Address</label>";
        echo "<input type='text' name='homeAddress' value='{$userData['HomeAddress']}' class='form-control' style='background-color: #fff;'>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
        echo "<script src='https://code.jquery.com/jquery-3.6.4.min.js'></script>";
echo "<script>";
echo "
function hideInputFields() {
    $('#customerDetails').hide();
}
";
echo "</script>";
        
    } else {
        // No matching user found
        echo "Error fetching user details.";
    }
} else {
    // CostumerID or username missing, redirect to login
    header("Location: login.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>



<div style="display: flex; flex-direction: column; align-items: center;" class="form-group mb-3">
    <label id="dateplace" for="dateplace">Date Ordered</label>
    <div style="position: relative; width: 90%;">
        <input style="width: calc(100% - 30px);  margin: 0 auto;" type="date" name="dateplace" class="form-control" required>
    </div>
</div>


<div style="display: flex; text-align:center; justify-content: center;"  class="container">
    <div class="row">
        <div class="col">
            <button type="button" class="menu-btn" onclick="updateRating('small')">
                <i class="fa-solid fa-mug-hot"></i> Small
            </button>
        </div>
        <div class="col">
            <button type="button" class="menu-btn" onclick="updateRating('Medium')">
                <i class="fa-solid fa-mug-hot"></i> Medium
            </button>
        </div>
        <div class="col">
            <button type="button" class="menu-btn" onclick="updateRating('Large')">
                <i class="fa-solid fa-mug-hot"></i> Large
            </button>
        </div>
    </div>
</div>


<div id="size" style="width: 80%; margin: auto; display:none;  margin-bottom: 10px;">
    <label id="size" for="size"></label>
    <textarea class="form-control mx-auto" name="size" id="RateTextArea" style="width: 100%;"></textarea>
</div>

<script>
    function updateRating(rating) {
        document.getElementById("RateTextArea").value = rating + "";
        // You can customize this value as per your requirement
    }
</script>


<div class="input-group mb-3 d-flex justify-content-center align-items-center mt-4" style="max-width: 200px; margin: auto;">
    <div class="input-group-prepend">
        <button style="background-color: #E48F45; color: #fff; font-size: 14px; border: 1px solid #E48F45; border-radius: 4px; padding: 8px 12px;" class="btn btn-outline-secondary" type="button" id="decreaseQuantity">-</button>
    </div>
    <input type="text" class="form-control text-center" id="quantity" for="quantity" name="quantity"   value="1" readonly style="width: 50px; font-size: 14px; border: 1px solid #E48F45; border-radius: 4px; margin: 0 5px;">
    <div class="input-group-append">
        <button style="background-color: #E48F45; color: #fff; font-size: 14px; border: 1px solid #E48F45; border-radius: 4px; padding: 8px 12px;" class="btn btn-outline-secondary" type="button" id="increaseQuantity">+</button>
    </div>
</div>





            <!-- Modal Footer -->
            <div  class="modal-footer text-center">

            <h5 style="text-align: center; margin-bottom: 5px;">Mode of Payment</h5>
            <div class="d-flex justify-content-center mb-3">
           
    <div class="shortcutbtn mt-2 d-flex justify-content-center align-items-center">  
        <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1" onclick="updatepaymed('Cash on Delivery')">
            <span class="pe-2">
                <i class="bi bi-wallet2"></i>
            </span>
            <span>Cash on Delivery</span>
        </a>
    </div>

    <div class="shortcutbtn mt-2 d-flex justify-content-center align-items-center">  
        <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1" onclick="updatepaymed('Pay Online')">
            <span class="pe-2">
                <i class="bi bi-credit-card-2-front"></i>
            </span>
            <span>Pay Online</span>
        </a>
    </div>
</div>

<div  style="width: 80%; margin: auto; display:none;  margin-bottom: 10px;">
    <label  for="modpay"></label>
    <textarea class="form-control mx-auto" name="modpay" id="modpay" style="width: 100%;"></textarea>
</div>

<script>
    function updatepaymed(rating) {
        document.getElementById("modpay").value = rating + "";
        // You can customize this value as per your requirement
    }
</script>
            
            
<div class="input-group mb-3 d-flex justify-content-center align-items-center" style="max-width: 500px; margin: auto;">
    <input type="text" class="form-control" id="total" name="total" for='total' aria-label="Recipient's username" aria-describedby="button-addon2">
    <div class="input-group-append">
        <span class="input-group-text">$</span>
    </div>
</div>



   


            <button id="addtocart" style="background-color: #E48F45; color: #fff;"  type="button" class="btn  btn-sm m-1">
            <i class="fas fa-shopping-cart"></i> Add to Order</button>
            <button id="ordernow" style="background-color: #E48F45; color: #fff;"    type="button" class="btn  btn-sm m-1">
            <i class="fas fa-shopping-bag"></i> Order Now</button>
            </div>

            </form>
            
        </div>
    </div>
</div>


<script>
   $(document).ready(function(){
    $("#ordernow").click(function(){
        var fullName = $("input[name='fullName']").val();
        var dateplace = $("input[name='dateplace']").val();
        var homeAddress = $("input[name='homeAddress']").val();
        var phone = $("input[name='phone']").val();
        var email = $("input[name='email']").val();
        var modpay = $("textarea[name='modpay']").val(); // Update textarea id
        var prodname = $("#prodname").val(); // Fix typo and use correct selector
        var size = $("textarea[name='size']").val(); // Update textarea id
        var quantity = $("input[name='quantity']").val();
        var total = $("input[name='total']").val();

        $.post("inserttdbs.php",
        {
            fullName: fullName,
            dateplace: dateplace,
            homeAddress: homeAddress,
            phone: phone,
            email: email,
            modpay: modpay,
            prodname: prodname,
            size: size,
            quantity: quantity,
            total: total
        },
            function(data, status){
                Swal.fire({
                    title: 'Success!',
                    text: 'Ordered successfully',
                    icon: 'success',
                    confirmButtonText: 'Okay',
                });
                // Apply custom class for light theme
                $(".swal2-popup").addClass('light-theme');
            });
        });
    });
</script>



<script>
   $(document).ready(function(){
    $("#addtocart").click(function(){

        var fileNameContainer = $("input[name='fileNameContainer']").val();
        var fullName = $("input[name='fullName']").val();
        var fullName = $("input[name='fullName']").val();
        var dateplace = $("input[name='dateplace']").val();
        var homeAddress = $("input[name='homeAddress']").val();
        var phone = $("input[name='phone']").val();
        var email = $("input[name='email']").val();
        var modpay = $("textarea[name='modpay']").val(); // Update textarea id
        var prodname = $("#prodname").val(); // Fix typo and use correct selector
        var size = $("textarea[name='size']").val(); // Update textarea id
        var quantity = $("input[name='quantity']").val();
        var total = $("input[name='total']").val();

        $.post("testing.php",
        {
            fileNameContainer: fileNameContainer,
            fullName: fullName,
            dateplace: dateplace,
            homeAddress: homeAddress,
            phone: phone,
            email: email,
            modpay: modpay,
            prodname: prodname,
            size: size,
            quantity: quantity,
            total: total
        },
            function(data, status){
                Swal.fire({
                    title: 'Success!',
                    text: 'Items Added to your Cart',
                    icon: 'success',
                    confirmButtonText: 'Okay',
                });
                // Apply custom class for light theme
                $(".swal2-popup").addClass('light-theme');
            });
        });
    });
</script>





















<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 

    
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Use jQuery to handle the click event for the Buy Now buttons
        $(document).on('click', '.buy-now-btn', function() {
            // Get the MenuID from the clicked button
            var menuID = $(this).data('id');

            // AJAX request to fetch data for the selected item
            $.ajax({
                type: 'POST',
                url: 'fetch_item_data.php',
                data: { menuID: menuID },
                dataType: 'json',
                success: function(data) {
                    // Update the fetchedPrice and call updateTotal
                    var fetchedPrice = data.Price;
                    var quantity = 1;

                    // Initialize total value
                    updateTotal(fetchedPrice, quantity);

                    // Click event for the amount button
                    $('#button-addon2').on('click', function () {
                        // Set the value of the input field to the fetched price
                        updateTotal(fetchedPrice, quantity);
                    });

                    // Click event for increasing quantity
                    $('#increaseQuantity').on('click', function () {
                        quantity++;
                        updateTotal(fetchedPrice, quantity);
                    });

                    // Click event for decreasing quantity
                    $('#decreaseQuantity').on('click', function () {
                        if (quantity > 1) {
                            quantity--;
                            updateTotal(fetchedPrice, quantity);
                        }
                    });

                    function updateTotal(price, qty) {
                        var total = price * qty;
                        $('#total').val(total.toFixed(2));
                        $('#quantity').val(qty);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>







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
                        <h5 class="mb-0">Menu Cart  <i class="fas fa-shopping-cart"></i></i></h5>
                    </div>
                    <div class="table-responsive">
                    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beantocup";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
$loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

// Check if both CostumerID and username are present
if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
    // Fetch user details from the database using CostumerID
    $query = "SELECT Name, Email, Phone, HomeAddress FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
    $result = mysqli_query($conn, $query);

    // Check if there is a matching user
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $userData = mysqli_fetch_assoc($result);
    
        // Fetch data from the addtocarttbl table for a specific CostumerName
        $desiredCustomerName = $userData['Name'];
        $sql = "SELECT * FROM addtocarttbl WHERE CostumerName = '$desiredCustomerName'";
        $result = $conn->query($sql);
    
        $totalAmount = 0; // Initialize total amount variable
    
        if ($result->num_rows > 0) {
            echo '<table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>Order Image</th>
                            <th>Order-ID</th>
                            <th>Items Ordered</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>'; // added tbody for better structure
    
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                        <td><img style="border-radius: 10px;" src="uploads/' . $row["Orderimage"] . '" alt="Item Image" width="100"></td>
                        <td>' . $row["orderid"] . '</td>
                        <td>' . $row["ItemsOrdered"] . '</td>
                        <td>' . $row["Size"] . '</td>
                        <td>' . $row["QTY"] . '</td>
                        <td>' . $row["Amount"] . '</td>
                    </tr>';
    
                // Accumulate the amount for total calculation
                $totalAmount += $row["Amount"];
            }
    
            echo '</tbody></table>';
        } else {
            echo "0 results";
        }
    
        // Display the total amount outside the table with padding and centering
        echo '<div style="padding: 20px; text-align: center;">Total Amount: $' . $totalAmount . '</div>';
    } else {
        // No matching user found based on CostumerID
        echo "Error fetching user details.";
    }
    
} else {
    // CostumerID or username missing, redirect to login
    header("Location: login.php");
    exit();
}
// Inside the loop that outputs the table rows


// Close the database connection
mysqli_close($conn);
?>
 

     
                    </table>



                    </div>
                    <div class="card-footer border-0 py-3 d-flex justify-content-center flex-wrap">
                    <button style="background-color: #E48F45; color: #fff;"  type="button" class="btn btn btn-sm m-1" data-toggle="modal" data-target="#placeorder">
    <i class="bi bi-plus"></i> Place Order
</button>

<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal"  data-target="#editorderdetails">
    <i class="bi bi-pencil"></i> Edit
</button>
<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal"  data-target="#cosdeletorder">
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




                <!--Costume place ortdern-->



    <div class="modal fade" id="placeorder">
        <div id="addordersize" class="modal-dialog">
            <div  class="modal-content">

                <!-- Modal Header -->
                <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Confirm Order</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
             
                <form action="Costumerdash.php"  method="post">

                <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beantocup";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
$loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

// Check if both CostumerID and username are present
if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
    // Fetch user details from the database using CostumerID
    $query = "SELECT Name, Email, Phone, HomeAddress FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
    $result = mysqli_query($conn, $query);

    // Check if there is a matching user
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $userData = mysqli_fetch_assoc($result);

        // Fetch data from the addtocarttbl table for a specific CostumerName
        $desiredCustomerName = $userData['Name'];
        $sql = "SELECT * FROM addtocarttbl WHERE CostumerName = '$desiredCustomerName'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display the order details table
            echo '<table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>Order Image</th>
                            <th>Order-ID</th>
                            <th>Items Ordered</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>'; // added tbody for better structure

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                        <td><img style="border-radius: 10px;" src="uploads/' . $row["Orderimage"] . '" alt="Item Image" width="100"></td>
                        <td>' . $row["orderid"] . '</td>
                        <td>' . $row["ItemsOrdered"] . '</td>
                        <td>' . $row["Size"] . '</td>
                        <td>' . $row["QTY"] . '</td>
                        <td>' . $row["Amount"] . '</td>
                    </tr>';
            }

            echo '</tbody></table>';

            // Initialize arrays to store individual data
            $itemsOrdered = [];
            $sizes = [];
            $qtys = [];
            $amounts = [];
            $totalAmount = 0;

            // Output data of each row
            $result->data_seek(0); // Reset the result set pointer
            while ($row = $result->fetch_assoc()) {
                // Collect data in arrays
                $itemsOrdered[] = '(' . $row["ItemsOrdered"] . ')';
                $sizes[] = '(' . $row["Size"] . ')';
                $qtys[] = '(' . $row["QTY"] . ')';
                $amounts[] = $row["Amount"];

                // Add amount to the total
                $totalAmount += $row["Amount"];
            }

            // Display data in input fields with labels and CSS styles
            echo '<div style="display: none; justify-content: space-between; align-items: flex-start; margin-left: 20px;">
                    <div style=" padding: 10px; width: 300px; text-align: left;">

                        <div style="margin-bottom: 10px; width: 100%;">
                            <label id="placeitemsordered" for="placeitemsordered"   style="display: block;">Items Ordered:</label>
                            <input type="text" name="placeitemsordered" value="' . implode(',', $itemsOrdered) . '" style="width: 100%; box-sizing: border-box; border: 1px solid #ccc; padding: 5px;">
                        </div>

                        <div style="margin-bottom: 10px; width: 100%;">
                            <label id="placesize" for="placesize" style="display: block;">Size:</label>
                            <input type="text" name="placesize" value="' . implode(',', $sizes) . '" style="width: 100%; box-sizing: border-box; border: 1px solid #ccc; padding: 5px;">
                        </div>

                        <div style="margin-bottom: 10px; width: 100%;">
                            <label id="placeqty" for="placeqty" style="display: block;">Quantity:</label>
                            <input type="text" name="placeqty" value="' . implode(',', $qtys) . '" style="width: 100%; box-sizing: border-box; border: 1px solid #ccc; padding: 5px;">
                        </div>

                        <div style="margin-bottom: 10px; width: 100%;">
                            <label id="placetotalamount" for="placetotalamount" style="display: block;">Total Amount:</label>
                            <input type="text" name="placetotalamount" value="' . $totalAmount . '" style="width: 100%; box-sizing: border-box; border: 1px solid #ccc; padding: 5px;">
                        </div>

                    </div>
                </div>';
        } else {
            echo "0 results";
        }
    } else {
        // No matching user found based on CostumerID
        echo "Error fetching user details.";
    }
} else {
    // CostumerID or username missing, redirect to login
    header("Location: login.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>

                <!--shifment information-->


<?php
// Include your database connection file
require_once('connection.php');
$conn = new mysqli($servername, $username, $password, $dbname);

// Retrieve user information from URL parameters
$loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
$loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

// Check if both CostumerID and username are present
if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
    // Fetch user details from the database using CostumerID
    $query = "SELECT Name, Email, Phone, HomeAddress FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
    $result = mysqli_query($conn, $query);

    // Check if there is a matching user
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $userData = mysqli_fetch_assoc($result);

        echo '<div style="display: none;" id="customerDetails">';
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-md-17">';
        echo '<h2 class="mt-7 text-center" id="FAQ">Order Information</h2>';
        echo "<div class='container mt-2'>";
        echo "<div class='mb-3'>";
        echo "<label id='PlacefullName'  for='PlacefullName'><i class='fas fa-user'></i> Full Name</label>";
        echo "<input type='text' name='PlacefullName' value='{$userData['Name']}' class='form-control'  style='background-color: #fff;'>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label id='Placeemail' for='Placeemail'><i class='fas fa-envelope'></i> Email</label>";
        echo "<input type='text' name='Placeemail' value='{$userData['Email']}' class='form-control'  style='background-color: #fff;'>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label id='Placephone'  for='Placephone'><i class='fas fa-phone'></i> Phone</label>";
        echo "<input type='text' name='Placephone' value='{$userData['Phone']}' class='form-control' style='background-color: #fff;'>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label id='PlacehomeAddress' for='PlacehomeAddress'><i class='fas fa-home'></i> Home Address</label>";
        echo "<input type='text' name='PlacehomeAddress' value='{$userData['HomeAddress']}' class='form-control' style='background-color: #fff;'>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
        echo "<script src='https://code.jquery.com/jquery-3.6.4.min.js'></script>";
echo "<script>";
echo "
function hideInputFields() {
    $('#customerDetails').hide();
}
";
echo "</script>";
        
    } else {
        // No matching user found
        echo "Error fetching user details.";
    }
} else {
    // CostumerID or username missing, redirect to login
    header("Location: login.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>

                <!-- date place -->

<div style="display: flex; flex-direction: column; align-items: center;" class="form-group mb-3 mt-3">
    <label id="Placedateplace" for="Placedateplace">Date Ordered</label>
    <div style="position: relative; width: 90%;">
        <input style="width: calc(100% - 30px);  margin: 0 auto;" type="date" name="Placedateplace" class="form-control" required>
    </div>
</div>


                <!-- Mode of paymeny -->


<h5 style="text-align: center; margin-bottom: 5px;">Mode of Payment</h5>
            <div class="d-flex justify-content-center mb-3">
           
    <div class="shortcutbtn mt-2 d-flex justify-content-center align-items-center">  
        <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1" onclick="updatePlacepaymed('Cash on Delivery')">
            <span class="pe-2">
                <i class="bi bi-wallet2"></i>
            </span>
            <span>Cash on Delivery</span>
        </a>
    </div>

    <div class="shortcutbtn mt-2 d-flex justify-content-center align-items-center">  
        <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1" onclick="updatePlacepaymed('Pay Online')">
            <span class="pe-2">
                <i class="bi bi-credit-card-2-front"></i>
            </span>
            <span>Pay Online</span>
        </a>
    </div>
</div>

<div  style="width: 80%; margin: auto; display:none;  margin-bottom: 10px;">
    <label  for="Placemodpay"></label>
    <textarea class="form-control mx-auto" name="Placemodpay" id="Placemodpay" style="width: 100%;"></textarea>
</div>

<script>
    function updatePlacepaymed(rating) {
        document.getElementById("Placemodpay").value = rating + "";
        // You can customize this value as per your requirement
    }
</script>
            




             

<div class="modal-footer">
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn" data-dismiss="modal">Close</button>
                    <button style="background-color: #E48F45; color: #fff;" id="placeorder" type="submit" class="btn btn">Place Order</button>

                </div>
                </form>
                </div>
            </div>
        </div>
    </div>




  
    <script>
    $(document).ready(function(){
        $("form").submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();

            var PlacefullName = $("input[name='PlacefullName']").val();
            var Placedateplace = $("input[name='Placedateplace']").val();
            var PlacehomeAddress = $("input[name='PlacehomeAddress']").val();
            var Placephone = $("input[name='Placephone']").val();
            var Placeemail = $("input[name='Placeemail']").val();
            var Placemodpay = $("textarea[name='Placemodpay']").val();
            var placeitemsordered = $("input[name='placeitemsordered']").val();
            var placesize = $("input[name='placesize']").val();
            var placeqty = $("input[name='placeqty']").val();
            var placetotalamount = $("input[name='placetotalamount']").val();

            $.post("inserttdbs.php", {
                PlacefullName: PlacefullName,
                Placedateplace: Placedateplace,
                PlacehomeAddress: PlacehomeAddress,
                Placephone: Placephone,
                Placeemail: Placeemail,
                Placemodpay: Placemodpay,
                placeitemsordered: placeitemsordered,
                placesize: placesize,
                placeqty: placeqty,
                placetotalamount: placetotalamount
            }, function(data, status){
                Swal.fire({
                    title: 'Success!',
                    text: 'Ordered successfully',
                    icon: 'success',
                    confirmButtonText: 'Okay',
                });
                // Apply custom class for light theme
                $(".swal2-popup").addClass('light-theme');
            });
        });
    });
</script>




































    <div class="modal fade" id="editorderdetails">
        <div id="addordersize" class="modal-dialog">
            <div  class="modal-content">

                <!-- Modal Header -->
                <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Edit Menu Cart Order Shipping Details</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                <form id="updateForm" action="Costumerdash.php"  method="post">
              
            
                        <div class="container">
        <div class="row">
            <div class="col-md-6">
            <label for="cosuporderID">Search Order-ID</label>
            <select name="cosuporderID" id="cosuporderID" class="form-control" required>
    <option value="" disabled selected>Select Order ID</option>
    
    <?php
    // Modified PHP code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beantocup";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
    $loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

    // Check if both CostumerID and username are present
    if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
        // Fetch user details from the database using CostumerID
        $query = "SELECT Name, Email, Phone, HomeAddress FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
        $result = mysqli_query($conn, $query);

        // Check if there is a matching user
        if (mysqli_num_rows($result) > 0) {
            // Fetch the user data
            $userData = mysqli_fetch_assoc($result);

            // Fetch data from the addtocarttbl table for a specific CostumerName
            $desiredCustomerName = $userData['Name'];
            $sql = "SELECT orderid FROM addtocarttbl WHERE CostumerName = '$desiredCustomerName'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["orderid"] . '">' . $row["orderid"] . '</option>';
                }
            } else {
                echo "0 results";
            }
        } else {
            // No matching user found based on CostumerID
            echo "Error fetching user details.";
        }
    } else {
        // CostumerID or username missing, redirect to login
        header("Location: login.php");
        exit();
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</select>
                
                        <div class="form-group">
  <label id="cosupaddorcostumerName" for="cosupaddorcostumerName">Update Costumer Name</label>
  <input  class="form-control" type="text"  name="cosupaddorcostumerName">
</div>
                <div class="form-group">
                    <label id="cosupaddorDateOrdered" for="cosupaddorDateOrdered">Update Date Ordered</label>
                    <input type="date" name="cosupaddorDateOrdered" class="form-control" required>
                </div>
                 <div class="form-group">
                    <label id="cosupaddorShippingAddress" for="cosupaddorShippingAddress">Update Shipping Address</label>
                    <input name="cosupaddorShippingAddress" type="text" class="form-control" required>
                </div>

             
            </div>
            <div class="col-md-6">
               
            <div class="form-group">
    <label id="cosupaddorPAymentmethod" for="cosupaddorPAymentmethod">Update Payment Method</label>
    <select name="cosupaddorPAymentmethod" class="form-control" required>
        <option value="Cash on Delivery">Cash on Delivery</option>
        <option value="Pay Online">Pay Online</option>
        <!-- Add more options as needed -->
    </select>
</div>

<div class="form-group">
                    <label id="cosupaddorContactNumber" for="cosupaddorContactNumber">Update Contact Number</label>
                    <input name="cosupaddorContactNumber" type="text" class="form-control" required>
                </div>

                <div class="form-group">
                    <label id="cosupaddorEmailAddress" for="cosupaddorEmailAddress">Update Email</label>
                    <input name="cosupaddorEmailAddress" type="text" class="form-control" required>
                </div>


               


            </div>
        </div>
    </div>
 
    
</form>
</div>
<div class="modal-footer">
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn" data-dismiss="modal">Close</button>
                    <button style="background-color: #E48F45; color: #fff;" id="orderUpdate" type="button" class="btn btn">Update Details</button>
                </div>

            </div>
        </div>
    </div>




    <script>
  $(document).ready(function() {
    $("#orderUpdate").click(function() {
            var cosuporderID = $("#cosuporderID").val();
            var cosupaddorcostumerName = $("input[name='cosupaddorcostumerName']").val();
            var cosupaddorDateOrdered = $("input[name='cosupaddorDateOrdered']").val();
            var cosupaddorShippingAddress = $("input[name='cosupaddorShippingAddress']").val();
            var cosupaddorContactNumber = $("input[name='cosupaddorContactNumber']").val();
            var cosupaddorEmailAddress = $("input[name='cosupaddorEmailAddress']").val();
            var cosupaddorPAymentmethod = $("select[name='cosupaddorPAymentmethod']").val();
           



      $.post(
        "update.php", // Replace with the actual file name for update
        {
            cosuporderID: cosuporderID,
            cosupaddorcostumerName: cosupaddorcostumerName,
            cosupaddorDateOrdered: cosupaddorDateOrdered,
            cosupaddorShippingAddress: cosupaddorShippingAddress,
            cosupaddorContactNumber: cosupaddorContactNumber,
            cosupaddorEmailAddress: cosupaddorEmailAddress,
            cosupaddorPAymentmethod: cosupaddorPAymentmethod,
                
        },
        function(data, status) {
          if (status === 'success') {
            Swal.fire({
              title: 'Order Updated Successfully!',
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




<div class="modal fade" id="cosdeletorder">
    <div class="modal-dialog">
        <div class="modal-content">

        <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Delete Order Details</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


            <div class="modal-body">
            <form id="deleteOrderForm" action="trackdelete.php" method="post">
                    <div class="form-group">
                        <label for="cosdelorID">Delete Selected Order</label>
                        <select name="cosdelorID" id="cosdelorID" class="form-control" required>
                            <option value="" disabled selected>Select an Items ID</option>
                            <?php
    // Modified PHP code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beantocup";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $loggedInCostumerID = isset($_GET['CostumerID']) ? $_GET['CostumerID'] : null;
    $loggedInUsername = isset($_GET['username']) ? $_GET['username'] : null;

    // Check if both CostumerID and username are present
    if ($loggedInCostumerID !== null && $loggedInUsername !== null) {
        // Fetch user details from the database using CostumerID
        $query = "SELECT Name, Email, Phone, HomeAddress FROM costumers WHERE CostumerID = '$loggedInCostumerID'";
        $result = mysqli_query($conn, $query);

        // Check if there is a matching user
        if (mysqli_num_rows($result) > 0) {
            // Fetch the user data
            $userData = mysqli_fetch_assoc($result);

            // Fetch data from the addtocarttbl table for a specific CostumerName
            $desiredCustomerName = $userData['Name'];
            $sql = "SELECT orderid FROM addtocarttbl WHERE CostumerName = '$desiredCustomerName'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["orderid"] . '">' . $row["orderid"] . '</option>';
                }
            } else {
                echo "0 results";
            }
        } else {
            // No matching user found based on CostumerID
            echo "Error fetching user details.";
        }
    } else {
        // CostumerID or username missing, redirect to login
        header("Location: login.php");
        exit();
    }

    // Close the database connection
    mysqli_close($conn);
    ?>



                        </select>
                    </div>

                    <div class="modal-footer">
                        <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn" data-dismiss="modal">Close</button>
                        <button style="background-color: #E48F45; color: #fff;" id="cosorderDelete" type="submit" class="btn btn">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
   $(document).ready(function() {
    $('#deleteOrderForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'trackdelete.php',
            data: formData,
            dataType: 'json',
            success: function(response) {
                showAlert(response.type, response.message);
            },
            error: function() {
                showAlert('error', 'Something went wrong. Please try again.');
            }
        });
    });

    function showAlert(type, message) {
        var options = {
            title: type.charAt(0).toUpperCase() + type.slice(1),
            text: message,
            icon: type,
            confirmButtonText: 'OK',
            customClass: {
                background: 'bg-light',
                popup: 'swal2-popup-light',
                title: 'text-success', // Change the color of the "Success" text to green
                content: 'text-success',
            },
        };

        // Add success-specific customization
        if (type === 'success') {
            options.customClass.icon = 'icon-success'; // Add your custom class for the success icon
        }

        Swal.fire(options);
    }
});

</script>

















<!-- ... Admintbl ... ---------------------------------------------------------------------------------------------------------------->




                <div  id="Admin-table" class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">How To Order</h5>
 </div>
<div class="table-responsive">

<div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="Images/front.svg" class="img-fluid mb-5">
    
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
<style>
    .modal {
        animation: bounceIn 0.5s;
    }

    @keyframes bounceIn {
        from { transform: scale(0.5); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
</style>









<!-- jQuery (CDN) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="cosyumerdash.js"></script>
</body>
</html>
