<?php include 'toplayout.php';
$user_id = userID($userInput);
$data = all_by_userID($CREATE_COURSE,$user_id);
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
            <td>
                <form action="../link/edit_my_courses.php" method="post">
                    <input type="hidden" name="course_id" value="<?php echo $row['id']?>">
                    <input type="text" name="course_name" value="<?php  echo $row['course_name']; ?>"
                        placeholder="<?php  echo $row['course_name']; ?>" required>
                    <input type="submit" name="update_course_name" class="btn btn-sm btn-info" value="update">
                </form>

            </td>
            <td>
                <a href="#">
                    <div style="width: 100%">
                        <?php  echo $row['created_exams']; ?>
                    </div>
                </a>
            </td>
            <td> <?php  echo $row['register_student']; ?></td>
            <td>
                <form action="../link/edit_my_courses.php" method="post">
                    <input type="hidden" name="course_id" value="<?php echo $row['id']?>">
                    <select id="cars" name="payment_status" required>
                        <option value="<?php  echo ($row['payment_status']==0?"Paid":"Free"); ?>">
                            <?php  echo ($row['payment_status']==0?"Paid":"Free"); ?></option>
                        <option value="<?php  echo ($row['payment_status']==0?"Free":"Paid"); ?>">
                            <?php  echo ($row['payment_status']==0?"Free":"Paid"); ?></option>
                    </select>
                    <input type="submit" name="update_payment_status" class="btn btn-sm btn-info" value="update">
                </form>

            </td>
            <td>
                <?php if($row['payment_status']==1){?>
                <form action="../link/edit_my_courses.php" method="post">
                    <input type="hidden" name="course_id" value="<?php echo $row['id']?>">
                    <input type="number" name="payment_amount" value="<?php  echo $row['payment_amount']; ?>"
                        placeholder="<?php  echo $row['payment_amount']; ?>" required>
                    <input type="submit" name="update_payment_amount" class="btn btn-sm btn-info" value="update"
                        disabled>
                </form>
                <?php }else { ?>
                <form action="../link/edit_my_courses.php" method="post">
                    <input type="hidden" name="course_id" value="<?php echo $row['id']?>">
                    <input type="number" name="payment_amount" value="<?php  echo $row['payment_amount']; ?>"
                        placeholder="<?php  echo $row['payment_amount']; ?>" required>
                    <input type="submit" name="update_payment_amount" class="btn btn-sm btn-info" value="update">
                </form>
                <?php  }  ?>
            </td>
            <td>
                <a href="my_courses">Edited</a>
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