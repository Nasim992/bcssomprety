<?php include 'toplayout.php';

// Model Test ID
if (!isset ($_GET['id']) ) {  
  $course_id = "not_found";   
} else {  
  $course_id  = intval($_GET['id']);  
} 

?>
<div class="container">
    <div class="check_payment_box">
        <h5>এই পরীক্ষাটি দেয়ার জন্য ফি প্রদান করে তথ্য হালনাগাদ করতে হবে। আপনি কি সম্পূর্ণ প্রক্রিয়া সম্পন্ন করেছেন?
        </h5>
        <br>
        <form action="../link/check_payment.php" method="post">
        <input type="hidden" name="model_test_id" value="<?php echo $course_id;?>">
        <button type="submit" name="complete_transaction" class="btn btn-success payment_btn" >হ্যা, সম্পন্ন করেছি</button>
        <a href="transaction.php?id=<?php echo $course_id;?>" class="btn btn-primary payment_btn" >না, ফর্ম পূরণ করুন</a>
        </form>
    </div>
</div>
<?php include'bottomlayout.php'; ?>