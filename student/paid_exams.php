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

$final_pagination_results =  allLIMIT_WHERE($MODEL_TEST,$start_form , $results_per_page,"finished",1);

$page_name = 'paid_exams.php';
?>

<!-- Exams  -->
<div class="container">

    <div class="row">
        <a class="exam_type_btn" href="exams">All Exam</a>
        <a class="exam_type_btn" href="free_exams">Free Exam</a>
        <a class="exam_type_btn active" href="paid_exams">Paid Exam</a>
        <a class="exam_type_btn" href="pinned_exams">Pin Protected</a>
    </div>

    <?php foreach ($final_pagination_results as $row) {
    $payment_status =  returnSingleValue($CREATE_COURSE,'payment_status','id',$row['course_id']);
    if ($row['payment']!=1 && empty($row['pinned'])) {?>
    <div class="row">
        <div class="exam_notice_box">
            <div class="col-sm-12">
                <div class="ribbon-wrapper">
                    <div class="ribbon bg-danger">Paid</div>
                </div>
                <div class="links exam_box">
                    <a href="model_exam.php?id=<?php echo  $row['id']; ?>"><?php echo $row['model_test_name']; ?></a>
                    <br>
                    তারিখ: <?php echo stringToDate($row['model_test_date']); ?> |
                    সময়: <?php echo stringToTime($row['model_test_date']); ?>  |
                    মোট পরিক্ষার্থী :<?php echo TotalNumberOfRowsWhere($QUESTION_ANSWER,"model_test_id",$row['id']); ?> জন |
                    <div class="fb-share-button" data-href="https://bcsshomprity.com/student/model_exam.php?id=<?php echo  $row['id']; ?>" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fbcsshomprity.com%2Fstudent%2Fmodel_exam.php%3Fid%3D<?php echo  $row['id']; ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                   |
                   <input style="display:none;" type="text" value="https://bcsshomprity.com/student/model_exam.php?id=<?php echo  $row['id'];?>" id="myInput<?php echo  $row['id'];?>">

                    <button class="btn btn-sm" onclick="navigator.clipboard.writeText('bcsshomprity.com/student/model_exam.php?id='+<?php echo $row['id'];?>)">
                    <span id="myTooltip<?php echo  $row['id'];?>" class="text-danger"> Copy</span>
                    </button> 
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=359356151868093&autoLogAppEvents=1" nonce="c9WLEXf0"></script>
                </div>
            </div>
        </div>
    </div>
    <?php } }?>

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