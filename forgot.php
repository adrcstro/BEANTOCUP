<?php
require_once('connection.php');
?>







<!doctype html>
<html lang="en">
  <head>
  	<title>BEANtoCUP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="x-icon" href="images/webiconss.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-<your-sha-hash>" crossorigin="anonymous" />
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="loginsignup.css">

	</head>
	<body>

	<?php
// Establish connection to MySQL
// Database configuration

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to reset password
// ...

// Function to reset password
// ...

// Function to reset password
// ...

// Function to reset password
function resetPassword($tableName, $username, $newPassword) {
    global $conn;
    $sql = "SELECT * FROM $tableName WHERE Email = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "<script>swal('Error', 'Username not found', 'error');</script>"; // Return false if the username is not found
        return false;
    } else {
        $sql = "UPDATE $tableName SET password = '$newPassword' WHERE Email = '$username'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>swal('Success', 'Password reset successfully', 'success');</script>"; // Return true if the password reset was successful
            return true;
        } else {
            echo "<script>swal('Error', 'Error updating record: " . $conn->error . "', 'error');</script>";
            return false; // Return false if an error occurred during the update
        }
    }
}

// Usage
// ...

if (isset($_POST['reset_password'])) {
    $username = $_POST['username'];
    $newPassword = $_POST['new_password'];
    $confirmNewPassword = $_POST['confirm_new_password'];

    if ($newPassword !== $confirmNewPassword) {
        echo "<script>swal('Error', 'Your password does not match', 'error');</script>";
    } else {
        $tableName1 = "costumers"; // replace with your actual table names
        $success1 = resetPassword($tableName1, $username, $newPassword);
        

        if ($success1) {
            echo "<script>swal('Success', 'Password reset successfully', 'success');</script>";
        } else {
            echo "<script>swal('warning', 'Your Username is not Registered in Our System', 'warning');</script>";
        }
    }
}
// ...
?>












	<section  style="margin-top: -5rem;"  class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(Images/co2.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Forgot Password</h3>
			      		</div>
							
			      	</div>
							<form action="#"  method="post" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input type="text"  name="username" class="form-control" placeholder="Username" required>
			      		</div>
		           
					<div class="form-group mb-3">
		            	<label class="label" for="password">New Password</label>
		              <input type="password"   name="new_password" class="form-control" placeholder="Password" required>
		            </div>
					<div class="form-group mb-3">
		            	<label class="label" for="password">Confirm Password</label>
		              <input type="password"  name="confirm_new_password" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="reset_password" class="form-control btn btn-primary rounded submit px-3">Update Password</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	
		            </div>
                

		          </form>
		          <p style="margin-top: 15px;" class="text-center">Update already? <a data-toggle="tab" href="login.php">log in</a></p>
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

