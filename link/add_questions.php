<?php
session_start();
include 'config.php';
include 'functions.php';
if(isset($_POST['add_question'])){

$model_test_id = $_POST['model_test_id'];
$question_statement = $_POST['question_statement'];
$question_image = $_FILES['question_image']['name'];
$question_image_type = $_POST['question_image']['type'];
$question_image_tmp = $_POST['question_image']['tmp_name'];
$option_A = $_POST['option_A'];
$option_A_image = $_FILES['option_A_image']['name'];
$option_A_image_type = $_POST['option_A_image']['type'];
$option_A_image_tmp = $_POST['option_A_image']['tmp_name'];
$option_B = $_POST['option_B'];
$option_B_image = $_FILES['option_B_image']['name'];
$option_B_image_type = $_POST['option_B_image']['type'];
$option_B_image_tmp = $_POST['option_B_imBge']['tmp_name'];
$option_C = $_POST['option_C'];
$option_C_image = $_FILES['option_C_image']['name'];
$option_C_image_type = $_POST['option_C_image']['type'];
$option_C_image_tmp = $_POST['option_C_imBge']['tmp_name'];
$option_D = $_POST['option_D'];
$option_D_image = $_FILES['option_D_image']['name'];
$option_D_image_type = $_POST['option_D_image']['type'];
$option_D_image_tmp = $_POST['option_D_imBge']['tmp_name'];
$correct_answer = $_POST['correct_answer'];
$question_answer_description = $_POST['question_answer_description'];
$question_answer_image = $_FILES['question_answer_image']['name'];
$question_answer_image_type = $_FILES['question_answer_image']['type'];
$question_answer_image_tmp = $_FILES['question_answer_image']['tmp_name'];

echo $model_test_id;
echo $question_statement;
echo $question_image;
echo $question_image_type;
echo $question_image_tmp;
echo $option_A;
echo $option_A_image;





// if(empty($username)|| empty($email)|| empty($phone) || empty($institute)||empty($password)) {
//     set_message('<div class="container p-2">
//     <p class="alert alert-warning alert-dismissible" id="message">Required Field Can not be empty</p>
//     </div>');
//     redirect('../signup');
// } else {

// $sql = "UPDATE ".$USER." SET name=?,phone=?,email=?,institute=?,password=? WHERE phone=? OR email=?";
// $query = $dbh->prepare($sql);
// $query->execute([$username,$phone,$email,$institute,$password,$userInput, $userInput]);
// if($query->rowCount() > 0) {
//     set_message('<div class="container p-2">
//     <p class="alert alert-success alert-dismissible" id="message">Profile Updated Successfully</p>
//   </div>');
//   redirect('../student/home');
// }else {
//     set_message('<div class="container p-2">
//     <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
//     </div>');
//     redirect('../student/edit_profile');
// }
// }
}