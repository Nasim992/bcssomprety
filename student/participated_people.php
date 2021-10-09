<?php include 'toplayout.php';

if(isset($_GET['id'])){
    $model_test_id  = $_GET['id'];
}

$model_test_name = returnSingleValue($MODEL_TEST,"model_test_name",'id', $model_test_id); 

$user_data =  all_by_SPECIFIC_ID_DESC($QUESTION_ANSWER,'model_test_id',$model_test_id);

?>

<div class="container">

     <p>
    <h5><?php echo $model_test_name ; ?></h5>
    </p>

<table class="category_table" text-align="center" id="table_id">
    <thead>
    <tr>
      <th> পরিক্ষার্থির নাম </th>
      <th>সঠিক উত্তর</th>
      <th>ভুল উত্তর</th>
      <th>মোট নাম্বার</th>
      <th>পজিটিভ নাম্বার</th>
      <th>নেগেটিভ নাম্বার</th>
      <th>Action</th>
    </tr>
    </thead>
  <?php foreach ($user_data as $row) { ?>
      <tr>
          <td> <?php echo  returnSingleValue($USER,"name",'id', $row['user_id']); ?></td>
          <td><?php echo $row['correct_answer']; ?></td>
          <td><?php echo $row['wrong_answer']; ?></td>
          <td><?php echo $row['total_mark']; ?></td>
          <td><?php echo $row['positive_mark']; ?></td>
          <td><?php echo $row['negative_mark']; ?></td>
          <td><a href="result.php?id=<?php echo $model_test_id; ?>&uid=<?php echo $row['user_id'] ?>">View</a></td>
          
      </tr>
    <?php }?>
  </table>
</div>

<div class="container hide pt-2">
<div class="d-flex justify-content-center">
        <form action="download_participated_people" method="post">
            <input type="hidden"name="model_test_id"value="<?php echo $model_test_id; ?>">
        <input class="btn btn-info  d-print-none" type="submit"name="downloaod_participate_people" value="Download as pdf"></input>
        </form>
        <button class="btn btn-success d-print-none ml-2" onclick="print_result()">Print</button>
    </div>
</div>
<div class="pb-3"></div>
<script>
    function print_result(){
        window.print();
    }
</script>


<?php include 'bottomlayout.php'; ?>