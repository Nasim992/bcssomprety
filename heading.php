<?php 
$day = date("l");
$month = date("M");
$date = date("d");
$year = date("Y");
$finalDate = $day.", ".$month." ".$date.",".$year;
?>
<div class="header">
    <div class="row">
        <div class="left_header">
            <?php echo $finalDate;?>
        </div>
        <div class="central_header">
            <marquee width="100%" direction="left">
                <a href="https://www.facebook.com/BCSSHOMPRITY" target="_blank" class="blink_text">*** আমাদের ফেইসবুক
                    পেজ এ যুক্ত হতে এখানে ক্লিক করুন ***</a>
                &emsp; &emsp;
                <a href="https://www.facebook.com/groups/379184979665896/" target="_blank" class="blink_text">*** আমাদের
                    ফেইসবুক গ্রুপ এ যুক্ত হতে এখানে ক্লিক করুন ***</a>
            </marquee>
        </div>
        <div class="right_header text-center">
            সদস্য সংখ্যা: <?php echo englishToBangla('4'); ?>
        </div>
    </div>
</div>