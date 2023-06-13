<?php

include 'dbconn.php';

$is_logged_in = false;
$user_id = 0;
$user_role = '';
$user_data = [];




    $search_val = $_POST["uname"];





    $cat = "SELECT * from `user` where `username` = '$search_val'";
    $results = mysqli_query($link, $cat);


    $output = '';

    if (mysqli_num_rows($results) > 0 && $search_val!='/') {
        $output.='<h6 style="color: red;">Username already exists</h6>';
        echo $output;
    }else{
        $output.='<h6 style="color: green;">Username available</h6>';
        echo $output;
    }
?>