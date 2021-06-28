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
        <div class="card-header">
            <h4 class="card-title" style="display: flex"> আপনার পরীক্ষাসমূহ </h4>
        </div>

        <table class="category_table text-center">
            <tr>
                <th> ক্রমিক নম্বর </th>
                <th> পরীক্ষার নাম </th>
                <th> সঠিক উত্তর </th>
                <th> ভুল উত্তর </th>
                <th> স্কিপড </th>
                <th> মোট নম্বর </th>
                <th> তারিখ ও সময় </th>
            </tr>
            <tr>
                <td>1</td>
                <td>
                    <a href="result.php?id=2">Bangla</a>
                </td>
                <td>0</td>
                <td>2</td>
                <td>0</td>
                <td>-1.0</td>
                <td> 25-06-2021 12:12 AM </td>
            </tr>
            <tr>
                <td>2</td>
                <td>
                    <a href="/model_tests/11/result"></a>
                </td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0.0</td>
                <td> 25-06-2021 12:09 AM </td>
            </tr>
            <tr>
                <td>3</td>
                <td>
                    <a href="/model_tests/11/result"></a>
                </td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0.0</td>
                <td> 25-06-2021 12:07 AM </td>
            </tr>
        </table>
        <br>

        <div class="flickr_pagination">

        </div>
        <br>

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