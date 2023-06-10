<?php
include 'dbconn.php';
session_start();
$id = $_SESSION['user_login'];

$post_id = $_POST["id_like"];


$query3 = "SELECT * FROM `like` WHERE `post_id`='$post_id' && `user_id`='$id'";
$total_like_pre = mysqli_query($link, $query3);
$total_like_count = 0;

while ($total_like = mysqli_fetch_assoc($total_like_pre)) {
    $total_like_count++;
}

$query4 = "SELECT * FROM `dislike` WHERE (`post_id`='$post_id' AND `user_id`='$id')";
$total_dislike_pre = mysqli_query($link, $query4);
$total_dislike_count = 0;

while ($total_dislike = mysqli_fetch_assoc($total_dislike_pre)) {
    $total_dislike_count++;
}



if ($total_like_count == 0 && $total_dislike_count == 0) {
    $insert = "INSERT INTO `like`(`post_id`, `user_id`) VALUES ('$post_id','$id')";


    //$result = mysqli_query($conn,$sql);

    if (mysqli_query($link, $insert)) {
        echo $total_like_count;
    } else {
        echo 0;
    }
} else if ($total_like_count == 0 && $total_dislike_count != 0) {
    $insert = "INSERT INTO `like`(`post_id`, `user_id`) VALUES ('$post_id','$id')";


    //$result = mysqli_query($conn,$sql);

    if (mysqli_query($link, $insert)) {
        echo $total_like_count;
    } else {
        echo 0;
    }

    $del = "DELETE FROM `dislike` WHERE (`user_id`='$id' AND `post_id`='$post_id')";
    mysqli_query($link, $del);
} else {
    $del = "DELETE FROM `like` WHERE (`user_id`='$id' AND `post_id`='$post_id')";
    mysqli_query($link, $del);
    if (mysqli_query($link, $del)) {
        echo 1;
    } else {
        echo 0;
    }
}







?>