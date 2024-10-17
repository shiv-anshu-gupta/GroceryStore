<?php
    include('../includes/connect.php');

    // Function to get the user's IP address
    function getIPAddress() {  
        // Whether IP is from the shared internet  
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  
            $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
        // Whether IP is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
        // Whether IP is from the remote address  
        else {  
            $ip = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ip;  
    }

    if (isset($_POST['user_register'])) {
        $user_username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $conf_user_password = $_POST['conf_user_password'];
        $user_address = $_POST['user_address'];
        $user_contact = $_POST['user_contact'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];

        // Getting the user's IP address
        $user_ip = getIPAddress();

        // Check if passwords match
        if ($user_password !== $conf_user_password) {
            echo "<script>alert('Passwords do not match')</script>";
        } else {
            // Move the uploaded image to the user_image folder
           

            // SQL INSERT QUERY
            $insert_query = "INSERT INTO `user_table` 
            (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) 
            VALUES('$user_username', '$user_email', '$user_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";

            $sql_execute = mysqli_query($con, $insert_query);
            if ($sql_execute) {
                echo "<script>alert('Data inserted successfully')</script>";
            } else {
                die(mysqli_error($con));
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center mb-4">New User Registration</h2>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="user_username" class="form-label">Username</label>
                                <input type="text" id="user_username" class="form-control" placeholder="Enter your name" required name="user_username">
                            </div>
                            <div class="form-group mb-3">
                                <label for="user_email" class="form-label">Email</label>
                                <input type="email" id="user_email" class="form-control" placeholder="Enter your email" required name="user_email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="user_image" class="form-label">User Image</label>
                                <input type="file" id="user_image" class="form-control" required name="user_image">
                            </div>
                            <div class="form-group mb-3">
                                <label for="user_password" class="form-label">Password</label>
                                <input type="password" id="user_password" class="form-control" placeholder="Enter your password" required name="user_password">
                            </div>
                            <div class="form-group mb-3">
                                <label for="conf_user_password" class="form-label">Confirm Password</label>
                                <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm password" required name="conf_user_password">
                            </div>
                            <div class="form-group mb-3">
                                <label for="user_address" class="form-label">Address</label>
                                <input type="text" id="user_address" class="form-control" placeholder="Enter your address" required name="user_address">
                            </div>
                            <div class="form-group mb-3">
                                <label for="user_contact" class="form-label">Contact</label>
                                <input type="text" id="user_contact" class="form-control" placeholder="Enter your contact number" required name="user_contact">
                            </div>
                            <div class="d-grid">
                                <input type="submit" value="Register" class="btn btn-info py-2" name="user_register">
                                <p>Already have an account?<a href="user_login.php">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-6A4G2I5lSy2MKEdZ5b5QdrgKJlFTycLk6n/h5n6j/3lNzjYJQynHqKaPpZXeEauM" crossorigin="anonymous"></script>
</body>
</html>
