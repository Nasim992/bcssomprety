<?php
session_start();
error_reporting(E_ALL);
include '../link/config.php';
include '../link/functions.php';
if (isset($_SESSION['userInput'])){
    $userInput = $_SESSION["userInput"];
  } 
// IsUserLoggedIn($userInput); 

// For Pagination 
$results_per_page = 10;  
$total_number_of_results = TotalNumberOfRows($MODEL_TEST);
$number_of_page = ceil ($total_number_of_results / $results_per_page);  

if (!isset ($_GET['page']) ) {  
  $page = 1;  
} else {  
  $page = intval($_GET['page']);
} 

$start_form = ($page-1) * $results_per_page;  

$final_pagination_results = allLIMIT($MODEL_TEST,$start_form , $results_per_page);

$page_name = 'exams.php';
?>
<!doctype html>
<html lang="en">

<head>
    <base href="<?php  echo $BASE_URL_STUDENT;?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport"
        content="width=device-width,height=device-height,initial-scale=1.0,maximum-scale=2.0,minimum-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" href="../images/logo-c1383effd4d17a6b3b566837fc7caeb895c979d9463ece5245c09ab0b7b89ddc.png"
        type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.3/css/all.min.css">

    <link rel="stylesheet" href="../css/index.css">
    <title>BCS Somprety</title>
</head>

<body>
    <!-- Heading -->
    <?php  include '../heading.php';?>
    <!-- Navbar -->
    <?php  include 'navbar.php';?>
    <!-- Display Message -->
    <?php display_message(); ?>

<!-- Exams  -->
<div class="container">

    <div class="row">
        <a class="exam_type_btn active" href="exams">All Exam</a>
        <a class="exam_type_btn" href="free_exams">Free Exam</a>
        <a class="exam_type_btn" href="paid_exams">Paid Exam</a>
        <a class="exam_type_btn" href="pinned_exams">Pin Protected</a>
    </div>

    <?php foreach ($final_pagination_results as $row) {?>
    <div class="row">
        <div class="exam_notice_box">
            <div class="col-sm-12">
                <?php
        if(!empty($row['pinned'])){ ?>
                <div class="ribbon-wrapper">
                    <div class="ribbon bg-warning">Pin</div>
                </div>
                <?php }
        else if ($row['payment']==1) {?>
                <div class="ribbon-wrapper">
                    <div class="ribbon bg-success">Free</div>
                </div>
                <?php }else {?>
                <div class="ribbon-wrapper">
                    <div class="ribbon bg-danger">Paid</div>
                </div>
                <?php  } ?>
                <div class="links exam_box">
                    <a href="model_exam.php?id=<?php echo  $row['id']; ?>"><?php echo $row['model_test_name']; ?></a>
                    <br>
                    তারিখ: <?php echo stringToDate($row['model_test_date']); ?> |
                    সময়: <?php echo stringToTime($row['model_test_date']); ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <br>
 <!-- Pagination -->
 <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php 
                if($page <=1){?>
            <li class="page-item disabled">
                <a class="page-link" href="<?php echo $page_name;?>?page=<?php echo $page-1; ?>" aria-disabled="true">Previous</a>
            </li>
            <?php }else { ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo $page_name;?>?page=<?php echo $page-1; ?>">Previous</a>
            </li>
            <?php } 
            for($i = 1; $i<= $number_of_page; $i++) {
              $page_link = $page_name.'?page='.$i;
              ?>
            <li class="page-item"><a class="page-link" href="<?php echo $page_link; ?>"><?php echo $i; ?></a></li>
            <?php }  
                if($page >=$number_of_page){?>
            <li class="page-item disabled">
                <a class="page-link" href="<?php echo $page_name;?>?page=<?php echo $page+1; ?>" aria-disabled="true">Next</a>
            </li>
            <?php }else { ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo $page_name;?>?page=<?php echo $page+1; ?>">Next</a>
            </li>
            <?php } ?>
        </ul>
    </nav>

</div>
<br>


<?php include 'bottomlayout.php'; ?>