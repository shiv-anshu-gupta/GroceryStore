<?php
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
            <div class="logo"><a href="index.php" style="text-decoration: none;">Groceries</a></div>
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
        <!--cart-->
        <?php
            cart();
        ?>
        
</section>
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    global $con;
                    $get_ip_add= getIPAddress();
                    $total_price=0;
                    $cart_query="SELECT * FROM `cart_details` where ip_address='$get_ip_add'";
                    $result = mysqli_query($con, $cart_query);
                    
                    while($row=mysqli_fetch_array($result)){
                        $product_id = $row['product_id'];
                        $select_products = "SELECT * FROM `PRODUCTS` WHERE product_id='$product_id'";
                        $result_products = mysqli_query($con, $select_products);
                        
                        while($row_product_price=mysqli_fetch_array($result_products)){
                            $product_price = $row_product_price['product_price'];
                            $product_title = $row_product_price['product_title'];
                            $product_image1 = $row_product_price['product_image1'];
                            $quantity = $row['quantity'];

                            $total_price += $product_price * $quantity; // Calculate total price

                            // Display cart item
                ?>
            <tr>
                <td><?php echo $product_title ?></td>
                <td><img src="./admin/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                <td><input type="number" name="qty[<?php echo $product_id; ?>]" value="<?php echo $quantity; ?>" class="form-input w-50" min="1"></td>
                <td><?php echo $product_price * $quantity ?>/-</td>
                <td><input type="checkbox" name="remove[<?php echo $product_id; ?>]"></td>
                <td>
                    <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                    <input type="submit" value="Remove" class="bg-danger px-3 py-2 border-0 mx-3" name="remove_cart">
                </td>
            </tr>
    <?php
                        }
                    }
    ?>
            </tbody>
        </table>
        <!--subtotal-->
        <div class="d-flex mb-5">
            <h4 class="px-3">Subtotal: <strong class="txt-info"><?php echo $total_price ?></strong></h4>
            <a href="index.php"><button class="bg-info px-3 py-2 border-0 mx-3">Continue Shopping</button></a>
            <button class="bg-secondary p-3 py-2 border-0 text-light"><a href="checkout.php" class="text-light text-decoration-none">Checkout</a></button>
        </div>
        </form>
    </div>
</div>

<footer>Copyright @ 2024</footer>

<?php
if (isset($_POST['update_cart'])) {
    foreach ($_POST['qty'] as $product_id => $quantity) {
        $update_cart = "UPDATE `cart_details` SET quantity='$quantity' WHERE ip_address='$get_ip_add' AND product_id='$product_id'";
        mysqli_query($con, $update_cart);
    }
    echo "<script>alert('Cart updated successfully!'); window.location.href='cart.php';</script>";
}

if (isset($_POST['remove_cart'])) {
    foreach ($_POST['remove'] as $product_id => $value) {
        $remove_item = "DELETE FROM `cart_details` WHERE ip_address='$get_ip_add' AND product_id='$product_id'";
        mysqli_query($con, $remove_item);
    }
    echo "<script>alert('Item removed successfully!'); window.location.href='cart.php';</script>";
}
?>
</body>
</html>
