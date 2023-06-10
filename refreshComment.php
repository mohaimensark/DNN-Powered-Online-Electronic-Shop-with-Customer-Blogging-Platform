<?php
include 'dbconn.php';
session_start();
$id = $_SESSION['user_login'];

$post_id = $_POST["post_id"];

$query5 = "SELECT * FROM `comment` WHERE `post_id`='$post_id'";
$precom = mysqli_query($link, $query5);

while ($comment = mysqli_fetch_assoc($precom)) {
    $cnt++;
    if($cnt>100)
    {
        break;
    }
    $ucomID = $comment['user_id'];
    $query6 = "SELECT `name` FROM `user` WHERE `user_id`='$ucomID'";
    //    $precom=mysqli_query($link,$query5);
    //    $ultName = mysqli_fetch_assoc($precom);
    //    $actualName = $ultName['name'];
    $output .= ' <p> ' . $comment['user_id'] . ':: ' . $comment['comment_content'] . '';
}

echo $output;
?>