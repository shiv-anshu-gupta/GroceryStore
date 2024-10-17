<?php
  include('../includes/connect.php');
  if(isset($_POST['insert_brands'])){
      $brand_title = $_POST['brand_title'];

      //select data from the database
      $select_query="SELECT * FROM `brands` WHERE brand_title='$brand_title'" ;
      $result_select = mysqli_query($con, $select_query);
      $number = mysqli_num_rows($result_select);
      if($number>0){
        echo "<script>alert('this brand is present inside the database!')</script>";
      }else{
      $INSERT_QUERY="INSERT INTO `brands` (brand_title) VALUES ('$brand_title')";
      $result = mysqli_query($con, $INSERT_QUERY);

      if($result){
        echo "query runs successfully";
      }
    }
  }
?>

<form action="" method="post" class="mb-2">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" aria-label="brands" aria-describedby="basic-addon1" placeholder="insert brands" name="brand_title">
</div>
<div class="input-group w-10 mb-2 m-auto">

<input type="submit" class="bg-info p-2 m-3 border-0" name="insert_brands" value="Insert Brands">Insert Brands</input>
</div>
</form>