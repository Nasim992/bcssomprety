<?php
session_start();
error_reporting(E_ALL);
include '../link/config.php';
include '../link/functions.php';

if(isset($_POST['printYourResult'])){
    $model_test_id=$_POST['model_test_id'];
    $session_user_id = $_POST['session_user_id'];


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
$examinee_name = returnSingleValue($USER,'name','id',$session_user_id);
$model_test_date = stringToDate($model_test_date);

$correct_answer = $question_answer_data[0]['correct_answer'];
$wrong_answer = $question_answer_data[0]['wrong_answer'];
$skipped = $question_answer_data[0]['skipped'];
$positive_mark = $question_answer_data[0]['positive_mark'];
$negative_mark = $question_answer_data[0]['negative_mark'];
$total_mark =  $question_answer_data[0]['total_mark'];

    require_once '../vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf(
        [
            'default_font_size' =>12,
            'default_font' =>'nikosh'
        ]
    );

    include '../css/contentsCSS.php';
    $mpdf->SetHeader('BCS SHOMPRITY Result Sheet');
    $mpdf->SetFooter('© 2021 Copyright: BCS সম্প্রীতি');
    $contents.="
    <body class='text_align'>
    <div style='padding:20px;'>
    <h2 style='color:red;' class='btn btn-success'>$model_test_name</h2>
    <h5>মডেল টেস্ট ID: $model_test_id</h5>
    পরীক্ষকের নাম  : $model_test_examiner_name<br>
    পরিক্ষার্থীর নাম : $examinee_name <br>
    তারিখ : $model_test_date<br>
    </div>

<table class='result_box'>
    <tr>
        <th>সঠিক উত্তর</th>
        <th>ভুল উত্তর</th>
        <th>স্কিপড</th>
        <th>প্রাপ্ত নম্বর</th>
        <th>নেগেটিভ নম্বর</th>
    </tr>
    <tr>
        <td class='green_bg'>$correct_answer</td>
        <td class='red_bg'>$wrong_answer</td>
        <td class='orange_bg'>$skipped</td>
        <td class='green_bg'>$positive_mark </td>
        <td class='red_bg'>$negative_mark</td>
    </tr>
    <tr class='blue_bg result_text'>
        <th colspan='3' style='color:white;'>সর্বমোট নম্বর</th>
        <td colspan='3'  style='color:white;'>$total_mark</td>
    </tr>
    <tr class='blue_bg result_text'>
        <th colspan='3' style='color:white;'>বর্তমান অবস্থান</th>
        <td colspan='3'  style='color:white;'> $current_position /$total_model_test_answer</td>
    </tr>
</table>

";
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
else if($questions->correct_answer=='C') {$zcolorC = 'green_bg';}
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

$option_A = $option_A -> option_A;
$option_B = $option_B ->option_B;
$option_C = $option_C ->option_C;
$option_D = $option_D ->option_D;
$correct_answer = $questions->correct_answer;
$contents.="
<div style='border:1px solid black;padding:20px;border-radius:5px; margin:5px;'>
<b>$index . $questions_statement</b><br>
<span class='option_circle $colorA '>ক </span><span class='result_option '>$option_A</span><br>
<span class='option_circle $colorB '>খ </span><span class='result_option '>$option_B</span><br>
<span class='option_circle $colorC '>গ </span><span class='result_option'>$option_C</span><br>
<span class='option_circle $colorD '>ঘ </span><span class='result_option'>$option_D</span><br>
<b style='color:green'>Correct Answer: $correct_answer</b><br>
</div>
";

$index=$index+1;
$indexColor= $indexColor+2;
} 
$contents.="</body>";

    $mpdf->WriteHTML($contents);

  $mpdf->Output("$examinee_name.pdf","I");
}

