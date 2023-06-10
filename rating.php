<?php
session_start();
require_once './dbconn.php';
$user_id = 0;

if (isset($_SESSION['user_login'])) {
    $user_id = $_SESSION['user_login'];
    $take = mysqli_query($link, "SELECT * FROM `user` WHERE user_id='$user_id';");
    $taker = mysqli_fetch_assoc($take);
    $name = $taker['name'];
    $splitter = " ";
    $pieces = explode($splitter, $name);
    //SELECT * FROM `user_info` WHERE user_id='1';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate us</title>
    <script src="https://kit.fontawesome.com/cc0fc94170.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styles/indexSt.css">
    <link rel="stylesheet" href="styles/myCartSt.css">
    <link rel="stylesheet" href="styles/rating.css">
    <link rel="stylesheet" href="styles/review.css">

</head>

<body>

    <!--Navbar START -->
    <div class="header-sec">
        <div class="row">
            <div class="col-md-9 col-sm-9 brand-logo">
                <p><span class="no-same no-shop">ELECTRONIC </span><span class="no-same logo-shop">SHOP</span></p>
            </div>

            <div class="col-md-2 col-sm-2" style="text-align: center;margin-top: 10px;margin-bottom: 10px;">
                <?php
                if ($user_id) {
                    echo "Welcome ";
                    echo $name;
                }
                ?>
            </div>
            <div class="col-md-1 col-sm-1">
                <div class="dropdown">

                    <a class="dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php
                        if ($user_id) {
                            echo '<img src="images/user_on.png" alt="">';
                        } else {
                            echo '<img src="images/user_off.png" alt="">';
                        }
                        ?>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <?php
                        if ($user_id > 0) { ?>
                            <li><a class="dropdown-item" href="regiForm.php">Sign Up</a></li>
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            <?php
                        } else { ?>
                            <li><a class="dropdown-item" href="login.php">Log in</a></li>
                            <li><a class="dropdown-item" href="regiForm.php">Sign Up</a></li>

                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-bg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <div class="d-flex myCartMenu me-2">
                            <a class="" href="index.php">Home</a>
                        </div>
                    </li>

                </ul>
                <?php
                if ($user_id > 0) { ?>
                    <div id="myCartBtn" class="myCartMenu">
                        <a href="mycart.php">
                            <i class="fas fa-shopping-cart"></i>
                            <span id="cart-item" class="badge badge-danger"></span>
                        </a>
                    </div>
                    <?php
                } else { ?>
                    <div id="myCartBtn" class="myCartMenu">
                        <i class="fas fa-shopping-cart"></i>
                        <span id="cart-item" class="badge badge-danger"></span>
                    </div>
                    <?php
                }
                ?>

            </div>

        </div>
    </nav>
    <!--Navbar END -->


    <br><br>

    <div class="rated2">
        <h1>Current Rating</h1>
        <div class="starr" id="finres">
            <?php
            $average = "SELECT AVG(`rating`) AS avg FROM `user`";

            $row = mysqli_query($link, $average);
            $res = mysqli_fetch_assoc($row);
            $avgr = intval(round($res['avg']));

            $output = '';
            while ($avgr--) {
                $output .= '<span class="fa fa-star checked"></span>';
            }

            $x = intval(round($res['avg']));
            $rem = 5 - $x;
            while ($rem > 0) {
                $rem--;
                $output .= '<span class="fa fa-star"></span>';
            }
            echo $output;
            ?>
        </div>

    </div>

    <div class="titler">
        <h1>Rate Us</h1>
        <div class="container">
            <button class="star">&#9734;</button>
            <button class="star">&#9734;</button>
            <button class="star">&#9734;</button>
            <button class="star">&#9734;</button>
            <button class="star">&#9734;</button>

        </div>
        <input class="current-rating" id="rat" value="0" disabled>
        <input type="text" class="reviewInput" id="review" placeholder="Write something about us">
        <?php
        session_start();
        require_once './dbconn.php';
        $user_id = $_SESSION['user_login'];


        echo '<button class="submitbtn" name="submitbtn" id=' . $user_id . ' > Submit </button>'
            ?>
    </div>
    <div class="parentReview">
        <div class="titler">
            <h1>Who rated us:</h1>
        </div>
        <div class="rated" id="refresh">
            <?php

            require_once './dbconn.php';

            $que = "SELECT * FROM `user`";

            $row = mysqli_query($link, $que);
            //   $res = mysqli_fetch_assoc($row);
            $output = '';
            while ($res = mysqli_fetch_assoc($row)) {
                $output .= '<div class = "individual"><div class="display"><h3>Name : </h3><h3>' . $res["name"] . '</h3></div><br>
            <div class="display"><h3>Given Rating : </h3><h3>' . $res["rating"] . '</h3></div><br>
            <div class="display"> <h3>Given Review : </h3><h3>' . $res["review"] . '</h3></div></div><br><br><br>';
                //  echo $output;
            }


            echo $output;
            ?>


        </div>
    </div>


    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script>

        const stars = document.querySelectorAll('.star');
        const current_rating = document.getElementsByClassName('.current-rating');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {

                let current_star = index + 1;
                current_rating.innerText = `${current_star}`;
                var triggered = event.target;
                var input = triggered.parentElement.parentElement.children[2];
                input.value = current_star;
                // console.log(input);
                stars.forEach((star, i) => {
                    if (current_star >= i + 1) {
                        star.innerHTML = '&#9733;';
                    } else {
                        star.innerHTML = '&#9734;';
                    }
                });

            });
        });

        $(document).ready(function () {
            setInterval(function () {
                $.ajax({
                    url: "refreshingRating.php",
                    success: function (data) {
                        $('#refresh').html(data); // Update the content of the DIV element
                    }
                });
            }, 1000); // Refresh the content every 5 seconds
        });

        $(document).on('click', '.submitbtn', function (e) {
            //  e.preventDefault();



            var idx = $(this).attr("id");





            var review = $('#review').val();


            var rating = $('#rat').val();


            var action = "add";



            $.ajax({
                url: "ratingAction.php",
                type: "POST",
                data: {
                    id: idx,
                    review: review,
                    rating: rating
                },
                success: function (data) {
                    if (data > 0) {

                        var output = '<div class="starr" id="finres">';
                        var x = data;
                        var y = 5 - x;
                        while (x--) {
                            output += '<span class="fa fa-star checked"></span>';
                        }
                        while (y--) {
                            output += '<span class="fa fa-star"></span>';
                        }

                        $("#finres").html(output);

                    } else {

                        $("#finres").html("Error");
                    }



                }
            });


        });


    </script>
</body>

</html>