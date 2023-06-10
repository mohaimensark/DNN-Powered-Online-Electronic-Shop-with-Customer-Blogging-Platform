<?php
include 'dbconn.php';
session_start();
$id = $_SESSION['user_login'];

$post_id = $_POST["post_id"];
$comment_text = $_POST["comment_text"];




$insert = "INSERT INTO `comment`(`post_id`, `user_id`, `comment_content`) VALUES ('$post_id','$id','$comment_text')";


//$result = mysqli_query($conn,$sql);

if (mysqli_query($link, $insert)) {

    $query5 = "SELECT * FROM `comment` WHERE `post_id`='$post_id'";
    $precom = mysqli_query($link, $query5);

  

   
   
    while ($comment = mysqli_fetch_assoc($precom)) {
        $ucomID = $comment['user_id'];
        $query6 = "SELECT * FROM `user` WHERE `user_id`='$ucomID'";
        $cnt2 = 0;

        $actualName = $ucomID;
   
        $precom2=mysqli_query($link,$query6);
        while($ultName = mysqli_fetch_assoc($precom2)){
             $actualName = $ultName['name'];
             break;
        }

        $output .= '<div  class = "indicomment" <p class="commentContent" > ' . $actualName . ' : ' . $comment['comment_content'] . '</div>';
    }
   

    echo $output;
} else {
    echo 0;

}







?>