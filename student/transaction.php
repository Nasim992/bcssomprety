<?php include 'toplayout.php'; ?>
<div class="container">
    <div class="new_model_test_box">
        <h3 align="center">নতুন ট্রান্সেকশন তৈরী করুন</h3>
        <hr>
        <br>
        <form action="../link/transaction.php" method="post">
        <div align="center">
            <h5> আপনি <%= @model_test.name %> মডেল টেস্টটির জন্য ট্রান্সেকশন তথ্য দিচ্ছেন</h5>
            <input type="text" name="transaction_information" autocomplete="off" class="form-control" required>
        </div>
        <br>
        <!-- <% else %>
        <%= form.hidden_field :category_id, value: @category.id %>
        <% end %> -->


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
            <input class="radio_btn" type="radio" value="free" name="model_test_payment" id="model_test_payment_free" />
            <label for="payment_হ্যা ">বিকাশ</label>&nbsp &nbsp
            <input class="radio_btn" type="radio" value="pay" name="model_test_payment" id="model_test_payment_pay" />
            <label for="payment_না ">নগদ </label>&nbsp &nbsp
            <input class="radio_btn" type="radio" value="pay" name="model_test_payment" id="roket" />
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