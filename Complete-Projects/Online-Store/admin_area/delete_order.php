<!-- connect file -->
<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
?>

<?php
    if(isset($_GET['delete_order'])){
        $delete_id=$_GET['delete_order'];

        // delete query
        $delete_order="Delete from `user_orders` where order_id=$delete_id";
        $result_order=mysqli_query($con,$delete_order);
        if($result_order){
            echo "<script>alert('order deleted successfully')</script>";
            echo "<script>window.open('./index.php?view_orders','_self')</script>";
        }
    }
?>