<?php
    session_start();
    
    include "../../components/connect.php";
    if(isset($_POST['addtocart']) && isset($_SESSION['user'])){
        $id = $_SESSION['user']['id'];
        $pid = $_POST['id'];
        $quan = $_POST['quan'];
        // $check_num = mysqli_query($link, "SELECT * FROM `cart` WHERE `cart_name` = '$name' AND `user_id` = '$id'");

        mysqli_query($link, "INSERT INTO `cart` (`user_id`, `products_id`, `cart_quan`) VALUES ('$id', '$pid', '$quan')");

        header('location:'.$_SERVER['HTTP_REFERER']);
    }

?>