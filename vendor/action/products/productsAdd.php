<?php 
    session_start();

    require "../../components/connect.php";

    if(isset($_POST['addProduct'])){
        
        $img = $_FILES['image'];
        if('image' == substr($img['type'], 0, 5)){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            $url = uniqid().'.'.substr($img['type'], 6);
            move_uploaded_file($img['tmp_name'], '../../../images/'.$url);
            mysqli_query($link, "INSERT INTO `products`(`products_name`, `products_description`, `products_price`, `products_image`) VALUES ('$name', '$description', '$price', '$url')");
        }
    }

    header("location: ".$_SERVER['HTTP_REFERER']);
?>