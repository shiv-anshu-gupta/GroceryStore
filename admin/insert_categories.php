<?php
  include('../includes/connect.php');

  if(isset($_POST['insert_cat'])){
      $category_title = $_POST['cat_title'];

      //select data from the database
      $select_query="SELECT * FROM `categories` WHERE category_title='$category_title'" ;
      $result_select = mysqli_query($con, $select_query);
      $number = mysqli_num_rows($result_select);
      if($number>0){
        echo "already exist!";
      }else{
      $INSERT_QUERY="INSERT INTO `categories` (category_title) VALUES ('$category_title')";
      $result = mysqli_query($con, $INSERT_QUERY);

      if($result){
        echo "query runs successfully";
      }
    }
  }
?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" aria-label="Categories" aria-describedby="basic-addon1" placeholder="insert categories" name="cat_title">
</div>
<div class="input-group w-10 mb-2 m-auto">
<input type="submit" class="bg-info border-0 p-2 my-3"  name="insert_cat" value="insert_categories">

</div>
</form>