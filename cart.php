<?php
    session_start();
    if(isset($_SESSION['user'])){
        $id = $_SESSION['user']['id'];
    }else{header("location: index.php");}
    include "vendor/components/connect.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">На главную</a><br>
    <h1>Ваша корзина</h1>
    <hr>
    <?php
        $carts = mysqli_query($link, "SELECT * FROM `cart` WHERE `user_id` = '$id'");
        while($cart = mysqli_fetch_array($carts)){
            $pid = $cart['products_id'];
            $products = mysqli_query($link, "SELECT * FROM `products` WHERE `products_id` = '$pid'");
            while($product = mysqli_fetch_array($products)){
            ?>
            <h3>Название: <?php echo $product['products_name'] ?></h3>
            <h3>Состав: <?php echo $product['products_description'] ?></h3>
            <h3>Количество: </h3><form action="" method="POST"><input name="colvo" type="number" value="<?php echo $cart['cart_quan'] ?>"></form>
            <h3>стоимость: <?php echo $sub_price = $product['products_price'] * $cart['cart_quan'] ?></h3>
            <form action="vendor/action/cart/deleteCart.php" method="POST"><input name="pid" type="hidden" value="<?php echo $product['products_id'] ?>"><input name="cartDelete" type="submit" value="Удалить товар"></form>
            
    <?php }  $total += $sub_price; }?><hr><?php  echo $total;
    ?>
    
</body>
</html>