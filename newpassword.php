<?php require 'header.php';
require 'processs.php';
?>
    <section class="signup_area signup_area_height">
        <div class="row ml-0 mr-0">
            <div class="sign_left signup_left">
                <h2>CS 518 Class Project</h2>
                <a href="index.php"><img class="position-absolute top" src="img/signup/top_ornamate.png" alt="top"></a>
                <img class="position-absolute bottom" src="img/signup/bottom_ornamate.png" alt="bottom">
                <img class="position-absolute middle wow fadeInRight" src="img/signup/forgot.png" alt="bottom">
                <div class="round wow zoomIn" data-wow-delay="0.2s"></div>
            </div>
            <div class="sign_right signup_right">
                <div class="sign_inner signup_inner">
                    <div class="text-center">
                        <h3>Enter a new password</h3>
                    </div>
                    <?php include ('errors.php');?>
                    <form action="newpassword.php" class="row login_form" method="post">
                        <div class="col-lg-12 form-group">
                            <label class="small_text" for="password">New Password</label>
                            <input id="password" name="password" minlength="5" required type="password" class="form-control" placeholder="5+ characters required" autocomplete="off">
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="small_text" for="confirm-password">Confirm New password</label>
                            <input id="confirm-password" name="confirm-password" minlength="5" required type="password" class="form-control" placeholder="5+ characters required" autocomplete="off">
                        </div>
                        <div class="col-lg-12 text-center">
                            <input type="submit" class="btn action_btn thm_btn" name="updatepass" id="updatepass" value="Reset Password">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


<?php require 'footer-js.php';