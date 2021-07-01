<?php include 'toplayout.php' ?>

<!-- Update Profile-->
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 sign_up_form" style="padding-top: 20px">
            <h2 class="text-align:center">তথ্য পরিবর্তনের ফর্ম</h2>
            <hr>

            <form class="edit_user" id="edit_user" action="../link/update.php" accept-charset="UTF-8" method="post">

                <div class="field">
                    <b>নাম</b>
                    <input autofocus="autofocus" class="form-control" required="required" type="text" name="user_name"
                        id="user_name" />
                </div>
                <br>

                <div class="field">
                    <b>ই-মেইল</b>
                    <input autofocus="autofocus" class="form-control" required="required" type="email"
                        value="mdnasim6416@gmail.com" name="user_email" id="user_email" />
                </div>
                <br>

                <div class="field">
                    <b>ফোন নম্বর </b>
                    <input autofocus="autofocus" class="form-control" required="required" type="text" value="892"
                        name="user_phone" id="user_phone" />
                </div>
                <br>

                <div class="field">
                    <b>শিক্ষা প্রতিষ্ঠানের নাম</b>
                    <input autofocus="autofocus" class="form-control" type="text" name="user_institution"
                        id="user_institution" />
                </div>
                <br>


                <div class="field">
                    <b>নতুন পাসওয়ার্ড</b>
                    <em>(আপনার পছন্দমতো কমপক্ষে 6 অক্ষরের একটি পাসওয়ার্ড দিন)</em>
                    <input autocomplete="false" class="form-control password" type="password" name="user_password"
                        id="user_password" />
                    <span class="p-viewer">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </span>
                </div>
                <br>

                <div class="field">
                    <b>নতুন পাসওয়ার্ড নিশ্চিত করুন</b>
                    <input autocomplete="false" class="form-control confirm_password" type="password"
                        name="user_password_confirmation" id="user_password_confirmation" />
                    <span class="p-viewer2">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </span>
                </div>
                <br>

                <div class="field">
                    <b>বর্তমান পাসওয়ার্ড </b> <i>(তথ্য পরিবর্তন করতে আপনার বর্তমান পাসওয়ার্ডটি দিন)</i>
                    <input autocomplete="false" class="form-control current_password" type="password"
                        name="user_current_password" id="user_current_password" />
                    <span class="p-viewer3">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </span>
                </div>
                <br>

                <p>
                <div class="actions">
                    <input type="submit" name="update" value="Update" class="btn btn-success form-control"
                        data-disable-with="Update" />
                </div>
                </p>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>



<br>

<?php include 'bottomlayout.php' ?>