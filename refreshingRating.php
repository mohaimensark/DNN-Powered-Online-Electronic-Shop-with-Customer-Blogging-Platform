<?php
include 'dbconn.php';
//$id = $_POST["id"];
//$review = $_POST["review"];
//$rating = $_POST["rating"];


$que = "SELECT * FROM `user` where `rating`>=0";






$outputTable='';
$row=mysqli_query($link, $que);

    $outputTable.= '<table>
    <tr>
        <th>User Image</th>
        <th>Username</th>
        <th>Rating</th>
        <th>Review</th>
    </tr>';
    while ($res = mysqli_fetch_assoc($row)) {
        $outputTable .= '
        <tr>
        <td><img src="images/' . $res['user_image'] . '"  alt="..." style="border-radius: 50%; height: 50px; width:50px;margin:10px;"></td>
        <td>' . $res["name"] . '</td>
        <td>' . $res["rating"] . '</td>
        <td>' . $res["review"] . '</td>
    </tr>';
        //  echo $output;
    }
    $outputTable .= '</table>';
    echo $outputTable;





//$result = mysqli_query($conn,$sql);

// if (mysqli_query($link, $que)) {
//     // echo 1;
//     $outputTabl= '<table>
//     <tr>
//         <th>User Image</th>
//         <th>Username</th>
//         <th>Rating</th>
//         <th>Review</th>
//     </tr>';
//     while ($res = mysqli_fetch_assoc($row)) {
//         $outputTabl .= '
//         <tr>
//         <td><img src="images/' . $res['user_image'] . '"  alt="..." style="border-radius: 50%; height: 50px; width:50px;margin:10px;"></td>
//         <td>' . $res["name"] . '</td>
//         <td>' . $res["rating"] . '</td>
//         <td>' . $res["review"] . '</td>
//     </tr>';
//         //  echo $output;
//     }
//     $outputTabl .= '</table>';
//     echo $outputTabl;
// } else {
//     echo 0;
// }
?>