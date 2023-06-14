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
   <link rel="stylesheet" href="css/style.css">
   <title>Domfood</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
   

<header class="header">

   <section class="flex">

      <a href="#home" class="logo">Domfood</a>

      <nav class="navbar">
         <a href="#home">Главная</a>
         <a href="#about">О нас</a>
         <a href="#menu">Меню</a>
         <a href="busket.php">Корзина</a>
         <?php
            if($_SESSION['user']['status'] == 1){?>
               <a href="allUsers.php">Все пользователи</a>
               <a href="addProducts.php">Добавить товар</a>
            <?php } ?>
            
            <?php
            if(isset($_SESSION['user'])){
               ?>
               <a href="vendor/action/logOut.php"><?php echo $_SESSION['user']['login']?>(Выйти)</a>
         <?php }
         ?>
      </nav>

      <div class="icons">
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      
   </section>

</header>

<div class="user-acc">
   <section>
      <div id="close"><span>close</span></div>

      <div class="flex">
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

         <form action="vendor/action/signIn.php" method="POST">
            <h1>Авторизация</h1>
            <div>
               <span>Логин</span>
               <input name="login" type="text">
            </div>
            <div>
               <span>Пароль</span>
               <input name="password" type="password">
            </div>
            <?php
         if($_SESSION['error']){
               ?>
               <div>
                  <?php echo $_SESSION['error']['login']; ?>
               </div>
               <?php
               unset($_SESSION['error']);
               }
               ?>
            <input name="signIn" type="submit" value="Войти">
         </form>
      </div>
   </section>
</div>

<div class="home-bg">

   <section class="home" id="home">

      <div class="slide-container">

         <div class="slide active">
            <div class="image">
               <img src="images/bd_image/home-img-1.png" alt="">
            </div>
            <div class="content">
               <h3>Домашняя пицца</h3>
               <div class="fas fa-angle-left" onclick="prev()"></div>
               <div class="fas fa-angle-right" onclick="next()"></div>
            </div>
         </div>

         <div class="slide">
            <div class="image">
               <img src="images/bd_image/home-img-2.png" alt="">
            </div>
            <div class="content">
               <h3>Пицца с грибами</h3>
               <div class="fas fa-angle-left" onclick="prev()"></div>
               <div class="fas fa-angle-right" onclick="next()"></div>
            </div>
         </div>

         <div class="slide">
            <div class="image">
               <img src="images/bd_image/home-img-3.png" alt="">
            </div>
            <div class="content">
               <h3>Сыр и Грибы</h3>
               <div class="fas fa-angle-left" onclick="prev()"></div>
               <div class="fas fa-angle-right" onclick="next()"></div>
            </div>
         </div>

      </div>

   </section>

</div>


<section class="about" id="about">

   <h1 class="heading">О нас</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/bd_image/home-img-2.png" alt="">
         <h3>Сделано с любовью</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum quae amet beatae magni numquam facere sit. Tempora vel laboriosam repudiandae!</p>
         <a href="#menu" class="btn">Наше меню</a>
      </div>

      <div class="box">
         <img src="images/bd_image/home-img-2.png" alt="">
         <h3>Доставка за 60 минут</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum quae amet beatae magni numquam facere sit. Tempora vel laboriosam repudiandae!</p>
         <a href="#menu" class="btn">Наше меню</a>
      </div>

      <div class="box">
         <img src="images/bd_image/home-img-2.png" alt="">
         <h3>Хватит на компанию</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum quae amet beatae magni numquam facere sit. Tempora vel laboriosam repudiandae!</p>
         <a href="#menu" class="btn">Наше меню</a>
      </div>

   </div>

</section>

<section id="menu" class="menu">

   <h1 class="heading">Наше меню</h1>

   <div class="box-container">
   <?php
      $products = mysqli_query($link, "SELECT * FROM `products`");
      while($product = mysqli_fetch_array($products)){
      ?>
      <div class="box">
         <div class="price"><span><?php echo $product['products_price'] ?></span>₽</div>
         <img src="images/<?php echo $product['products_image'] ?>" alt="">
         <p><?php echo $product['products_description'] ?></p>
         <div class="name"><?php echo $product['products_name'] ?></div>
         <form action="vendor\action\cart\addCart.php" method="POST">
            <input type="number" min="1" max="100" value="1" class="qty" name="quan">
            <input name="id" type="hidden" value="<?php echo $product['products_id'] ?>">
            <input type="submit" value="В корзину" name="addtocart" class="btn">
         </form>
      </div>     
   <?php } ?>
   </div>

</section>

<section class="faq" id="faq">

   <h1 class="heading">FAQ</h1>

   <div class="accordion-container">

      <div class="accordion active">
         <div class="accordion-heading">
            <span>Lorem ipsum</span>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accrodion-content">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, quas. Quidem minima veniam accusantium maxime, doloremque iusto deleniti veritatis quos.
         </p>
      </div>

      <div class="accordion">
         <div class="accordion-heading">
            <span>Lorem ipsum</span>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accrodion-content">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, quas. Quidem minima veniam accusantium maxime, doloremque iusto deleniti veritatis quos.
         </p>
      </div>

      <div class="accordion">
         <div class="accordion-heading">
            <span>Lorem ipsum</span>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accrodion-content">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, quas. Quidem minima veniam accusantium maxime, doloremque iusto deleniti veritatis quos.
         </p>
      </div>

      <div class="accordion">
         <div class="accordion-heading">
            <span>Lorem ipsum</span>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accrodion-content">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, quas. Quidem minima veniam accusantium maxime, doloremque iusto deleniti veritatis quos.
         </p>
      </div>

      <div class="accordion">
         <div class="accordion-heading">
            <span>Lorem ipsum</span>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accrodion-content">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, quas. Quidem minima veniam accusantium maxime, doloremque iusto deleniti veritatis quos.
         </p>
      </div>

   </div>

</section>


<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>телефон</h3>
         <p>1234567890</p>
         <p>8 800 555 3535</p>
      </div>

      <div class="box">
         <h3>наш адрес</h3>
         <p>Омск, пушкина 10</p>
      </div>

      <div class="box">
         <h3>время работы</h3>
         <p>24 часа</p>
      </div>

      <div class="box">
         <h3>почта</h3>
         <p>12345678@gmail.com</p>
      </div>

   </div>

   <div class="credit">
      
   </div>

</section>



<script src="js/script.js"></script>

</body>
</html>