<!-- connect file -->
<?php
  include('../includes/connect.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
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
        <li class="nav-item text-light hover-color-change">
          <a class="nav-link" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item hover-color-change">
          <a class="nav-link" href="../all_prod.php">Products</a>
        </li>
        <li class="nav-item hover-color-change">
          <a class="nav-link" href="./user_registration.php">Register</a>
        </li>
        <li class="nav-item hover-color-change">
          <a class="nav-link" href="../team-dep.php" target="_blank">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  
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
          <a class='nav-link ' href='./user_login.php'>Login</a>
    </li>";
      }
      else{
        echo "<li class='nav-item'>
          <a class='nav-link ' href='logout.php'>Logout</a>
    </li>";
      }
    ?>

    </ul>
 </nav>


 <!-- Third Child -->
  <div class="row px-1">
    
    <?php 
            if(!isset($_SESSION['username'])){
                include('user_login.php');
            }
            else{
                include('payment.php');
            }
          ?>
    
  </div>

<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>