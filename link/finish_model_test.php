<?php
session_start();
include 'config.php';
include 'functions.php';
if(isset($_POST['finish_button'])){

$user_id = $_POST['user_id'];
$model_test_id=$_POST['model_test_id'];
$status = 1;

$sql = "UPDATE ".$MODEL_TEST." SET finished=? WHERE user_id=? AND id=?";
$query = $dbh->prepare($sql);
$query->execute([$status,$user_id,$model_test_id]);
if($query->rowCount() > 0) {
    set_message('<div class="container p-2">
    <p class="alert alert-success alert-dismissible" id="message">Model Test Finished. You Cannot add Questions</p>
  </div>');
  redirect('../student/view_model_tests');
}else {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
    </div>');
    redirect('../student/add_questions');
}
}