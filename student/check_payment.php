<?php include 'toplayout.php';

if(isset($_POST['complete_transaction'])){

}

?>
<div class="container">
    <div class="check_payment_box">
        <h5>এই পরীক্ষাটি দেয়ার জন্য ফি প্রদান করে তথ্য হালনাগাদ করতে হবে। আপনি কি সম্পূর্ণ প্রক্রিয়া সম্পন্ন করেছেন?
        </h5>
        <br>
        <form method="post">
        <button type="submit" name="complete_transaction" class="btn btn-success payment_btn" >হ্যা, সম্পন্ন করেছি</button>
        </form>
        <a href="transaction" class="btn btn-primary payment_btn" >না, ফর্ম পূরণ করুন</a>
    </div>
</div>
<?php include'bottomlayout.php'; ?>