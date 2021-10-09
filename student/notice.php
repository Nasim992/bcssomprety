<?php 
$data = all($MODEL_TEST);
// For Pagination 
$results_per_page = 3;  
$total_number_of_results = TotalNumberOfRows($NOTICE);
$number_of_page = ceil ($total_number_of_results / $results_per_page);  

if (!isset ($_GET['page']) ) {  
  $page = 1;  
} else {  
  $page = intval($_GET['page']);
} 

$start_form = ($page-1) * $results_per_page;  

$final_pagination_results = allLIMIT_DESC($NOTICE,$start_form , $results_per_page,'id');

$page_name = 'home.php';
?>
<div class="content pt-3">
    <div class="row">
        <div class="col-md-7">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="<?php echo $BASE_URL; ?>images/logo-c1383effd4d17a6b3b566837fc7caeb895c979d9463ece5245c09ab0b7b89ddc.png"
                            class="w-100" alt="Exam text will available soon">
                    </div>
                    <?php  foreach ($data as $row) { 
                    if(!empty($row['image_name'])){
                    $source = '../storage/banner/'.$row['image_name'];
                    ?>
                    <div class="carousel-item">
                        <a href="exams">
                            <img src="<?php echo $source; ?>" class=" w-100" alt="<?php echo $row['model_test_name']?>">
                            <!-- <p class="text-center"><?php echo $row['model_test_name']?></p> -->
                        </a>
                    </div>
                    <?php } }?>
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
                    <ul class="list-group">
                    <?php 
                    if($total_number_of_results==0){
                        echo "<h5>No Notice Created Yet!</h5>";
                    }
                    
                    foreach ($final_pagination_results as $rows) {
                        $notice_file_path = $BASE_URL."storage/notice/".$rows['notice_file_name'];
                        ?>
                       <li class="list-group-item"><?php
                        echo "<b style='font-size:17px;'> ".$rows["notice"]." </b><br>";

                        if(!empty($rows['notice_file_name'])){ ?>
                            <a href="<?php echo $notice_file_path ?>" target="_blank"><small>Download Notice File</small></a>
                        <?php }else { echo "<small class='text-info'>No file added</small>";} ?>
                        </li> 
                    <?php } ?>
  
                    </ul>
                </div>
            </div>
            <div class="flickr_pagination">
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
