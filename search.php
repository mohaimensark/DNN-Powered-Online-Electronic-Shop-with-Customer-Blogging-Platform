<?php

include 'dbconn.php';



$search_val = $_POST["uname"];
$cat = "SELECT * from `user` where `username` = '$search_val'";
$results = mysqli_query($link, $cat);

$x = 0;
$output = '';
if ($search_val == '') {
    $x = $x + 1;
} else if (mysqli_num_rows($results) > 0) {
    $output .= ' <div id="displaying">
    <input type="text" id = "check_username" name="check_username" style="border:none;color:red;" value="Username already exists">
</div>';
    echo $output;
} else {
    $output .= ' <div id="displaying">
    <input type="text" id = "check_username" name="check_username" style="border:none;color:green;margin-top:none;" value="Username available">
</div>';
    echo $output;
}
?>