<?php
session_start();
error_reporting(0);
include 'config.php';
include 'functions.php';

if(isset($_POST['add_notice'])){
   
$heading=$_POST['heading'];
$notice_file_name =$_FILES['notice_file']['name'];
$notice_file_type = $_FILES['notice_file']['type'];
$notice_file_tmp = $_FILES['notice_file']['tmp_name'];
empty($notice_file_name)?$notice_file_name=NULL:$notice_file_name=round(microtime(true)).$_FILES['notice_file']['name'];



if(empty($heading)) {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Required Field Can not be empty</p>
    </div>');
    redirect('../admin/notice');
} else {

$sql = "INSERT INTO notice(notice,notice_file_name) VALUES(?,?)";
$query = $dbh->prepare($sql);
$query->execute([$heading,$notice_file_name]);

if($query->rowCount() > 0) {

    move_uploaded_file($notice_file_tmp,$NOTICE_SRC.$notice_file_name);

    set_message('<div class="container p-2">
    <p class="alert alert-success alert-dismissible" id="message">Notice Created Successfully</p>
  </div>');
  redirect('../admin/home');
}else {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
    </div>');
    redirect('../admin/home');
}
}
}