<?php include 'toplayout.php';

$userId = userID($userInput);
if(empty($_GET['id'])){
    $modelTestID = remainingBYID_DESC($MODEL_TEST,"id",$userId);
}else {
    $modelTestID = $_GET['id'];
}
$modelTestID =  intval($modelTestID);
$model_test_data = twoTablesFULLJOIN_WHERE($MODEL_TEST,'course_id',$CREATE_COURSE,'id','id',$modelTestID);

if(TotalNumberOfRowsWhere($MODEL_TEST,'id',$modelTestID)==0) {
  echo "<script type='text/javascript'> document.location = 'create_model_test'; </script>";
}

$questions_data = all_by_SPECIFIC_ID($QUESTIONS,'model_test_id',$modelTestID);

?>

<div class="container">
    <div class="row text-center">
        <div class="col-sm-12">
            <?php foreach ($model_test_data as $row) {  ?>
            <h2><?php  echo $row['model_test_name']; ?></h2>
            <h5>মডেল টেস্ট ID: <?php  echo $row['id']; ?> </h5>
        </div>
        <div class="col-sm-6 text-center">
            পরীক্ষকের নাম: <?php  echo $row['model_test_examiner_name']; ?> <br>
            তারিখ: <?php  echo stringToDate($row['model_test_date']).' '.stringToTime($row['model_test_date']); ?>
        </div>
        <div class="col-sm-6 text-center">
            <?php if (!empty($row['course_id'])){ ?>
            কোর্স: <?php echo $row['course_name'] ?> <br>
            মোট সময়: <?php  echo $row['duration']; ?> মিনিট
            <?php } }?>
        </div>
    </div>
    <hr>

    <div class="question_set_box">
        <?php
        $index=1;
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
                    <span class="option_circle <?php echo $colorA; ?>">ক</span> <span class="result_option"><?php echo $option_A ->option_A; ?></span>
                    <?php if(!empty($option_A ->option_A_image)){ ?>
                    <span><img style="border-radius:5px;" src="<?php echo $QUESTION_IMAGE_SRC.$option_A ->option_A_image ;?>" height="150px" width="150px"></span>
                    <?php } ?>
                    </div>
                    <div class="col-sm-3">
                        <span class="option_circle <?php echo $colorB; ?>">খ</span> <span class="result_option"><?php echo $option_B ->option_B; ?></span>
                        <?php if(!empty($option_B ->option_B_image)){ ?>
                    <span><img style="border-radius:5px;" src="<?php echo $QUESTION_IMAGE_SRC.$option_B ->option_B_image ;?>" height="150px" width="150px"></span>
                    <?php } ?>
                    </div>
                    <div class="col-sm-3">
                        <span class="option_circle <?php echo $colorC; ?>">গ</span> <span class="result_option"><?php echo $option_C ->option_C; ?></span>
                        <?php if(!empty($option_C ->option_C_image)){ ?>
                    <span><img style="border-radius:5px;" src="<?php echo $QUESTION_IMAGE_SRC.$option_C ->option_C_image ;?>" height="150px" width="150px"></span>
                    <?php } ?>
                    </div>
                    <div class="col-sm-3">
                        <span class="option_circle <?php echo $colorD; ?>">ঘ</span> <span class="result_option"><?php echo $option_D ->option_D; ?></span>
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
        <?php $index=$index+1; } ?>
    </div>
</div>
<br>
<?php include 'bottomlayout.php'; ?>