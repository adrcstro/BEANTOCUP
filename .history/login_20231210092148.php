
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

<body style="background-image: url(Images/bgsample7.png); background-size: cover; background-repeat: no-repeat;">

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
                            <form action="login.php" method="post" class="signin-form">
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
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                        In</button>
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        // You can add this script to display SweetAlert messages
        <?php




        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "document.addEventListener('DOMContentLoaded', function() {";

            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = "SELECT * FROM costumers WHERE Username = '$username' AND Password = '$password'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "swal('Login Successful!', '', 'success');";
            } else {
                echo "swal('Invalid Username or Password', '', 'error');";
            }

            echo "});";
        }
        ?>
    </script>

</body>

</html>
