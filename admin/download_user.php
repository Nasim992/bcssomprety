<?php
session_start();
error_reporting(E_ALL);
include '../link/config.php';
include '../link/functions.php';

if(isset($_POST['downloaod_result'])){

    require_once '../vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf(
        [
            'default_font_size' =>12,
            'default_font' =>'nikosh'
        ]
    );
    $data = all_by_userID_NOT($USER,'type','admin');
    include '../css/contentsCSS.php';
    $mpdf->SetHeader($BASE_URL.'© 2021 Copyright: BCS সম্প্রীতি' );
    $mpdf->setFooter('{PAGENO}');
    $contents.="
    <h2>সমস্ত ইউজার ডিটেইলস</h2>
    <table class='category_table text-center'>
    <thead>
        <tr>
            <th> নাম </th>
            <th> ফোন নাম্বার</th>
            <th> ইমেইল</th>
            <th> ইন্সটিটিউট</th>
        </tr>
    </thead>
    ";
    foreach ($data as $row) {
    $name = $row['name'];
    $phone = $row['phone'];
    $email = $row['email'];
    $institute = $row['institute'];

    $contents.="
    <tr>
    <td>$name</td>
    <td>$phone</td>
    <td>$email </td>
    <td>$institute</td>
    </tr>
    ";
    }

$contents.="</table></body>";
$mpdf->WriteHTML($contents);

  $mpdf->Output("userdetails.pdf","I");
}

