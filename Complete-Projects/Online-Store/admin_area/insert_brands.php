<?php 
  include('../includes/connect.php');
  if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];

    // select data from database
    $select_query="Select * from `brands` where brand_title='$brand_title'";
    $result_select=mysqli_query($con, $select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
      echo "<script>alert('This brand already exists in the database')</script>";
    }
    else {
      $insert_query="insert into `brands` (brand_title) values ('$brand_title')";
      $result=mysqli_query($con,  $insert_query);
      if($result){
      echo "<script>alert('Brand has been inserted successfully')</script>";
    }
   }
  }
?>

<h2 class="text-center text-danger">Insert Your Brands</h2>

<form action="" method="post" class="mb-2 mt-5">
<div class="input-group w-90 mb-2">
    <span class="input-group-text bg-danger text-light" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control"
    name="brand_title"
    placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1" required="required">
</div>
<div class="input-group w-10 mb-2 m-auto">
  
  <input type="submit" class="bg-danger text-light p-2 my-3 border-0 rounded"
  name="insert_brand"
  value="Insert Brands">

  <!-- <button class="bg-danger text-light p-2 my-3 border-0 rounded">Insert Brands</button> -->
</div>
</form>