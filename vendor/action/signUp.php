<?php
    session_start();

    require "../components/connect.php";

    if(isset($_POST['signUp'])){
        $password = $_POST['password'];
        $password_conf = $_POST['conf_password'];
        if($password == $password_conf){
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = md5($password."qwertyuiopsaxdfghjkl");
            $users = mysqli_query($link, "SELECT * FROM `users` WHERE `user_name` = '$login' OR `user_mail` = '$email'");
            if(mysqli_num_rows($users) >= 1){
                $_SESSION['error'] =[ 
                    'email' => 'Такой логин или email уже существует',
                ];
                header('location:'.$_SERVER['HTTP_REFERER']);
            }else{
                mysqli_query($link, "INSERT INTO `users`(`user_name`, `user_mail`, `user_password`) VALUES ('$login', '$email', '$password')");
                $users = mysqli_query($link, "SELECT * FROM `users` WHERE `user_name` = '$login' OR `user_mail` = '$email'");
                $user = mysqli_fetch_array($users);
                $_SESSION['user'] = [
                    'id' => $user['user_id'],
                    'login' => $user['user_name'],
                    'email' => $user['user_mail'],
                    'status' => $user['user_status'],
                ];
                header("location: ../../index.php");
            }
        }else {
            $_SESSION['error'] = [
                'password' => 'Пароли не совпадают',
            ];
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
    }   
?>