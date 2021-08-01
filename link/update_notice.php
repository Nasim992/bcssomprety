<?php
session_start();
include 'config.php';
include 'functions.php';
if(isset($_POST['update_notice'])){


$heading=$_POST['heading'];
$notice_id = $_POST['notice_id'];
$notice_file_name =$_FILES['notice_file']['name'];
$notice_file_type = $_FILES['notice_file']['type'];
$notice_file_tmp = $_FILES['notice_file']['tmp_name'];
$previous_file_src  = $_POST['previous_file_src'];

empty($notice_file_name)?$notice_file_name=NULL:$notice_file_name=round(microtime(true)).$_FILES['notice_file']['name'];

if(empty($heading)) {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Required Field Can not be empty</p>
    </div>');
    redirect('../notice');
} else {

$sql = "UPDATE ".$NOTICE." SET notice=?,notice_file_name=? WHERE id=?";
$query = $dbh->prepare($sql);
$query->execute([$heading,$notice_file_name,$notice_id]);
if($query->rowCount() > 0) {
    unlink($previous_file_src);
    move_uploaded_file($notice_file_tmp,$NOTICE_SRC.$notice_file_name);
    set_message('<div class="container p-2">
    <p class="alert alert-success alert-dismissible" id="message">Notice Updated Successfully</p>
  </div>');
  redirect('../admin/notice');
}else {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
    </div>');
   redirect('../admin/notice');
}
}
}