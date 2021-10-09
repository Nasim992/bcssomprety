<?php include 'toplayout.php';
$data = all_by_userID_NOT($USER,'type','admin');
?>

<div class="container">
    <div class=" card card-header">
        <h4 class="card-title text-center" style="display: flex"> সমস্ত ইউজার ডিটেইলস</h4>
    </div>
    <br>
    <table class="category_table text-center" id="table_id">
        <thead>
            <tr>
                <th> নাম </th>
                <th> ফোন নাম্বার</th>
                <th> ইমেইল</th>
                <th> ইন্সটিটিউট</th>
                <th> অবশিষ্ঠ কোর্স</th>
                <th class="d-print-none"> সাবস্ক্রাইব কোর্স</th>
                <th class="d-print-none"> Action </th>
            </tr>
        </thead>
        <?php  foreach ($data as $row) { ?>
        <tr>
            <td><?php  echo $row['name']; ?></td>
            <td><?php  echo $row['phone']; ?></td>
            <td><?php  echo $row['email']; ?></td>
            <td><?php  echo $row['institute']; ?></td>
            <td><?php echo $row['remaining_courses']?> </td>
            <td class="d-print-none"><?php  echo $row['subscribed_courses']; ?></td>
            <td class="d-print-none">
                <form action="../link/delete_user.php" method="post">
                <a  class="bg-transparent text-primary"  href="edit_users.php?id=<?php echo $row['id']; ?>">Edit</a>
                 <input type="hidden"name="user_id"value="<?php echo $row['id']; ?>">
                 <button type="submit" class="bg-transparent text-primary border-0" name="delete_user"  onclick="return confirm('Are you sure you want Delete this user?');">Delete</button>
                </form>
            </td>
        </tr>
        <?php  } ?>
    </table>
    <br>
    <br>
</div>
<br>

<div class="container hide pt-2">
    <div class="d-flex justify-content-center">
        <form action="download_user" method="post">
        <input class="btn btn-info  d-print-none" type="submit"name="downloaod_result" value="Download as pdf"></input>
        </form>
        <button class="btn btn-success d-print-none ml-2" onclick="window.print();" >Print</button>
    </div>
</div>

<br>
<div class="d-print-none">
<?php include 'bottomlayout.php'; ?>
</div>