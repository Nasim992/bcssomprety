<?php 
$data_dismiss = '';
if(isset($_POST['finish_button'])){
    $model_test_pin = $_POST['model_pin'];

    $available = TotalNumberOfRowsWhereTWO_AND($MODEL_TEST,'id','secure_pin',$model_test_id,$model_test_pin);
    
    if($available>=1){
        $data_dismiss = 'data-dismiss="modal"';
    }else{
        set_message_MODAL('<div class="container p-2">
        <p class="alert alert-warning alert-dismissible" id="message">Pin Not Matched</p>
        </div>');
    }
}
?>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">পিন প্রোটেক্টেড মডেল টেস্ট</h4>
                </button>
            </div>
            <?php display_message_MODAL(); ?>
            <div class="modal-body">
                <?php if(empty($model_test_pin)){ ?>
                <p>সতর্কতা :এই মডেল টেস্ট টি দিতে এইখানে পিন প্রদান করুন</p>
                <?php  } else { echo $model_test_pin;} ?>
            </div>
            <form method="post" class="p-2">
     
                    <input type="text" name="model_pin"class="form-control" placeholder="Enter Pin"required>

            <div class="modal-footer">
                    <button class="btn btn-success question_modal_btn" name="finish_button" <?php echo $data_dismiss;?>>Submit Pin</button>
                </form>
                <a href="exams" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>
</div>