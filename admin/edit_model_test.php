<?php include 'toplayout.php';

$userId=userID($userInput);
$data =all_by_userID_NOT($CREATE_COURSE,'id',1);

if(empty($_GET['id'])){
    $modelTestID = $_GET['id'];
}else {
    $modelTestID = $_GET['id'];
}
$modelTestID =  intval($modelTestID);
$model_test_data = twoTablesFULLJOIN_WHERE($MODEL_TEST,'course_id',$CREATE_COURSE,'id','id',$modelTestID);

if( TotalNumberOfRowsWhere($MODEL_TEST,"id",$modelTestID)==0) {
  echo "<script type='text/javascript'> document.location = 'view_model_tests'; </script>";
}

?>

<!-- Model Test Creation -->
<div class="container" id="flash-message">
</div>
</div>
<br>
<div class="content">
    <div class="new_model_test_box">
        <h3 class="text-center">মডেল টেস্ট আপডেট করুন</h3>
        <hr>
        <br>
        <form class="new_model_test" id="new_model_test" enctype="multipart/form-data" action="../link/update_model_test" method="post">

        <input type="hidden" name="modelID" value="<?php echo $modelTestID;?>">

        <?php  foreach ($model_test_data  as $row) { ?>

            <div class="form-row">
                <strong> মডেল টেস্টের নাম </strong>
                <input autocomplete="off" type="text" name="model_test_name" value="<?php echo $row['model_test_name']; ?>" class="form-control" required/>
            </div>
            <br>

            <div class="form-row">
                <strong> পরীক্ষকের নাম </strong>
                <input autocomplete="off" class="form-control" type="text" name="model_test_examiner_name" id="model_test_setter" value="<?php echo $row['model_test_examiner_name']; ?>" />
            </div>
            <br>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-row">
                        <strong> সঠিক উত্তরের মান </strong>
                        <input autocomplete="off" class="form-control" type="number"  min="1"step=any
                            name="model_test_positive_mark" id="model_test_mark" value="<?php echo $row['positive_mark']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>নেগেটিভ নম্বর </strong>
                        <input step="any" class="form-control" type="number"
                            name="model_test_negative_mark"  min="0" id="model_test_negative_mark"step=any value="<?php echo $row['negative_mark']; ?>"/>
                    </div>
                </div>
            </div> 
            <br>

            <strong> মডেল টেস্টের তারিখ ও সময়</strong>
            <br>

            <div class="input-group ">
            <div class="input-group-prepend">
            <button type="button"  class="input-group-text"><i class="fa fa-calendar-alt"></i></button>
            </div>
            <input type="text" id="picker" name="model_test_date"  class="form-control" value="<?php echo $row['model_test_date']; ?>">
            </div>

            <br>

            <div class="form-row">
                <strong> মোট সময়</strong>
                <input autocomplete="off" class="form-control" type="number" value="10" min="5" name="model_test_duration"
                    id="model_test_duration" value="<?php echo $row['duration']; ?>" />
            </div>
            <br>
            <p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Advanced Option
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div>
                    <div class="form-row">
                        <strong> প্রশ্নের সেট </strong>
                        <input placeholder="মেঘদূত" autocomplete="off" class="form-control" type="text"
                            name="model_test_set" id="model_test_set" value="<?php echo $row['model_set']; ?>"/>
                    </div>
                    <br>
                    <?php } ?>
                    <div class="form-row">
                        <strong> কোর্স </strong>
                        <select id="category_select" class="form-control" name="model_test_category">
                        <option value="1">Free course</option>
                          <?php  foreach ($data as $row) { ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['course_name']; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <br>
                    <?php  foreach ($model_test_data  as $row) { ?>
                    <div class="form-group">
                        <strong>মডেল টেস্টটি ফ্রি করুন </strong> &nbsp &nbsp &nbsp &nbsp
                        <input class="radio_btn" type="radio" value="free" name="model_test_payment"
                            id="model_test_payment_free"  value="<?php echo $row['payment']; ?>"checked/>
                        <label for="payment_হ্যা ">হ্যা </label>&nbsp &nbsp
                        <input class="radio_btn" type="radio" value="pay" name="model_test_payment"
                            id="model_test_payment_pay" />
                        <label for="payment_না ">না </label>&nbsp &nbsp
                    </div>
                    <br>

                    <div class="form-group">
                        <strong>সিকিউর পিনঃ </strong> &nbsp &nbsp &nbsp &nbsp
                        <input id="addPin" class="radio_btn" type="radio" value="pin_protected"
                            name="model_test_pinned"  value="<?php echo $row['pinned']; ?>" />
                        <label for="pined_হ্যা ">হ্যা </label>&nbsp &nbsp
                        <input id="removePin" class="radio_btn" type="radio" value="not_pinned_protected"
                            checked="checked" name="model_test_pinned" />
                        <label for="pined_না ">না </label>&nbsp &nbsp
                    </div>
                    <div class="form-group">
                        <input placeholder="1234" class="form-control" type="text" name="secure_pin"
                            id="model_test_pin"  value="<?php echo $row['secure_pin']; ?>" />
                    </div>

                    <div class="form-group">
                        <p>
                            <input value="1" id="addModelTestImage" data-toggle="collapse"
                                data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1"
                                type="checkbox" name="model_test_banner" />
                            <strong>স্লাইডার এ ব্যানার যুক্ত করুন</strong>
                        </p>
                        <div class="collapse" id="collapseExample1">
                            <div class="form-row">
                                <div class="form-group model_test_image">
                                    <strong> মডেল টেস্ট ব্যানার </strong>
                                    <input class="form-control model_test_image" type="file" name="banner_image"
                                        accept=".img,.png,.webp,.git,.jpg,.jpeg" id="model_test_model_test_banner" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
                    <?php } ?>


            <div class="form-row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <input type="submit" name="update_model_test" value="Update Model Test" class="btn btn-success"
                        data-disable-with="Add Model Test" />
                    <a class="btn btn-danger" href="teachers">Cancel</a>
                </div>
                <div class="col-md-4"></div>
            </div>
        </form>
    </div>
</div>
<br>

<?php include 'bottomlayout.php'; ?>