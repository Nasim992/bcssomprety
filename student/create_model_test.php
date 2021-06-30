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
    <!-- Model Test Creation -->


    <div class="container" id="flash-message">
    </div>
    </div>
    <br>
    <div class="content">
        <div class="new_model_test_box">
            <h3 class="text-center">নতুন মডেল টেস্ট তৈরী করুন</h3>
            <hr>
            <br>
            <form class="new_model_test" id="new_model_test" enctype="multipart/form-data" action="/model_tests"
                accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token"
                    value="O_ZdK8YX2C2lX8GqrghTmBaMEL3mooLkZngYVIaMfsDTW2Y_zNmCghVRtF0AEE3p-njFhEADw-0s9PdEkJpj4A" />

                <input value="8" type="hidden" name="model_test[user_id]" id="model_test_user_id" />

                <div class="form-row">
                    <strong> মডেল টেস্টের নাম </strong>
                    <input autocomplete="off" class="form-control" type="text" name="model_test[name]"
                        id="model_test_name" />
                </div>
                <br>

                <div class="form-row">
                    <strong> পরীক্ষকের নাম </strong>
                    <input autocomplete="off" class="form-control" type="text" name="model_test[setter]"
                        id="model_test_setter" />
                </div>
                <br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-row">
                            <strong> সঠিক উত্তরের মান </strong>
                            <input step="any" autocomplete="off" class="form-control" type="number" value="0.0"
                                name="model_test[mark]" id="model_test_mark" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>নেগেটিভ নম্বর </strong>
                            <input step="any" class="form-control" type="number" value="0.0"
                                name="model_test[negative_mark]" id="model_test_negative_mark" />
                        </div>
                    </div>
                </div>
                <br>

                <strong> মডেল টেস্টের তারিখ ও সময়</strong>
                <br>
                <div class="form-row">
                    <select id="model_test_start_date_3i" name="model_test[start_date(3i)]" style="width:auto;"
                        class="form-control datetimepicker">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28" selected="selected">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    <select id="model_test_start_date_2i" name="model_test[start_date(2i)]" style="width:auto;"
                        class="form-control datetimepicker">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6" selected="selected">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <select id="model_test_start_date_1i" name="model_test[start_date(1i)]" style="width:auto;"
                        class="form-control datetimepicker">
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021" selected="selected">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                    </select>
                    &mdash; <select id="model_test_start_date_4i" name="model_test[start_date(4i)]" style="width:auto;"
                        class="form-control datetimepicker">
                        <option value="00">12 AM</option>
                        <option value="01">01 AM</option>
                        <option value="02">02 AM</option>
                        <option value="03">03 AM</option>
                        <option value="04">04 AM</option>
                        <option value="05">05 AM</option>
                        <option value="06">06 AM</option>
                        <option value="07">07 AM</option>
                        <option value="08">08 AM</option>
                        <option value="09">09 AM</option>
                        <option value="10">10 AM</option>
                        <option value="11">11 AM</option>
                        <option value="12">12 PM</option>
                        <option value="13">01 PM</option>
                        <option value="14">02 PM</option>
                        <option value="15">03 PM</option>
                        <option value="16">04 PM</option>
                        <option value="17">05 PM</option>
                        <option value="18">06 PM</option>
                        <option value="19">07 PM</option>
                        <option value="20" selected="selected">08 PM</option>
                        <option value="21">09 PM</option>
                        <option value="22">10 PM</option>
                        <option value="23">11 PM</option>
                    </select>
                    : <select id="model_test_start_date_5i" name="model_test_start_date" style="width:auto;"
                        class="form-control datetimepicker">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07" selected="selected">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        <option value="47">47</option>
                        <option value="48">48</option>
                        <option value="49">49</option>
                        <option value="50">50</option>
                        <option value="51">51</option>
                        <option value="52">52</option>
                        <option value="53">53</option>
                        <option value="54">54</option>
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                    </select>

                </div>
                <br>

                <div class="form-row">
                    <strong> মোট সময়</strong>
                    <input autocomplete="off" class="form-control" type="number" value="0" name="model_test_duration"
                        id="model_test_duration" />
                </div>
                <br>
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample">
                        Advanced Option
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div>
                        <div class="form-row">
                            <strong> প্রশ্নের সেট </strong>
                            <input placeholder="মেঘদূত" autocomplete="off" class="form-control" type="text"
                                name="model_test_set" id="model_test_set" />
                        </div>
                        <br>

                        <div class="form-row">
                            <strong> কোর্স </strong>
                            <select id="category_select" class="form-control" name="model_test_category">
                                <option value="">কোর্স নির্বাচন করুন</option>
                            </select>
                        </div>
                        <br>

                        <div class="form-group">
                            <strong>মডেল টেস্টটি ফ্রি করুন </strong> &nbsp &nbsp &nbsp &nbsp
                            <input class="radio_btn" type="radio" value="free" name="model_test_payment"
                                id="model_test_payment_free" />
                            <label for="payment_হ্যা ">হ্যা </label>&nbsp &nbsp
                            <input class="radio_btn" type="radio" value="pay" name="model_test_payment"
                                id="model_test_payment_pay" />
                            <label for="payment_না ">না </label>&nbsp &nbsp
                        </div>
                        <br>

                        <div class="form-group">
                            <strong>সিকিউর পিনঃ </strong> &nbsp &nbsp &nbsp &nbsp
                            <input id="addPin" class="radio_btn" type="radio" value="pin_protected"
                                name="model_test_pinned" />
                            <label for="pined_হ্যা ">হ্যা </label>&nbsp &nbsp
                            <input id="removePin" class="radio_btn" type="radio" value="not_pinned_protected" checked="checked"
                                name="model_test_pinned" />
                            <label for="pined_না ">না </label>&nbsp &nbsp
                        </div>
                        <div class="form-group">
                            <input placeholder="1234" class="form-control" type="text" name="secure_pin"
                                id="model_test_pin" />
                        </div>

                        <div class="form-group">
                            <p>
                        <input value="1" id="addModelTestImage" data-toggle="collapse"
                                    data-target="#collapseExample1" aria-expanded="false"
                                    aria-controls="collapseExample1" type="checkbox" name="model_test[featured]" />
                                <strong>স্লাইডার এ ব্যানার যুক্ত করুন</strong>
                            </p>
                            <div class="collapse" id="collapseExample1">
                                <div class="form-row">
                                    <div class="form-group model_test_image">
                                        <strong> মডেল টেস্ট ব্যানার </strong>
                                        <input class="form-control model_test_image" type="file" name="banner" accept=".img,.png,.webp,.git,.jpg,.jpeg" id="model_test_model_test_banner" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="form-row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <input type="submit" name="commit" value="Add Model Test" class="btn btn-success"
                            data-disable-with="Add Model Test" />
                        <a class="btn btn-danger" href="https://bcsshomprity.herokuapp.com/users/8/teacher">Cancel</a>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
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