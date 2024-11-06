<!-- connect file -->
<?php
  include('includes/connect.php');
  include('functions/common_function.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details</title>
    <link rel="shortcut icon" type="image" href="./img/shop.png">
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!-- Font Awesome Link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS File -->
     <link rel="stylesheet" href="style.css">
     <script type="text/javaScript"src="script.js"></script>
     <style>
        .hover-color-change:hover {
            background-color: #ffcc00;
        }
     </style>
</head>

<body>
    <!-- Navbar -->
     <div class="container-fluid p-0 overflow-hidden">
    <!-- First Child -->
    <nav class="navbar navbar-expand-lg bg-warning">
    <div class="container-fluid">
    <img src="./img/logo.png" alt="logo" class="logo">
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link hover-color-change" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link hover-color-change" href="
          all_prod.php">Products</a>
        </li>
        <?php 
          if(isset($_SESSION['username'])){
            echo "<li class='nav-item'>
          <a class='nav-link hover-color-change' href='./users_area/profile.php'>My Account</a>
        </li>";
          }
          else{
            echo "<li class='nav-item'>
          <a class='nav-link hover-color-change' href='./users_area/user_registration.php'>Register</a>
        </li>";
          }
        ?>
        <li class="nav-item">
          <a class="nav-link hover-color-change" href="team-dep.php" target="_blank">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light active hover-color-change" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- calling cart function -->
  <?php
    cart();
  ?>
  
<!-- Second Child -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto px-2">
    
    <?php 
      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
          <a class='nav-link ' href='#' style='pointer-events: none;color:#fff;'>Welcome Guest</a>
    </li>";
      }
      else{
        echo "<li class='nav-item'>
          <a class='nav-link text-light' href='#' style='pointer-events: none'>Welcome ".$_SESSION['username']."</a>
    </li>";
      }

      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
          <a class='nav-link ' href='./users_area/user_login.php'>Login</a>
    </li>";
      }
      else{
        echo "<li class='nav-item'>
          <a class='nav-link ' href='./users_area/logout.php'>Logout</a>
    </li>";
      }
    ?>
    </ul>
 </nav>

<!-- Third Child -->
 <div class="bg-light">
    <h3 class="text-center">Your Cart Details</h3>
    <p class="text-center text-success">
    <marquee>Communications is at the heart of e-commerce and community Place your order with us at the best price$</marquee>
    </p>
 </div>

  <!-- Fourth Child -->
  <div class="container">
            <div class="row" style="overflow-x:auto;">
                <form action="" method="post">
                    <table class="table table-bordered text-center">                                            
                        <tbody>

                        <!-- PHP code to display dynamic data -->
                        <?php 
                            $ip = getIPAddress();
                            $total_price = 0;
                            $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                            $result = mysqli_query($con, $cart_query);
                            $result_count=mysqli_num_rows($result);
                            if($result_count>0){
                              echo " <thead>
                            <tr>
                                <th class='text-danger'>Product Title</th>
                                <th class='text-danger'>Product Image</th>
                                <th class='text-danger'>Quantity</th>
                                <th class='text-danger'>Product Price</th>
                                <th class='text-danger'>Date Added</th>
                                <th class='text-danger'>Remove</th>
                            </tr>
                        </thead>";
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $quantity = $row['quantity'];
                                $date_added = $row['date'];
                                $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
                                $result_products = mysqli_query($con, $select_products);
                                while ($row_product = mysqli_fetch_array($result_products)) {
                                    $product_title = $row_product['product_title'];
                                    $product_image = $row_product['product_image1'];
                                    $product_price = $row_product['product_price'];
                                    $total_price += $product_price * $quantity;
                        ?>
                        <tr style="vertical-align: middle">
                            <td><?php echo $product_title; ?></td>
                            <td><img style="width: 75px; height: 75px; object-fit: contain;" src="./admin_area/product_images/<?php echo $product_image; ?>" alt="product image"></td>
                            <td>
                                <input type="number" min="1" class="text-center align-center" name="update_quantity[<?php echo $product_id; ?>]" style="width: 100px;" value="<?php echo $quantity; ?>" >
                            </td>
                            <td style="text-align: center"><?php echo $product_price; ?>$</td>
                            <td><?php echo $date_added; ?></td>
                            <td><input type="checkbox" style="cursor: pointer;" name="removeitem[]" value="<?php echo $product_id; ?>"></td>
                            
                        </tr>

                        <?php 
                                }
                            } 
                          }
                          else{
                            echo "<h2 class='text-center text-danger'>Your cart is empty! go and shop until you fill it</h2>";
                          }
                        ?>
                        </tbody>
                        </form>
                    </table>
                    <!-- Subtotal -->
                    <div class="d-flex mb-3">
                      <?php 
                         $ip = getIPAddress();
                         $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                         $result = mysqli_query($con, $cart_query);
                         $result_count=mysqli_num_rows($result);
                         if($result_count>0){
                          echo "<h4 class='px-3 text-success'>Subtotal: <strong>$total_price$</strong></h4>
                          <a href='./users_area/check.php' class='btn btn-success text-light mx-1'>Checkout $</a>
                          <a href='all_prod.php' class='btn btn-secondary text-light'>Continue Shopping</a>";
                         }
                         else{
                          echo"<a href='all_prod.php' class='btn btn-secondary text-light'>Continue Shopping</a>";
                        }
                      ?>
                                                                
                    </div>
                    <?php 
                      if($result_count>0){
                        echo "<input type='submit' value='Remove Itemes' class='btn text-light btn-danger mb-1 mx-1 delete-button' name='remove_cart' disabled>";
                        echo "<input type='submit' value='Update Quantity' class='btn text-light btn-primary mb-1' name='update_cart'>";
                      }
                    ?>
                    
               
            </div>
        </div>
        
        <!-- PHP Code for Updating Quantity -->
        <?php
            if (isset($_POST['update_cart']) && isset($_POST['update_quantity'])) {
                foreach ($_POST['update_quantity'] as $product_id => $new_quantity) {
                    $update_cart = "UPDATE `cart_details` SET quantity = '$new_quantity' WHERE ip_address = '$ip' AND product_id = '$product_id'";
                    $result_quantity = mysqli_query($con, $update_cart);
                    if ($result_quantity) {
                        echo "<script>alert('Quantity updated successfully');</script>";
                        echo "<script>window.open('cart.php','_self');</script>";
                    } else {
                        echo "<script>alert('Failed to update quantity');</script>";
                    }
                }
            }
        ?>

  <!-- Remove cart function -->
   <?php
    function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $remove_id){
                echo $remove_id;
                $delete_query="Delete from `cart_details` where product_id=$remove_id";
                $run_delete=mysqli_query($con,$delete_query);
                if($run_delete){
                    echo "<script>alert('The selected items have been successfully deleted from the cart')</script>";
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }

    echo $remove_item= remove_cart_item();
   ?>

</div>

<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>