<?php 
    include('../includes/connect.php');
    if(isset($_POST['insert_product'])){
        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keywords=$_POST['product_keywords'];
        $product_category=$_POST['product_category'];
        $product_brands=$_POST['product_brands'];
        $url_info=$_POST['url_info'];
        $product_price=$_POST['product_price'];
        $product_status='true';

        // accessing images
        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];
        $product_image3=$_FILES['product_image3']['name'];

        // accessing image tmp name
        $temp_image1=$_FILES['product_image1']['tmp_name'];
        $temp_image2=$_FILES['product_image2']['tmp_name'];
        $temp_image3=$_FILES['product_image3']['tmp_name'];

        // checking empty con
        if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brands=='' or $url_info=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
            echo "<script>alert('Please fill all fields marked with a red star to continue')</script>";
            exit();
        }
        else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2"); 
            move_uploaded_file($temp_image3,"./product_images/$product_image3");

            // insert query
            $insert_products="insert into `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,url_info,product_price,date,status) values ('$product_title','$product_description','$product_keywords','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$url_info','$product_price',NOW(),'$product_status')";
            $result_query=mysqli_query($con,$insert_products);
            if($result_query){
                echo "<script>alert('The product inserted successfully')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <link rel="shortcut icon" type="image" href="../img/shop.png">
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!-- Font Awesome Link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS File -->
     <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center text-danger">
            Insert Your Products
        </h1>
        <!-- Form -->
         <form action="" method="post" enctype="multipart/form-data">
            <!-- Tittle -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title <span class="text-danger">*</span></label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <!-- Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description <span class="text-danger">*</span></label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
            </div>
            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords <span class="text-danger">*</span></label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required="required">
            </div>
            <!-- Categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Category <span class="text-danger">*</span></label>
                <select name="product_category" id="product_category" class="form-select">
                    <option value="">Select a Category</option>
                    <?php 
                    $select_categories="Select * from `categories`";
                    $result_categories=mysqli_query($con,$select_categories);
                    while($row_data=mysqli_fetch_assoc($result_categories)){
                        $category_title=$row_data['category_title'];
                        $category_id=$row_data['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Brand <span class="text-danger">*</span></label>
                <select name="product_brands" id="product_brands" class="form-select">
                    <option value="">Select a Brand</option>
                    <?php 
                        $select_brands="Select * from `brands`";
                        $result_brands=mysqli_query($con,$select_brands);
                        while($row_data=mysqli_fetch_assoc($result_brands)){
                            $brand_title=$row_data['brand_title'];
                            $brand_id=$row_data['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1"class="form-label">Product Image 1 <span class="text-danger">*</span></label>
                <input type="file" name="product_image1"id="product_image1"class="form-control" placeholder="Enter Product Image 1"  required="required">
            </div>
            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2"class="form-label">Product Image 2 <span class="text-danger">*</span></label>
                <input type="file" name="product_image2"id="product_image2"class="form-control" placeholder="Enter Product Image 2"
                required="required">
            </div>
            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3"class="form-label">Product Image 3 <span class="text-danger">*</span></label>
                <input type="file" name="product_image3"id="product_image3"class="form-control" placeholder="Enter Product Image 3"
                required="required">
            </div>
            <!-- url for mor information -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="url_info" class="form-label">More Information URL <span class="text-danger">*</span></label>
                <input type="url" name="url_info" id="url_info" class="form-control" placeholder="Enter Url" autocomplete="off" required="required">
            </div>
            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price <span class="text-danger">*</span></label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>
            <!-- button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-danger text-light mb-3 px-3" value="Insert Product">
            </div>
         </form>
    </div>
</body>
</html>