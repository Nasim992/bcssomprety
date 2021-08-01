<?php include 'toplayout.php';

if(empty($_GET['id'])){
    $userID = "not found";
}else {
    $userID = intval($_GET['id']);
}

if($userID=="not found" || TotalNumberOfRowsWhere($USER,"id",$userID)==0) {
    echo "<script type='text/javascript'> document.location = 'all_users'; </script>";
} 

$data = all_by_SPECIFIC_ID($USER,"id",$userID);

?>

<!-- Update Profile-->
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 sign_up_form" style="padding-top: 20px">
            <h2 class="text-align:center">কোর্স এলোকেট ফর্ম</h2>
            <hr>
  <?php foreach($data as $rows){ ?>
            <form class="edit_user" id="edit_user" action="../link/course_allocation.php" accept-charset="UTF-8" method="post">

                <div class="field">
                    <b>নাম</b>
                    <input autofocus="autofocus" class="form-control" required="required" type="text" name="user_name"
                        id="user_name" value="<?php echo $rows['name']?>" disabled/>
                </div>
                <br>

                <input type="hidden" name="user_id" value="<?php echo $rows['id'];?>">
 
                <div class="field">
                    <b>Allocated Courses</b>
                    <input autofocus="autofocus" class="form-control" type="number" name="remaining_courses"
                        id="user_institution"value="<?php echo $rows['remaining_courses']?>" />
                </div>
                <br>


                <p>
                <div class="actions">
                    <input type="submit" name="course_allocation" value="Allocate" class="btn btn-success form-control"
                        data-disable-with="Update" />
                </div>
                </p>
            </form>
            <?php } ?>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>



<br>

<?php include 'bottomlayout.php' ?>