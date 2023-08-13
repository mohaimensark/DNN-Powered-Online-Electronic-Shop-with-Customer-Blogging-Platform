<?php 
    session_start();  
    setcookie('userid', $user_id, time() - 24 * 60 * 60); 
    session_destroy();
    header('location:index.php');
?>