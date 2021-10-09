<?php
session_start();
error_reporting(E_ALL);
include '../link/config.php';
include '../link/functions.php';

if(isset($_POST['downloaod_model_test'])){

    require_once '../vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf(
        [
            'default_font_size' =>12,
            'default_font' =>'nikosh'
        ]
    );
    $data = all($MODEL_TEST);
    include '../css/contentsCSS.php';

    $mpdf->SetHeader($BASE_URL.'© 2021 Copyright: BCS সম্প্রীতি' );
    $mpdf->setFooter('{PAGENO}');

    $contents.="
    <h2>সমস্ত মডেল টেস্ট সমুহ</h2>
    <table class='category_table text-center'>
    <thead>
        <tr>
            <th> পরীক্ষার নাম </th>
            <th> তারিখ </th>
            <th> সময়</th>
            <th> ব্যাপ্তি </th>
            <th> ফি </th>
            <th> পিন </th>
            <th> সেট </th>
            <th> প্রশ্ন সংখ্যা </th>
        </tr>
    </thead>
    ";
    foreach ($data as $row) {
    $model_test_name =$row['model_test_name'];
    $model_test_date = stringToDate($row['model_test_date']);
    $model_test_time = stringToTime($row['model_test_date']);
    $duration =  $row['duration'];
    if($row['payment']==1){
        $payment = "Free";
    }else{
        $payment = "Paid";
    }
    empty($row['secure_pin'])?$secure_pin="0":$secure_pin=$row['secure_pin'];
    empty($row['model_set'])?$model_set="0":$model_set=$row['model_set'];
    empty($row['total_questions'])?$total_questions="—":$total_questions=$row['total_questions'];
    $question_number = TotalNumberOfRowsWhere($QUESTION_ANSWER,"model_test_id",$row['id']);

    $contents.="
    <tr>
    <td> $model_test_name</td>
    <td>$model_test_date</td>
    <td> $model_test_time</td>
    <td>$duration</td>
    <td>$payment</td>
    <td>$secure_pin</td>
    <td>$model_set</td>
    <td>$question_number</td>
    </tr>
    ";
    }

    $contents.="</table></body>";
    $mpdf->WriteHTML($contents);

    $mpdf->Output("userdetails.pdf","I");
}

