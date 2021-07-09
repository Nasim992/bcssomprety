<?php include 'toplayout.php';

$data = all($MODEL_TEST);

?>

<!-- Exams  -->
<div class="container">

    <div class="row">
        <a class="exam_type_btn active" href="exams">All Exam</a>
        <a class="exam_type_btn" href="free_exams">Free Exam</a>
        <a class="exam_type_btn" href="paid_exams">Paid Exam</a>
        <a class="exam_type_btn" href="pinned_exams">Pin Protected</a>
    </div> 

<?php foreach ($data  as $row) {?>
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
<div class="flickr_pagination">
 
</div>
</div>
<br>


<?php include 'bottomlayout.php'; ?>