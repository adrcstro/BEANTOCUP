<!DOCTYPE html>
<html lang="en">
<head>
    <title>BEANtoCUP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="x-icon" href="images/webiconss.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="loginsignup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-<your-sha-hash>" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-......" crossorigin="anonymous">
</head>
<body>
<section style="margin-top: -5rem;" class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(Images/blog9.jpg);"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Create Account</h3>
                            </div>
                           
                        </div>
                        <form action="signup.php" autocomplete="off" method="post" class="signin-form">
                            
                        <div class="form-group mb-3">
                                <label class="label" for="name">Name</label>
                                <input id="Name"  name="Name" autocomplete="off" type="text" class="form-control" placeholder="Name" required>
                            </div>

                            
                            <div class="form-group mb-3">
                                <label class="label" for="name">Email</label>
                                <input id="Email"  name="Email" autocomplete="off" type="text" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="name">Username</label>
                                <input id="Username"  name="Username" autocomplete="off" type="text" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input id="Password"  name="Password" autocomplete="off" type="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button id="Register" type="submit" class="form-control btn btn-primary rounded submit px-3">Sign up</button>
                            </div>
                            <!-- Google Sign-In Button -->
                           
                          


                            <div class="logtext">   
                                <h5 id="textcon">Continue with</h5>
                                <button type="button" class="login-with-google-btn" >
                                Sign in with Google
                                 </button>
                                 </div>
                            
                            
                        </form>
                        <p style="margin-top: 20px;" class="text-center">Not a member? <a data-toggle="tab" href="login.php">Log in</a></p>
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

<!-- Add the Google Sign-In script here -->

</body>
</html>
