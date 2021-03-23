<?php require_once 'header.php';
require_once 'processs.php';
?>
        <section class="signup_area">
            <div class="row ml-0 mr-0">
                <div class="sign_left signin_left">
                    <h2>CS 518 Class Project</h2>
                    <a href="index.php"><img class="position-absolute top" src="img/signup/top_ornamate.png" alt="top"></a>
                    <img class="position-absolute bottom" src="img/signup/bottom_ornamate.png" alt="bottom">
                    <img class="position-absolute middle" src="img/signup/door.png" alt="bottom">
                    <div class="round"></div>
                </div>
                <div class="sign_right signup_right">
                    <div class="sign_inner signup_inner">
                        <div class="text-center">
                            <h3>Sign in to your account</h3>
                            <p>Don’t have an account yet? <a href="signup.php">Sign up here</a></p>
                        </div>
                        <?php include ('errors.php');?>
                        <form action="signin.php" class="row login_form" method="post">
                            <div class="col-lg-12 form-group">
                                <label class="small_text" for="uname">Your User ID</label>
                                <input type="text" required class="form-control" id="uname" name="uname" placeholder="username" autocomplete="off">
                            </div>
                            <div class="col-lg-12 form-group">
                                <label class="small_text" for="password">Your Password</label>
                                <div class="confirm_password">
                                    <input id="password" name="password" required type="password" class="form-control" placeholder="password" autocomplete="off">
                                    <a href="resetpassword.php" class="forget_btn">Forgotten password?</a>
                                </div>
                            </div>

                            <div class="col-lg-12 text-center">
                                <input type="submit" class="btn action_btn thm_btn" name="signin" id="signin" value="Sign in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


<?php require_once 'footer-js.php';