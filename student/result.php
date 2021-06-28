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
    <!-- Participated courses -->
    <div class="container">
        <div class="row" align="center">
            <div class="col-sm-12">
                <h2>Bangla</h2>
                <h5>মডেল টেস্ট ID: 1 </h5>
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                পরীক্ষকের নাম: Dm yousuf <br>
                তারিখ: 25/06/2021 <br>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row" align="center">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="result_box">
                    <tr>
                        <th>সঠিক উত্তর</th>
                        <th>ভুল উত্তর</th>
                        <th>স্কিপড</th>
                        <th>প্রাপ্ত নম্বর</th>
                        <th>নেগেটিভ নম্বর</th>
                    </tr>
                    <tr>
                        <td class="green_bg">0</td>
                        <td class="red_bg">2</td>
                        <td class="orange_bg">0</td>
                        <td class="green_bg">0.0</td>
                        <td class="red_bg">0.5</td>
                    </tr>
                    <tr class="blue_bg result_text">
                        <th colspan="3">সর্বমোট নম্বর</th>
                        <td colspan="3">0.0</td>
                    </tr>
                    <tr class="blue_bg result_text">
                        <th colspan="3">বর্তমান অবস্থান</th>
                        <td colspan="3">1 / 1</td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <hr>

        <div class="question_set_box">
            <div class="question_box">
                1. Fjjkk <br>
                <div class="row">
                    <div class="col-sm-3">
                        <span class="option_circle green_bg">ক</span>
                        <span class="result_option">H</span>
                    </div>
                    <div class="col-sm-3">
                        <span class="option_circle red_bg">খ</span>
                        <span class="result_option">J</span>
                    </div>
                    <div class="col-sm-3">
                        <span class="option_circle">গ</span> <span class="result_option">K</span>
                    </div>
                    <div class="col-sm-3">
                        <span class="option_circle">ঘ</span> <span class="result_option">L</span>
                    </div>
                </div>
            </div>
            <div class="question_box">
                2. Njj <br>
                <div class="row">
                    <div class="col-sm-3">
                        <span class="option_circle green_bg">ক</span>
                        <span class="result_option">Hh</span>
                    </div>
                    <div class="col-sm-3">
                        <span class="option_circle">খ</span> <span class="result_option">Bb</span>
                    </div>
                    <div class="col-sm-3">
                        <span class="option_circle red_bg">গ</span>
                        <span class="result_option">Bbn</span>
                    </div>
                    <div class="col-sm-3">
                        <span class="option_circle">ঘ</span> <span class="result_option">F</span>
                    </div>
                </div>
            </div>
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