<?php
    require "../../components/connect.php";
    
    if(isset($_POST['DeleteUser'])){
        $id = $_POST['id'];
        mysqli_query($link, "DELETE FROM `users` WHERE `user_id` = '$id'");
    }
    
    header("location: ".$_SERVER['HTTP_REFERER']);
?>