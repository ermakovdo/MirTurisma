<?php
    require "../../components/connect.php"; 

    if(isset($_POST['cartDelete'])){
        $pid = $_POST['pid'];
        mysqli_query($link, "DELETE FROM `cart` WHERE `products_id` = '$pid'");
    }
    header("location: ".$_SERVER['HTTP_REFERER']);
?>