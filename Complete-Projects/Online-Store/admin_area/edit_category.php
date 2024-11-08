<!-- connect file -->
<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
?>

<?php
    if(isset($_GET['edit_category'])){
        $edit_category=$_GET['edit_category'];
        
        $get_categories="Select * from `categories` where category_id=$edit_category";
        $result=mysqli_query($con,$get_categories);
        $row=mysqli_fetch_assoc($result);
        $category_title=$row['category_title'];

    }

    if(isset($_POST['edit_cat'])){
        $cat_title=$_POST['category_title'];

        $update_query="update `categories` set category_title='$cat_title' where category_id=$edit_category";
        $result_cat=mysqli_query($con,$update_query);
        if($result_cat){
            echo "<script>alert('Category is been updated successfully')</script>";
            echo "<script>window.open('./index.php?view_categories','_self')</script>";
        }
    }
?>

<div class="container mt5">
    <h2 class="text-center text-danger">Edit Category</h2>
    <form action="" method="post">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="category_title" class="form-label">Category Title</label>
                <input type="text" id="category_title" name="category_title" class="form-control" required value="<?php echo $category_title; ?>">
            </div>
            <!-- button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="edit_cat" class="btn btn-danger text-light mb-3 px-3" value="Edit Category">
            </div>
    </form>
</div>