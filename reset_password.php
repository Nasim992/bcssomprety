<?php 
session_start();
error_reporting(E_ALL);
include 'link/config.php';
include 'link/functions.php';

$email = $_GET['email'];
$validation_code = $_GET['validation_code'];

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport"
        content="width=device-width,height=device-height,initial-scale=1.0,maximum-scale=2.0,minimum-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/logo-c1383effd4d17a6b3b566837fc7caeb895c979d9463ece5245c09ab0b7b89ddc.png"
        type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <title>BCS Somprity</title>
</head>

<body>
    <!-- Heading -->
    <?php  include 'heading.php';?>
    <!-- Navbar -->
    <?php  include 'navbar.php';?>
    <!-- Forgot password-->
    <div class="container col-md-5 p-5">
    <?php display_message(); ?>
        <div class="pass_box">
            <form class="new_user" id="new_user" action="link/forgotpassword.php" accept-charset="UTF-8" method="post">

            <div class="field">
                    <b>পাসওয়ার্ড</b>
                    <em>(আপনার পছন্দমতো কমপক্ষে 6 অক্ষরের বা তার বেশি নাম্বার দিন)</em>
                    <input type="hidden" name="email" value="<?php echo $email;?>">
                    <input type="hidden" name="validation_code" value="<?php echo $validation_code;?>">
                    <input autocomplete="new-password" class="form-control password" type="password"
                        name="user_reset_password" id="user_password" />
                    <span class="p-viewer">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </span>
                </div>
                <br>
                <div class="actions">
                    <input type="submit" name="reset_password_submit" value="Reset Password"
                        class="form-control btn btn-success" data-disable-with="Send me reset password instructions" />
                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- Footer -->
    <?php include 'footer.php'?>


 <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.3/css/all.min.css">
    <script>
    $("#message").show();
    setTimeout(function() {
        $("#message").hide();
    }, 3000);
    $(".p-viewer").on('click',function() {
        if ($(".password").attr('type') === 'password') {
            $(".password").attr('type', 'text');
        } else {
            $(".password").attr('type', 'password');
        }
    });

    $(".p-viewer2").on('click',function() {
        if ($(".confirm_password").attr('type') === 'password') {
            $(".confirm_password").attr('type', 'text');
        } else {
            $(".confirm_password").attr('type', 'password');
        }
    });

    $(".p-viewer3").on('click',function() {
        if ($(".current_password").attr('type') === 'password') {
            $(".current_password").attr('type', 'text');
        } else {
            $(".current_password").attr('type', 'password');
        }
    });
    </script>

</body>

</html>