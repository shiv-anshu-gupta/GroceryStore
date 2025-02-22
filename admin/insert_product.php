<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_product'])){

        $product_title = $_POST['product_title'];
        $description = $_POST['description'];
        $keywords = $_POST['keywords'];
        $category_id = $_POST['product_categories'];
        $brand_id = $_POST['product_brands'];
        $product_price = $_POST['product_price'];
        $product_status = 'true';
        //accessing images
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];

        //accessing image temp name
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];

        //checking empty condition
        if($product_title=='' or  $description=='' or $category_id=='' or $brand_id=='' or $product_price==''or $product_image1=='' or $product_image2=='' or $product_image3==''){
            echo "<script>alert('please fill all the available fields')</script>";
        }else{
            move_uploaded_file($temp_image1, "./product_images/$product_image1");
            move_uploaded_file($temp_image2, "./product_images/$product_image2");
            move_uploaded_file($temp_image3, "./product_images/$product_image3");

            //insert query
            $insert_products = "insert into `products` (product_title,description,keywords,category_id,product_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title','$description','$keywords','$category_id','$brand_id','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";                
            $result_query = mysqli_query($con, $insert_products);

            if($result_query){
                echo "<script>alert('product inserted successfully!')</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <!--bootstrap css link-->
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body bg-light>
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!--title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title </label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="enter product title" autocomplete="off" required="required">
            </div>
            <!--description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="enter product description" autocomplete="off" required="required">
            </div>
            <!--keywords-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keywords" class="form-label">Product keywords</label>
                <input type="text" name="keywords" id="keywords" class="form-control" placeholder="enter product keywords" autocomplete="off" required="required">
            </div>
            <!--Select Categories-->
                <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="" class="form-select">
                    <option value="">Select a category</option>
                    <?php
                    $select_query="SELECT * FROM `categories`";
                    $result_query = mysqli_query($con, $select_query);
                     while($result_data = mysqli_fetch_assoc($result_query)){
                        echo ("<option value='{$result_data['category_id']}'>{$result_data['category_title']}</option>");
                     }
                    ?>
                </select>
            </div>
            <!--Select Brands-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select a brand</option>
                     <?php
                        $select_query = "SELECT * FROM `brands`";
                        $result_query = mysqli_query($con, $select_query);
                        while($result_data = mysqli_fetch_assoc($result_query)){
                            echo ("<option value='{$result_data['brand_id']}'>{$result_data['brand_title']}</option>");
                        }
                     ?>
                </select>
            </div>
                <!--Image1-->
                <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"
                required="required">
            </div>
                <!--Image2-->
                <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
                <!--Image3-->
                <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>
            <!--product price-->
                <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="enter product price" autocomplete="off" required="required">
            </div>
            <!--submit-->
                <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" id="product_price" class="btn btn-info mb-3 px-3" value="insert products">
            </div>
        </form>
    </div>
</body>
</html>