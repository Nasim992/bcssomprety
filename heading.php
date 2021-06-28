<?php 
$day = date("l");
$month = date("M");
$date = date("d");
$year = date("Y");
$finalDate = $day.", ".$month." ".$date.",".$year;
?>
<div class="d-flex justify-content-between align-items-center breaking-news bg-dark text-white">
    <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-dark py-2 text-white px-1 news">
        <span class="d-flex align-items-center">&nbsp;<b><?php echo $finalDate; ?></b></span>
    </div>
    <marquee class="news-scroll" behavior="scroll" direction="left">
        <a href="https://www.facebook.com/BCSSHOMPRITY" target="_blank" class="text-warning blink_text"><b>
                *** আমাদের ফেইসবুক পেজ এ যুক্ত হতে এখানে ক্লিক করুন ***</b></a>&emsp; &emsp;
        <a href="https://www.facebook.com/groups/379184979665896/" target="_blank" class="blink_text text-warning"><b>*** আমাদের ফেইসবুক গ্রুপ এ যুক্ত হতে এখানে ক্লিক করুন ***</b></a>
    </marquee>
    <p class="d-flex flex-row justify-content-center news"><b>সদস্য সংখ্যা: 8</b></p>
</div>