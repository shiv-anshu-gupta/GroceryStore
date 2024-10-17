<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('./includes/connect.php'); // Include your database connection file

if (isset($_POST['login'])) {
    $user_username = mysqli_real_escape_string($con, $_POST['user_username']);
    $user_password = mysqli_real_escape_string($con, $_POST['user_password']);

    // SQL query to select the user data based on username
    $query = "SELECT * FROM `user_table` WHERE username = '$user_username' AND user_password = '$user_password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_email'] = $row['user_email'];

        echo "<script>alert('Login Successful!')</script>";
        echo "<script>window.open('/index.php', '_self')</script>"; // Redirect to user dashboard page
    } else {
        echo "<script>alert('Invalid Username or Password')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/index.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center mb-4">User Login</h2>
                        <form action="" method="post" class="login-form"> 
                            <div class="form-group mb-3"> 
                                <label for="user_username" class="form-label">Enter your Username</label>
                                <input type="text" id="user_username" class="form-control" required="required" name="user_username" autocomplete="username">
                            </div>
                            <div class="form-group mb-3"> 
                                <label for="user_password" class="form-label">Enter your Password</label>
                                <input type="password" id="user_password" class="form-control" required="required" name="user_password" autocomplete="current-password">
                            </div>
                            <div class="d-grid">
                                <input type="submit" value="Login" class="btn btn-info py-2" name="login">
                                <p class="mt-2">Not registered? <a href="users_area/register.php">Click here!</a></p>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-6A4G2I5..." crossorigin="anonymous"></script>
</body>
</html>
