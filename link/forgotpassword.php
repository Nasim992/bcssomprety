<?php
session_start();
include 'config.php';
include 'functions.php';
if(isset($_POST['forgot_email_submit'])){

$email=$_POST['forgot_email'];

if(TotalNumberOfRowsWhere($USER,'email',$email)==0){
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Email is not Available. To change password Sign up First</p>
    </div>');
    redirect('../forgotpassword');
}else {
$validation_code = md5(round(microtime(true)));

$sql = "UPDATE ".$USER." SET validation_code=? WHERE email=?";
$query = $dbh->prepare($sql);
$query->execute([$validation_code,$email]);

if($query->rowCount() > 0) {
    set_message('<div class="cont ainer p-2">
    <p class="alert alert-success alert-dismissible" id="message"> Reset Password Link is sent to your email.Check email for reset password</p>
  </div>');

  $subject = "BCS Somprity Forgot Password";
  $message = "<h1>Click on the below link for Resetting your password</h1><br>";
  $message .="<a href=$BASE_URL.'reset_password.php?email=$email&validation_code=$validation_code'>Click on the link</a>";

  send_mail($email,$subject,$message);

  redirect('../forgotpassword');
}else {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Something Went Wrong.Or,Use this password for logged in.</p>
    </div>');
    redirect('../forgotpassword');
}
}

}

// Reset Password Password

if(isset($_POST['reset_password_submit'])){

    $email=$_POST['email'];
    $validation_code =$_POST['validation_code'];
    $password = md5($_POST['user_reset_password']);
 
    if(TotalNumberOfRowsWhere($USER,'email',$email)==0){
        set_message('<div class="container p-2">
        <p class="alert alert-warning alert-dismissible" id="message">Email is not Available. To change password Sign up First</p>
        </div>');
        redirect('../forgotpassword');
    }else {

    $sql = "UPDATE ".$USER." SET password=? WHERE email=? AND validation_code=?";
    $query = $dbh->prepare($sql);
    $query->execute([$password,$email,$validation_code]);
    
    if($query->rowCount() > 0) {
        set_message('<div class="cont ainer p-2">
        <p class="alert alert-success alert-dismissible" id="message"> Password Changed Successfully. Not Loged in to your account</p>
      </div>');
    
      redirect('../index');
    }else {
        set_message('<div class="container p-2">
        <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
        </div>');
        redirect('../forgotpassword');
    }
    }
    
    }