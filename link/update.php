<?php
session_start();
include 'config.php';
include 'functions.php';
if(isset($_POST['update'])){
    if (isset($_SESSION['userInput'])){
        $userInput = $_SESSION["userInput"];
    } 
$username=$_POST['user_name'];
$email=$_POST['user_email'];
$phone=$_POST['user_phone'];
$institute=$_POST['user_institution'];
$password=md5($_POST['user_password']);
$repeatpassword=md5($_POST['user_password_confirmation']);
$currentpassword=md5($_POST['user_password_confirmation']);

if(empty($username)|| empty($email)|| empty($phone) || empty($institute)||empty($password)) {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Required Field Can not be empty</p>
    </div>');
    redirect('../signup');
} else {

$sql = "UPDATE user SET name=?,phone=?,email=?,institute=?,password=? WHERE phone=? OR email=?";
$query = $dbh->prepare($sql);
$query->execute([$username,$phone,$email,$institute,$password,$userInput, $userInput]);
if($query->rowCount() > 0) {
    set_message('<div class="container p-2">
    <p class="alert alert-success alert-dismissible" id="message">Profile Updated Successfully</p>
  </div>');
  redirect('../student/home');
}else {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
    </div>');
    redirect('../student/edit_profile');
}
}
}