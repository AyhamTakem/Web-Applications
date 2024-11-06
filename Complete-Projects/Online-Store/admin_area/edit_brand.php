<!-- connect file -->
<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
?>

<?php
    if(isset($_GET['edit_brand'])){
        $edit_brand=$_GET['edit_brand'];
        
        $get_brands="Select * from `brands` where brand_id=$edit_brand";
        $result=mysqli_query($con,$get_brands);
        $row=mysqli_fetch_assoc($result);
        $brand_title=$row['brand_title'];
    }

    if(isset($_POST['edit_br'])){
        $br_title=$_POST['brand_title'];

        $update_query="update `brands` set brand_title='$br_title' where brand_id=$edit_brand";
        $result_br=mysqli_query($con,$update_query);
        if($result_br){
            echo "<script>alert('Brand is been updated successfully')</script>";
            echo "<script>window.open('./index.php?view_brands','_self')</script>";
        }
    }
?>

<div class="container mt5">
    <h2 class="text-center text-danger">Edit Brand</h2>
    <form action="" method="post">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="brand_title" class="form-label">Brand Title</label>
                <input type="text" id="brand_title" name="brand_title" class="form-control" required value="<?php echo $brand_title; ?>">
            </div>
            <!-- button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="edit_br" class="btn btn-danger text-light mb-3 px-3" value="Edit Brand">
            </div>
    </form>
</div>