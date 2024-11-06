<!-- connect file -->
<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
?>

<?php
    if(isset($_GET['delete_brand'])){
        $delete_id=$_GET['delete_brand'];

        // delete query
        $delete_brand="Delete from `brands` where brand_id=$delete_id";
        $result_brand=mysqli_query($con,$delete_brand);
        if($result_brand){
            echo "<script>alert('Brand deleted successfully')</script>";
            echo "<script>window.open('./index.php?view_brands','_self')</script>";
        }
    }
?>