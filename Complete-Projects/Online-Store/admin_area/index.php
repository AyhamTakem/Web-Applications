<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" type="image" href="../img/shop.png">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS File -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .footer {
  position: absolute;
  bottom: 0;
}

    </style>

</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0 overflow-hidden">
    <!-- First Child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <img src="../img/logo.png" alt="" class="logo">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Welcome Guest</a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>

    <!-- Second Child -->
     <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
     </div>

     <!-- Third Child -->
      <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center justify-content-center">
            <div class="p-3">
                <a href="#"><img src="../img/admin.png" alt="" class="admin-img"></a>
                <p class="text-light text-center">Admin Name</p>
            </div>
            <div class="button text-center">
                <button class="my-3"><a href="insert_products.php" target="_blank" class="nav-link text-light bg-danger my-1">Insert Products</a></button>
                <button><a href="index.php?view_products" class="nav-link text-light bg-danger my-1">View Products</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light bg-danger my-1">Insert Categories</a></button>
                <button><a href="index.php?view_categories" class="nav-link text-light bg-danger my-1">View Categories</a></button>
                <button><a href="index.php?insert_brand" class="nav-link text-light bg-danger my-1">Insert Brands</a></button>
                <button><a href="index.php?view_brands" class="nav-link text-light bg-danger my-1">View Brands</a></button>
                <button><a href="index.php?view_orders" class="nav-link text-light bg-danger my-1">All Orders</a></button>
                <button><a href="index.php?view_payments" class="nav-link text-light bg-danger my-1">All Payments</a></button>
                <button><a href="index.php?view_users" class="nav-link text-light bg-danger my-1">List Users</a></button>
                <button><a href="" class="nav-link text-light bg-danger my-1">Logout</a></button>
            </div>
        </div>
      </div>

        <!-- Forth Child -->
         <div class="container my-3">
            <?php 
                if(isset($_GET['insert_category'])){
                    include('insert_categories.php');
                }
                if(isset($_GET['insert_brand'])){
                    include('insert_brands.php');
                }
                if(isset($_GET['view_products'])){
                    include('view_products.php');
                }
                if(isset($_GET['edit_products'])){
                    include('edit_products.php');
                }
                if(isset($_GET['delete_products'])){
                    include('delete_products.php');
                }
                if(isset($_GET['view_categories'])){
                    include('view_categories.php');
                }
                if(isset($_GET['edit_category'])){
                    include('edit_category.php');
                }
                if(isset($_GET['delete_category'])){
                    include('delete_category.php');
                }
                if(isset($_GET['view_brands'])){
                    include('view_brands.php');
                }
                if(isset($_GET['edit_brand'])){
                    include('edit_brand.php');
                }
                if(isset($_GET['delete_brand'])){
                    include('delete_brand.php');
                }
                if(isset($_GET['view_orders'])){
                    include('view_orders.php');
                }
                if(isset($_GET['delete_order'])){
                    include('delete_order.php');
                }
                if(isset($_GET['view_payments'])){
                    include('view_payments.php');
                }
                if(isset($_GET['delete_payment'])){
                    include('delete_payment.php');
                }
                if(isset($_GET['view_users'])){
                    include('view_users.php');
                }
            ?>
         </div>

         <!-- Last Child -->
            <!-- <div class="bg-warning p-3 text-center footer">
            <p>All rights reserved ©-2024 Designed by Ayham,Roaa,Ruba,Ahmed</p>
            </div>  -->
     </div>
    </div>

        <!-- calling cart function -->
        <!-- <?php
        cart();
        ?> -->

<!-- bootsrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>