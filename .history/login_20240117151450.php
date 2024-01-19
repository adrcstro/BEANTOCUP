

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BEANtoCUP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="x-icon" href="images/webiconss.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-<your-sha-hash>" crossorigin="anonymous" />
    <link rel="stylesheet" href="loginsignup.css">
</head>

<body>

    <section style="margin-top: -5rem; margin-bottom: -5rem; " class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(Images/blog6.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div id="loginlogo" class="w-100">
                                    <h3 style="text-align: center;" class="mb-4">Welcome to BEAN2CUP<i
                                            style="margin-left: 10px;" class="fas fa-mug-hot" aria-hidden="true"></i></h3>
                                </div>
                            </div>
                            <form action="" method="post" class="signin-form">

<!-- Add this inside the form -->
<div class="form-group mb-3">
    <label class="label" for="user_type">Login as</label>
    <select class="form-control" name="user_type" required>
        <option value="customer">Customer</option>
        <option value="admin">Admin</option>
    </select>
</div>


                                <div class="form-group mb-3">
                                    <label class="label" for="username">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        required>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                </div>
								<div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="forgot.php">Forgot Password?</a>
									</div>
		            </div>
                
					<div class="logtext">   
						<h5 id="textcon">Continue with</h5>
						<button type="button" class="login-with-google-btn" >
						Sign in with Google
						 </button>
						 </div>
                            </form>
                            <p style="margin-top: 15px;" class="text-center">Not a member? <a data-toggle="tab"
                                    href="signup.php">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>




    
</body>

</html>
<?php
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    // Validate user inputs (add more validation as needed)

    $table_name = "";
    $column_name = "UserID, Username, Password"; // Add the column name you want to fetch here

    if ($usertype == 'admin') {
        $table_name = "admintbl";
    } elseif ($usertype == 'driver') {
        $table_name = "driverstbl";
    } elseif ($usertype == 'passenger') {
        $table_name = "passengertbl";
    }

    $sql = "SELECT $column_name FROM $table_name WHERE username = ? AND password =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $loggedInUserID = $row['UserID'];
        $loggedInUsername = $row['Username'];

        $redirectUrl = '';
        if ($usertype == 'passenger') {
            $loggedInPassengerID = $row['PassengerID']; // Update with the correct column name
            $redirectUrl = "passengerdash.php?username=" . urlencode($loggedInUsername) . "&id=" . $loggedInPassengerID;
        } elseif ($usertype == 'admin') {
            $redirectUrl = "admin.php";
        } elseif ($usertype == 'driver') {
            $loggedInDriverID = $row['DriverID']; // Update with the correct column name
            $redirectUrl = "driverdash.php?username=" . urlencode($loggedInUsername) . "&id=" . $loggedInDriverID;
        }

        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>swal('Login Successful!', '', 'success');</script>";

        // Adjusted redirection URL with user ID and username
        echo "<script>setTimeout(function(){ window.location.href = '$redirectUrl'; }, 2000);</script>";
        exit();
    } else {
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>swal('Invalid Username or Password', '', 'error');</script>";
        echo "<script>setTimeout(function(){ window.location.href = 'login.php'; }, 2000);</script>"; // Redirect to login page after 2 seconds
        exit();
    }
}

$conn->close();
?>
