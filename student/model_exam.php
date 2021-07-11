<?php include 'toplayout.php';
$session_user_id = userID($userInput);

if (!isset ($_GET['id']) ) {  
  $model_test_id = "not_found";  
} else {  
  $model_test_id  = intval($_GET['id']);  
} 
$totalNumberOfRowsExists = TotalNumberOfRowsWhere($MODEL_TEST,'id',$model_test_id);

// Retrive Model Test ID
if($model_test_id=='not_found' || $totalNumberOfRowsExists==0){
  echo "<script type='text/javascript'> document.location = 'exams'; </script>";
}else {
  $model_test_data = all_by_SPECIFIC_ID($MODEL_TEST,'id',$model_test_id);
}
// Retrive Course ID
$model_test_userID = returnSingleValue($MODEL_TEST,'user_id','id',$model_test_id);
$course_id =  returnSingleValue($MODEL_TEST,'course_id','id',$model_test_id);
$model_test_payment = returnSingleValue($MODEL_TEST,'payment','id',$model_test_id);
$payment_status = returnSingleValue($CREATE_COURSE,'payment_status','id',$course_id);
$model_test_pinned = returnSingleValue($MODEL_TEST,'pinned','id',$model_test_id);

// Cannot give his own Exam 
if($session_user_id==$model_test_userID){
    set_message('<div class="container p-2">
    <p class="alert alert-warning alert-dismissible" id="message">You Cannot give your own Exams.Select Different One</p>
    </div>');
    echo "<script type='text/javascript'> document.location = 'exams'; </script>";
}
 else if($model_test_pinned==1) {
    include 'pinned_questions_modal.php';
}
else if($model_test_payment!=1){
  echo "<script type='text/javascript'> document.location = 'check_payment'; </script>";
}

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
            <div id="exam_duration" data-value="<%= @model_test.duration %>">
                মোট সময়: <?php echo $row['duration']; ?> মিনিট
                <?php } ?>
            </div>
        </div>
    </div>
    <hr>

    <p class="exam_timer"> <span id="mins"></span>:<span id="secs"></span></p>

    <p>
        <button class="start_exam_btn form-control btn btn-success" type="button" data-toggle="collapse"
            data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Start Exam
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="">
            <form class="new_exam_result" id="new_model_test_form" action="/model_tests/13/exam_result"
                accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token"
                    value="SE-WdwONsyfHQtVX1KQbgoV09I3Glcv92A8aK4LmIwaYr1Sd7g4jq9uhTP4ygbbumsrqh5PPBv4L_F1EzGT23g" />
                <div class="question_set_box">

                    <div class="question_box">
                        <p class="question_text">1. </p>
                        <div class="row">
                        </div>
                    </div>
                    <input value="11" type="hidden" name="exam_result[results_attributes][0][question_id]"
                        id="exam_result_results_attributes_0_question_id" />

                    <div class="question_box">
                        <p class="question_text">2. 1212</p>
                        <div class="row">
                            <div class="col-lg-3">
                                <input class="radio_btn" type="radio" value="1"
                                    name="exam_result[results_attributes][1][user_answer]"
                                    id="exam_result_results_attributes_1_user_answer_1" />
                                <label for="exam_result_results_attributes_1_user_answer_1">
                                    <span>ক</span> <span>12121</span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <input class="radio_btn" type="radio" value="2"
                                    name="exam_result[results_attributes][1][user_answer]"
                                    id="exam_result_results_attributes_1_user_answer_2" />
                                <label for="exam_result_results_attributes_1_user_answer_2">
                                    <span>খ</span> <span>1211</span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <input class="radio_btn" type="radio" value="3"
                                    name="exam_result[results_attributes][1][user_answer]"
                                    id="exam_result_results_attributes_1_user_answer_3" />
                                <label for="exam_result_results_attributes_1_user_answer_3">
                                    <span>গ</span> <span>1212</span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <input class="radio_btn" type="radio" value="4"
                                    name="exam_result[results_attributes][1][user_answer]"
                                    id="exam_result_results_attributes_1_user_answer_4" />
                                <label for="exam_result_results_attributes_1_user_answer_4">
                                    <span>ঘ</span> <span>12121</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <input value="12" type="hidden" name="exam_result[results_attributes][1][question_id]"
                        id="exam_result_results_attributes_1_question_id" />

                    <div class="question_box">
                        <p class="question_text">3. </p>
                        <div class="row">
                        </div>
                    </div>
                    <input value="10" type="hidden" name="exam_result[results_attributes][2][question_id]"
                        id="exam_result_results_attributes_2_question_id" />
                    <input value="8" type="hidden" name="exam_result[user_id]" id="exam_result_user_id" />
                    <input value="13" type="hidden" name="exam_result[model_test_id]" id="exam_result_model_test_id" />
                    <input type="submit" name="commit" value="Submit" class="form-control btn btn-success"
                        data-disable-with="Submit" />
                </div>
            </form>
        </div>
    </div>
</div>


<br>
<?php include 'bottomlayout.php'; ?>