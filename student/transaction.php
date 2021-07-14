<?php include 'toplayout.php';

if (!isset ($_GET['id']) ) {  
    $course_id = "not_found";  
  } else {  
    $course_id  = intval($_GET['id']);  
  } 

  $user_id = userID($userInput);
//   Check model test id available or not
  if( $course_id=='not_found' || TotalNumberOfRowsWhere($CREATE_COURSE,'id',$course_id)==0){
    set_message('<div class="container p-2">
    <p class="alert alert-danger alert-dismissible"id="message">Course ID not available</p>
    </div>');
    echo "<script type='text/javascript'> document.location = 'exams'; </script>";
  }
  $course_name = returnSingleValue($CREATE_COURSE,'course_name','id',$course_id);

// CHeck Dubpicate Transaction
if(TotalNumberOfRowsWhereTWO_AND($TRANSACTIONS,'course_id','user_id',$course_id,$user_id)>=1) {
    set_message('<div class="container p-2">
    <p class="alert alert-danger alert-dismissible"id="message">You have already made transactions for this course.Wait for the confirmation</p>
    </div>');
    echo "<script type='text/javascript'> document.location = 'exams'; </script>";
}

?>
<div class="container">
    <div class="new_model_test_box">
        <h3 align="center">নতুন ট্রান্সেকশন তৈরী করুন</h3>
        <hr>
        <br>
        <form action="../link/transaction.php" method="post">
        <div align="center">
            <h5> আপনি  "<?php echo $course_name; ?>" এর অন্তর্গত মডেল টেস্টটির জন্য ট্রান্সেকশন তথ্য দিচ্ছেন</h5>
        </div>

        <br>
        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
        
        <div class="form-row">
            <strong> মোবাইল নম্বর </strong>
            <input type="text" name="mobile_number" autocomplete="off" class="form-control" required>
        </div>
        <br>

        <div class="form-row">
            <strong> ট্রান্সেকশন ID </strong>
            <input type="text" name="transaction_id" autocomplete="off" class="form-control" required>
        </div>
        <br>

        <div class="form-group">
            <strong> ট্রান্সাকশনের মাধ্যম: </strong> &nbsp &nbsp
            <input class="radio_btn" type="radio" value="bkash" name="model_test_payment" id="model_test_payment_free" />
            <label for="payment_হ্যা ">বিকাশ</label>&nbsp &nbsp
            <input class="radio_btn" type="radio" value="nogod" name="model_test_payment" id="model_test_payment_pay" />
            <label for="payment_না ">নগদ </label>&nbsp &nbsp
            <input class="radio_btn" type="radio" value="rocket" name="model_test_payment" id="roket" />
            <label for="roket">রকেট</label>&nbsp &nbsp
        </div>
        <br>

        <div class="form-row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success" name="transaction_form">Add Transaction</button>
            </div>
            <div class="col-md-4"></div>
        </div>
        </form>
    </div>
</div>

<?php include 'bottomlayout.php'; ?>