<?php  
session_start();
error_reporting(E_ALL);
include '../link/config.php';
include '../link/functions.php';
IsUserLoggedIn();
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
    <link rel="stylesheet" href="../css/index.css">
    <title>BCS Somprety</title>
</head>

<body>
    <!-- Heading -->
    <?php  include '../heading.php';?>
    <!-- Navbar -->
    <?php  include 'navbar.php';?>
    <!-- Display Message -->
    <?php display_message(); ?>
    <!-- Update Profile-->
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 sign_up_form" style="padding-top: 20px">
                <h2 class="text-align:center">তথ্য পরিবর্তনের ফর্ম</h2>
                <hr>

                <form class="edit_user" id="edit_user" action="../link/update.php" accept-charset="UTF-8" method="post">

                    <div class="field">
                        <b>নাম</b>
                        <input autofocus="autofocus" class="form-control" required="required" type="text"
                            name="user_name" id="user_name" />
                    </div>
                    <br>

                    <div class="field">
                        <b>ই-মেইল</b>
                        <input autofocus="autofocus" class="form-control" required="required" type="email"
                            value="mdnasim6416@gmail.com" name="user_email" id="user_email" />
                    </div>
                    <br>

                    <div class="field">
                        <b>ফোন নম্বর </b>
                        <input autofocus="autofocus" class="form-control" required="required" type="text" value="892"
                            name="user_phone" id="user_phone" />
                    </div>
                    <br>

                    <div class="field">
                        <b>শিক্ষা প্রতিষ্ঠানের নাম</b>
                        <input autofocus="autofocus" class="form-control" type="text" name="user_institution"
                            id="user_institution" />
                    </div>
                    <br>


                    <div class="field">
                        <b>নতুন পাসওয়ার্ড</b>
                        <em>(আপনার পছন্দমতো কমপক্ষে 6 অক্ষরের একটি পাসওয়ার্ড দিন)</em>
                        <input autocomplete="false" class="form-control password" type="password" name="user_password"
                            id="user_password" />
                        <span class="p-viewer">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                    </div>
                    <br>

                    <div class="field">
                        <b>নতুন পাসওয়ার্ড নিশ্চিত করুন</b>
                        <input autocomplete="false" class="form-control confirm_password" type="password"
                            name="user_password_confirmation" id="user_password_confirmation" />
                        <span class="p-viewer2">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                    </div>
                    <br>

                    <div class="field">
                        <b>বর্তমান পাসওয়ার্ড </b> <i>(তথ্য পরিবর্তন করতে আপনার বর্তমান পাসওয়ার্ডটি দিন)</i>
                        <input autocomplete="false" class="form-control current_password" type="password"
                            name="user_current_password" id="user_current_password" />
                        <span class="p-viewer3">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                    </div>
                    <br>

                    <p>
                    <div class="actions">
                        <input type="submit" name="update" value="Update" class="btn btn-success form-control"  data-disable-with="Update" />
                    </div>
                    </p>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>



    <br>

    <!-- Footer -->
    <?php include '../footer.php'?>



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

</body>

</html>