<?php
session_start();
include 'config.php';
include 'functions.php';
if(isset($_POST['submit_answer'])){

$model_test_id = $_POST['model_test_id'];
$user_id = $_POST['user_id'];


$alldata  =  all_by_SPECIFIC_ID($QUESTIONS,'model_test_id',$model_test_id);
$model_test_positive_mark = returnSingleValue($MODEL_TEST,'positive_mark','id',$model_test_id);
$model_test_negative_mark = returnSingleValue($MODEL_TEST,'negative_mark','id',$model_test_id);

$answerArray = array();
$skipped = 0;
$correctAnswer = 0;
$wrongAnswer = 0;
foreach ($alldata as $row) { 
    // Get the correct Answer form Database
    $questions = json_decode($row['questions']);
    empty($_POST["question_id".$row['id']])?$question_Number=0:$question_Number=$_POST["question_id".$row['id']];
    empty( $_POST["question_answer".$row['id']])?$answer=0:$answer=$_POST["question_answer".$row['id']];
    if($answer ==0){  $skipped++; }
    else if($questions->correct_answer==$answer){
        $correctAnswer++;
    }else {
        $wrongAnswer++;
    }
    array_push($answerArray,$question_Number,$answer);
}

$positive_mark = $model_test_positive_mark * $correctAnswer;
$negative_mark = $model_test_negative_mark * $wrongAnswer;
$total_mark = $positive_mark - $negative_mark;
$total_mark<=0?$total_mark=0:$total_mark;
$answerArray_JSON = implode(",",$answerArray);

$sql = "INSERT INTO ".$QUESTION_ANSWER."(user_id,model_test_id,skipped,correct_answer,wrong_answer,total_mark,positive_mark,negative_mark,all_answer) VALUES(?,?,?,?,?,?,?,?,?)";
$query = $dbh->prepare($sql);

$query->execute([$user_id,$model_test_id,$skipped,$correctAnswer,$wrongAnswer,$total_mark,$positive_mark,$negative_mark,$answerArray_JSON]);

if($query->rowCount() > 0) {

    set_message('<div class="container p-2">
    <p class="alert alert-success alert-dismissible" id="message">Answer Submitted Successfully</p>
  </div>');
// Total Question Updated
//   $total_Question = TotalNumberOfRowsWhere($QUESTIONS,'model_test_id',$model_test_id);
//   updateOne($MODEL_TEST,$model_test_id,'total_questions', $total_Question)? redirect('../student/add_questions'): redirect('../student/add_questions');
redirect('../student/result.php?id='.$model_test_id);
}else {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
    </div>');
    redirect('../student/add_questions');
}
}