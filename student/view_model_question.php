<?php include 'toplayout.php';

$userId = userID($userInput);
if(empty($_GET['id'])){
    $modelTestID = remainingBYID_DESC($MODEL_TEST,"id",$userId);
}else {
    $modelTestID = $_GET['id'];
}
$modelTestID =  intval($modelTestID);
$model_test_data = twoTablesFULLJOIN_WHERE($MODEL_TEST,'course_id',$CREATE_COURSE,'id','id',$modelTestID);

if( TotalNumberOfRowsWhereTWO_AND($MODEL_TEST,'id','user_id',$modelTestID,$userId)==0) {
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
            <?php  echo $index." . ".$questions_statement; ?> <br>
                <div class="row">
                    <div class="col-sm-3">
                        <span class="option_circle <?php echo $colorA; ?>">ক</span> <span class="result_option"><?php echo $option_A ->option_A; ?></span>
                    </div>
                    <div class="col-sm-3">
                        <span class="option_circle <?php echo $colorB; ?>">খ</span> <span class="result_option"><?php echo $option_B ->option_B; ?></span>
                    </div>
                    <div class="col-sm-3">
                        <span class="option_circle <?php echo $colorC; ?>">গ</span> <span class="result_option"><?php echo $option_C ->option_C; ?></span>
                    </div>
                    <div class="col-sm-3">
                        <span class="option_circle <?php echo $colorD; ?>">ঘ</span> <span class="result_option"><?php echo $option_D ->option_D; ?></span>
                    </div>
                </div>
        </div>
        <?php $index=$index+1; } ?>
    </div>
</div>
<br>
<?php include 'bottomlayout.php'; ?>