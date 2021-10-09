<?php include 'toplayout.php';

$userId = userID($userInput);

$QuestionsID = $_GET['id'];
$Index = $_GET['index'];

$allQuestionByID = all_by_SPECIFIC_ID($QUESTIONS,"id",$QuestionsID);

$questions = json_decode($allQuestionByID[0]['questions']);; 
$option_A = json_decode($allQuestionByID[0]['option_A']);
$option_B = json_decode($allQuestionByID[0]['option_B']);
$option_C = json_decode($allQuestionByID[0]['option_C']);
$option_D = json_decode($allQuestionByID[0]['option_D']);

?>

<div class="container">

    <h4 class="text-center"><?php echo $modelTestName;?> Update Model Test Question</h4>
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
        <form class="new_question" id="new_question" enctype="multipart/form-data" action="../link/edit_questions.php"
            accept-charset="UTF-8" method="post">

            <input type="hidden" name="question_id" value="<?php echo $QuestionsID;?>" />

            <input type="hidden" name="previous_question_image" value="<?php echo $questions->question_image; ?>" />

            <input type="hidden" name="previous_question_answer_image" value="<?php echo $questions->question_answer_image; ?>" />

            <input type="hidden" name="option_a_image" value="<?php echo $option_A->option_A_image; ?>" />

            <input type="hidden" name="option_b_image" value="<?php echo $option_B->option_B_image; ?>" />
            
            <input type="hidden" name="option_c_image" value="<?php echo $option_C->option_C_image; ?>" />

            <input type="hidden" name="option_D_image" value="<?php echo $option_D->option_D_image; ?>" />
            

            <div class="question_box">
                <strong> প্রশ্ন নম্বর: <?php echo englishToBangla($Index);?></strong>
                <textarea autocomplete="off" class="form-control" name="question_statement" id="question_statement" value="<?php echo $questions->question_statement ?>" required><?php echo $questions->question_statement ?>
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
                    id="question_answer_options_attributes_0_option" value="<?php echo $option_A->option_A; ?>" required/>
                <br>
                <span>ছবি যুক্ত করুন (if necessary)</span>
                <input style="width: 100%" type="file" name="option_A_image"
                    id="question_answer_options_attributes_0_option_image"  accept=".img,.png,.webp,.git,.jpg,.jpeg" />
            </div>

            <div class="option_box">
                <strong> অপশন B: </strong>
                <input autocomplete="off" class="form-control" type="text"
                    name="option_B"
                    id="question_answer_options_attributes_1_option"value="<?php echo $option_B->option_B; ?>" required/>
                <br>
                <span>ছবি যুক্ত করুন (if necessary)</span>
                <input style="width: 100%" type="file" name="option_B_image"
                    id="question_answer_options_attributes_1_option_image"  accept=".img,.png,.webp,.git,.jpg,.jpeg" />
            </div>
            <div class="option_box">
                <strong> অপশন C: </strong>
                <input autocomplete="off" class="form-control" type="text"
                    name="option_C"
                    id="question_answer_options_attributes_2_option"value="<?php echo $option_C->option_C; ?>" required/>
                <br>
                <span>ছবি যুক্ত করুন (if necessary)</span>
                <input style="width: 100%" type="file" name="option_C_image"
                    id="question_answer_options_attributes_2_option_image"  accept=".img,.png,.webp,.git,.jpg,.jpeg" />
            </div>

            <div class="option_box">
                <strong> অপশন D: </strong>
                <input autocomplete="off" class="form-control" type="text"
                    name="option_D"
                    id="question_answer_options_attributes_3_option" value="<?php  echo $option_D->option_D;?>" required/>
                <br>
                <span>ছবি যুক্ত করুন (if necessary)</span>
                <input style="width: 100%" type="file" name="option_D_image"
                    id="question_answer_options_attributes_3_option_image"value="<?php echo $option_D->option_D; ?>"  accept=".img,.png,.webp,.git,.jpg,.jpeg" />
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
                <textarea class="form-control" name="question_answer_description" id="question_ans_description"><?php echo $questions->question_answer_description; ?></textarea>
                <br>
                <span>ছবি যুক্ত করুন (if necessary)</span>
                <input style="width: 100%" type="file" name="question_answer_image"
                    id="question_description_image"  accept=".img,.png,.webp,.git,.jpg,.jpeg" />
            </div>
            <br>

            <div class="form-row">
                <input type="submit" name="update_questions" value="Update Questions" class="btn btn-success form-control"
                    data-disable-with="Add Question" />
            </div>
        </form>
    </div>

 </div>
<br>

<?php include 'bottomlayout.php'?>