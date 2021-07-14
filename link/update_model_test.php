<?php session_start();
error_reporting(0);
include 'config.php';
include 'functions.php';

if(isset($_POST['update_model_test'])){

$modelID=$_POST['modelID'];
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

        $sql = "UPDATE ".$MODEL_TEST." SET model_test_name=?,model_test_examiner_name=?,positive_mark=?,negative_mark=?,model_test_date =?,duration=?,model_set=?,course_id=?,payment=?,pinned=?,secure_pin=?,image_name=?,image_type=? WHERE id=?";
        
        $query = $dbh->prepare($sql);
        $query->execute([$model_test_name,$model_test_examiner_name,$model_test_positive_mark,$model_test_negative_mark,$model_test_date,$model_test_duration,$model_test_set,$model_test_category,$model_test_payment,$model_test_pinned,$secure_pin,$banner_image_name,$banner_image_type,$modelID]);
        
        if($query->rowCount() > 0) {
            set_message('<div class="container p-2">
            <p class="alert alert-success alert-dismissible" id="message">Model Test Updated Successfully</p>
          </div>');
          redirect('../student/view_model_tests');
        }else {
            set_message('<div class="container p-2">
            <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
            </div>');
            redirect('../student/view_model_tests');
        }
      }
  }
}else {

  $banner_storage = "../storage/banner/";

  $sql = "UPDATE ".$MODEL_TEST." SET model_test_name=?,model_test_examiner_name=?,positive_mark=?,negative_mark=?,model_test_date =?,duration=?,model_set=?,course_id=?,payment=?,pinned=?,secure_pin=?,image_name=?,image_type=? WHERE id=?";
  
  $query = $dbh->prepare($sql);
  $query->execute([$model_test_name,$model_test_examiner_name,$model_test_positive_mark,$model_test_negative_mark,$model_test_date,$model_test_duration,$model_test_set,$model_test_category,$model_test_payment,$model_test_pinned,$secure_pin,$banner_image_name,$banner_image_type,$modelID]);
  
  if($query->rowCount() > 0) {
      set_message('<div class="container p-2">
      <p class="alert alert-success alert-dismissible" id="message">Model Test Updated Successfully</p>
    </div>');
    redirect('../student/view_model_tests');
  }else {
      set_message('<div class="container p-2">
      <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
      </div>');
      redirect('../student/view_model_tests');
  }
}

}