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
    <!-- Exams  -->
    <div class="container">

        <div class="row">
            <a class="exam_type_btn " href="exams">All Exam</a>
            <a class="exam_type_btn" href="free_exams">Free Exam</a>
            <a class="exam_type_btn" href="paid_exams">Paid Exam</a>
            <a class="exam_type_btn active" href="pinned_exams">Pin Protected</a>
        </div>

        <div class="all_model_test">
            <div class="row">
                <div class="exam_notice_box">
                    <div class="col-sm-12">
                        <div class="ribbon-wrapper">
                            <div class="ribbon">Free</div>
                        </div>
                        <div class="links exam_box">
                            <a href="/model_tests/12/exam">
                                NAsim <br>
                                তারিখ: 25-06-2021 |
                                সময়: 12:17 AM
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="exam_notice_box">
                    <div class="col-sm-12">
                        <div class="links exam_box">
                            <a href="/model_tests/11/check_payment">
                                <br>
                                তারিখ: 11-06-2021 |
                                সময়: 01:32 AM
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="exam_notice_box">
                    <div class="col-sm-12">
                        <div class="links exam_box">
                            <a href="/model_tests/10/check_payment">
                                রাত্রি <br>
                                তারিখ: 11-06-2021 |
                                সময়: 01:23 AM
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="exam_notice_box">
                    <div class="col-sm-12">
                        <div class="links exam_box">
                            <a href="/model_tests/9/check_payment">
                                রাত্রি <br>
                                তারিখ: 11-06-2021 |
                                সময়: 01:23 AM
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="exam_notice_box">
                    <div class="col-sm-12">
                        <div class="links exam_box">
                            <a href="/model_tests/8/check_payment">
                                মডেল টেস্ট -2 <br>
                                তারিখ: 11-06-2021 |
                                সময়: 01:19 AM
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="exam_notice_box">
                    <div class="col-sm-12">
                        <div class="links exam_box">
                            <a href="/model_tests/7/check_payment">
                                মডেল টেস্ট -2 <br>
                                তারিখ: 11-06-2021 |
                                সময়: 01:14 AM
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="exam_notice_box">
                    <div class="col-sm-12">
                        <div class="links exam_box">
                            <a href="/model_tests/6/check_payment">
                                <br>
                                তারিখ: 11-06-2021 |
                                সময়: 01:11 AM
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="exam_notice_box">
                    <div class="col-sm-12">
                        <div class="links exam_box">
                            <a href="/model_tests/5/check_payment">
                                <br>
                                তারিখ: 11-06-2021 |
                                সময়: 01:03 AM
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="exam_notice_box">
                    <div class="col-sm-12">
                        <div class="links exam_box">
                            <a href="/model_tests/4/check_payment">
                                <br>
                                তারিখ: 11-06-2021 |
                                সময়: 01:03 AM
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="exam_notice_box">
                    <div class="col-sm-12">
                        <div class="links exam_box">
                            <a href="/model_tests/3/check_payment">
                                <br>
                                তারিখ: 11-06-2021 |
                                সময়: 12:57 AM
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="flickr_pagination">
                <span class="previous_page disabled">&#8592; Previous</span> <em class="current" aria-label="Page 1"
                    aria-current="page">1</em> <a rel="next" aria-label="Page 2"
                    href="/model_tests?all_exams_page=2">2</a> <a class="next_page" rel="next"
                    href="/model_tests?all_exams_page=2">Next &#8594;</a>
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