<?php
include 'dbconn.php';
$id = $_POST["id"];
$review = $_POST["review"];
$rating = $_POST["rating"];




$insert = "UPDATE `user` SET `rating`='$rating',`review`='$review' WHERE `user_id`='$id'";



//$result = mysqli_query($conn,$sql);

if (mysqli_query($link, $insert)) {
    // echo 1;
    $average = "SELECT AVG(`rating`) AS avg FROM `user` where `rating`>=0";

    $row = mysqli_query($link, $average);
    $res = mysqli_fetch_assoc($row);
    $actrat = floatval($res['avg']);
    $avgr =intval(round($res['avg']));
    // $output = '<div class="container">';
    // $xx=$output;
    // while($xx>0){
    //     $output.='<button class="star">&#9734;</button>';
    // }
    
    // $output.='</div>';
     

    echo $actrat;

    //  $row = $result->fetch_assoc();
    //  $averageValue = $row['average_value'];
} else {
    echo 0;
}
?>