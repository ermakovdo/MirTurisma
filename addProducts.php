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
    <form action="vendor\action\products\productsAdd.php" enctype="multipart/form-data" method="POST">
        <h1>Новый продукт</h1>
        <div>
            <h3>Название</h3>
            <input name="name" type="text">
        </div>
        <div>
            <h3>Описание</h3>
            <input name="description" type="text">
        </div>
        <div>
            <h3>Цена</h3>
            <input name="price" type="number">
        </div>
        <div>
            <h3>Фото</h3>
            <input name="image" type="file">
        </div>
        <br>
        <input type="submit" name="addProduct" value="Добавить продукт">
    </form>
</body>
</html>