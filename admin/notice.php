<?php include'toplayout.php';
$data = all($NOTICE);
?>
<!-- Craete New Notices -->
<div class="container align-items-center">
    <div class="new_model_test_box">
        <h3 class="text-center">নোটিশ তৈরী করুন</h3>
        <hr>
        <br>
        <form action="../link/add_notice.php"enctype="multipart/form-data" method="post">
  <div class="form-row">
      <strong> হেডলাইন </strong>&nbsp &nbsp
      <input autocomplete="off" class="form-control" type="text" name="heading" required />
  </div>
  <br>
  <div class="form-row">
      <strong> নোটিশ ফাইল </strong>
      <input type="file"name="notice_file"class="form-control"accept=".img,.png,.webp,.gif,.jpg,.jpeg,.pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
  </div>
  <br>
  <div class="form-row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <input type="submit" class="btn btn-success" name="add_notice" value="Add Notice">
      <a href="home" class="btn btn-danger">Cancel</a>
    </div>
    <div class="col-md-4"></div>
  </div>
  </form>

    </div>
</div>
<br>
<!-- Shwong All Notice  -->

<!-- Showing Previous Notice  -->

<div class="container">
    <div class=" card card-header">
        <h4 class="card-title text-center" style="display: flex"> নোটিস</h4>
    </div>
    <br>
    <table class="category_table text-center" id="table_id">
        <thead>
            <tr>
                <th> নোটিস হেডলাইন </th>
                <th> নোটিস ফাইল </th>
                <th> Action </th>
            </tr>
        </thead>
        <?php  foreach ($data as $row) { ?>
        <tr>
            <td>
               <?php echo $row['notice']; ?>
            </td>
          <td>
            <?php if(!$row['notice_file_name']){ echo "No file Added"; } ?>
          <a href="<?php echo $NOTICE_SRC.$row['notice_file_name']; ?>"><?php echo $row['notice_file_name']; ?></a>
          </td>
          <td>
            <form action="../link/delete_notice.php" method="post" enctype="multipart/form">
            <a href="edit_notice.php?id=<?php echo $row['id'];?>">Edit</a> |
            <input type="hidden" name="notice_id" value="<?php echo $row['id'];?>" >
            <input type="submit" class="bg-transparent text-primary border-0"value="Delete" name="delete_notice">
            </form>
          </td>
        </tr>
        <?php  } ?>
    </table>
    <br>
    <br>
</div>
<br>

<?php include 'bottomlayout.php'; ?>