<?php include 'toplayout.php';
$user_id = userID($userInput);
// // For Pagination 
// $results_per_page = 10;  
// $total_number_of_results = TotalNumberOfRowsWhere($QUESTION_ANSWER,'user_id',$user_id);
// $number_of_page = ceil ($total_number_of_results / $results_per_page);  

// if (!isset ($_GET['page']) ) {  
//   $page = 1;  
// } else {  
//   $page = intval($_GET['page']);
// } 

// $start_form = ($page-1) * $results_per_page;  

$final_pagination_results = all_by_SPECIFIC_ID($QUESTION_ANSWER,'user_id',$user_id );

// $page_name = 'participated_exams.php';


?>

<!-- Participated courses -->
<div class="container">
    <div class="card-header">
        <h4 class="card-title" style="display: flex"> আপনার পরীক্ষাসমূহ </h4>
    </div>

    <table class="category_table text-center">
        <tr>
            <th> ক্রমিক নম্বর </th>
            <th> পরীক্ষার নাম </th>
            <th> সঠিক উত্তর </th>
            <th> ভুল উত্তর </th>
            <th> স্কিপড </th>
            <th> মোট নম্বর </th>
            <th> তারিখ ও সময় </th>
        </tr>
        <?php $index = 1;
         foreach($final_pagination_results as $row) {?>
        <tr>
            <td><?php echo $index;?></td>
            <td>
                <a href="result.php?id=<?php echo $row['model_test_id']; ?>"><?php echo returnSingleValue($MODEL_TEST,'model_test_name','id',$row['model_test_id']); ?></a>
            </td>
            <td><?php echo $row['correct_answer']; ?></td>
            <td><?php echo $row['wrong_answer']; ?></td>
            <td><?php echo $row['skipped']; ?></td>
            <td><?php echo $row['total_mark']; ?></td>
            <td><?php echo stringToDate($row['created_at'])." ".stringToTime($row['created_at']); ?></td>
        </tr> 
        <?php $index= $index+1; } ?>
    </table>
    <br>
    <br>

</div>
<br>
<?php include 'bottomlayout.php'; ?>