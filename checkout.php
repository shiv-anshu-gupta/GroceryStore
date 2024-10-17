<?php
session_start(); // Start the session to use session variables
include('includes/connect.php'); // Include your database connection
include('./functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Home Page</title>
    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
</head>
<body>
<section id="main-page">
        <nav class="navbar">
            <div class="logo"><a href="index.php" style="text-decoration: none;">SHIVANSHU</a></div>
            <div class="search">
            <form action="search_product.php" method="get">
                <input type="search" placeholder="Search Products for You" class="w-50" name="search_data" />
                <input type="submit" value="search" class="btn btn-outline-dark" name="search_data_product">
              </form>
            </div>
            <div class="cart"><a href="cart.php" style="text-decoration: none;">🛒</a></div>
            <div class="about"><button>About Us</button></div>
            <div class="login"><button id="btn1" value="login">Login</button></div>
        </nav>

        <div class="row px-1">
            <div class="col-md-12">
                <div class="row">
                    <?php
                        if(!isset($_SESSION['username'])){
                            include('users_area/user_login.php'); // Corrected path to login form
                        } else {
                            include('payment.php'); // Display payment if logged in
                        }
                    ?>
                </div>
            </div>
        </div>
        
</section>
<footer>Copyright @ 2024</footer>
</body>
</html>
