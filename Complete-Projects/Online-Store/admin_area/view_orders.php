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
<h2 class="text-center text-danger">All Orders</h2>
    <div class="row" style="overflow-x:auto;">
        <table class="table table-bordered mt-5 mb-1">
            <thead>
                <tr class="text-center">
                    <th class='text-light bg-danger'>Order ID</th>
                    <th class='text-light bg-danger'>User ID</th>
                    <th class='text-light bg-danger'>Amount Due</th>
                    <th class='text-light bg-danger'>Invouce Number</th>
                    <th class='text-light bg-danger'>Total Products</th>        
                    <th class='text-light bg-danger'>Order Date</th>        
                    <th class='text-light bg-danger'>Order Status</th>        
                    <th class='text-light bg-danger'>Delete Order</th>        
                </tr>
            </thead>
            <tbody class="text-center mb-1" style="vertical-align: middle">
                <?php 
                    $get_orders="Select * from `user_orders`";
                    $result=mysqli_query($con,$get_orders);
                    while($row=mysqli_fetch_assoc($result)){
                        $order_id=$row['order_id'];
                        $user_id=$row['user_id'];
                        $amount_due=$row['amount_due'];
                        $invoice_number=$row['invoice_number'];
                        $total_products=$row['total_products'];
                        $order_date=$row['order_date'];
                        $order_status=$row['order_status'];
                ?>
                    <tr>
                        <td class='bg-secondary text-light'><?php echo $order_id; ?></td>
                        <td class='bg-secondary text-light'><?php echo $user_id; ?></td>
                        <td class='bg-secondary text-light'><?php echo $amount_due; ?>$</td>
                        <td class='bg-secondary text-light'><?php echo $invoice_number; ?></td>
                        <td class='bg-secondary text-light'><?php echo $total_products; ?></td>
                        <td class='bg-secondary text-light'><?php echo $order_date; ?></td>
                        <td class='bg-secondary text-light'><?php echo $order_status; ?></td>
                        
                        <td class='bg-secondary text-light'><a href='index.php?delete_order=<?php echo $order_id ?>' class='text-light'><i class='fa-solid fa-trash del-icon' onclick="return confirmDelete()"></i></a></td>
                    </tr>
                <?php
                  }
                ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this item!</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
       <a href='index.php?delete_order=<?php echo $order_id ?>' class="text-light text-decoration-none"> <button type="button" class="btn btn-danger">Yes</button></a>
      </div>
    </div>
  </div>
</div> -->