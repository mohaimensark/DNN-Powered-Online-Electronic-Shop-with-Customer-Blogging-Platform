<?php
require_once './dbconn.php';
session_start();
if (isset($_SESSION['user_login'])) {
    
    header('location:index.php');
}
if (isset($_COOKIE['rememberMe'])) {
    header('location:index.php');
}

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $email_check = mysqli_query($link, "SELECT * FROM `user` WHERE `email`='$email';");

    if (mysqli_num_rows($email_check) > 0) {
        $row = mysqli_fetch_assoc($email_check);
        if ($row['password'] == md5($password)) {
            $user_id = $row['user_id'];
            $_SESSION['user_login'] = $user_id;
            if(isset($_POST['rememberMe'])) {
              // echo 'checked';
            
              $userId = $user_id; // Replace with the actual user ID
            //   $rememberToken = generateRememberToken(); // Replace with your token generation logic
              setcookie('rememberMe' , true, time() + (30 * 24 * 60 * 60), '/');
          
            
            }
           header('location:index.php');
        } else {
            $wrong_password = "This password is wrong";
        }
    } else {
        $email_not_found = "This email not found";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/loginFormSt.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="gsapcss.css" />
</head>

<body>

    <div class="loginForm">
        <div class="login-main">
            <div class="login-header">
                <h3>Welcome Back</h3>
                <h4>Login here</h4>
            </div>
            
            <div class="login-text">
                <form action="login.php" method="POST">
                    <div>
                        <label for="email">Email</label>
                        <input id="email" type="email" placeholder="email" name="email" required class="form-control"
                            value="<?php if (isset($email)) {
                                echo $email;
                            } ?>" />
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input id="password" type="password" placeholder="Password" name="password" required=""
                            class="form-control" value="<?php if (isset($password)) {
                                echo $password;
                            } ?>" />
                    </div>
                    <br>
                    <div>
                    <!-- <input type="checkbox" name="rememberMe" id="rememberMeCheckbox">
                         Remember Me -->
                    </div>
                    <div>
                        <input class="btn btn-primary" style="margin-left:120px" type="submit" value="Login" name="login">
                    </div>
                </form>

            </div>
            <div style="font-style: italic;">
                <?php if (isset($email_not_found)) {
                    echo $email_not_found;
                } ?>
                <?php if (isset($wrong_password)) { ?>
                    <div class="danger-alert">
                        <p>
                            <?php echo $wrong_password; ?>
                        </p>
                    </div>
                    <div class="forgot">
                        <p><a href="forgot.php?id=<?php echo base64_encode($email); ?>">Forgot</a>&nbsp; &nbsp;password?</p>
                    </div>
                    <?php
                } ?>
            </div>
            <div class="login-signup-option">
                <h6>Don't have account? <a href="regiForm.php">sign up</a></h6>
            </div>
        </div>

    </div>
    <div>
        <svg id="svg" viewBox="0 0 1000 1000">
            <path id="path1"></path>
            <path id="path2"></path>
            <!-- <g id="dot-container"></g> -->
        </svg>

     
        <!-- partial -->
        <script src='https://unpkg.co/gsap@3/dist/gsap.min.js'></script>
        <script src="js/Animscript.js"></script>




    </div>
    
</body>

</html>