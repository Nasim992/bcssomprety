<?php
session_start();
error_reporting(0);
include 'config.php';
include 'functions.php';

if(isset($_POST['transaction_form'])){
    if (isset($_SESSION['userInput'])){
        $userInput = $_SESSION["userInput"];
} 
 
$mobile_number=$_POST['mobile_number'];
$transaction_id=$_POST['transaction_id'];
$model_test_payment_method=$_POST['model_test_payment'];
$user_id=userID($userInput);

$course_id = $_POST['course_id'];


$previousValue = returnSingleValue($CREATE_COURSE,'register_student','id',$course_id);
$previousValue = $previousValue+1;


if(empty($user_id) || empty($mobile_number)||empty($model_test_payment_method)) {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Required Field Can not be empty</p>
    </div>');
} else {

$sql = "INSERT INTO transactions(user_id,course_id,transaction_id,payment_method,mobile_number) VALUES(?,?,?,?,?)";
$query = $dbh->prepare($sql);
$query->execute([$user_id,$course_id,$transaction_id,$model_test_payment_method,$mobile_number]);

if($query->rowCount() > 0) {
    updateOne_FIELDNAME($CREATE_COURSE,$course_id,'register_student',$previousValue,'id');
    set_message('<div class="container p-2">
    <p class="alert alert-success alert-dismissible" id="message">Transaction Successfull.Wait for the confirmation</p>
  </div>');
  $redirect = '../student/check_payment.php?id='.$course_id;
  redirect($redirect);
}else {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
    </div>');
    redirect('../student/exams');
}
}
}
