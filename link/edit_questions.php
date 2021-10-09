<?php
session_start();
include 'config.php';
include 'functions.php';

if(isset($_POST['update_questions'])){
    if (isset($_SESSION['userInput'])){
        $userInput = $_SESSION["userInput"];
}  

$user_id=userID($userInput);
$userType = returnSingleValue($USER,'type','id',$user_id);

$question_id = $_POST['question_id'];
$question_statement = $_POST['question_statement'];
empty($_FILES["question_image"]["name"])?$question_image="":$question_image = round(microtime(true)).$_FILES["question_image"]["name"];
$question_image_type = $_FILES['question_image']['type'];
$question_image_tmp = $_FILES['question_image']['tmp_name'];
$option_A = $_POST['option_A'];
empty($_FILES['option_A_image']['name'])?$option_A_image="":$option_A_image = round(microtime(true)).$_FILES['option_A_image']['name'];
$option_A_image_type = $_FILES['option_A_image']['type'];
$option_A_image_tmp = $_FILES['option_A_image']['tmp_name'];
$option_B = $_POST['option_B'];
empty($_FILES['option_B_image']['name'])?$option_B_image="":$option_B_image = round(microtime(true)).$_FILES['option_B_image']['name'];
$option_B_image_type = $_FILES['option_B_image']['type'];
$option_B_image_tmp = $_FILES['option_B_image']['tmp_name'];
$option_C = $_POST['option_C'];
empty($_FILES['option_C_image']['name'])?$option_C_image="":$option_C_image = round(microtime(true)).$_FILES['option_C_image']['name'];
$option_C_image_type = $_FILES['option_C_image']['type'];
$option_C_image_tmp = $_FILES['option_C_image']['tmp_name'];
$option_D = $_POST['option_D'];
empty($_FILES['option_D_image']['name'])?$$option_D_image="":$option_D_image = round(microtime(true)).$_FILES['option_D_image']['name'];
$option_D_image_type = $_FILES['option_D_image']['type'];
$option_D_image_tmp = $_FILES['option_D_image']['tmp_name'];
$correct_answer = $_POST['correct_answer'];
$question_answer_description = $_POST['question_answer_description'];
empty($_FILES['question_answer_image']['name'])?$question_answer_image ="":$question_answer_image = round(microtime(true)).$_FILES['question_answer_image']['name'];
$question_answer_image_type = $_FILES['question_answer_image']['type'];
$question_answer_image_tmp = $_FILES['question_answer_image']['tmp_name'];

// Assign to an Array 
$question_ARRAY = array(
    "question_statement"=>$question_statement,
    "question_image"=>$question_image,
    "question_image_type"=>$question_image_type,
    "correct_answer"=>$correct_answer,
    "question_answer_description"=>$question_answer_description,
    "question_answer_image"=>$question_answer_image
);
$question_A_ARRAY = array(
    "option_A"=>$option_A,
    "option_A_image"=>$option_A_image,
    "option_A_image_type"=>$option_A_image_type
);
$question_B_ARRAY = array(
    "option_B"=>$option_B,
    "option_B_image"=>$option_B_image,
    "option_B_image_type"=>$option_B_image_type
);
$question_C_ARRAY = array(
    "option_C"=>$option_C,
    "option_C_image"=>$option_C_image,
    "option_C_image_type"=>$option_C_image_type
);
$question_D_ARRAY = array(
    "option_D"=>$option_D,
    "option_D_image"=>$option_D_image,
    "option_D_image_type"=>$option_D_image_type
);

// Json Encoded 
$question_ARRAY_JSON = json_encode($question_ARRAY);
$question_A_ARRAY_JSON = json_encode($question_A_ARRAY);
$question_B_ARRAY_JSON = json_encode($question_B_ARRAY);
$question_C_ARRAY_JSON = json_encode($question_C_ARRAY);
$question_D_ARRAY_JSON = json_encode($question_D_ARRAY);

// Question Storage 
$question_storage = '../storage/questions/';


$previous_question_image = $_POST['previous_question_image'];
$previous_question_answer_image =  $_POST['previous_question_answer_image'];
$previous_option_A_image = $_POST['option_a_image'];
$previous_option_B_image = $_POST['option_b_image'];
$previous_option_C_image = $_POST['option_c_image'];
$previous_option_D_image = $_POST['option_d_image'];




$sql = "UPDATE ".$QUESTIONS." SET questions=?,option_A=?,option_B=?,option_C=?,option_D=? WHERE id=?";
$query = $dbh->prepare($sql);
$query->execute([$question_ARRAY_JSON,$question_A_ARRAY_JSON,$question_B_ARRAY_JSON,$question_C_ARRAY_JSON,$question_D_ARRAY_JSON,$question_id]);

if($query->rowCount() > 0) {

    unlink($question_storage.$previous_question_image);
    unlink($question_storage.$previous_question_answer_image);
    unlink($question_storage.$previous_option_A_image);
    unlink($question_storage.$previous_option_B_image);
    unlink($question_storage.$previous_option_C_image);
    unlink($question_storage.$previous_option_D_image);


    // Store to the folder
    move_uploaded_file($question_image_tmp,$question_storage.$question_image);
    move_uploaded_file($option_A_image_tmp,$question_storage.$option_A_image);
    move_uploaded_file($option_B_image_tmp,$question_storage.$option_B_image);
    move_uploaded_file($option_C_image_tmp,$question_storage.$option_C_image);
    move_uploaded_file($option_D_image_tmp,$question_storage.$option_D_image);
    move_uploaded_file($question_answer_image_tmp,$question_storage.$question_answer_image);

    set_message('<div class="container p-2">
    <p class="alert alert-success alert-dismissible" id="message">Question Updated Successfully</p>
  </div>'); 
  $userType=='admin'?redirect('../admin/view_model_tests'):redirect('../student/view_model_tests');
}else {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
    </div>');
    $userType=='admin'?redirect('../admin/view_model_tests'):redirect('../student/view_model_tests');
}
}