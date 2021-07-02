<?php
session_start();
error_reporting(0);
include 'config.php';
include 'functions.php';

if(isset($_POST['create_model_test'])){
    if (isset($_SESSION['userInput'])){
        $userInput = $_SESSION["userInput"];
} 
$user_id=userID($userInput);
$model_test_name=$_POST['model_test_name'];
$model_test_examiner_name=$_POST['model_test_examiner_name'];
$model_test_positive_mark = $_POST['model_test_positive_mark'];
$model_test_negative_mark = $_POST['model_test_negative_mark'];
$mode_test_date = $_POST['mode_test_date'];
$mode_test_time = $_POST['mode_test_time'];
$model_test_duration = $_POST['model_test_duration'];
$model_test_set = $_POST['model_test_set'];
$model_test_category = $_POST['model_test_category'];
$model_test_payment = $_POST['model_test_payment'];
$model_test_pinned = $_POST['model_test_pinned'];
$secure_pin = $_POST['secure_pin'];
$banner_image = $_FILES['banner_image'];
$banner_image_name = $_FILES['banner_image']['name'];
$banner_image_type = $_FILES['banner_image']['type'];
$banner_image_type_tmp = $_FILES['banner_image']['tmp_name'];



// echo $user_id;
// echo $model_test_name;
// echo $model_test_examiner_name;
// echo $model_test_positive_mark;
// echo $model_test_negative_mark;
// echo $model_test_date;
// echo $model_test_time;
// echo $model_test_set;
// echo $model_test_category;
// echo $model_test_payment;
// echo $secure_pin;
// echo $banner_image;
// echo $banner_image_name;
// echo $banner_image_type;
// echo $banner_image_type_tmp;


// move_uploaded_file($filetmp,"../documents/".$name);


// $course_name=$_POST['course_name'];
// $payment_status=$_POST['payment_status'];
// $payment_status==='free'?$payment_status=1:$payment_status=0;
// $payment_amount=$_POST['payment_amount'];
// $payment_amount?$payment_amount:$payment_amount=NULL;
// $user_id=userID($userInput);
// $remaining_courses=remaining_courses($user_id);
// $remaining_courses===NULL?$remaining_courses=NULL:$remaining_courses-=1;
// $remaining_courses==0?$remaining_courses=NULL:$remaining_courses;

// if($remaining_courses==NULL) {
//     redirect('../student/no_course_limit');
// }

// if(empty($course_name)|| empty($user_id)) {
//     set_message('<div class="container p-2">
//     <p class="alert alert-warning alert-dismissible" id="message">Required Field Can not be empty</p>
//     </div>');
//     redirect('../student/teachers');
// } else {

// $sql = "INSERT INTO create_course(user_id,course_name,payment_status,payment_amount,remaining_courses) VALUES(?,?,?,?,?)";
// $query = $dbh->prepare($sql);
// $query->execute([$user_id,$course_name,$payment_status,$payment_amount,$remaining_courses]);

// if($query->rowCount() > 0) {
//     set_message('<div class="container p-2">
//     <p class="alert alert-success alert-dismissible" id="message">Course Created Successfully</p>
//   </div>');
//   redirect('../student/teachers');
// }else {
//     set_message('<div class="container p-2">
//     <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
//     </div>');
//     redirect('../student/create_new_courses');
// }
// }
}