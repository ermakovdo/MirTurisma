<?php
    session_start();
    if(isset($_SESSION['user']) & $_SESSION['user']['status'] == 1){
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
    <h1>Все пользователи</h1>
    <hr>

    <?php
        $users = mysqli_query($link, "SELECT * FROM `users`");
        while($user = mysqli_fetch_array($users)){
            ?>
            <section class="users">
                <div class="container">
                    <div class="box">
                        <h2>ID пользователя: <?php echo $user['user_id']?></h2>
                        <h2>Имя пользователя: <?php echo $user['user_name']?></h2>
                        <h2>Почта пользователя: <?php echo $user['user_mail']?></h2>
                        <h2>Статус пользователя: <?php if($user['user_status'] == 1){ echo "Администратор";}else{ echo "Стандартный пользователь";}?></h2>
                        <form action="vendor/action/adminfun/deleteUser.php" method="POST">
                        <input name="id" type="hidden" value="<?php echo $user['user_id'];?>">
                        <input name="DeleteUser" type="submit" value="Удалить пользователя">
                        </form>
                    </div>
                </div>
            </section>
       <?php }
    ?>
</body>
</html>