<?php include'toplayout.php';

if(empty($_GET['id'])){
    $noticeID = "not_found";
}else {
    $noticeID = $_GET['id'];
}

// echo $noticeID;
$data = all_by_SPECIFIC_ID($NOTICE,'id',$noticeID);

if( TotalNumberOfRowsWhere($NOTICE,'id',$noticeID)==0) {
    echo "<script type='text/javascript'> document.location = 'notice'; </script>";
} 
  
?>
<!-- Craete New Notices -->
<div class="container align-items-center">
    <div class="new_model_test_box">
        <h3 class="text-center">নোটিশ আপডেট করুন</h3>
        <hr>
        <br>
        <form action="../link/update_notice.php"enctype="multipart/form-data" method="post">

        <input type="hidden" name="notice_id" value="<?php echo $noticeID; ?>">
        <input type="hidden" name="previous_file_src" value ="<?php echo $NOTICE_SRC.$row['notice_file_name']?>">
        <?php foreach($data as $row) {?>
  <div class="form-row">
      <strong> হেডলাইন </strong>&nbsp &nbsp
      <input autocomplete="off" class="form-control" type="text" name="heading" value="<?php echo $row['notice']?>" required />
  </div>
  <br>
  <div class="form-row">
      <strong> নোটিশ ফাইল </strong>
      <input type="file"name="notice_file"class="form-control"accept=".img,.png,.webp,.gif,.jpg,.jpeg,.pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"value=" <?php echo $NOTICE_SRC.$row['notice_file_name']?>">
      <?php if(!empty($row['notice_file_name'])){?>
      Uploaded File:<a href="<?php echo $NOTICE_SRC.$row['notice_file_name']?>"><?php echo $row['notice_file_name']; ?></a>
     <?php  }else {
         echo "No file Uploaded Yet!";
     } ?>
  </div>
  <br>
  <div class="form-row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <input type="submit" class="btn btn-success" name="update_notice" value="Update">
      <a href="notice" class="btn btn-danger">Cancel</a>
    </div>
    <div class="col-md-4"></div>
  </div>
  <?php } ?>

  </form>

    </div>
</div>
<br>

<?php include 'bottomlayout.php'; ?>