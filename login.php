<?php 
session_start();
error_reporting(E_ALL);
include 'link/config.php';
include 'link/functions.php';
if (isset($_SESSION['userInput'])){
  $userInput = $_SESSION["userInput"];
} 
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
    <!-- Display Message -->
    <?php display_message(); ?>
    <!-- Login Form -->
    
<section class="container p-5">
    <div class="row">
        <div class="col-sm-12 col-md-3 col-xl-3 col-lg-3">
        </div>
        <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
            <form action="link/login.php" method="POST">
                <img class="login__image" src="images/login_people.png" height="100px">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>ই-মেইল / ফোন</b></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="user_input" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email/phone with anyone
                        else.</small>
                </div>
                <div class="field">
                    <label for="exampleInputPassword1"><b>পাসওয়ার্ড</b></label>
                    <input autocomplete="new-password" class="form-control password" type="password"
                        name="password" id="user_password" />
                    <span class="p-viewer">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1"
                        <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>>
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <div class="d-flex justify-content-between">
                    <p>কোনো একাউন্ট নাই ? <a href="signup">Sign up</a></p>
                    <a href="forgotpassword">পাসওয়ার্ড মনে নাই ?</a>
                </div>
                <button type="submit" name="login" class="btn btn-success btn-block">Login</button>
            </form>

</section>
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
        <script>
    $("#message").show();
    setTimeout(function() {
        $("#message").hide();
    }, 3000);
    $(".p-viewer4").on('click',function() {
        if ($(".confirm_password").attr('type') === 'password') {
            $(".confirm_password").attr('type', 'text');
        } else {
            $(".confirm_password").attr('type', 'password');
        }
    });
    </script>
</body>

</html>