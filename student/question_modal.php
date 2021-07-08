<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Question Added Successfully</h4>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <p>সতর্কতা : Finish Model Test বাটন ক্লিক করার পর আপনি আর কোনো প্রশ্ন Add করতে পারবেন না। </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success question_modal_btn" data-dismiss="modal"> Add New Question</button>
                <form action="../link/finish_model_test.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
                    <input type="hidden" name="model_test_id" value="<?php echo $modelTestID; ?>">
                    <button type="submit" name="finish_button" class="btn btn-danger">Finish Model Test</button>
                </form>
            </div>
        </div>
    </div>
</div>