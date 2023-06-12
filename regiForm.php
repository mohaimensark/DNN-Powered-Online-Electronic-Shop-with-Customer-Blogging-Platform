<?php
session_start();
require_once './dbconn.php';
if (isset($_POST['sign_up'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $birthday = $_POST['birthday'];
    $username = $_POST['username'];
  //  echo $username;
    $email_check = mysqli_query($link, "SELECT * FROM user WHERE email='$email';");
    if (mysqli_num_rows($email_check) == 0) {
        if (strlen($password) > 5) {
            if ($password == $c_password) {
                $password = md5($password);
                $query = "INSERT INTO `user`(`name`, `email`, `password`, `rating`, `review`, `DateOfBirth`, `username`) VALUES ('$name','$email','$password',-1,'','$birthday','$username')";
                
                $result = mysqli_query($link, $query);
                if ($result) {
                    echo $username;
                    $q = mysqli_query($link, "SELECT * FROM `user` WHERE `email`='$email';");
                    $rr = mysqli_fetch_assoc($q);
                    $user_id = $rr['user_id'];
                    $_SESSION['user_login'] = $user_id;
                    header('location:index.php');
                }else{
                    echo 'not worked';
                }
            } else {
                $password_not_match = "password doesn't matched";
            }
        } else {
            $password_l = "password should be more than 5 character";
        }
    } else {
        $email_error = "This email address is already exists";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/scss/main.css">
    <link rel="stylesheet" href="styles/signupFormSt.css">
    <script src="js/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="login-left">
            <header class="login-header">
                <h2>Welcome   to   Our<br> E-Shop </h2>
               
                <p>Please Signup to use this platform</p>
            </header>
            <!--<form action="wel.php" method="post">-->

            <form action="" method="POST" enctype="multipart/form-data" class="login-form" >
                <div class="login-form-content">
                    <div class="form-item">
                        <label for="name">Enter Name</label>
                        <input type="text" name="name" id="name" placeholder="Name" value="<?php if (isset($name)) {
                            echo $name;
                        } ?>" required>
                    </div>
                    <div class="form-item">
                        <label for="username">Enter Username</label>
                        <input type="text" name="username" id="username" placeholder="username" value="<?php if (isset($username)) {
                            echo $username;
                        } ?>" autocomplete="off" required>
                        <h6 id="displaying"></h6>
                    </div>
                    <div class="form-item">
                        <label for="email">Enter Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" value="<?php if (isset($email)) {
                            echo $email;
                        } ?>" required>

                    </div>
                    <div class="form-item">
                        <label for="birthday">Birthday:</label>
                        <input name="birthday" type="date" id="birthday" name="birthday">
                     
                    </div>
                    <div class="form-item">
                        <label for="password">Enter Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" value="" required>

                    </div>
                    <div class="form-item">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="c_password" id="confirmPassword" class="form-control"
                            placeholder="Confirm Password" value="" required>

                    </div>
                   <!-- <div class="form-group">
                       <input type="submit" name="sign_up" value="Sign Up" class="btn btn-primary" />
                   </div> -->
                    <button type="submit" name="sign_up" value="Sign Up">Sign Up</button>
                </div> 
              </form>
                <div class="login-signup-option">
                    <h6>Already have an account? <a href="login.php">Log in</a></h6>
                </div>
         

            <div class="error">
                <?php
                if (isset($email_error)) {
                    echo $email_error;
                } else {
                    if (isset($password_l)) {
                        echo $password_l;
                    } else {
                        if (isset($password_not_match)) {
                            echo $password_not_match;
                        }
                    }
                }

                ?>

            </div>




        </div>
        <div class="login-right">
            <img src="images/svg/image.svg" alt="Illustration-People-bag" />
        </div>
    </div>
    <script>
        $("#username").on("keyup", function(e) {
                    //  e.preventDefault();



                    var term = $(this).val();

                    console.log(term);


                    $.ajax({
                        url: "search.php",
                        type: "POST",
                        data: {
                            search: term
                        },
                        success: function(data) {


                            $("#displaying").html(data);



                        }
                    });


                });
          
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>