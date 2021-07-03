<?php 
$data = all($MODEL_TEST);
?>
<div class="content pt-3">
    <div class="row">
        <div class="col-md-7">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="../images/logo-c1383effd4d17a6b3b566837fc7caeb895c979d9463ece5245c09ab0b7b89ddc.png"
                            class="w-100" alt="Exam text will available soon">
                    </div>
                    <?php  foreach ($data as $row) { 
                    $source = '../storage/banner/'.$row['image_name'];
                    ?>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="<?php echo $source; ?>" class=" w-100" alt="<?php echo $row['model_test_name']?>">
                            <p class="text-center"><?php echo $row['model_test_name']?></p>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="col-md-5">
            <div class="notice_box">
                <h5><i class="fas fa-bullhorn"></i> &nbsp; নোটিশ বোর্ড</h5>
                <hr>
                <div class="inner_notice_box">
                    <ul>
                        <h3>Notice Append Here</h3>
                    </ul>
                </div>
                <div class="flickr_pagination">

                </div>
            </div>
        </div>
    </div>

    <div class="moto">
        <p>
            দেখি শুনি স্মৃতি জমা রাখি আগামী প্রজন্মের জন্য। বিশ্বাস করি, শুকনো পাতার ঘর্ষণে একদিন আগুন জ্বলবেই।<br>
            আর সেই প্রত্যাশাই আমাদের বিসিএস সম্প্রীতি ওয়েবসাইট সেই পথে আগাবে। সম্প্রীতির বন্ধনে প্রতিটা মানুষকে সেবা
            দানের উদ্দেশ্য আমাদের এই ওয়েবসাইট তৈরির মহৎ উদ্দেশ্য।
        </p>
    </div>
</div>


<div class="row bg-white">
    <div class="home_content">
        <h4> ক্যাটাগরি <span class="right_btn">
                <a class="more_btn" href="categories">More &gt;</a>
            </span> </h4>
        <hr>

        <div class="row">
        </div>
    </div>
</div>