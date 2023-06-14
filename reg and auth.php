<?php
    session_start();
    if(isset($_SESSION['user'])){
        $id = $_SESSION['user']['id'];
    }
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
    <form action="vendor/action/signUp.php" method="POST">
        <h1>Регистрация</h1>
        <div>
            <span>Логин</span>
            <input name="login" type="text">
        </div>
        <div>
            <span>Email</span>
            <input name="email" type="email">
        </div>
        <div>
            <span>Пароль</span>
            <input name="password" type="password">
        </div>
        <div>
            <span>Повторите пароль</span>
            <input name="conf_password" type="password">
        </div>
        <?php
        if($_SESSION['error']){
            ?>
            <div>
                <?php echo $_SESSION['error']['email']; ?>
                <?php echo $_SESSION['error']['password']; ?>
            </div>
            <?php
            unset($_SESSION['error']);
            }
            ?>
            <input name="signUp" type="submit" value="Зарегистрироваться">
    </form>







    <div class="box">
         <div class="price"><span>500</span>₽</div>
         <img src="images/pizza-1.jpg" alt="">
         <div class="name">pizza 1</div>
         <form action="" method="post">
            <input type="number" min="1" max="100" value="1" class="qty" name="qty">
            <input type="submit" value="В корзину" name="add_to_cart" class="btn">
         </form>
      </div>




    <?php
      $products = mysqli_query($link, "SELECT * FROM `products`");
      while($product = mysqli_fetch_array($products)){
        ?>
        <div class="box">
            <div class="price"><span><?php echo $product['products_price'] ?></span>₽</div>
            <img src="<?php echo $product['products_image'] ?>" alt="">
            <p><?php echo $product['products_description'] ?></p>
            <div class="name"><?php echo $product['products_name'] ?></div>
            <form action="" method="POST">
                <input type="number" min="1" max="100" value="1" class="qty" name="qty">
                <input type="submit" value="В корзину" name="add_to_cart" class="btn">
            </form>
        </div>     
     <?php } ?>


     <?php
        $carts = mysqli_query($link, "SELECT * FROM `cart` WHERE `user_id` = '$id'");
        while($cart = mysqli_fetch_array($carts)){
            $products = mysqli_query($link, "SELECT * FROM `products` WHERE `products_id` = '$cart'");
            while($product = mysqli_fetch_array($products)){
            ?>
            <h3><?php echo $product['products_name'] ?></h3>
            
       <?php } }
    ?>

<?php 

?>





















</body>
</html>