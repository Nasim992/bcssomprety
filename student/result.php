<?php include 'toplayout.php';
$session_user_id = userID($userInput);

if (!isset ($_GET['id']) ) {  
    $model_test_id = "not_found";  
  } else {  
    $model_test_id  = intval($_GET['id']);  
  } 
  
// Exam is already given or not
if(TotalNumberOfRowsWhereTWO_AND($QUESTION_ANSWER,'user_id','model_test_id',$session_user_id,$model_test_id)==0){
    set_message('<div class="container p-2">
    <p class="alert alert-danger alert-dismissible" id="message">Result not avaliable</p>
    </div>');
    echo "<script type='text/javascript'> document.location = 'exams'; </script>";
  }

//   Extract Result form Question Answer table
$question_answer_data = all_by_SPECIFIC_ID_TWO($QUESTION_ANSWER,'user_id',$session_user_id,'model_test_id',$model_test_id);

$model_test_name =  returnSingleValue($MODEL_TEST,'model_test_name','id',$question_answer_data[0]['model_test_id']);
$model_test_examiner_name = returnSingleValue($MODEL_TEST,'model_test_examiner_name','id',$question_answer_data[0]['model_test_id']);

$model_test_date = returnSingleValue($MODEL_TEST,'model_test_date','id',$question_answer_data[0]['model_test_id']);

$total_model_test_answer = TotalNumberOfRowsWhere($QUESTION_ANSWER,'model_test_id',$model_test_id);

// Place calculation 
$total_answer_question_max = all_by_SPECIFIC_ID_DESC($QUESTION_ANSWER,'model_test_id',$model_test_id);
$current_position = 0;
for($i=0;$i<count($total_answer_question_max);$i++){
    if($session_user_id==$total_answer_question_max[$i]['user_id']){
        $current_position=$i+1;
    }
}

$questions_data = all_by_SPECIFIC_ID($QUESTIONS,'model_test_id',$model_test_id);

$question_answer_array_data = explode(',',$question_answer_data[0]['all_answer']);

?>



<!-- Participated courses -->

<div class="container">
    <div class="row text-center">
        <div class="col-sm-12">
            <h2><?php echo $model_test_name; ?></h2>
            <h5>মডেল টেস্ট ID: <?php echo $question_answer_data[0]['model_test_id']; ?> </h5>
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            পরীক্ষকের নাম: <?php echo $model_test_examiner_name; ?> <br>
            তারিখ: <?php echo stringToDate($model_test_date); ?> <br>
        </div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row" align="center">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <table class="result_box">
                <tr>
                    <th>সঠিক উত্তর</th>
                    <th>ভুল উত্তর</th>
                    <th>স্কিপড</th>
                    <th>প্রাপ্ত নম্বর</th>
                    <th>নেগেটিভ নম্বর</th>
                </tr>
                <tr>
                    <td class="green_bg"><?php echo $question_answer_data[0]['correct_answer']; ?></td>
                    <td class="red_bg"><?php echo $question_answer_data[0]['wrong_answer']; ?></td>
                    <td class="orange_bg"><?php echo $question_answer_data[0]['skipped']; ?></td>
                    <td class="green_bg"><?php echo $question_answer_data[0]['positive_mark']; ?></td>
                    <td class="red_bg"><?php echo $question_answer_data[0]['negative_mark']; ?></td>
                </tr>
                <tr class="blue_bg result_text">
                    <th colspan="3">সর্বমোট নম্বর</th>
                    <td colspan="3"><?php echo $question_answer_data[0]['total_mark']; ?></td>
                </tr>
                <tr class="blue_bg result_text">
                    <th colspan="3">বর্তমান অবস্থান</th>
                    <td colspan="3"><?php echo $current_position; ?> / <?php echo $total_model_test_answer; ?></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-3"></div>
    </div>
    <hr>

    <div class="question_set_box">
        <?php
        $index=1;
        $indexColor=1;
        foreach ($questions_data  as $row) {
        $questions = json_decode($row['questions']);
        $option_A = json_decode($row['option_A']);
        $option_B = json_decode($row['option_B']);
        $option_C = json_decode($row['option_C']);
        $option_D = json_decode($row['option_D']);
        
        // Replacing UnderLine Questions
        $questions_statement = str_replace("[]","<u>",$questions->question_statement);
        $questions_statement = str_replace("[/]","</u>",$questions_statement);
        
        // Selecting Correct Ans 
        $colorA = '';
        $colorB = '';
        $colorC = '';
        $colorD = '';
        
        if($questions->correct_answer=='A'){$colorA = 'green_bg';}
        else if($questions->correct_answer=='B') {$colorB = 'green_bg';}
        else if($questions->correct_answer=='C') {$colorC = 'green_bg';}
        else if($questions->correct_answer=='D') {$colorD = 'green_bg';}
        
        // Selecting Wrong Ans 
        $colorA_Wrong = '';
        $colorB_Wrong = '';
        $colorC_Wrong = '';
        $colorD_Wrong = '';
        
        if($questions->correct_answer!=$question_answer_array_data[$indexColor]){
            if($question_answer_array_data[$indexColor]=='A'){$colorA_Wrong='red_bg';}
            else if($question_answer_array_data[$indexColor]=='B'){$colorB_Wrong='red_bg';}
            else if($question_answer_array_data[$indexColor]=='C'){$colorC_Wrong='red_bg';}
            else if($question_answer_array_data[$indexColor]=='D'){$colorD_Wrong='red_bg';}
        }
    
      ?>
        <div class="question_box">
            <div class="row">
                <div class ="col-sm-8 col-md-8 col-xl-8 col-lg-8">
                <?php  echo $index." . ".$questions_statement; ?>
                </div>
                <div class ="col-sm-4 col-md-4 col-xl-4 col-lg-4">
                <?php if(!empty($questions ->question_image)){ ?>
            <span><img style="border-radius:5px;" src="<?php echo $QUESTION_IMAGE_SRC.$questions ->question_image ;?>" height="75%" width="100%"></span>
            <?php } ?>
               </div>
            </div>
            <hr>
            
                <div class="row">
                    <div class="col-sm-3">
                    <span class="option_circle <?php echo $colorA." ".$colorA_Wrong." ".$colorA_Wrong1; ?>">ক</span> <span class="result_option"><?php echo $option_A ->option_A; ?></span>
                    <?php if(!empty($option_A ->option_A_image)){ ?>
                    <span><img style="border-radius:5px;" src="<?php echo $QUESTION_IMAGE_SRC.$option_A ->option_A_image ;?>" height="150px" width="150px"></span>
                    <?php } ?>
                    </div>
                    <div class="col-sm-3">
                        <span class="option_circle <?php echo $colorB." ". $colorB_Wrong." ". $colorB_Wrong1; ?>">খ</span> <span class="result_option"><?php echo $option_B ->option_B; ?></span>
                        <?php if(!empty($option_B ->option_B_image)){ ?>
                    <span><img style="border-radius:5px;" src="<?php echo $QUESTION_IMAGE_SRC.$option_B ->option_B_image ;?>" height="150px" width="150px"></span>
                    <?php } ?>
                    </div>
                    <div class="col-sm-3">
                        <span class="option_circle <?php echo $colorC." ".$colorC_Wrong." ". $colorC_Wrong1; ?>">গ</span> <span class="result_option"><?php echo $option_C ->option_C; ?></span>
                        <?php if(!empty($option_C ->option_C_image)){ ?>
                    <span><img style="border-radius:5px;" src="<?php echo $QUESTION_IMAGE_SRC.$option_C ->option_C_image ;?>" height="150px" width="150px"></span>
                    <?php } ?>
                    </div>
                    <div class="col-sm-3">
                        <span class="option_circle <?php echo $colorD." ".$colorD_Wrong." ". $colorD_Wrong1; ?>">ঘ</span> <span class="result_option"><?php echo $option_D ->option_D; ?></span>
                        <?php if(!empty($option_D ->option_D_image)){ ?>
                    <span><img style="border-radius:5px;" src="<?php echo $QUESTION_IMAGE_SRC.$option_D ->option_D_image ;?>" height="150px" width="150px"></span>
                    <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="col-sm-3">
                        <b class="text-info">Answer Description : 
                         <?php if(empty($questions->question_answer_description)){ echo "Description not Available";} ?>
                        </b><span class="text-success"><?php echo $questions->question_answer_description; ?></span><br>
                        <?php if(!empty($questions->question_answer_image)){ ?>
                        <span><img style="border-radius:5px;" src="<?php echo $QUESTION_IMAGE_SRC.$questions->question_answer_image ;?>" height="150px" width="150px"></span>
                        <?php } ?>
                </div>
                
        </div>
        <?php 

        $index=$index+1;
         $indexColor= $indexColor+2;
              
    } ?>
    </div>
</div>
<br>
<?php include 'bottomlayout.php'; ?>