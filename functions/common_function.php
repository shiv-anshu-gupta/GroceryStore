<?php
    include('./includes/connect.php');

    // Check database connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Getting products
    function getproducts(){
        global $con;

        // Condition to check if category or brand is not set
        if (!isset($_GET['category']) && !isset($_GET['brand'])) {
            $select_query = "Select * from `products` order by rand() limit 0,9";
            $result_query = mysqli_query($con, $select_query);

            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['description'];
                $product_image = $row['product_image1'];
                $product_price = $row['product_price'];
                $category = $row['category_id'];
                $brand = $row['brand_id'];
                echo "<div class='card' style='width: 18rem;'>
                        <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>$product_price</p>
                            <div class='btn-group'>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info insideCardBtn'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary insideCardBtn'>View more</a>
                            </div>
                        </div>
                    </div>";
            }
        }
    }

    

//displaying categories in sidenav
    function getCategories(){
        global $con;
        $select_categories = "SELECT * FROM `categories`";
      $result_categories = mysqli_query($con, $select_categories);

      while ($row_data = mysqli_fetch_assoc($result_categories)) {
        echo "<li><a href='index.php?category={$row_data['category_id']}'>{$row_data['category_title']}</a></li>";
      }
    }

    //gettiing unique categories
    function get_unique_categories(){
       global $con;

        //condition to check isset or not
        if(isset($_GET['category'])){
            $category_id = $_GET['category'];
                $select_query = "Select * from `products` where category_id=$category_id";
    $result_query = mysqli_query($con, $select_query);
    
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['description'];
      $product_image = $row['product_image1'];
      $product_price = $row['product_price'];
      $category = $row['category_id'];
      $brand = $row['brand_id'];
      echo "<div class='card' style='width: 18rem;'>
      <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
        <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>$product_price</p>
          <div class='btn-group'>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-info insideCardBtn'>Add to cart</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary insideCardBtn'>View more</a>
          </div>
        </div>
    </div>";
    }
}            else{
    echo"<h2 style='color:red'>No stock for this category</h2>";
}
            }

        }
        

    // searching products
    function search_product(){
      global $con;
      if(isset($_GET['search_data_product'])){
        $search_data_value = $_GET['search_data'];
    $search_query = "Select * from `products` where keywords like '%$search_data_value%'";
    $result_query = mysqli_query($con, $search_query);
    // $row = mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['description'];
      $product_image = $row['product_image1'];
      $product_price = $row['product_price'];
      $category = $row['category_id'];
      $brand = $row['brand_id'];
      echo "<div class='card' style='width: 18rem;'>
      <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
        <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>$product_price</p>
          <div class='btn-group'>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-info insideCardBtn'>Add to cart</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary insideCardBtn'>View more</a>
          </div>
        </div>
    </div>";
    }
  }else{
    echo"<h2 style='color:red'>No result matched!</h2>";
  }
    }
  }

  //view details function
  function view_details(){
    global $con;

    //condition to check isset or not
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
          $product_id = $_GET['product_id'];
            $select_query = "Select * from `products` where product_id = $product_id";
$result_query = mysqli_query($con, $select_query);
while($row=mysqli_fetch_assoc($result_query)){
  $product_id = $row['product_id'];
  $product_title = $row['product_title'];
  $product_description = $row['description'];
  $product_image1 = $row['product_image1'];
  $product_image2 = $row['product_image2'];
  $product_image3 = $row['product_image3'];
  $product_price = $row['product_price'];
  $category = $row['category_id'];
  $brand = $row['brand_id'];
  echo "<div class='card' style='width: 18rem;'>
  <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>$product_price</p>
      <div class='btn-group'>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info insideCardBtn'>Add to cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary insideCardBtn'>View more</a>
      </div>
    </div>
</div>
<div class='col-md-8'>
<!--related images-->
<div class='row'>
    <div class='col-md-12'>
        <h4 class='text-center text-info mb-5'>Related products</h4>
    </div>
    <div class='col-md-6'>
    <img src='./admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
    </div>
    <div class='col-md-6'>
    <img src='./admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>
    </div>
</div>
</div>"
;
}
}
        }
  }
}
//get ip function
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  

//cart function
function cart(){
  if (isset($_GET['add_to_cart'])) {
      global $con;
      $get_ip_add = getIPAddress();  // Get user IP address
      $get_product_id = $_GET['add_to_cart'];

      // Debugging: Check if add_to_cart is triggered
      echo "<script>alert('Add to Cart Triggered!');</script>";

      // Check if the product is already in the cart
      $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add' AND product_id=$get_product_id";
      $result_query = mysqli_query($con, $select_query);

      if ($result_query) {
          $num_of_rows = mysqli_num_rows($result_query);

          if ($num_of_rows > 0) {
              // If the product is already in the cart, increment the quantity
              $row = mysqli_fetch_assoc($result_query);
              $new_quantity = $row['quantity'] + 1;  // Increment by 1
              $update_query = "UPDATE `cart_details` SET quantity=$new_quantity WHERE ip_address='$get_ip_add' AND product_id=$get_product_id";

              if (mysqli_query($con, $update_query)) {
                  echo "<script>alert('Cart quantity updated');</script>";
                  echo "<script>window.open('index.php', '_self');</script>";
              } else {
                  echo "Error updating cart: " . mysqli_error($con);  // Error handling for SQL query
              }
          } else {
              // If the product is not in the cart, add it with quantity = 1
              $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_add', 1)";

              if (mysqli_query($con, $insert_query)) {
                  echo "<script>alert('This item is added to cart');</script>";
                  echo "<script>window.open('index.php', '_self');</script>";
              } else {
                  echo "Error inserting into cart: " . mysqli_error($con);  // Error handling for SQL query
              }
          }
      } else {
          echo "Error checking cart: " . mysqli_error($con);  // Error handling for SQL query
      }
  }
}

?>