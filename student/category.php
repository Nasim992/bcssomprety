<?php 
$course_data = all_RANDOM_LIMIT($CREATE_COURSE,6);
?>
<div class="container-fluid">
    
<div class="row bg-white">
    <div class="home_content">
        <h4> কোর্স <span class="right_btn">
                <a class="more_btn" href="<?php echo $BASE_URL; ?>student/categories">More &gt;</a>
            </span> </h4>
        <hr>

        <div class="row">
        </div>
    </div>
</div> 

<div class="row">
<?php foreach ($course_data as $row) { if($row['id']!=0) {?>
    <div class="col-md-4">
        <a href="categories">
        <div class="p-exam">
            <span class="cat_icon"><i class="fas fa-book-open"></i></span>
            <div class="p-exam-text">
                <p class="exam_cat">   <?php echo $row['course_name'] ?> </p>
                <span class="short_text"> মোট পরীক্ষা:   <?php echo $row['created_exams'] ?></span> <br>
                <span class="short_text"> নিবন্ধিত শিক্ষার্থী:   <?php echo $row['register_student'] ?></span>
            </div>
        </div>
        </a>
    </div>
    <?php } } ?>
</div>
</div>
</div>
</div>