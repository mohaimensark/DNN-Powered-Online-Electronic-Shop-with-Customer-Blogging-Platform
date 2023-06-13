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
    $output .= '<input id="displaying" name="check_username" style="border:none;color:red;" value="Username already exists" disabled>';
    echo $output;
} else {
    $output .= '<input id="displaying" name="check_username" style="border:none;color:green;" value="Username available" disabled>';
    echo $output;
}
?>