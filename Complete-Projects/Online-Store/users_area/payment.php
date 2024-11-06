<!-- connect file -->
<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image" href="../img/shop.png">
    <title>Payment Page</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../E-style/check.css">
    <style>
        .container form .submit-btn-py {
        width: 100%;
        padding: 12px;
        font-size: 17px;
        background: #1c4be7;
        color: #fff;
        margin-top: 5px;
        cursor: pointer;
        }

        .container form .submit-btn-py:hover {
        background: #4b72f1;
        }
        
    </style>
</head>

<body>
        <!-- php code to access user id -->
        <?php
          $user_ip=getIPAddress();
          $get_user="Select * from `user_table` where user_ip='$user_ip'";
          $result=mysqli_query($con,$get_user);
          $run_query=mysqli_fetch_array($result);
          $user_id=$run_query['user_id'];
        ?>

    <div class="container">

        <form action="">

            <div class="row">

                <div class="col">

                    <h3 class="title">billing address</h3>

                    <div class="inputBox">
                        <span>full name :</span>
                        <input type="text" placeholder="Ayham Takem">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" placeholder="example@example.com">
                    </div>
                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" placeholder="room - street - locality">
                    </div>
                    <div class="inputBox">
                        <span>city :</span>
                        <input type="text" placeholder="Hama">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>state :</span>
                            <input type="text" placeholder="Hama">
                        </div>
                        <div class="inputBox">
                            <span>zip code :</span>
                            <input type="text" placeholder="123 456">
                        </div>
                    </div>

                </div>

                <div class="col">

                    <h3 class="title">payment</h3>

                    <div class="inputBox">
                        <span>cards accepted :</span>
                        <img src="img/card_img.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>name on card :</span>
                        <input type="text" placeholder="mr. Ayham Takem">
                    </div>
                    <div class="inputBox">
                        <span>credit card number :</span>
                        <input type="number" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="inputBox">
                        <span>exp month :</span>
                        <input type="text" placeholder="january">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>exp year :</span>
                            <input type="number" placeholder="2022">
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" placeholder="1234">
                        </div>
                    </div>

                </div>

            </div>
            <!-- <button type="button" class="submit-btn submit-btn-py" onclick="document.location= '../ms.php'">Proceed To Checkout</button> -->
            <button type="button" class="submit-btn" onclick="document.location= 'order.php?user_id=<?php echo $user_id ?>'">Proceed To Checkout</button>

        </form>

    </div>

</body>

</html>