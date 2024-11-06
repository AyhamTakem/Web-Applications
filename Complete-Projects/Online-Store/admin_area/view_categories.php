<!-- connect file -->
<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
?>

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

<h2 class="text-center text-danger">All Categories</h2>
<div class="row" style="overflow-x:auto;">
    <table class="table table-bordered mt-5 mb-1">
        <thead>
        <tr class="text-center">
            <th class="text-light bg-danger">Category ID</th>
            <th class="text-light bg-danger">Category Title</th>
            <th class="text-light bg-danger">Edit</th>
            <th class="text-light bg-danger">Delete</th>        
        </tr>
        </thead>
        <tbody class="text-center mb-1" style="vertical-align: middle">
        <?php 
            $get_cats="Select * from `categories`";
            $result=mysqli_query($con,$get_cats);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $category_id=$row['category_id'];
                $category_title=$row['category_title'];
                $number++;
        ?>
            <tr>
                <td class='bg-secondary text-light'><?php echo $category_id; ?></td>
                <td class='bg-secondary text-light'><?php echo $category_title; ?></td>
                <td class='bg-secondary text-light'><a href='index.php?edit_category=<?php echo $category_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square ed-icon'></i></a></td>
                <td class='bg-secondary text-light'><a href='' class='text-light' data-toggle="modal" data-target="#exampleModalCenter"><i class='fa-solid fa-trash del-icon'></i></a></td>
            </tr>
        <?php
              }
        ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this item!</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
       <a href='index.php?delete_category=<?php echo $category_id ?>' class="text-light text-decoration-none"> <button type="button" class="btn btn-danger">Yes</button></a>
      </div>
    </div>
  </div>
</div>