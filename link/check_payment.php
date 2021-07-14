<?php
session_start();
include 'config.php';
include 'functions.php';

// Complte Transactions
if(isset($_POST['complete_transaction'])){
  if (isset($_SESSION['userInput'])){
    $userInput = $_SESSION["userInput"];
} 
  $user_id = userID($userInput);
  $course_id = $_POST['model_test_id'];

  if(TotalNumberOfRowsWhereTWO_AND($TRANSACTIONS,'course_id','user_id',$course_id,$user_id)>=1){
    redirect('../student/exams');
  }else {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
    </div>');
    redirect('../student/no_transaction');
  }

}