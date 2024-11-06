<!-- connect file -->
<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="shortcut icon" type="image" href="../img/shop.png">
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!-- Font Awesome Link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS File -->
     <link rel="stylesheet" href="../style.css">
     <style>
        .hover-color-change:hover {
            background-color: #ffcc00;
        }

        .profile_img {
        width: 90%;
        margin: auto;
        display: block;
        object-fit:contain;
        }

        .edit_image {
          width: 100px;
          height: 100px;
          object-fit:contain;
        }
     </style>
</head>
<body>
    <!-- Navbar -->
     <div class="container-fluid p-0 overflow-hidden">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg bg-warning">
  <div class="container-fluid">
    <img src="../img/logo.png" alt="logo" class="logo">
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link hover-color-change" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link hover-color-change" href="../all_prod.php">Products</a>
        </li>
        <?php 
          if(isset($_SESSION['username'])){
            echo "<li class='nav-item'>
          <a class='nav-link hover-color-change' href='profile.php'>My Account</a>
        </li>";
          }
          else{
            echo "<li class='nav-item'>
          <a class='nav-link hover-color-change' href='./users_area/user_registration.php'>Register</a>
        </li>";
          }
        ?>
        <li class="nav-item">
          <a class="nav-link hover-color-change" href="../team-dep.php" target="_blank">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link hover-color-change" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link hover-color-change" href="#" style="pointer-events: none">Total Price: <?php total_cart_price();?><span>$</span></a>
        </li>
        
      </ul>
      <form class="d-flex" role="search" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
        name="search_data" required>
         <input type="submit" value="Search" class="btn btn-outline-light text-success" name="search_data_product">
      </form>
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
          <a class='nav-link ' href='../users_area/user_login.php'>Login</a>
    </li>";
      }
      else{
        echo "<li class='nav-item'>
          <a class='nav-link ' href='../users_area/logout.php'>Logout</a>
    </li>";
      }
    ?>
    </ul>
 </nav>

<!-- Third Child -->
 <div class="bg-light">
    <h3 class="text-center">Your Profile</h3>
    <p class="text-center text-success">
    <marquee>Communications is at the heart of e-commerce and community Place your order with us at the best price$</marquee>
    </p>
 </div>

 <!-- fourth child -->
  <div class="row">
    <div class="col-md-2">
        <ul class="navbar-nav bg-secondary text-light text-center">
            <li class="nav-item bg-warning">
                <a class="nav-link" aria-current="page" href="../index.php" style="pointer-events: none"><h4>Your Profile</h4></a>
            </li>
            <?php 
                $username=$_SESSION['username'];
                $user_image="select * from `user_table` where username='$username'";
                $result_image=mysqli_query($con,$user_image);
                $row_image=mysqli_fetch_array($result_image);
                $user_image=$row_image['user_image'];
                echo "<li class='nav-item'>
                <img src='./user_images/$user_image' class='profile_img img-fluid my-4' alt=''>
                </li>";
            ?>
            
            <li class="nav-item">
                <a class="nav-link hover-color-change" aria-current="page" href="profile.php">Pending Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover-color-change" aria-current="page" href="profile.php?edit_account">Edit Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover-color-change" aria-current="page" href="profile.php?my_orders">My Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover-color-change" aria-current="page" href="profile.php?delete_account">Delete Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover-color-change" aria-current="page" href="logout.php">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover-color-change invisible" aria-current="page" href="logout.php">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover-color-change invisible" aria-current="page" href="logout.php">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover-color-change invisible" aria-current="page" href="logout.php">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover-color-change invisible" aria-current="page" href="logout.php">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover-color-change invisible" aria-current="page" href="logout.php">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover-color-change invisible" aria-current="page" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <div class="col-md-10">
        <?php 
            get_user_order_details();
            if(isset($_GET['edit_account'])){
                include('edit_account.php');              
            }
            if(isset($_GET['my_orders'])){
                include('user_orders.php');              
            }
            if(isset($_GET['delete_account'])){
                include('delete_account.php');              
            }
        ?>
    </div>
  </div>



<!-- Last Child -->
    <!-- include footer -->
    <?php 
        include("../includes/footer.php")
     ?>
</div>

<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>