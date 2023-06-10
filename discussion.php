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
    <title>Discussion</title>
    <script src="https://kit.fontawesome.com/cc0fc94170.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

    <link rel="stylesheet" href="styles/indexSt.css">
    <link rel="stylesheet" href="styles/myCartSt.css">
    <link rel="stylesheet" href="styles/discussion.css">

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


                    <li class="nav-item">
                        <a class="nav-link" href="detect.php">Classification</a>
                    </li>

                    <?php
                    if ($user_id > 0) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="rating.php">Rate us</a>
                        </li>
                        <?php
                    } else { ?>

                        <?php
                    }
                    ?>


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

    <div class="boss">

        <div class="top">
            <div class="DisscussionTitle">
                <h1 style="margin-top:20px">Talk about electronic products</h1>
            </div>
            <div>
                <form action="postAdding.php" method="post">
                    <div class="formdiv">
                        <input type="text" placeholder="Write here" name="post_info" class="postinput">
                        <button type="submit" class="postbutton" name="submit" value="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>


        <div class="parentpost">
            <div>
                <?php
                session_start();
                $user_id = $_SESSION['user_login'];
                require_once './dbconn.php';
                $query = "SELECT * FROM `post` ORDER BY `post_id` DESC";
                $row = mysqli_query($link, $query);
                $output = '';
                while ($res = mysqli_fetch_assoc($row)) {
                    $getname = "SELECT `name` FROM `user` WHERE `user_id`='$user_id'";
                    $post_id = $res['post_id'];
                    $getname2 = mysqli_query($link, $getname);
                    $realnames = $res['user_id'];

                    // retriving realname
                    $query33 = "SELECT * FROM `user` WHERE `user_id`='$realnames'";
                    $row33 = mysqli_query($link, $query33);
                    while ($lol = mysqli_fetch_assoc($row33)) {
                        $realname = $lol['name'];
                        break;
                    }


                    // retriving like
                
                    $query3 = "SELECT * FROM `like` WHERE `post_id`='$post_id'";
                    $total_like_pre = mysqli_query($link, $query3);
                    $total_like_count = 0;
                    $is_liked = 0;
                    while ($total_like = mysqli_fetch_assoc($total_like_pre)) {
                        $total_like_count++;

                        if ($total_like['user_id'] == $user_id) {
                            $is_liked = 1;
                        }
                    }



                    //retriving dislike
                    $query4 = "SELECT * FROM `dislike` WHERE `post_id`='$post_id'";
                    $total_dislike_pre = mysqli_query($link, $query4);
                    $total_dislike_count = 0;
                    $is_disliked = 0;
                    while ($total_dislike = mysqli_fetch_assoc($total_dislike_pre)) {
                        $total_dislike_count++;

                        if ($total_dislike['user_id'] == $user_id) {
                            $is_disliked = 1;
                        }
                    }



                    $output .= '<div class="borderClass"><h4 class="nametitle"># ' . $realname . '</h4>';
                    $output .= '<div class="content">
              <h5 class = "lollo" id="post_content">' . $res['post_content'] . '</h5></div>';

                    // get like and dislike info
                
                    $output .= '   <div>
              <div class="likeanddislike">
                  <button id =' . $post_id . ' class="likebtn">';
                    if ($is_liked == 1)
                        $output .= 'Liked';
                    else
                        $output .= 'Like';


                    $output .= '</button>
                  <input type="text" id="likeinputID" value=' . $total_like_count . ' class="likecnt" disabled>
              </div>
              <div class="likeanddislike">
                  <button id =' . $post_id . ' class="dislikebtn">';
                    if ($is_disliked == 1)
                        $output .= 'Disliked';
                    else
                        $output .= 'Dislike';


                    $output .= '</button>
                  <input type="text" id="dislikeinputID" value=' . $total_dislike_count . ' class="likecnt" disabled>
              </div>
          </div>
  
          <div class="comment" id="commentTotal">
              <input type = "text" placeholder="Comment here" id="commentID' . $post_id . '"  name="commentname" class="commentclass">
              <button type="submit" class="commentbtn" id =' . $post_id . ' name="submitcom" value="submitcom">Comment</button>
              <div id="commentRefresh' . $post_id . '">';

                    $query5 = "SELECT * FROM `comment` WHERE `post_id`='$post_id'";
                    $precom = mysqli_query($link, $query5);
                    $cnt = 0;
                    while ($comment = mysqli_fetch_assoc($precom)) {
                        $cnt++;
                        if ($cnt > 100) {
                            break;
                        }
                        $ucomID = $comment['user_id'];
                        $query6 = "SELECT * FROM `user` WHERE `user_id`='$ucomID'";
                        $cnt2 = 0;

                        $actualName = $ucomID;

                        $precom2 = mysqli_query($link, $query6);
                        while ($ultName = mysqli_fetch_assoc($precom2)) {
                            $actualName = $ultName['name'];
                            break;
                        }

                        $output .= '<div  class = "indicomment"><p class="commentContent"> ' . $actualName . ' : ' . $comment['comment_content'] . '</div>';
                    }
                    $output .= ' </div> </div> </div>';
                }
                echo $output;
                ?>
                <script>
                    var likeb = document.getElementsByClassName('likebtn');
                    var dislikeb = document.getElementsByClassName('dislikebtn');


                    for (var i = 0; i < likeb.length; i++) {
                        var button = likeb[i];
                        // console.log(button);
                        button.addEventListener('click', function (event) {
                            var buttonClicked = event.target;
                            var input = buttonClicked.parentElement.parentElement.children[1].children[0];
                            var dislike_cnt = buttonClicked.parentElement.parentElement.children[1].children[1];
                            var like_cnt = buttonClicked.parentElement.parentElement.children[0].children[1];

                            var number_of_like = like_cnt.value;
                            var number_of_dislike = dislike_cnt.value;

                            //console.log(number_of_dislike);

                            var disval = input.textContent;
                            //  console.log(disval);
                            if (buttonClicked.textContent == "Like" && disval == "Dislike") {
                                buttonClicked.textContent = "Liked";
                                var newValue = parseInt(like_cnt.value) + 1;
                                like_cnt.value = newValue;
                            }
                            else if (buttonClicked.textContent == "Like" && disval == "Disliked") {
                                buttonClicked.textContent = "Liked";
                                var newValue = parseInt(like_cnt.value) + 1;
                                like_cnt.value = newValue;
                                input.textContent = "Dislike";
                                var newValue = parseInt(dislike_cnt.value) - 1;
                                dislike_cnt.value = newValue;
                            }
                            else {
                                buttonClicked.textContent = "Like";
                                var newValue = parseInt(like_cnt.value) - 1;
                                like_cnt.value = newValue;
                            }


                        })
                    }

                    for (var i = 0; i < dislikeb.length; i++) {
                        var button = dislikeb[i];
                        // console.log(button);
                        button.addEventListener('click', function (event) {
                            var buttonClicked = event.target;

                            var input = buttonClicked.parentElement.parentElement.children[0].children[0];


                            var dislike_cnt = buttonClicked.parentElement.parentElement.children[1].children[1];
                            var like_cnt = buttonClicked.parentElement.parentElement.children[0].children[1];



                            // like_cnt.value=ParseInt(number_of_like);
                            // dislike_cnt.value=ParseInt(number_of_dislike);
                            //  console.log(input); */
                            var disval = input.textContent;


                            /*   console.log(inputValue); */

                            if (buttonClicked.textContent == "Dislike" && disval == "Like") {
                                buttonClicked.textContent = "Disliked";
                                var newValue = parseInt(dislike_cnt.value) + 1;
                                dislike_cnt.value = newValue;
                            }
                            else if (buttonClicked.textContent == "Dislike" && disval == "Liked") {
                                buttonClicked.textContent = "Disliked";
                                var newValue = parseInt(dislike_cnt.value) + 1;
                                dislike_cnt.value = newValue;
                                input.textContent = "Like";
                                var newValue = parseInt(like_cnt.value) - 1;
                                like_cnt.value = newValue;

                            }
                            else {
                                buttonClicked.textContent = "Dislike";
                                var newValue = parseInt(dislike_cnt.value) - 1;
                                dislike_cnt.value = newValue;
                            }
                        })
                    }
                </script>
            </div>

            <!-- #region -->

        </div>

    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

    <script type="text/javascript">




        $(document).on('click', '.commentbtn', function (e) {
            // <div class="comment">
            //   <input type = "text" placeholder="Comment here"  name="commentname" class="commentclass">
            //   <button type="submit" class="commentbtn" id ='.$post_id.' name="submitcom" value="submitcom">Submit</button>



            var post_id = $(this).attr("id");

            var comment_text = $('#commentID' + post_id + '').val();




            console.log(comment_text);
            var action = "add";



            $.ajax({
                url: "disscussComment.php",
                type: "POST",
                data: {
                    post_id: post_id,
                    comment_text: comment_text
                },
                success: function (data) {
                    if (data) {

                        alert(data);
                        $("#commentRefresh" + post_id + '').html(data);


                    } else {

                        // alert("bye");
                    }



                }
            });


        });




        $(document).on('click', '.likebtn', function (e) {
            //  e.preventDefault();



            var id_like = $(this).attr("id");

            // var id_text = $(this).attr("id").html;
            // alert(id_text);
            // var like_cnt = $('likeinputID').val();


            var action = "add";



            $.ajax({
                url: "discussAction.php",
                type: "POST",
                data: {
                    id_like: id_like
                },
                success: function (data) {
                    if (data) {

                        //alert(data);

                    } else {

                        //  alert("bye");
                    }



                }
            });


        });

        $(document).on('click', '.dislikebtn', function (e) {
            //  e.preventDefault();



            var id_dislike = $(this).attr("id");

            // var id_text = $(this).attr("id").html;
            // alert(id_text);
            // var like_cnt = $('likeinputID').val();


            var action = "add";



            $.ajax({
                url: "discussActionDis.php",
                type: "POST",
                data: {
                    id_dislike: id_dislike
                },
                success: function (data) {
                    if (data) {

                        //    alert(data);

                    } else {

                        //    alert("bye");
                    }



                }
            });


        });

    </script>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>