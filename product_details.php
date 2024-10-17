<?php
session_start(); // Start the session
include('includes/connect.php');
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
</head>
<body>

    <section id="main-page">
        <nav class="navbar">
            <div class="logo">SHIVANSHU</div>

            <!-- Search Bar -->
            <div class="search">
                <form action="search_product.php" method="get">
                    <input type="search" placeholder="Search Products for You" class="w-50" name="search_data" />
                    <input type="submit" value="search" class="btn btn-outline-dark" name="search_data_product">
                </form>
            </div>

            <!-- Cart Button: Redirect to login if not logged in -->
            <div class="cart">
                <a href="<?php echo isset($_SESSION['username']) ? 'cart.php' : 'users_area/user_login.php'; ?>" style="text-decoration: none;">
                    Add to 🛒
                </a>
            </div>

            <!-- About Us Button -->
            <div class="about">
                <button>About Us</button>
            </div>

            <!-- Dynamic Login/Logout Button -->
            <div class="login">
                <?php if (isset($_SESSION['username'])): ?>
                    <!-- Logout Button -->
                    <form method="post">
                        <button type="submit" name="logout" class="btn btn-outline-dark">Logout</button>
                    </form>
                <?php else: ?>
                    <!-- Login Button -->
                    <a href="users_area/user_login.php" class="btn btn-outline-dark">Login</a>
                <?php endif; ?>
            </div>
        </nav>

        <!-- PHP Script for Logout -->
        <?php
            if (isset($_POST['logout'])) {
                session_unset(); // Unset session variables
                session_destroy(); // Destroy the session
                echo "<script>window.open('index.php', '_self');</script>"; // Redirect to home page
            }
        ?>

        <main id="main">
            <section id="left">
                <!-- Fetching Products -->
                <?php
                    view_details();       
                    get_unique_categories();
                ?>
            </section>

            <section class="right">
                <h2>Categories</h2>
                <ul>
                    <?php
                        getCategories();
                    ?>
                </ul>
            </section>
        </main>

        <!-- Login Form Popup (if needed) -->
        <div class="form hidden">
            <button id="closeBtn">&times;</button>
            <form action="users_area/user_login.php" method="post">
                <label for="Username">Enter your Username</label>
                <input type="text" name="user_username" required="required" id="Username">
                <br>
                <label for="pass">Enter your Password</label>
                <input type="password" name="user_password" required="required" id="pass">
                <br>
                <input type="submit" value="Login">
                <br>
            </form>
            <a href="users_area/register.php">Not registered? Click here!</a>
        </div>
    </section>

    <footer>Copyright @ 2024</footer>
    <script src="index.js"></script>
</body>
</html>
