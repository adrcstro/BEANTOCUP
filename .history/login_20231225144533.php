
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
                                <div class="w-100">
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

        // Display user details
        echo "<p>hi, $loggedInUsername!</p>";
        echo "<p>Welcome to your dashboard, {$userData['Name']}!</p>";
        echo "<p>CostumerID: $loggedInCostumerID</p>";
        echo "<p>Email: {$userData['Email']}</p>";
        echo "<p>Phone: {$userData['Phone']}</p>";
        echo "<p>Home Address: {$userData['HomeAddress']}</p>";
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
