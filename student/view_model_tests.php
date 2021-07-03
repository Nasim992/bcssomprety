<?php include 'toplayout.php';
$user_id = userID($userInput);
$data = all_by_userID($MODEL_TEST,$user_id);
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
                <th> Action </th>
            </tr>
        </thead>
        <?php  foreach ($data as $row) { ?>
        <tr>
        <td><?php echo $row['model_test_name']; ?></td>
        <td><?php echo stringToDate($row['model_test_date']); ?></td>
        <td><?php echo stringToTime($row['model_test_date']); ?></td>
        <td><?php echo $row['duration']; ?></td>
        <td><?php echo "not added"; ?></td>
        <td><?php echo $row['secure_pin']; ?></td>
        <td><?php echo $row['model_set']; ?></td>
        <td><?php echo empty($row['total_questions'])?"—":$row['total_questions']; ?></td>
        <td><a href="#">Edit</a></td>
        </tr>
        <?php  } ?>
    </table>
    <br>

</div>
<br>
<?php include 'bottomlayout.php'; ?>