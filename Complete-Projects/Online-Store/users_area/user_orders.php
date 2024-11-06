<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All My Orders</title>
</head>
<body>
<?php 
    $username=$_SESSION['username'];
    $get_user="Select * from `user_table` where username='$username'";
    $result=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];

?>
<h3 class="text-success text-center mt-3">All My Orders</h3>
<div class="row" style="overflow-x:auto;">
<table class="table table-bordered mt-5 mb-1">
    <thead>
    <tr class="text-center">
        <th class="text-light bg-danger">Sl No</th>
        <th class="text-light bg-danger">Order Number</th>
        <th class="text-light bg-danger">Amount Due</th>
        <th class="text-light bg-danger">Total Products</th>
        <th class="text-light bg-danger">Invouce Number</th>
        <th class="text-light bg-danger">Date</th>
        <th class="text-light bg-danger">Complete / Incomplete</th>
        <th class="text-light bg-danger">Status</th>
    </tr>
    </thead>
    <tbody class="text-center" style="vertical-align: middle">
        <?php 
            $get_order_details="Select * from `user_orders` where user_id=$user_id";
            $result_orders=mysqli_query($con,$get_order_details);
            $sl_number=1;
            $or_number=1;
            while($row_orders=mysqli_fetch_assoc($result_orders)){
                $order_id=$row_orders['order_id'];
                $order_number=$row_orders['order_id'];
                $amount_due=$row_orders['amount_due'];
                $total_products=$row_orders['total_products'];
                $invoice_number=$row_orders['invoice_number'];
                $order_date=$row_orders['order_date'];
                $order_status=$row_orders['order_status'];
                if($order_status=='pending'){
                    $order_status='Incomplete';
                }
                else{
                    $order_status='Complete';
                }
                echo "<tr>
            <td class='bg-secondary text-light'>$sl_number</td>
            <td class='bg-secondary text-light'>$or_number</td>
            <td class='bg-secondary text-light'>$amount_due<span>$</span></td>
            <td class='bg-secondary text-light'>$total_products</td>
            <td class='bg-secondary text-light'>$invoice_number</td>
            <td class='bg-secondary text-light'>$order_date</td>
            <td class='bg-secondary text-light'>$order_status</td>";
            ?>
            <?php 
            if($order_status=='Complete'){
                echo "<td class='bg-secondary text-light'>Paid</td>";
            }
            else{
                echo "<td class='bg-secondary text-light'><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
                </tr>";
            }
            
        $sl_number++;
        $or_number++;
            }
        ?>
        
    </tbody>
</table>
</div>
</body>
</html>