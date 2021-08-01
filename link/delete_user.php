<?php
session_start();
include 'config.php';
include 'functions.php';
if(isset($_POST['delete_user'])){
 

$user_id=$_POST['user_id'];
$deleteSuccess=false;

if(TotalNumberOfRowsWhere($CREATE_COURSE,"user_id",$user_id)>=1){
$course_id = all_by_SPECIFIC_ID_TWO_NOT($USER,"id",$user_id,"type","admin");

foreach($course_id as $rowsUser){

if(TotalNumberOfRowsWhere($MODEL_TEST,"course_id",$rowsUser['id'])>=1){
    $model_test_data = all_by_SPECIFIC_ID($MODEL_TEST,"course_id",$course_id);

    foreach($model_test_data as $row){
        $image_name = $row['image_name'];
        $model_test_id = $row['id'];
        unlink($MODEL_BANNER_SRC.$image_name);// Unlink file path


        if(TotalNumberOfRowsWhere($QUESTIONS,"model_test_id",$model_test_id)>=1){
        // Model Questions Deletetion
        $model_question_data = all_by_SPECIFIC_ID($QUESTIONS,"model_test_id",$model_test_id);
        foreach($model_question_data as $rowQuestion){

            $questions = json_decode($rowQuestion['questions']);
            $option_A = json_decode($rowQuestion['option_A']);
            $option_B = json_decode($rowQuestion['option_B']);
            $option_C = json_decode($rowQuestion['option_C']);
            $option_D = json_decode($rowQuestion['option_D']);

            $question_image_name = $questions->question_image;
            $option_A_image = $option_A->option_A_image;
            $option_B_image = $option_B->option_B_image;
            $option_C_image = $option_C->option_C_image;
            $option_D_image = $option_D->option_D_image;

            unlink($QUESTION_IMAGE_SRC.$question_image_name);
            unlink($QUESTION_IMAGE_SRC. $option_A_image);
            unlink($QUESTION_IMAGE_SRC.$option_B_image);
            unlink($QUESTION_IMAGE_SRC.$option_C_image);
            unlink($QUESTION_IMAGE_SRC.$option_D_image);

            Delete_Table($QUESTIONS,'id',$rowQuestion['id'])==true?$deleteSuccess=true:$deleteSuccess=false;
        }

        // Questions Answer Table 
        if(TotalNumberOfRowsWhere($QUESTION_ANSWER,"model_test_id",$model_test_id)>=1){
            $questions_answer_data = all_by_SPECIFIC_ID($QUESTION_ANSWER,"model_test_id",$model_test_id);
            foreach($questions_answer_data as $rowQuestionAnswer){
                Delete_Table($QUESTION_ANSWER,'id',$rowQuestionAnswer['id'])==true?$deleteSuccess=true:$deleteSuccess=false;
            }    
        }

        }else {
            Delete_Table($MODEL_TEST,'id',$model_test_id)==true?$deleteSuccess=true:$deleteSuccess=false;
        }
        
    }
}else{
    Delete_Table($CREATE_COURSE,'id',$course_id)==true?$deleteSuccess=true:$deleteSuccess=false;
}
}
}else {
    Delete_Table($USER,'id',$user_id)==true?$deleteSuccess=true:$deleteSuccess=false;
}

if($deleteSuccess){
    set_message('<div class="container p-2">
      <p class="alert alert-success alert-dismissible" id="message">User Deleted Successfully</p>
    </div>');
    redirect('../admin/all_users');
  }else{
      set_message('<div class="container p-2">
      <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
      </div>');
      redirect('../admin/all_users');
  }

}