<?php
session_start();
include 'config.php';
include 'functions.php';

// Transaction Success
if(isset($_POST['approved'])){

if (isset($_SESSION['userInput'])){
    $userInput = $_SESSION["userInput"];
} 
$user_id=userID($userInput);
$userType = returnSingleValue($USER,'type','id',$user_id);




$transaction_id=$_POST['transaction_id'];
$course_id = $_POST['course_id'];

if(updateOne_FIELDNAME_TWO($TRANSACTIONS,$transaction_id,'status',1,'transaction_id','course_id',$course_id)) {
    set_message('<div class="container p-2">
    <p class="alert alert-success alert-dismissible" id="message">Transaction Accepted Success</p>
  </div>');
  redirect('../student/pending_transactions');
}else {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Transaction Accepted</p>
    </div>');
    $userType=='admin'? redirect('../admin/pending_transactions'): redirect('../student/pending_transactions');
}
}
// Transaction rejected
if(isset($_POST['reject'])){

    $transaction_id=$_POST['transaction_id'];
    $course_id = $_POST['course_id'];
    if(updateOne_FIELDNAME_TWO($TRANSACTIONS,$transaction_id,'status',2,'transaction_id','course_id',$course_id)) {
        set_message('<div class="container p-2">
        <p class="alert alert-success alert-dismissible" id="message">Transaction Rejected</p>
      </div>');
      $userType=='admin'? redirect('../admin/pending_transactions'): redirect('../student/pending_transactions');
    }else {
        set_message('<div class="container p-2">
        <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
        </div>');
        $userType=='admin'? redirect('../admin/pending_transactions'): redirect('../student/pending_transactions');
    }
}