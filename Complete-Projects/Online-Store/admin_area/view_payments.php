<!-- connect file -->
<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
?>

<!-- bootsrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- CSS File -->
<link rel="stylesheet" href="../style.css">
<style>
    .ed-icon:hover {
        color: #0caffa;
    }    
    .del-icon:hover {
        color: #fa0c2c;
    }    
</style>
<script>
        function confirmDelete() {
            return confirm("هل أنت متأكد أنك تريد حذف هذا العنصر؟");
        }
</script>
<h2 class="text-center text-danger">All Payments</h2>
    <div class="row" style="overflow-x:auto;">
        <table class="table table-bordered mt-5 mb-1">
            <thead>
                <tr class="text-center">
                    <th class='text-light bg-danger'>Payment ID</th>
                    <th class='text-light bg-danger'>Order ID</th>
                    <th class='text-light bg-danger'>Invoice Number</th>
                    <th class='text-light bg-danger'>Amount</th>
                    <th class='text-light bg-danger'>Payment Mode</th>        
                    <th class='text-light bg-danger'>Payment Date</th>
                    <th class='text-light bg-danger'>Delete Payment</th>                  
                </tr>
            </thead>
            <tbody class="text-center mb-1" style="vertical-align: middle">
                <?php 
                    $get_payments="Select * from `user_payments`";
                    $result=mysqli_query($con,$get_payments);
                    while($row=mysqli_fetch_assoc($result)){
                        $payment_id=$row['payment_id'];
                        $order_id=$row['order_id'];
                        $invoice_number=$row['invoice_number'];
                        $amount=$row['amount'];
                        $payment_mode=$row['payment_mode'];
                        $payment_date=$row['date'];
                ?>
                    <tr>
                        <td class='bg-secondary text-light'><?php echo $payment_id; ?></td>
                        <td class='bg-secondary text-light'><?php echo $order_id; ?></td>
                        <td class='bg-secondary text-light'><?php echo $invoice_number; ?></td>
                        <td class='bg-secondary text-light'><?php echo $amount; ?>$</td>
                        <td class='bg-secondary text-light'><?php echo $payment_mode; ?></td>
                        <td class='bg-secondary text-light'><?php echo $payment_date; ?></td>
                        
                        
                        <td class='bg-secondary text-light'><a href='index.php?delete_payment=<?php echo $payment_id ?>' class='text-light'><i class='fa-solid fa-trash del-icon' onclick="return confirmDelete()"></i></a></td>
                    </tr>
                <?php
                  }
                ?>
        </tbody>
    </table>
</div>
