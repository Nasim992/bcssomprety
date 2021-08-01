<?php
session_start();
include 'config.php';
include 'functions.php';
if(isset($_POST['course_allocation'])){
  
$userid=$_POST['user_id'];
$remaining_courses=$_POST['remaining_courses'];


if(empty($userid)) {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Required Field Can not be empty</p>
    </div>');
    redirect('../admin/all_users');
} else {

$sql = "UPDATE ".$USER." SET remaining_courses=? WHERE id=?";
$query = $dbh->prepare($sql);
$query->execute([$remaining_courses,$userid]);
if($query->rowCount() > 0) {
    set_message('<div class="container p-2">
    <p class="alert alert-success alert-dismissible" id="message">Course Allocation Update Success</p>
  </div>');
 redirect('../admin/all_users');
}else {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
    </div>');
    redirect('../admin/all_users');
}
}
}