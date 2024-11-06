<!-- connect file -->
<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
?>

<?php 
    if(isset($_GET['edit_products'])){
        $edit_id=$_GET['edit_products'];
        $get_data="Select * from `products` where product_id=$edit_id";
        $result=mysqli_query($con,$get_data);
        $row=mysqli_fetch_assoc($result);
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
        $product_image3=$row['product_image3'];
        $url_info=$row['url_info'];
        $product_price=$row['product_price'];

        // fetching category name
        $select_category="Select * from `categories` where category_id=$category_id";
        $result_category=mysqli_query($con,$select_category);
        $row_category=mysqli_fetch_assoc($result_category);
        $category_title=$row_category['category_title'];
        
        // fetching brand name
        $select_brand="Select * from `brands` where brand_id=$brand_id";
        $result_brand=mysqli_query($con,$select_brand);
        $row_brand=mysqli_fetch_assoc($result_brand);
        $brand_title=$row_brand['brand_title'];
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
</head>
<body>
    <div class="container mt5">
        <h2 class="text-center text-danger">Edit Product</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" name="product_title" class="form-control" required value="<?php echo $product_title; ?>">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" id="product_description" name="product_description" class="form-control" required value="<?php echo $product_description; ?>">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" id="product_keywords" name="product_keywords" class="form-control" required value="<?php echo $product_keywords; ?>">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="" class="form-label">Category</label>
                <select name="product_category" class="form-select">
                    <option value="<?php echo $category_title; ?>"><?php echo $category_title; ?></option>
                    <?php 
                        $select_category_all="Select * from `categories`";
                        $result_category_all=mysqli_query($con,$select_category_all);
                        while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                            $category_title=$row_category_all['category_title'];
                            $category_id=$row_category_all['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        };
                        
                    ?>

                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="" class="form-label">Brand</label>
                <select name="product_brand" class="form-select">
                <option value="<?php echo $brand_title; ?>"><?php echo $brand_title; ?></option>
                    <?php 
                        $select_brand_all="Select * from `brands`";
                        $result_brand_all=mysqli_query($con,$select_brand_all);
                        while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                            $brand_title=$row_brand_all['brand_title'];
                            $brand_id=$row_brand_all['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        };
                        
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo $product_image1; ?>" alt="" style='width: 100px; height: 100px; object-fit: contain;'>
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo $product_image2; ?>" alt="" style='width: 100px; height: 100px; object-fit: contain;'>
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <div class="d-flex">
                <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo $product_image3; ?>" alt="" style='width: 100px; height: 100px; object-fit: contain;'>
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="url_info" class="form-label">More Information URL</label>
                <input type="url" id="url_info" name="url_info" class="form-control" autocomplete="off" value="<?php echo $url_info; ?>">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" name="product_price" class="form-control" autocomplete="off" required value="<?php echo $product_price; ?>">
            </div>
            <!-- button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="edit_product" class="btn btn-danger text-light mb-3 px-3" value="Edit Product">
            </div>
        </form>
    </div>
</body>
</html>

<!-- editing products -->
 <?php
    if(isset($_POST['edit_product'])){
        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keywords=$_POST['product_keywords'];
        $product_category=$_POST['product_category'];
        $product_brand=$_POST['product_brand'];
        $url_info=$_POST['url_info'];
        $product_price=$_POST['product_price'];

        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];
        $product_image3=$_FILES['product_image3']['name'];

        $temp_image1=$_FILES['product_image1']['tmp_name'];
        $temp_image2=$_FILES['product_image2']['tmp_name'];
        $temp_image3=$_FILES['product_image3']['tmp_name'];

        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        // query to update products
        $update_product="update `products` set product_title='$product_title',product_description='$product_description',product_keywords='$product_keywords', category_id='$product_category',brand_id='$product_brand',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',url_info='$url_info',product_price='$product_price',date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('./index.php?view_products','_self')</script>";
        }
    }
 ?>