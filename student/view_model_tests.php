<?php include 'toplayout.php';
$user_id = userID($userInput);

if(empty($_GET['id'])){
    $data = all_by_userID($MODEL_TEST,$user_id);
}else {
    $data = all_by_SPECIFIC_ID_TWO($MODEL_TEST,'user_id',$user_id,'course_id',$_GET['id']);
}

// $data = all_by_userID($MODEL_TEST,$user_id);
?>
 
<div class="container">
    <div class=" card card-header">
        <h4 class="card-title text-center" style="display: flex"> আপনার কোর্সসমূহ </h4>
    </div>
    <br>
    <table class="category_table text-center" id="table_id">
        <thead>
            <tr>
                <th> পরীক্ষার নাম </th>
                <th> তারিখ </th>
                <th> সময়</th>
                <th> ব্যাপ্তি </th>
                <th> ফি </th>
                <th> পিন </th>
                <th> সেট </th>
                <th> প্রশ্ন সংখ্যা </th>
                <th>Participated people</th>
                <th> Action </th>
                <th> Copy Link</th>
            </tr>
        </thead>
        <?php  foreach ($data as $row) { ?>
        <tr>
        <td><?php echo $row['model_test_name']; ?></td>
        <td><?php echo stringToDate($row['model_test_date']); ?></td>
        <td><?php echo stringToTime($row['model_test_date']); ?></td>
        <td><?php echo $row['duration']; ?></td>
        <td>
        <?php
        if($row['payment']==1){
            echo "Free";
        }else {  
            // echo returnSingleValue($CREATE_COURSE,'payment_amount','id',$row['course_id']);
            echo "Paid";
            }?>
        
       </td> 
        <td><?php echo empty($row['secure_pin'])?"—":$row['secure_pin']; ?></td>
        <td><?php echo empty($row['model_set'])?"—":$row['model_set']; ?></td>
        <td><?php echo empty($row['total_questions'])?"—":$row['total_questions']; ?></td>
        <td><a href="participated_people.php?id=<?php echo $row['id']?>"><?php echo TotalNumberOfRowsWhere($QUESTION_ANSWER,"model_test_id",$row['id']); ?></a></td>
        <td>
          <a href="view_model_question.php?id=<?php echo $row['id']?>">Show</a>&nbsp;
          |&nbsp; <a href="edit_model_test.php?id=<?php echo $row['id']?>">Edit</a>&nbsp;
          <?php if ($row['finished'] ==NULL or $row['finished']==0) {?>
            |&nbsp; <a href="add_questions.php?id=<?php echo $row['id']?>">Add Question</a>
          <?php } ?>
        </td>
        <td>
        <input style="display:none;" type="text" value="https://bcsshomprity.com/student/model_exam.php?id=<?php echo  $row['id'];?>" id="myInput<?php echo  $row['id'];?>">
        <button class="btn btn-sm btn-info" onclick="navigator.clipboard.writeText('bcsshomprity.com/student/model_exam.php?id='+<?php echo $row['id'];?>)">
        <span id="myTooltip<?php echo  $row['id'];?>"> Copy!</span>
        </button> 
        </td>
        </tr>
        <?php  } ?>
    </table>
    <br>

</div>
<br>
<?php include 'bottomlayout.php'; ?>