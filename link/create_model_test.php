<?php
session_start();
error_reporting(0);
include 'config.php';
include 'functions.php';

if(isset($_POST['create_model_test'])){
    if (isset($_SESSION['userInput'])){
        $userInput = $_SESSION["userInput"];
} 

$user_id=userID($userInput);
$model_test_name=$_POST['model_test_name'];
$model_test_examiner_name=$_POST['model_test_examiner_name'];
$model_test_positive_mark = $_POST['model_test_positive_mark'];
$model_test_negative_mark = $_POST['model_test_negative_mark'];
$model_test_date = $_POST['model_test_date'];
$model_test_duration = $_POST['model_test_duration'];
$model_test_set = $_POST['model_test_set'];
$model_test_category = $_POST['model_test_category'];
$model_test_payment = $_POST['model_test_payment'];
$model_test_payment=="free"?$model_test_payment=1:$model_test_payment=NULL;
$model_test_pinned = $_POST['model_test_pinned'];
$model_test_pinned==="pin_protected"?$model_test_pinned=1:$model_test_pinned=NULL;
$secure_pin = $_POST['secure_pin'];
$banner_image = $_FILES['banner_image'];
$banner_image_name = $_FILES['banner_image']['name'];
$banner_image_type = $_FILES['banner_image']['type'];
$banner_image_type_tmp = $_FILES['banner_image']['tmp_name'];

$previousCategoryValue = returnSingleValue($CREATE_COURSE,'created_exams','id',$model_test_category);

$previousCategoryValue = $previousCategoryValue+1;


// Check Paid Unpaid Courses
if($model_test_payment!=1 || empty($model_test_payment)){
    if($model_test_category=='free'){
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">You cannot make the paid model test under unpaid courses</p>
    </div>');
    redirect('../student/create_model_test');
    }else {
        $payment_status = returnSingleValue($CREATE_COURSE,'payment_status','id',$model_test_category);
        if($payment_status==1){
            set_message('<div class="container p-2">
            <p class="alert alert-warning alert-dismissible" id="message">You cannot make the paid model test under unpaid courses</p>
            </div>');
            redirect('../student/create_model_test');
        }else {
            
$banner_storage = "../storage/banner/";

if(empty($model_test_name)|| empty($user_id) || empty($model_test_examiner_name)||empty($model_test_positive_mark)|| empty($model_test_date) || empty($model_test_duration)) {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Required Field Can not be empty</p>
    </div>');
    redirect('../student/create_model_test');
} else {

$sql = "INSERT INTO ".$MODEL_TEST."(user_id,model_test_name,model_test_examiner_name,positive_mark,negative_mark,model_test_date,duration,model_set,course_id,payment,pinned,secure_pin,image_name,image_type) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$query = $dbh->prepare($sql);

$query->execute([$user_id,$model_test_name,$model_test_examiner_name,$model_test_positive_mark,$model_test_negative_mark,$model_test_date,$model_test_duration,$model_test_set,$model_test_category,$model_test_payment,$model_test_pinned,$secure_pin,$banner_image_name,$banner_image_type]);

if($query->rowCount() > 0) {
    // Update craeted course field with
    updateOne_FIELDNAME($CREATE_COURSE,$model_test_category,'created_exams',$previousCategoryValue,'id');
    // Store to the folder
    move_uploaded_file($banner_image_type_tmp,$banner_storage.$banner_image_name);

    set_message('<div class="container p-2">
    <p class="alert alert-success alert-dismissible" id="message">Model Test Created Successfully</p>
  </div>');
  redirect('../student/add_questions');
}else {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
    </div>');
    redirect('../student/create_model_test');
}
}
        }
    }
}else {

$banner_storage = "../storage/banner/";

if(empty($model_test_name)|| empty($user_id) || empty($model_test_examiner_name)||empty($model_test_positive_mark)|| empty($model_test_date) || empty($model_test_duration)) {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Required Field Can not be empty</p>
    </div>');
    redirect('../student/create_model_test');
} else {

$sql = "INSERT INTO ".$MODEL_TEST."(user_id,model_test_name,model_test_examiner_name,positive_mark,negative_mark,model_test_date,duration,model_set,course_id,payment,pinned,secure_pin,image_name,image_type) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$query = $dbh->prepare($sql);

$query->execute([$user_id,$model_test_name,$model_test_examiner_name,$model_test_positive_mark,$model_test_negative_mark,$model_test_date,$model_test_duration,$model_test_set,$model_test_category,$model_test_payment,$model_test_pinned,$secure_pin,$banner_image_name,$banner_image_type]);

if($query->rowCount() > 0) {
    updateOne_FIELDNAME($CREATE_COURSE,$model_test_category,'created_exams',$previousCategoryValue,'id');
    // Store to the folder
    move_uploaded_file($banner_image_type_tmp,$banner_storage.$banner_image_name);

    set_message('<div class="container p-2">
    <p class="alert alert-success alert-dismissible" id="message">Model Test Created Successfully</p>
  </div>');
  redirect('../student/add_questions');
}else {
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
    </div>');
    redirect('../student/create_model_test');
}
}
}
}