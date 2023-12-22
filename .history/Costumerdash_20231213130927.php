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

</head>
<!-- bytewebster.com -->
<!-- bytewebster.com -->
<!-- bytewebster.com -->
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
                        <div style="text-align: center;" class="col-12 mb-4 mb-sm-0">
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
                    <table class="table table-hover table-nowrap">
                    <?php

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the admin table
$sql = "SELECT * FROM costumers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table table-hover table-nowrap">
            <tr>
            <thead class="thead-light">
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Home Address</th>
               
                
                </thead>
                </tr>';
              
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr>
               
                <td>' . $row["Name"] . '</td>
                <td>' . $row["Email"] . '</td>
                <td>' . $row["Phone"] . '</td>
                <td>' . $row["HomeAddress"] . '</td>
                
                
                
            </tr>';
    }
    echo '</table>';
} else {
    echo "0 results";
}
$conn->close();
?>            


                    </table>
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
                    <?php

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the admin table
$sql = "SELECT * FROM shopnews";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table table-hover table-nowrap">
            <tr>
            <thead class="thead-light">
                 <th>News-ID</th>
                <th>Header</th>
                <th>Date</th>
                <th>Body</th>
                <th>Image</th>
                </thead>
                </tr>';
              
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr>   
        <td>' . $row["NewsID"] . '</td>
        <td>' . $row["Header"] . '</td>
        <td>' . $row["Date"] . '</td>
        <td>' . $row["Body"] . '</td>
        <td>' . $row["Image"] . '</td>
            </tr>';
    }
    echo '</table>';
} else {
    echo "0 results";
}
$conn->close();
?>            


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

<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" id="refreshButton8">
    <i class="bi bi-arrow-clockwise"></i> Refresh
</button>

<script>
        document.getElementById("refreshButton8").addEventListener("click", function() {
            location.reload();
        });
    </script>
    </div>
    </div>




    <div class="modal fade" id="CreateNEws">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Create News</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                
                <!-- Modal Body -->
                <div class="modal-body">
                <form id="clear" action="inserttdbs.php"  method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label id="newsneader" for="newsneader">Header</label>
        <input name="newsneader" type="text" class="form-control" required>
    </div>
    <div class="form-group">
        <label id="newsdate" for="newsdate">Date</label>
        <input type="date" name="newsdate" class="form-control" required>
    </div>
    <div class="form-group">
    <label id="bodycontent" for="bodycontent">News Content</label>
    <textarea name="bodycontent" class="form-control" required></textarea>
</div>
    <div class="form-group">
        <label id="newsimage" for="newsimage">News Visual</label>
        <input name="newsimage" type="file" class="form-control" required>
    </div>
    <div class="modal-footer">
<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn" data-dismiss="modal">
    <i class="fas fa-times"></i> Close
</button>

<button style="background-color: #E48F45; color: #fff;"  id="SaveNews" type="submit" class="btn btn">
    <i class="fas fa-save"></i> Post
</button>
                </div>
</form>
</div>


            </div>
        </div>
    </div>

    <script type="text/javascript">
   $(function(){
    $('#SaveNews').click(function(e){

        var valid = this.form.checkValidity();

        if(valid){

            var formData = new FormData();
            formData.append('newsneader', $('#newsneader').val());
            formData.append('newsdate', $('#newsdate').val());
            formData.append('bodycontent', $('#bodycontent').val());
            formData.append('newsimage', $('#newsimage')[0].files[0]);
           

            e.preventDefault();    

            $.ajax({
                type: 'POST',
                url: 'inserttdbs.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    swal("Success", data, "success").then((value) => {
                        if (value) {
                            $('#clear')[0].reset(); // Reset the form
                        }
                    });
                },
                error: function(data){
                    swal("Error", "There were errors while saving the data.", "error");
                }
            });

            
        } else {
            // Handle invalid form data here
        }
    });        

});
    </script>



<div class="modal fade" id="editnews">
        <div  class="modal-dialog">
            <div  class="modal-content">

                <!-- Modal Header -->
                <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Update News/Events</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                <form id="updateForm" action="admindash.php"  method="post">
                <label for="NewsID">Search News-ID</label>
                        <select name="NewsID" id="NewsID" class="form-control" required>
                            <option value="" disabled selected>Select News ID</option>
                            <?php
                      

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT NewsID  FROM shopnews";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<option value="'.$row["NewsID"].'">'.$row["NewsID"].'</option>';
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>
                        </select>
            
   
    <div class="form-group">
        <label id="HeaderofNews" for="HeaderofNews">Header</label>
        <input name="HeaderofNews" type="Text" class="form-control" required>
    </div>
    <div class="form-group">
        <label id="DateofNews" for="DateofNews">Date</label>
        <input type="date" name="DateofNews" class="form-control" required>
    </div>
    <div class="form-group">
        <label id="Bodytext" for="Bodytext">Body</label>
        <input type="text" name="Bodytext" class="form-control" required>
    </div>
    
</form>
</div>
<div class="modal-footer">
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn" data-dismiss="modal">Close</button>
                    <button style="background-color: #E48F45; color: #fff;" id="NewsUpdate" type="button" class="btn btn">Save News</button>
                </div>

            </div>
        </div>
    </div>


    <script>
  $(document).ready(function() {
    $("#NewsUpdate").click(function() {
      var NewsID= $("#NewsID").val();
      var HeaderofNews = $("input[name='HeaderofNews']").val();
      var DateofNews = $("input[name='DateofNews']").val();
      var Bodytext = $("input[name='Bodytext']").val();
      $.post(
        "update.php", // Replace with the actual file name for update
        {
            NewsID:  NewsID,
            HeaderofNews:HeaderofNews,
            DateofNews: DateofNews,
            Bodytext: Bodytext
        
        },
        function(data, status) {
          if (status === 'success') {
            Swal.fire({
              title: 'News Updated Successfully!',
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


<div class="modal" id="deletenews">
    <div class="modal-dialog">
        <div class="modal-content">
        <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Delete News/Events</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            <div class="modal-body">
                <form id="PassengerDelete" action="sampledelete.php" method="post">
                    <div class="form-group">
                        <label for="SelectNewsID">Delete Selected Report </label>
                        <select name="SelectNewsID" id="SelectNewsID" class="form-control" required>
                            <option value="" disabled selected>Select an option</option>
                            <?php
                            // Your PHP code for populating the select options
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT NewsID  FROM shopnews";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<option value="'.$row["NewsID"].'">'.$row["NewsID"].'</option>';
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
                        <button style="background-color: #E48F45; color: #fff;" id="newsDelete" type="submit" class="btn btn">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
        $(document).ready(function() {
            $('#newsDelete').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'sampledelete.php', // Make sure this is the correct path to your delete.php file
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

<!-- ...MEnu ... ---------------------------------------------------------------------------------------------------------------->



<div  id="Menu" style="display:none;" class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Menu</h5>
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
        $query = "SELECT MenuID, Name, Price, Body, Image FROM menu";
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
                echo '<div class="card custom-card d-flex flex-row">'; // Add d-flex and flex-row classes
                echo '<img src="uploads/' . $image . '" class="card-img-left" alt="Card Image">'; // Change class to card-img-left
                echo '<div class="card-body">';
                echo '<h5>' . $header . '</h5>';
                echo '<p>MenuID: ' .  $MEnuID . '</p>';
                echo '<p class="card-text"><small class="text-muted">Price: ' . $date . '</small></p>';
                
                // Cut the text if it is longer than 250 characters
                $trimmed_body = strlen($body) > 10 ? substr($body, 0, 10) . '...' : $body;
                echo '<p class="card-text">' . $trimmed_body . ' <a href="#" class="read-more" data-toggle="modal" data-target="#readMoreModal' . $row['MenuID'] . '">Read More</a></p>';
                
                echo '</div>';
                echo '</div>';
                echo '</div>';

                // Modal for full text
                echo '<div class="modal fade" id="readMoreModal' . $row['MenuID'] . '" tabindex="-1" role="dialog" aria-labelledby="readMoreModalLabel' . $row['MenuID'] . '" aria-hidden="true">';
                echo '<div class="modal-dialog read-more-modal" role="document">';
                echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                echo '<h5 class="modal-title" id="readMoreModalLabel' . $row['MenuID'] . '">' . $header . '</h5>';
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
                    <div class="card-footer border-0 py-3 d-flex justify-content-center flex-wrap">
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal" data-target="#Createmenu">
    <i class="bi bi-plus"></i> Add Menu
</button>

<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal"  data-target="#Editmenu">
    <i class="bi bi-pencil"></i> Edit Menu
</button>

<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" data-toggle="modal" data-target="#deletmenu">
    <i class="bi bi-trash"></i> Delete Menu
</button>

<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn btn-sm m-1" id="refreshButton9">
    <i class="bi bi-arrow-clockwise"></i> Refresh
</button>

<script>
        document.getElementById("refreshButton9").addEventListener("click", function() {
            location.reload();
        });
    </script>
    </div>
    </div>


    <div class="modal" id="Createmenu">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Add Menu</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal Body -->
                <div class="modal-body">
                <form id="clear" action="Menuinsert.php"  method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label id="Menuheader" for="Menuheader">Name</label>
        <input name="Menuheader" type="text" class="form-control" required>
    </div>
    <div class="form-group">
        <label id="manuprice" for="manuprice">Price</label>
        <input type="text" name="manuprice" class="form-control" required>
    </div>
    <div class="form-group">
    <label id="menudescription" for="menudescription">Discription</label>
    <textarea name="menudescription" class="form-control" required></textarea>
</div>
    <div class="form-group">
        <label id="menuimage" for="menuimage">Image</label>
        <input name="menuimage" type="file" class="form-control" required>
    </div>
    <div class="modal-footer">
<button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn" data-dismiss="modal">
    <i class="fas fa-times"></i> Close
</button>

<button style="background-color: #E48F45; color: #fff;" id="SaveMenu" type="submit" class="btn btn">
    <i class="fas fa-save"></i> Post
</button>
                </div>
</form>
</div>
 </div>
        </div>
    </div>



    <script src="dashboard.js"></script>
  <script type="text/javascript">
   $(function(){
    $('#SaveMenu').click(function(e){

        var valid = this.form.checkValidity();

        if(valid){

            var formData = new FormData();
            formData.append('Menuheader', $('#Menuheader').val());
            formData.append('manuprice', $('#manuprice').val());
            formData.append('menudescription', $('#menudescription').val());
            formData.append('menuimage', $('#menuimage')[0].files[0]);
           

            e.preventDefault();    

            $.ajax({
                type: 'POST',
                url: 'menuinsert.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    swal("Success", data, "success").then((value) => {
                        if (value) {
                            $('#clear')[0].reset(); // Reset the form
                        }
                    });
                },
                error: function(data){
                    swal("Error", "There were errors while saving the data.", "error");
                }
            });

            
        } else {
            // Handle invalid form data here
        }
    });        

});
    </script>



<div class="modal fade" id="Editmenu">
        <div  class="modal-dialog">
            <div  class="modal-content">

                <!-- Modal Header -->
                <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Edit Menu</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                <form id="updateForm" action="admindash.php"  method="post">
                <label for="MenuID">Search Menu-ID</label>
                        <select name="MenuID" id="MenuID" class="form-control" required>
                            <option value="" disabled selected>Select Menu ID</option>
                            <?php
                      

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT MenuID  FROM menu";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<option value="'.$row["MenuID"].'">'.$row["MenuID"].'</option>';
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>
                        </select>
            
   
    <div class="form-group">
        <label id="MenuName" for="MenuName">Name</label>
        <input name="MenuName" type="Text" class="form-control" required>
    </div>
    <div class="form-group">
        <label id="MenuPrice" for="MenuPrice">Price</label>
        <input type="text" name="MenuPrice" class="form-control" required>
    </div>
    <div class="form-group">
        <label id="BodyMenu" for="BodyMenu">Body</label>
        <input type="text" name="BodyMenu" class="form-control" required>
    </div>
    
</form>
</div>
<div class="modal-footer">
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button style="background-color: #E48F45; color: #fff;" id="MenuUpdate" type="button" class="btn btn-primary">Save Menu</button>
                </div>

            </div>
        </div>
    </div>

    <script>
  $(document).ready(function() {
    $("#MenuUpdate").click(function() {
      var MenuID= $("#MenuID").val();
      var MenuName = $("input[name='MenuName']").val();
      var MenuPrice = $("input[name='MenuPrice']").val();
      var BodyMenu = $("input[name='BodyMenu']").val();
     
     



      $.post(
        "update.php", // Replace with the actual file name for update
        {
            MenuID:  MenuID,
            MenuName:MenuName,
            MenuPrice: MenuPrice,
            BodyMenu: BodyMenu
        
         
        },
        function(data, status) {
          if (status === 'success') {
            Swal.fire({
              title: 'menu Updated Successfully!',
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


<div class="modal" id="deletmenu">
    <div class="modal-dialog">
        <div class="modal-content">
        <div style="background-color: #E48F45;" class="modal-header">
                    <h4 style="color: #fff;" class="modal-title">Delete Menu Details</h4>
                    <button style="background-color: #E48F45; color: #fff;" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            <div class="modal-body">
                <form id="PassengerDelete" action="menudelete.php" method="post">
                    <div class="form-group">
                        <label for="MenuID">Delete Selected Report </label>
                        <select name="MenuID" id="MenuID" class="form-control" required>
                            <option value="" disabled selected>Select an option</option>
                            <?php
                            // Your PHP code for populating the select options
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT MenuID  FROM menu";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<option value="'.$row["MenuID"].'">'.$row["MenuID"].'</option>';
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button style="background-color: #E48F45; color: #fff;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button style="background-color: #E48F45; color: #fff;" id="menuDelete" type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
        $(document).ready(function() {
            $('#menuDelete').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'menudelete.php', // Make sure this is the correct path to your delete.php file
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




<!-- ... ordertbl ... ---------------------------------------------------------------------------------------------------------------->



<div  id="Order" style="display:none;" class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Costumers Order Details</h5>
                    </div>
                    <div class="table-responsive">
                    <?php

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the admin table
$sql = "SELECT * FROM ordertbl";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table table-hover table-nowrap">
            <tr>
            <thead class="thead-light">
                 <th>Order-ID</th>
                <th>Costumer Name</th>
                <th>Date Ordered</th>
                <th>Shipping Address</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Payment Method</th>
                <th>Items Order</th>
                </thead>
                </tr>';
              
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr>   
        <td>' . $row["OrderID "] . '</td>
        <td>' . $row["CostumerName"] . '</td>
        <td>' . $row["DatePlaced"] . '</td>
        <td>' . $row["ShippingAddress"] . '</td>
        <td>' . $row["ContactNumber"] . '</td>
        <td>' . $row["EmailAddress"] . '</td>
        <td>' . $row["PaymentMethod"] . '</td>
        <td>' . $row["ItemsOrdered"] . '</td>
            </tr>';
    }
    echo '</table>';
} else {
    echo "0 results";
}
$conn->close();
?>            


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


<section class="section p-7" id="FAQ">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="Images/FAQ.svg" class="img-fluid mb-5">
        
        </div>
         <div class="col-md-6">
         <h2 class="mt-7 text-center" id="FAQ">FAQ</h2>
         <div class="accordion accordion-flush p-3" id="accordionFlushExample">
          <div class="accordion-item bg-white shadow">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                What is the purpose of the Tricycle Tracking Management System in Barangay 409?
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">The Tricycle Tracking Management System aims to streamline tricycle operations and ensure passenger safety and efficient transportation services within the barangay.</div>
            </div>
          </div>
          <div class="accordion-item shadow">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                How can I register my tricycle in the Tricycle Tracking Management System?
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">To register your tricycle, visit the barangay office and submit the required documents, including the tricycle's registration papers, driver's license, and other necessary permits.</div>
            </div>
          </div>
          <div class="accordion-item shadow">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                What are the benefits of the Tricycle Tracking Management System for tricycle drivers and operators?
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">The system provides improved transparency in fare collection, enhances security measures for both drivers and passengers, and facilitates better route planning, leading to increased efficiency and profitability for tricycle operators.
              </div>
            </div>
          </div>

          <div class="accordion-item shadow">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                How does the Tricycle Tracking Management System ensure passenger safety?
              </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">The system integrates safety measures such as  Report Management, Legal Action Provider, and driver identification features, which enable swift responses to any emergency situations during tricycle rides.</div>
            </div>
          </div>
      
      

        </div>
         </div>
    </div>
  </div>
</section>





                    </div>
                    <div class="card-footer border-0 py-3 d-flex justify-content-center flex-wrap">
                  
                    <button style="border-color: #E48F45; " type="button" class="btn  btn-sm m-1"  onclick="showMenu()" >
                    <i class="bi bi-cup-hot-fill"></i> View Menu
</button>


<button style="border-color: #E48F45;" type="button" class="btn  btn-sm m-1" onclick="showNews()">
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
















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery (CDN) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="cosyumerdash.js"></script>
</body>
</html>
