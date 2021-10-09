<?php
session_start();
error_reporting(E_ALL);
include '../link/config.php';
include '../link/functions.php';

if(isset($_POST['downloaod_participate_people'])){

    $model_test_id  = $_POST['model_test_id'];
    $user_data =  all_by_SPECIFIC_ID_DESC($QUESTION_ANSWER,'model_test_id',$model_test_id);

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
        <th>Serial No.</th>
        <th> পরিক্ষার্থির নাম </th>
        <th>সঠিক উত্তর</th>
        <th>ভুল উত্তর</th>
        <th>মোট নাম্বার</th>
        <th>পজিটিভ নাম্বার</th>
        <th>নেগেটিভ নাম্বার</th>
        </tr>
    </thead>
    ";
    $index = 1;
    foreach ($user_data as $row) {
    $model_test_name =returnSingleValue($USER,"name",'id', $row['user_id']);
    $correct_answer = $row['correct_answer'];
    $wrong_answer = $row['wrong_answer'];
    $total_mark = $row['total_mark'];
    $positive_mark = $row['positive_mark'];
    $negative_mark = $row['negative_mark'];
   
    $contents.="
    <tr>
    <td>$index</td>
    <td>$model_test_name</td>
    <td>$correct_answer</td>
    <td>$wrong_answer</td>
    <td>$total_mark </td>
    <td> $positive_mark</td>
    <td>$negative_mark </td>
    </tr>
    ";
    $index= $index+1;
    }

    $contents.="</table></body>";
    $mpdf->WriteHTML($contents);

    $mpdf->Output("userdetails.pdf","I");
}

