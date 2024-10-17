<?php
session_start();
include('includes/connect.php');
include('./functions/common_function.php');// Include your cart functions here

// Call the cart function to handle adding items
cart();
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
    <section id="welcomepage">
        <div id="headingWelcomePage"><h1>WELCOME To Our Shop</h1></div>
        <div id="tagLineWelcomePage">
            <p id="tag-line">अपने स्थानीय किराना स्टोर पर सबसे ताज़ा गुणवत्ता और अद्वितीय कीमतों का अनुभव करें - जहाँ सुविधा समुदाय से मिलती है!</p>
        </div>
        <div class="Scrollarrow"><h1 id="arrow">-></h1></div>
    </section>

    <section id="main-page">
        <nav class="navbar">
            <div class="logo"><a href="index.php" style="text-decoration: none;">Groceries</a></div>
            <div class="search">
                <form action="search_product.php" method="get">
                    <input type="search" placeholder="Search Products for You" class="w-50" name="search_data" />
                    <input type="submit" value="search" class="btn btn-outline-dark" name="search_data_product">
                </form>
            </div>

            <!-- Cart Button -->
            <div class="cart">
                <a href="<?php echo isset($_SESSION['username']) ? 'cart.php' : '#'; ?>" style="text-decoration: none;" onclick="<?php echo !isset($_SESSION['username']) ? 'document.querySelector(\'.overlay\').classList.remove(\'hidden\');' : ''; ?>">
                    🛒
                </a>
            </div>

            <!-- About Us Button -->
            <div class="about"><button>About Us</button></div>

            <!-- Login/Logout Button -->
            <div class="login">
                <?php if (isset($_SESSION['username'])): ?>
                    <form method="post">
                        <button type="submit" name="logout" class="btn btn-outline-dark">Logout</button>
                    </form>
                <?php else: ?>
                    <button id="btn1" class="btn btn-outline-dark">Login</button>
                <?php endif; ?>
            </div>
        </nav>

        <!-- Logout Functionality -->
        <?php
            if (isset($_POST['logout'])) {
                session_unset(); 
                session_destroy(); 
                echo "<script>window.open('index.php', '_self');</script>"; 
            }
        ?>

        <!-- Main Content -->
        <main id="main">
            <section id="left">
                <?php
                    getproducts();
                    get_unique_categories();
                ?>
            </section>

            <section class="right">
                <h2>Categories</h2>
                <ul>
                    <?php getCategories(); ?>
                </ul>
            </section>
        </main>

        <div class="overlay hidden"></div>
        <div class="form hidden">
            <button id="closeBtn" onclick="document.querySelector('.overlay').classList.add('hidden');">&times;</button>
            <?php include("users_area/user_login.php"); ?>
        </div>
    </section>

    <section id="about-page">
        <div id="about-heading"><h1>About Us</h1></div>
        <div id="about-content">
            <div id="left-about"><img id="owner" src="owner.jpg" alt="Owner Image"></div>
            <div id="right-about">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus ipsam facere alias blanditiis dolor quos minus temporibus provident itaque quam.</p>
            </div>
        </div>
    </section>

    <footer>Copyright @ 2024</footer>
    <button id="toTop">🔝</button>
    <script src="index.js"></script>
</body>
</html>
