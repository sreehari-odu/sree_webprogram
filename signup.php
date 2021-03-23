<?php require_once 'header.php';
require_once 'processs.php';
?>
        <section class="signup_area signup_area_height">
            <div class="row ml-0 mr-0">
                <div class="sign_left signup_left">
                    <h2>CS 518 Class Project</h2>
                    <a href="index.php"><img class="position-absolute top" src="img/signup/top_ornamate.png" alt="top"></a>
                    <img class="position-absolute bottom" src="img/signup/bottom_ornamate.png" alt="bottom">
                    <img class="position-absolute middle wow fadeInRight" src="img/signup/man_image.png" alt="bottom">
                    <div class="round wow zoomIn" data-wow-delay="0.2s"></div>
                </div>
                <div class="sign_right signup_right">
                    <div class="sign_inner signup_inner">
                        <div class="text-center">
                            <h3>Create your Account</h3>
                            <p>Already have an account? <a href="signin.php">Sign in</a></p>
                        </div>
                        <?php include ('errors.php');?>
                        <form action="signup.php" class="row login_form" method="post">
                            <div class="col-sm-6 form-group">
                                <label class="small_text" for="fname">First name</label>
                                <input type="text" class="form-control" required name="fname" id="fname" placeholder="" autocomplete="off">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="small_text" for="lname">Last name</label>
                                <input type="text" class="form-control" required name="lname" id="lname" placeholder="" autocomplete="off">
                            </div>
                            <div class="col-lg-12 form-group">
                                <label class="small_text" for="uname">Your Username</label>
                                <input type="text" class="form-control" required id="uname" name="uname" placeholder="" autocomplete="off">
                            </div>
                            <div class="col-lg-12 form-group">
                                <label class="small_text" for="email">Your email</label>
                                <input type="email" class="form-control" required id="email" name="email" placeholder="" autocomplete="off">
                            </div>
                            <div class="col-lg-12 form-group">
                                <label class="small_text" for="password">Password</label>
                                <input id="password" name="password" minlength="5" required type="password" class="form-control" placeholder="5+ characters required" autocomplete="off">
                            </div>
                            <div class="col-lg-12 form-group">
                                <label class="small_text" for="confirm-password">Confirm password</label>
                                <input id="confirm-password" name="confirm-password" minlength="5" required type="password" class="form-control" placeholder="5+ characters required" autocomplete="off">
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="check_box">
                                    <input type="checkbox" value="None" id="squared2" name="check" required>
                                    <label class="l_text" for="squared2">I accept the <span>terms and conditions</span></label>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <input type="submit" class="btn action_btn thm_btn" name="register" id="register" value="Create an account"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


<?php require_once 'footer-js.php';