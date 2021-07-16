<?php
session_start();
error_reporting(0);
include 'config.php';
include 'functions.php';

if(isset($_POST['create_courses'])){
    if (isset($_SESSION['userInput'])){
        $userInput = $_SESSION["userInput"];
} 
$course_name=$_POST['course_name'];
$payment_status=$_POST['payment_status'];
$payment_status==='free'?$payment_status=1:$payment_status=0;
$payment_amount=$_POST['payment_amount'];
$payment_amount?$payment_amount:$payment_amount=NULL;
$user_id=userID($userInput);
$remaining_courses=returnSingleValue($USER,'remaining_courses','id',$user_id);
$remaining_courses===NULL?$remaining_courses=NULL:$remaining_courses-=1;
$remaining_courses==0?$remaining_courses=NULL:$remaining_courses;

if($remaining_courses==NULL) {
    redirect('../student/no_course_limit');
}

if(empty($course_name)|| empty($user_id)) {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Required Field Can not be empty</p>
    </div>');
    redirect('../student/teachers');
} else {

$sql = "INSERT INTO create_course(user_id,course_name,payment_status,payment_amount) VALUES(?,?,?,?)";
$query = $dbh->prepare($sql);
$query->execute([$user_id,$course_name,$payment_status,$payment_amount]);

if($query->rowCount() > 0 && updateOne($USER,$user_id,'remaining_courses',$remaining_courses)) {
    set_message('<div class="container p-2">
    <p class="alert alert-success alert-dismissible" id="message">Course Created Successfully</p>
  </div>');
  redirect('../student/teachers');
}else {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
    </div>');
    redirect('../student/create_new_courses');
}
}
}