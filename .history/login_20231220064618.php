<?php
session_start();

// Assume $pdo is your database connection
// You should replace the database connection code with your actual implementation

// Function to authenticate user
function authenticateUser($username, $password, $pdo) {
    // Implement your authentication logic here
    // For example, you might use a SQL query to check if the username and password match
    // If the user is authenticated, return user information; otherwise, return false
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if username and password are provided
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Authenticate user
        $userInfo = authenticateUser($username, $password, $pdo);

        if ($userInfo) {
            // Set session variables
            $_SESSION['user'] = $userInfo;

            // Redirect to dashboard
            header("Location: Costumerdash.php");
            exit;
        } else {
            echo "Invalid username or password";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
