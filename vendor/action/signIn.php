<?php
    session_start();

    require "../components/connect.php";

    if(isset($_POST['signIn'])){
        $login = $_POST['login'];
        $password = md5($_POST['password']."qwertyuiopsaxdfghjkl");

        $users = mysqli_query($link, "SELECT * FROM `users` WHERE `user_name` = '$login' AND `user_password` = '$password'");
        if(mysqli_num_rows($users) >= 1){
            $user = mysqli_fetch_array($users);
            $_SESSION['user'] = [
                'id' => $user['user_id'],
                'login' => $user['user_name'],
                'email' => $user['user_mail'],
                'status' => $user['user_status'],
            ];
            header("location: ../../index.php");
        }else{
            $_SESSION['error'] = [
                'login' => 'Неверно введен логин или пароль',            
            ];
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
    }

?>