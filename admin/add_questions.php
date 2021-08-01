<?php include 'toplayout.php';

$userId = userID($userInput);

if(empty($_GET['id'])){
    $modelTestID = remainingBYID_DESC($MODEL_TEST,"id",$userId);
}else {
    $modelTestID = $_GET['id'];
}
$modelTestID =  intval($modelTestID);
$numberOfQuestions = TotalNumberOfRowsWhere($QUESTIONS,"model_test_id",$modelTestID);
$finishedValue =  returnSingleValue($MODEL_TEST,"finished",'id',$modelTestID);
if(!empty($finishedValue)|| (TotalNumberOfRowsWhere($MODEL_TEST,"id",$modelTestID))===0){
    echo "<script type='text/javascript'> document.location = 'view_model_tests'; </script>";
}
$modelTestName = returnSingleValue($MODEL_TEST,'model_test_name','id',$modelTestID);

?>

<div class="container">
    <?php  
    if($numberOfQuestions>0){
        include 'question_modal.php';
    }
    ?>
    <h4 class="text-center"><?php echo $modelTestName;?> মডেল টেস্ট এর জন্য প্রশ্ন যুক্ত করুন </h4>
    <hr>

    <div class="description_for_question">
        <p>১. প্রশ্নে ক্রমিক নম্বর দেওয়ার প্রয়োজন নাই। এমনকি উত্তরের অপশনে ক,খ,গ বা ঘ লেখার প্রয়োজন নাই।</p>
        <p>২. যে শব্দ বা শব্দ সমষ্টির নিচে দাগ দিতে চান তার শুরুতে লিখুন [] এবং শেষে লিখুন [/]</p>
        <p>৩. ছবি ব্যবহারের ক্ষেত্রে সতর্ক হোন। প্রশ্নের জন্য সর্বোচ ৩০০x৩০০ আর অপশনের জন্য সর্বোচ্চ ১৫০x১৫০ পিক্সেলের
            ছবি
            দিন। প্রয়োজনে আগে <a href="https://www.resizepixel.com/" target="_blank">ক্রপ করে নিন</a>। যেন শুধুমাত্র
            প্রয়োজনীয়
            অংশ থাকে।</p>
    </div> 
 
    <div class="question_set_box">
        <form class="new_question" id="new_question" enctype="multipart/form-data" action="../link/add_questions.php"
            accept-charset="UTF-8" method="post">

            <input type="hidden" name="model_test_id" value="<?php echo $modelTestID;?>" />

            <div class="question_box">
                <strong> প্রশ্ন নম্বর: <?php echo englishToBangla($numberOfQuestions+1);?></strong>
                <textarea autocomplete="off" class="form-control" name="question_statement" id="question_statement" required>
                 </textarea>
                <br>
                <span>ছবি যুক্ত করুন (if necessary)</span>
                <input style="width: 100%" type="file" name="question_image" id="question_question_image"  accept=".img,.png,.webp,.git,.jpg,.jpeg" />
            </div>
            <br>


            <div class="option_box">
                <strong> অপশন A: </strong>
                <input autocomplete="off" class="form-control" type="text"
                    name="option_A"
                    id="question_answer_options_attributes_0_option" required/>
                <br>
                <span>ছবি যুক্ত করুন (if necessary)</span>
                <input style="width: 100%" type="file" name="option_A_image"
                    id="question_answer_options_attributes_0_option_image"  accept=".img,.png,.webp,.git,.jpg,.jpeg" />
            </div>

            <div class="option_box">
                <strong> অপশন B: </strong>
                <input autocomplete="off" class="form-control" type="text"
                    name="option_B"
                    id="question_answer_options_attributes_1_option" required/>
                <br>
                <span>ছবি যুক্ত করুন (if necessary)</span>
                <input style="width: 100%" type="file" name="option_B_image"
                    id="question_answer_options_attributes_1_option_image"  accept=".img,.png,.webp,.git,.jpg,.jpeg" />
            </div>
            <div class="option_box">
                <strong> অপশন C: </strong>
                <input autocomplete="off" class="form-control" type="text"
                    name="option_C"
                    id="question_answer_options_attributes_2_option" required/>
                <br>
                <span>ছবি যুক্ত করুন (if necessary)</span>
                <input style="width: 100%" type="file" name="option_C_image"
                    id="question_answer_options_attributes_2_option_image"  accept=".img,.png,.webp,.git,.jpg,.jpeg" />
            </div>

            <div class="option_box">
                <strong> অপশন D: </strong>
                <input autocomplete="off" class="form-control" type="text"
                    name="option_D"
                    id="question_answer_options_attributes_3_option" required/>
                <br>
                <span>ছবি যুক্ত করুন (if necessary)</span>
                <input style="width: 100%" type="file" name="option_D_image"
                    id="question_answer_options_attributes_3_option_image"  accept=".img,.png,.webp,.git,.jpg,.jpeg" />
            </div>

            <div class="right_answer_box">
                <strong> সঠিক উত্তর লিখুন: </strong>
                <select class="form-control" name="correct_answer" id="question_setter_answer" required>
                    <option value="">সঠিক উত্তর নির্বাচন করুন</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </div>

            <div class="question_box">
                <strong> ব্যাখ্যা লিখুন (if necessary): </strong>
                <textarea class="form-control" name="question_answer_description" id="question_ans_description"></textarea>
                <br>
                <span>ছবি যুক্ত করুন (if necessary)</span>
                <input style="width: 100%" type="file" name="question_answer_image"
                    id="question_description_image"  accept=".img,.png,.webp,.git,.jpg,.jpeg" />
            </div>
            <br>

            <div class="form-row">
                <input type="submit" name="add_question" value="Add Question" class="btn btn-success form-control"
                    data-disable-with="Add Question" />
            </div>
        </form>
    </div>
</div>
<br>

<?php include 'bottomlayout.php'?>