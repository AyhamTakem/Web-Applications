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
    <title>View Products</title>
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
</head>
<body>
    <h2 class="text-center text-danger">All Users</h2>
    <div class="row" style="overflow-x:auto;">
    <table class="table table-bordered mt-5 mb-1">
        <thead style="vertical-align: middle">
        <tr class="text-center">
            <th class="text-light bg-danger">User ID</th>
            <th class="text-light bg-danger">Username</th>
            <th class="text-light bg-danger">User Email</th>
            <th class="text-light bg-danger">User Password</th>
            <th class="text-light bg-danger">User Image</th>
            <th class="text-light bg-danger">User Ip</th>
            <th class="text-light bg-danger">User Address</th>
            <th class="text-light bg-danger">User Mobile</th>
        </tr>
        </thead>
        <tbody class="text-center mb-1" style="vertical-align: middle">
            
        <?php 
            $get_users="Select * from `user_table`";
            $result=mysqli_query($con,$get_users);
            while($row=mysqli_fetch_assoc($result)){
                $user_id=$row['user_id'];
                $username=$row['username'];
                $user_email=$row['user_email'];
                $user_password=$row['user_password'];
                $user_image=$row['user_image'];
                $user_ip=$row['user_ip'];
                $user_address=$row['user_address'];
                $user_mobile=$row['user_mobile'];
                ?>
                    <tr>
                    <td class='bg-secondary text-light'><?php echo $user_id; ?></td>
                    <td class='bg-secondary text-light'><?php echo $username; ?></td>
                    <td class='bg-secondary text-light'><?php echo $user_email; ?></td>
                    <td class='bg-secondary text-light'><?php echo $user_password; ?></td>
                    <td class='bg-secondary text-light'><img style='width: 75px; height: 75px; object-fit: contain;' src='../users_area/user_images/<?php echo $user_image; ?>' alt='user image'></td>
                    <td class='bg-secondary text-light'><?php echo $user_ip; ?></td>
                    <td class='bg-secondary text-light'><?php echo $user_address; ?></td>
                    <td class='bg-secondary text-light'><?php echo $user_mobile; ?></td>                   
                    </tr>
            <?php        
            }
            ?>        
    </tbody>
    </table>
    </div>


</body>
</html>