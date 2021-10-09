<?php include 'toplayout.php';
$user_id = userID($userInput);
$data = all_by_userID_NOT($CREATE_COURSE,'id',1);
?>

<div class="container">
    <div class=" card card-header">
        <h4 class="card-title text-center" style="display: flex"> আপনার কোর্সসমূহ </h4>
    </div>
    <br>
    <table class="category_table text-center" id="table_id">
        <thead>
            <tr>
                <th> কোর্সের নাম </th>
                <th> মোট পরীক্ষা </th>
                <th> নিবন্ধিত শিক্ষার্থী </th>
                <th> পেমেন্ট </th>
                <th> ফি </th>
                <th> Action </th>
            </tr>
        </thead>
        <?php  foreach ($data as $row) { ?>
        <tr>
            <td><?php  echo $row['course_name']; ?></td>
            <td>
                <a href="view_model_tests.php?id=<?php echo $row['id']?>">
                    <div style="width: 100%">
                        <?php  echo $row['created_exams']?$row['created_exams']:"—"; ?>
                    </div>
                </a>
            </td>
            <td> <?php  echo $row['register_student']?$row['register_student']:"—"; ?></td>
            <td> <?php  echo ($row['payment_status']==0?"Paid":"Free"); ?></td>
            <td> <?php  echo $row['payment_amount']?$row['payment_amount']:"—"; ?></td>
            <td>
                <form action="../link/delete.php" method="post">
                 <a href="edit_courses">Edit</a>
                 <input type="hidden"name="course_id"value="<?php echo $row['id']; ?>">
                 <button type="submit" class="bg-transparent text-primary border-0" onclick="return confirm('Are you sure you want Delete this courses?');" name="delete_course">Delete</button>
                </form>
            </td>
        </tr>
        <?php  } ?>
    </table>
    <br>
    <br>

    <strong>
        <a href="create_new_courses" class="btn btn-success form-control">+ নতুন কোর্স</a>
    </strong>
</div>
<br>
<?php include 'bottomlayout.php'; ?>