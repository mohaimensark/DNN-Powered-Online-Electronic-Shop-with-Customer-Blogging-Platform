<?php
include 'dbconn.php';
$id = $_POST["id"];
$review = $_POST["review"];
$rating = $_POST["rating"];


$que = "SELECT * FROM `user`";






$row = mysqli_query($link, $que);
//   $res = mysqli_fetch_assoc($row);
$output = '';
while ($res = mysqli_fetch_assoc($row)) {
    $output .= '<div class="display"><h3>Name : </h3><h3>' . $res["name"] . '</h3></div><br>
            <div class="display"><h3>Given Rating : </h3><h3>' . $res["rating"] . '</h3></div><br>
            <div class="display"> <h3>Given Review : </h3><h3>' . $res["review"] . '</h3></div><br><br><br>';
    //  echo $output;
}


echo $output;







//$result = mysqli_query($conn,$sql);

if (mysqli_query($link, $que)) {
    // echo 1;
    $output = '';
    while ($res = mysqli_fetch_assoc($row)) {
        $output .= '<div class="display"><h3>Name : </h3><h3>' . $res["name"] . '</h3></div><br>
            <div class="display"><h3>Given Rating : </h3><h3>' . $res["rating"] . '</h3></div><br>
            <div class="display"> <h3>Given Review : </h3><h3>' . $res["review"] . '</h3></div><br><br><br>';
        //  echo $output;
    }


    echo $output;
} else {
    echo 0;
}
?>