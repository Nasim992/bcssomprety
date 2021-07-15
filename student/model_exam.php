<?php include 'toplayout.php';
$session_user_id = userID($userInput);

if (!isset ($_GET['id']) ) {  
  $model_test_id = "not_found";  
} else {  
  $model_test_id  = intval($_GET['id']);  
} 

// Exam is started or not checking 
$database_start_date = returnSingleValue($MODEL_TEST,'model_test_date','id',$model_test_id);
$currentDate = date("Y-m-d h:i A");
if(dateTimeDifference_TWO_DATES($database_start_date ,$currentDate)>0){
  set_message('<div class="container p-2">
  <p class="alert alert-warning alert-dismissible" id="message">Sorry! Exam is not Started Yet</p>
  </div>');
  echo "<script type='text/javascript'> document.location = 'exams'; </script>";
}

// Exam is already given or not
if(TotalNumberOfRowsWhereTWO_AND($QUESTION_ANSWER,'user_id','model_test_id',$session_user_id,$model_test_id)>=1){
  set_message('<div class="container p-2">
  <p class="alert alert-warning alert-dismissible" id="message">You have Already given this exam</p>
  </div>');
  echo "<script type='text/javascript'> document.location = 'result.php?id=$model_test_id'; </script>";
}

$totalNumberOfRowsExists = TotalNumberOfRowsWhere($MODEL_TEST,'id',$model_test_id);

// Retrive Model Test ID
if($model_test_id=='not_found' || $totalNumberOfRowsExists==0){
  set_message('<div class="container p-2">
  <p class="alert alert-warning alert-dismissible" id="message">This model test is not available</p>
  </div>');
  echo "<script type='text/javascript'> document.location = 'exams'; </script>";
}else {
  $model_test_data = all_by_SPECIFIC_ID($MODEL_TEST,'id',$model_test_id);
}
// Retrive Course ID
$model_test_userID = returnSingleValue($MODEL_TEST,'user_id','id',$model_test_id);
$course_id =  returnSingleValue($MODEL_TEST,'course_id','id',$model_test_id); //course_id form model test table
$payment_status = returnSingleValue($CREATE_COURSE,'payment_status','id',$course_id); //changed
$model_test_pinned = returnSingleValue($MODEL_TEST,'pinned','id',$model_test_id);

// Cannot give his own Exam 
if($session_user_id==$model_test_userID){
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">You Cannot give your own Exams.Select Different One</p>
    </div>');
    echo "<script type='text/javascript'> document.location = 'exams'; </script>";
}

// Check payment status form model test table 
else if($payment_status!=1) {
    if(TotalNumberOfRowsWhereTWO_AND($TRANSACTIONS,'course_id','user_id',$course_id,$session_user_id)>=1){
    // Check transaction status form transactions table
        $transaction_status = returnSingleValueTWO_COMPARISON($TRANSACTIONS,'status','course_id',$course_id,'user_id',$session_user_id);
        if($transaction_status==0){
            set_message('<div class="container p-2">
            <p class="alert alert-warning alert-dismissible" id="message">Your transaction not confirm yet.Transaction will confirm soon</p>
            </div>');
            echo "<script type='text/javascript'> document.location = 'exams'; </script>";
        }else if($transaction_status==2){
            set_message('<div class="container p-2">
            <p class="alert alert-danger alert-dismissible" id="message">Your transactions is rejected.Contact with the admin</p>
            </div>');
            echo "<script type='text/javascript'> document.location = 'exams'; </script>";
        }
    }
    // Check Payment file loading here
    else {
        $htmlString = 'check_payment.php?id='.$course_id; 
        echo "<script type='text/javascript'> document.location = '$htmlString' </script>";
    }
}
 else if($model_test_pinned==1) {
    include 'pinned_questions_modal.php';
}



// All Questions of Model Tests 
$questions_data = all_RANDOM_ID($QUESTIONS,'model_test_id',$model_test_id);

//----------------------------------------------------------------------------------------------------
?>
<?php  foreach ($model_test_data  as $row) { ?>
<div class="container">
    <div class="row" align="center">
        <div class="col-sm-12 ">
            <h2><?php echo $row['model_test_name']; ?></h2>
            <h5>মডেল টেস্ট ID: <?php echo $row['id']; ?> </h5>
        </div>
        <div class="col-sm-6 question_description_left">
            পরীক্ষকের নাম: <?php echo $row['model_test_examiner_name']; ?> <br>
            তারিখ: <?php echo stringToDate($row['model_test_date']); ?>
        </div>
        <div class="col-sm-6 question_description_right">
            <?php if(!empty($row['course_id'])){?>
            বিষয়: <?php echo returnSingleValue($CREATE_COURSE,'course_name','id',$row['course_id']) ?> <br>
            <?php } ?>
            <div id="exam_duration" data-value="<?php echo $row['duration']; ?>">
                মোট সময়: <?php echo $row['duration']; ?> মিনিট
                <?php } ?>
            </div>
        </div>
    </div>
    <hr>

<p class="exam_timer"> <span id="mins"></span>:<span id="secs"></span></p>
<button class="start_exam_btn form-control btn btn-success">Start Exam</button>
<div class="exam_script">
  <!-- <div> -->
  <?php $count = 1;
   foreach ($questions_data  as $row) { 
    $questions = json_decode($row['questions']);
    $option_A = json_decode($row['option_A']);
    $option_B = json_decode($row['option_B']);
    $option_C = json_decode($row['option_C']);
    $option_D = json_decode($row['option_D']);
    
    // Replacing UnderLine Questions
    $questions_statement = str_replace("[]","<u>",$questions->question_statement);
    $questions_statement = str_replace("[/]","</u>",$questions_statement);
     
     ?>
    <div class="question_set_box">
      <form method="post" action="../link/question_answer.php">
            <div class="question_box">
            <div class="row">
                <div class ="col-sm-8 col-md-8 col-xl-8 col-lg-8">
                <p class="question_text"><?php echo $count; ?>. <?php echo $questions_statement; ?></p>
                </div>
                <div class ="col-sm-4 col-md-4 col-xl-4 col-lg-4">
                <?php if(!empty($questions ->question_image)){ ?>
            <span><img style="border-radius:5px;" src="<?php echo $QUESTION_IMAGE_SRC.$questions ->question_image ;?>" height="75%" width="100%"></span>
            <?php } ?>
               </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3">
                  <input class="radio_btn" type="radio" value="A" name="question_answer<?php echo $row['id'];?>" id="exam_result_results_attributes_0_user_answer_<?php echo $row['id'];?>" />
                  <label for="exam_result_results_attributes_0_user_answer_<?php echo $row['id'];?>">
                    <span>ক</span> <span><?php echo $option_A ->option_A; ?></span>
                    <?php if(!empty($option_A ->option_A_image)){ ?>
                    <span><img style="border-radius:5px;" src="<?php echo $QUESTION_IMAGE_SRC.$option_A ->option_A_image ;?>" height="150px" width="150px"></span>
                    <?php } ?>
                  </label>
                </div>
                <div class="col-lg-3">
                  <input class="radio_btn" type="radio" value="B" name="question_answer<?php echo $row['id'];?>" id="exam_result_results_attributes_1_user_answer_<?php echo $row['id'];?>" />
                  <label for="exam_result_results_attributes_1_user_answer_<?php echo $row['id'];?>">
                    <span>খ</span> <span><?php echo $option_B ->option_B; ?></span>
                    <?php if(!empty($option_B ->option_B_image)){ ?>
                    <span><img style="border-radius:5px;" src="<?php echo $QUESTION_IMAGE_SRC.$option_B ->option_B_image ;?>" height="150px" width="150px"></span>
                    <?php } ?>
                  </label>
                </div>
                <div class="col-lg-3">
                  <input class="radio_btn" type="radio" value="C" name="question_answer<?php echo $row['id'];?>" id="exam_result_results_attributes_2_user_answer_<?php echo $row['id'];?>" />
                  <label for="exam_result_results_attributes_2_user_answer_<?php echo $row['id'];?>">
                    <span>গ</span> <span><?php echo $option_C ->option_C; ?></span>
                    <?php if(!empty($option_C ->option_C_image)){ ?>
                    <span><img style="border-radius:5px;" src="<?php echo $QUESTION_IMAGE_SRC.$option_C ->option_C_image ;?>" height="150px" width="150px"></span>
                    <?php } ?>
                  </label>
                </div>
                <div class="col-lg-3">
                  <input class="radio_btn" type="radio" value="D" name="question_answer<?php echo $row['id'];?>" id="exam_result_results_attributes_3_user_answer_<?php echo $row['id'];?>" />
                  <label for="exam_result_results_attributes_3_user_answer_<?php echo $row['id'];?>">
                    <span>ঘ</span> <span><?php echo $option_D ->option_D; ?></span>
                    <?php if(!empty($option_D ->option_D_image)){ ?>
                    <span><img style="border-radius:5px;" src="<?php echo $QUESTION_IMAGE_SRC.$option_D ->option_D_image ;?>" height="150px" width="150px"></span>
                    <?php } ?>
                  </label>
                </div>
            </div>
          </div>
          </div>
        <?php $count=$count+1; ?>
        <input type="hidden" name="question_id<?php echo $row['id'];?>" value="<?php echo $row['id'];?>">
        <?php } ?>
      <input type="hidden" name="user_id" value="<?php echo $session_user_id;?>">
      <input type="hidden" name="model_test_id" value="<?php echo $model_test_id;?>">
      <button class="btn btn-success btn-block" type="submit" id="new_model_test_form" name="submit_answer">Submit</button>
      </form>
    </div>
</div>
</div>


<br>
<?php include 'bottomlayout.php'; ?>