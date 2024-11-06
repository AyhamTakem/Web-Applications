<?php 
    $con=mysqli_connect('localhost', 'root', '', 'online-store');
    if(!$con){
        die(mysqli_error($con));
    }
?>