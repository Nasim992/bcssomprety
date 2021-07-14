<?php include 'toplayout.php';
$user_id = userID($userInput);
$course_data = all_by_SPECIFIC_ID_TWO_NOT($CREATE_COURSE,'payment_status',0,'user_id',$user_id );

?>

<!-- Subscribed courses -->
<div class="container">

    <p>
    <h5>চলমান কোর্স সমূহঃ</h5>
    </p>
    <div class="row">
    <?php $index=1;
     foreach ($course_data as $row) { ?>
        <div class="col-sm-12 course_name">
            <?php if($row['id']!=0) {?>
          <?php echo $index." . ".$row['course_name']; ?> |  <?php echo $row['payment_status']==1?"0": $row['payment_amount']; ?> টাকা | 
         
          <?php if(TotalNumberOfRowsWhereTWO_AND($TRANSACTIONS,'course_id','user_id',$row['id'],$user_id)>=1){
            echo "সাবস্ক্রাইব করেছেন";
          }else {?>
         <a href="transaction.php?id=<?php echo $row['id'];?>">সাবস্ক্রাইব করুন</a>
         <?php } ?>

          <?php } ?>
        </div>
    <?php $index++;} ?>
  </div>

    <br>
    <br>
  <div class="card-header">
    <h4 class="card-title" style="display: flex"> আপনার সাবস্ক্রাইবড কোর্সসমূহ </h4>
  </div>

  <table class="category_table" align="center">
    <tr>
      <th> কোর্সের নাম </th>
      <th> মোট পরীক্ষা </th>
      <th> পেমেন্ট </th>
      <th> ফি </th>
      <th>পেমেন্ট স্ট্যাটাস</th>
    </tr>
  <?php foreach ($course_data as $row) {
    
    if(TotalNumberOfRowsWhereTWO_AND($TRANSACTIONS,'course_id','user_id',$row['id'],$user_id)>=1){ ?>
      <tr>
        <td><?php echo $row['course_name']; ?></td>
        <td>
            <div style="width: 100%">
            <?php echo empty($row['created_exams'])?'-':$row['created_exams']; ?>
            </div>
        </td>
        <td><?php echo $row['payment_status']==0?'Paid':'Free'; ?></td>
        <td><?php echo $row['payment_amount']; ?></td>
        <td>
          <?php 
          $status = returnSingleValueTWO_COMPARISON($TRANSACTIONS,'status','course_id',$row['id'],'user_id',$user_id);
          if($status==0){
            echo "<b class='text-warning'>Pending</b>";
          }else if($status==1){
            echo "<b class='text-success'>Accepted</b>";
          }else{ 
            echo "<b class='text-danger'>Rejected</b>";
          }
          ?>
        </td>
      </tr>
    <?php }else { echo "<b class='text-info'>আপনি এখনো কোনো কোর্স সাবস্ক্রাইব করেন নাই</b>";}}?>
  </table>
  <br>
</div>
<br>

<?php include 'bottomlayout.php'; ?>