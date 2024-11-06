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
    <title>User Registration</title>
    <link rel="shortcut icon" type="image" href="../img/shop.png">
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
    <h1 class="text-center text-danger my-3">
            New User Registration
        </h1>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Username field -->
                    <div class="form-outline mb-4">
                        <lable for="user_username" class="form-label">
                            Username
                        </label>
                        <input type="text" id="user_username" name="user_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required/>
                    </div>
                    <!-- Email field -->
                    <div class="form-outline mb-4">
                        <lable for="user_email" class="form-label">
                            Email
                        </label>
                        <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required/>
                    </div>
                    <!-- Image field -->
                    <div class="form-outline mb-4">
                        <lable for="user_image" class="form-label">
                            Image
                        </label>
                        <input type="file" id="user_image" name="user_image" class="form-control"/>
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <lable for="user_password" class="form-label">
                            Password
                        </label>
                        <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Enter Your password" autocomplete="off" required/>
                    </div>
                    <!-- confirm password field -->
                    <div class="form-outline mb-4">
                        <lable for="conf_user_password" class="form-label">
                            Confirm Password
                        </label>
                        <input type="password" id="conf_user_password" name="conf_user_password" class="form-control" placeholder="Confirm Your password" autocomplete="off" required/>
                    </div>
                    <!-- address field -->
                    <div class="form-outline mb-4">
                        <lable for="user_address" class="form-label">
                            Address
                        </label>
                        <input type="text" id="user_address" name="user_address" class="form-control" placeholder="Enter Your Address" autocomplete="off" required/>
                    </div>
                    <!-- contact field -->
                    <div class="form-outline mb-4">
                        <lable for="user_contact" class="form-label">
                            Contact
                        </label>
                        <input type="text" id="user_contact" name="user_contact" class="form-control" placeholder="Enter Your Mobile Number" autocomplete="off" required/>
                    </div>
                    <!-- button -->
                    <div class="form-outline mb-4 w-50">
                        <input type="submit" name="user_register" class="btn btn-danger text-light mb-3 px-3" value="Register">
                    </div>
                    <p class="small fw-bold mb-0">Already have an account ? <a href="user_login.php" class="text-danger">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
 <?php
    if(isset($_POST['user_register'])){
        $user_username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
        $conf_user_password=$_POST['conf_user_password'];
        $user_address=$_POST['user_address'];
        $user_contact=$_POST['user_contact'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];
        $user_ip=getIPAddress();

        // select_query
        $select_query="select * from `user_table` where username='$user_username' or user_email='$user_email'";
        $result=mysqli_query($con,$select_query);
        $rows_count=mysqli_num_rows($result);
        if($rows_count>0){
            echo "<script>alert('Username or Email already exist')</script>";
        }
        else if($user_password != $conf_user_password){
            echo "<script>alert('Passwords do not match')</script>";
        }

        else{
            // insert_query
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");
        $insert_query="insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
        $sql_execute=mysqli_query($con,$insert_query);
        }
    // selecting cart items
    $select_cart_item="Select * from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_item);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('check.php','_self')</script>";
    }
    else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
    }
 ?>