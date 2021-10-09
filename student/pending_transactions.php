<?php include 'toplayout.php';
$user_id = userID($userInput);
$all_pending_transaction = all_by_SPECIFIC_ID($TRANSACTIONS,'status',0);

?>
<br>
<div class="container">
  <table class="transaction_table" text-align="center">
    <tr>
      <th> মোবাইল নম্বর </th>
      <th> ট্রান্সেকশন ID </th>
     <th> মাধ্যম  </th>
      <th> action </th>
    </tr>
    <?php foreach($all_pending_transaction as $row) {
        $table_user_id = returnSingleValue($CREATE_COURSE,'user_id','id',$row['course_id']);

        if($user_id==$table_user_id) {
        ?>
      <tr>
      <form action="../link/acceptTransactions.php" method="post">
      <input type="hidden" name="transaction_id" value="<?php echo $row['transaction_id'];?>">
      <input type="hidden" name="course_id" value="<?php echo $row['course_id'];?>">
        <td><?php echo $row['mobile_number']; ?></td>
        <td><?php echo $row['transaction_id']; ?></td>
        <td><?php echo $row['payment_method']; ?></td>
        <td>
          <span class="transaction_approved">
            <button style="background:none;border:none;"class="text-success" type="submit" name="approved"><i class="fas fa-check"></i></button>
          </span> &nbsp; | &nbsp;
          <span class="transaction_rejected">
          <button style="background:none;border:none;"class="text-danger" type="submit" name="reject" title="Reject"><i class="fas fa-trash-alt"></i></button>
          </span>
        </td>
        </form>
      </tr>
    <?php }} ?>
  </table>
  <br>
  <div>
    <br>
  </div>
  <div class="row course_name">
    <p>
      <h4>Affiliate program কি?</h4>
      উত্তরঃ Affiliate program এর মাধ্যমে আপনি টাকা আয় করতে পারবেন।কিভাবে?
      <br>

      আমাদের বিসিএস  সম্প্রীতি প্লাটফর্ম এ শিক্ষকগণ, প্রকাশনীসমূহ এবং কোচিং সেন্টারগুলো পেইড পরীক্ষা নিয়ে থাকেন।
      ছাত্র/ছাত্রীরা একটা নির্দিষ্ট পরিমান টাকা দিয়ে তাদের কোর্সে ভর্তি হন। শিক্ষকদের কোর্সে ভর্তি ছাড়া কেউ তাদের পরীক্ষার লিংক
      জানলেও পরীক্ষা দিতে পারে না। <b>আপনি যদি সেই সমস্ত কোর্সে ছাত্র/ছাত্রী ভর্তি করাতে পারেন তবে একটা নির্দিষ্ট পরিমান টাকা আপনি পাবেন।
      যা আপনার অ্যাকাউন্টে জমা হবে এবং মাস শেষে আপনি বিকাশ/রকেট বা নগদের মাধ্যমে তুলতে পারবেন।
      আপনি চাইলে আপনার আয় করা টাকা দিয়ে যেকোন কোর্সে ভর্তি হতে পারবেন। কত টাকা আয় করলেন, কত টাকা পেন্ডিং
      এ আছে সবই দেখতে পাবেন।অবশ্যই মনে রাখবেন আমাদের বিসিএস সম্প্রীতি প্লাটফর্ম এ সবকিছূই ফ্রি শুধুমাত্র যেসব শিক্ষক টাকার
      বিনিময়ে পরীক্ষা নেন তাদের কোর্সে টাকা দিয়ে ভর্তি হতে হয়।</b> তাই Affiliate program এর মাধ্যমে টাকা আয় করতে কোন ফি বা
      টাকা লাগবে না। আমাদের সাথে আপনাদের পথ চলা সফল হোক এটাই আমাদের কাম্য।  আমাদের মাধ্যমে যাতে আপনারা উপকৃত হতে পারেন
      তার সর্বাত্মক চেষ্টা আমরা করবো। শুভ হোক আমাদের সাথে আপনার আগামীর পথচলা। আমাদের সাথে থাকার জন্য আমরা আপনাদের প্রতি বিশেষভাবে কৃতজ্।
    </p>
  </div>

</div>

<?php include 'bottomlayout.php' ?>