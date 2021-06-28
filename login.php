<section class="container p-5">
    <div class="row">
        <div class="col-sm-12 col-md-3 col-xl-3 col-lg-3">
        </div>
        <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
            <form action="link/login.php" method="POST">
                <img class="login__image" src="images/login_people.png" height="100px">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>ই-মেইল / ফোন</b></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="user_input" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email/phone with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><b>পাসওয়ার্ড</b></label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1"
                        <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>>
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <div class="d-flex justify-content-between">
                    <p>কোনো একাউন্ট নাই ? <a href="signup">Sign up</a></p>
                    <a href="forgotpassword">পাসওয়ার্ড মনে নাই ?</a>
                </div>
                <button type="submit" name="login" class="btn btn-success btn-block">Login</button>
            </form>

</section>