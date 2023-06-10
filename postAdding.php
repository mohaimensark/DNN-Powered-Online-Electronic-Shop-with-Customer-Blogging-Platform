<?php
session_start();
require_once './dbconn.php';

if(isset($_POST['submit'])) {
    $lolo = $_POST['post_info'];
    $user_id = $_SESSION['user_login'];
    
    $query = "INSERT INTO `post`(`post_content`, `user_id`) VALUES ('$lolo','$user_id')";
    $result = mysqli_query($link, $query);
    if($result){
        header('location: discussion.php');
    }
}
   

?>