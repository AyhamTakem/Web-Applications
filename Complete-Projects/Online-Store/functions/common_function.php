<?php
    // including connect file
    // include('./includes/connect.php');

    // getting products
    function get_products(){
        global $con;
        // condition to check isset or not
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
        $select_query="Select * from `products` order by rand() LIMIT 0,9";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
                <div class='card shadow'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <hr class='hrf'/>
                    <h4 class='card-title text-truncate style='max-width: 200px;'>$product_title</h4>
                    <h5 class='card-title text-success'><span>Price </span>$product_price<span>$</span></h5>
                    <p class='card-text text-truncate'>$product_description</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary mb-1'>Add To Cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary mb-1'>View More</a>
                </div>
                </div>
              </div>";
            }
        }
    }
}

    // getting all products
    function get_all_products(){
        global $con;
        // condition to check isset or not
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
        $select_query="Select * from `products`";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
                <div class='card shadow'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <hr class='hrf'/>
                    <h4 class='card-title text-truncate style='max-width: 200px;'>$product_title</h4>
                    <h5 class='card-title text-success'><span>Price </span>$product_price<span>$</span></h5>
                    <p class='card-text text-truncate'>$product_description</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary mb-1'>Add To Cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary mb-1'>View More</a>
                </div>
                </div>
              </div>";
            }
        }
    }
    }

    // gatting unique cats
    function get_unique_categories(){
        global $con;
        // condition to check isset or not
        if(isset($_GET['category'])){
        $category_id=$_GET['category'];
        $select_query="Select * from `products` where category_id= $category_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-danger text-center'>No stock for this category !</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
                <div class='card shadow'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <hr class='hrf'/>
                    <h4 class='card-title text-truncate style='max-width: 200px;'>$product_title</h4>
                    <h5 class='card-title text-success'><span>Price </span>$product_price<span>$</span></h5>
                    <p class='card-text text-truncate'>$product_description</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary mb-1'>Add To Cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary mb-1'>View More</a>
                </div>
                </div>
              </div>";
            }
        }
    }

    // gatting unique brands
    function get_unique_brands(){
        global $con;
        // condition to check isset or not
        if(isset($_GET['brand'])){
        $brand_id=$_GET['brand'];
        $select_query="Select * from `products` where brand_id= $brand_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-danger text-center'>This brand is not avalibale for this service!</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
                <div class='card shadow'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <hr class='hrf'/>
                    <h4 class='card-title text-truncate style='max-width: 200px;'>$product_title</h4>
                    <h5 class='card-title text-success'><span>Price </span>$product_price<span>$</span></h5>
                    <p class='card-text text-truncate'>$product_description</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary mb-1'>Add To Cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary mb-1'>View More</a>
                </div>
                </div>
              </div>";
            }
        }
    }


    // Cats Disp in nav
    function disp_cats(){
        global $con;
        $select_categories="Select * from `categories`";
              $result_categories=mysqli_query($con,$select_categories);
              while($row_data=mysqli_fetch_assoc($result_categories)){
                $category_title=$row_data['category_title'];
                $category_id=$row_data['category_id'];
                echo "<li class='nav-item'>
                <a href='index.php?category=$category_id' class='nav-link text-light hover-color-change'>$category_title</a></li>";
              }
    }

    // Brandss Disp in nav
    function disp_brands() {
        global $con;
        $select_brands="Select * from `brands`";
        $result_brands=mysqli_query($con,$select_brands);
        while($row_data=mysqli_fetch_assoc($result_brands)){
          $brand_title=$row_data['brand_title'];
          $brand_id=$row_data['brand_id'];
          echo "<li class='nav-item'>
          <a href='index.php?brand=$brand_id' class='nav-link text-light hover-color-change'>$brand_title</a></li>";
        }
    }
    
    // searching products function
    function search_product(){
        global $con;
        if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
        $search_query="Select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query=mysqli_query($con,$search_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-danger'>No result match. No products found on this category !</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
                <div class='card shadow'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <hr class='hrf'/>
                    <h4 class='card-title text-truncate style='max-width: 200px;'>$product_title</h4>
                    <h5 class='card-title text-success'><span>Price </span>$product_price<span>$</span></h5>
                    <p class='card-text text-truncate'>$product_description</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary mb-1'>Add To Cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary mb-1'>View More</a>
                </div>
                </div>
              </div>";
            }
        }
    }

    // View Details Function
    function view_details(){
        global $con;
        // condition to check isset or not
        if(isset($_GET['product_id'])){
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
        $product_id=$_GET['product_id'];
        $select_query="Select * from `products` where product_id =$product_id";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_image2=$row['product_image2'];
          $product_image3=$row['product_image3'];
          $url_info=$row['url_info'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
                <div class='card shadow'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <hr class='hrf'/>
                    <h4 class='card-title'>$product_title</h4>
                    <h5 class='card-title text-success'><span>Price </span>$product_price<span>$</span></h5>
                    <p class='card-text'>$product_description</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary mb-1'>Add To Cart</a>
                    <a href='$url_info' target='_blank' class='btn btn-secondary mb-1'>Read More</a>
                </div>
                </div>
              </div>
              <div class='col-md-8'>
                 <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-info mb-5'>More Models</h4>
                    </div>
                    <div class='col-md-6'>
                        <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                    </div>
                    <div class='col-md-6'>
                        <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                    </div>
                 </div>
            </div>";
                }
            }
        }
    }
}

// Get Ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;

//prompt function
// function prompt($prompt_msg){
//     echo("<script type='text/javascript'> var answer = prompt('".$prompt_msg."'); </script>");
//     $answer = "<script type='text/javascript'> document.write(answer); </script>";
//     return('$answer');
// }

// //program
// $prompt_msg = "Please enter qty.";
// $name = prompt($prompt_msg);

// $output_msg = ".$name.";
// // echo($output_msg);

// cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        // $get_product_qty=$_GET['add_to_cart'];
        $select_query="Select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('This item is already present inside cart')</script>";
            echo"<script>window.open('all_prod.php','_self')</script>";
        }
        else{
            $insert_query="insert into `cart_details` (product_id,ip_address,quantity,date) value ($get_product_id,'$ip',1,NOW())";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('The item was adding inside cart successfully')</script>";
            echo"<script>window.open('all_prod.php','_self')</script>";
        }
    }
}

// //quantity function
// function insert_qty(){
//     if(isset($_POST['add_to_cart'])){
//         $insert_product_qty=$_POST['quantity'];
//         // checking empty con
//         if($insert_product_qty==''){
//             echo "<script>alert('Please enter your quantity to continue')</script>";
//             exit();
//         }
//         // insert query
//         $insert_qty="insert into `cart_details` (quantity) values ($insert_product_qty)";
//         $result_query=mysqli_query($con,$insert_qty);
//     }
// }

// function to get cart item numbers
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress();
        $select_query="Select * from `cart_details` where ip_address='$ip'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }
    else{
        global $con;
        $ip = getIPAddress();
        $select_query="Select * from `cart_details` where ip_address='$ip'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        }
        echo $count_cart_items;
    }

    // total price function
    function total_cart_price(){
        global $con;
        $ip = getIPAddress();
        $total_price=0;
        $cart_query="Select * from `cart_details` where ip_address='$ip'";
        $result=mysqli_query($con,$cart_query);
        while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $select_products="Select * from `products` where product_id='$product_id'";
            $result_products=mysqli_query($con,$select_products);
            while($row_product_price=mysqli_fetch_array($result_products)){
                $product_price=array($row_product_price['product_price']);
                $product_values=array_sum($product_price);
                // $product_qty=array_sum($product_qty);
                $total_price+=$product_values;
            }
        }
        echo $total_price;
    }

    // 
    function get_user_order_details(){
        global $con;
        $username=$_SESSION['username'];
        $get_details="select * from `user_table` where username='$username'";
        $result_query=mysqli_query($con,$get_details);
        while($row_query=mysqli_fetch_array($result_query)){
            $user_id=$row_query['user_id'];
            if(!isset($_GET['edit_account'])){
                if(!isset($_GET['my_orders'])){
                    if(!isset($_GET['delete_account'])){
                        $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='pending'";
                        $result_orders_query=mysqli_query($con,$get_orders);
                        $row_count=mysqli_num_rows($result_orders_query);
                        if($row_count>0){
                            echo "<h3 class='text-success text-center mt-3'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                            <div class='text-center'><a href='profile.php?my_orders' class='btn btn-danger text-light mb-3'>Order Details</a></div>";
                        }
                        else{
                            echo "<h3 class='text-success text-center mt-3'>You have 0 pending orders</h3>
                            <div class='text-center'><a href='../all_prod.php' class='btn btn-danger text-light mb-3'>Explore Products</a></div>";
                        }
                    }
                }
            }
        }
    }
?>