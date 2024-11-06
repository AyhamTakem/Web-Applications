<!-- connect file -->
<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
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
</head>
<body>
    <h2 class="text-center text-danger">All Products</h2>
    <div class="row" style="overflow-x:auto;">
    <table class="table table-bordered mt-5 mb-1">
        <thead>
        <tr class="text-center">
            <th class="text-light bg-danger">Product ID</th>
            <th class="text-light bg-danger">Product Title</th>
            <th class="text-light bg-danger">Product Image</th>
            <th class="text-light bg-danger">Product Price</th>
            <th class="text-light bg-danger">Total Sold</th>
            <th class="text-light bg-danger">Status</th>
            <th class="text-light bg-danger">Edit</th>
            <th class="text-light bg-danger">Delete</th>    
        </tr>
        </thead>
        <tbody class="text-center mb-1" style="vertical-align: middle">
            
        <?php 
            $get_products="Select * from `products`";
            $result=mysqli_query($con,$get_products);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $status=$row['status'];
                $number++;
                ?>
                    <tr>
                    <td class='bg-secondary text-light'><?php echo $product_id; ?></td>
                    <td class='bg-secondary text-light'><?php echo $product_title; ?></td>
                    <td class='bg-secondary text-light'><img style='width: 75px; height: 75px; object-fit: contain;' src='product_images/<?php echo $product_image1; ?>' alt='product image'></td>
                    <td class='bg-secondary text-light'><?php echo $product_price; ?>$</td>
                    <td class='bg-secondary text-light'>
                        <?php
                            $get_count="Select * from `orders_pending` where product_id=$product_id";
                            $result_count=mysqli_query($con,$get_count);
                            $rows_count=mysqli_num_rows($result_count);
                            echo $rows_count;
                        ?>
                    </td>
                    <td class='bg-secondary text-light'><?php echo $status; ?></td>
                    <td class='bg-secondary text-light'><a href='index.php?edit_products=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-pen-to-square ed-icon'></i></a></td>
                    <td class='bg-secondary text-light'><a href='' class='text-light' data-toggle="modal" data-target="#exampleModalCenter"><i class='fa-solid fa-trash del-icon'></i></a></td>
                    </tr>
            <?php        
            }
            ?>        
    </tbody>
    </table>
    </div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-body">
            <h4>Are you sure you want to delete this item!</h4>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        <a href='index.php?delete_products=<?php echo $product_id?>' class="text-light text-decoration-none"> <button type="button" class="btn btn-danger">Yes</button></a>
        </div>
        </div>
    </div>
    </div>
</body>
</html>