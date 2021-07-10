<?php include 'toplayout.php';

// For Pagination 
$results_per_page = 10;  
$total_number_of_results = TotalNumberOfRows($MODEL_TEST);
$number_of_page = ceil ($total_number_of_results / $results_per_page);  

if (!isset ($_GET['page']) ) {  
  $page = 1;  
} else {  
  $page = $_GET['page'];  
} 

$start_form = ($page-1) * $results_per_page;  

$final_pagination_results = allLIMIT($MODEL_TEST,$start_form , $results_per_page);

$page_name = 'exams.php';
?>

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
        $payment_status =  returnSingleValue($CREATE_COURSE,'payment_status','id',$row['course_id']);
        if(!empty($row['secure_pin'])){ ?>
                <div class="ribbon-wrapper">
                    <div class="ribbon">Pin</div>
                </div>
                <?php }
        else if ($payment_status==1) {?>
                <div class="ribbon-wrapper">
                    <div class="ribbon">Free</div>
                </div>
                <?php }else {?>
                <div class="ribbon-wrapper">
                    <div class="ribbon">Paid</div>
                </div>
                <?php  } ?>
                <div class="links exam_box">
                    <a href="#"><?php echo $row['model_test_name']; ?></a>
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