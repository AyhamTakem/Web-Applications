<!-- connect file -->
<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
?>

<?php
    if(isset($_GET['delete_payment'])){
        $delete_id=$_GET['delete_payment'];

        // delete query
        $delete_payment="Delete from `user_payments` where payment_id=$delete_id";
        $result_payment=mysqli_query($con,$delete_payment);
        if($result_payment){
            echo "<script>alert('payment deleted successfully')</script>";
            echo "<script>window.open('./index.php?view_payments','_self')</script>";
        }
    }
?>