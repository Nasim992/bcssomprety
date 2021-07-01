<?php include 'toplayout.php';
// Check that course is allocated or not
$user_id=userID($userInput);
$remaining_courses=remaining_courses($user_id);
if($remaining_courses===NULL) {
    // redirect('no_course_limit');
    echo "<script type='text/javascript'> document.location = 'no_course_limit'; </script>";
}
?>

<div class="container">
    <div class="new_model_test_box">
        <h3 class="text-center">নতুন কোর্স তৈরী করুন</h3>
        <hr>
        <br>
        <form action="../link/create_new_courses" method="post">

            <div class="form-row">
                <strong> কোর্সের নাম </strong>
                <input autocomplete="off" class="form-control" type="text" name="course_name" required />
            </div>
            <br>

            <div class="form-row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <strong>কোর্সটি ফ্রি করুন </strong> &nbsp &nbsp &nbsp &nbsp
                        <br>
                        <input id="course_free" class="radio_btn" onclick="handleChange()" type="radio" value="free"
                            name="payment_status" />
                        <label for="pined_হ্যা ">হ্যা </label>&nbsp &nbsp
                        <input id="course_paid" class="radio_btn" type="radio" onclick="handleChangePaid()" value="paid"
                            name="payment_status" checked="checked" />
                        <label for="pined_না ">না </label>&nbsp &nbsp
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-row">
                        <div class="form-group model_test_fee">
                            <strong> ফি এর পরিমান </strong>
                            <input class="form-control" autocomplete="off" type="number" id="payment_amount"
                                name="payment_amount" />
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <input type="submit" name="create_courses" class="btn btn-success">
                    <a href="teachers" class="btn btn-danger">Cancel</a>
                </div>
                <div class="col-md-4"></div>
            </div>

        </form>


    </div>
</div>

<?php include 'bottomlayout.php'; ?>