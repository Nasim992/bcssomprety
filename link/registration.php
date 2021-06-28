<?php
session_start();
include 'config.php';
include 'functions.php';
if(isset($_POST['sign_up'])){
$username=$_POST['user_name'];
$email=$_POST['user_email'];
$phone=$_POST['user_phone'];
$institute=$_POST['user_institution'];
$password=md5($_POST['user_password']);
$repeatpassword=md5($_POST['user_password_confirmation']);

if($password==$repeatpassword) {

if(is_author_available($email)>0) {
    set_message('<div class="container p-2">
    <p class="alert alert-danger alert-dismissible"id="message">Email Already is in use.Try Different Email</p>
    </div>');
    redirect('../signup');
}else
{
$sql="INSERT INTO  user(name,phone,email,institute,password) VALUES(:username,:phone,:email,:institute,:password)";

$query = $dbh->prepare($sql);

$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':institute',$institute,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0) 
{
    set_message('<div class="container p-2">
      <p class="alert alert-success alert-dismissible" id="message">Registration Successfull.Now Logged in to the System</p>
    </div>');
    redirect('/bcssomprety');
} else{
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
    </div>');
    redirect('../signup');
}     
}
}else {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Password did not match with the previous.</p>
    </div>');
    redirect('../signup');
}
}

