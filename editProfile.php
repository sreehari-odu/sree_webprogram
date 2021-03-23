<?php
require_once 'header.php';
require_once 'navigation.php';
require_once 'helpers.php';
require_once 'processs.php';
?>

<section class="doc_banner_area single_breadcrumb">
    <ul class="list-unstyled banner_shap_img">
        <li><img src="img/new/banner_shap1.png" alt=""></li>
        <li><img src="img/new/banner_shap4.png" alt=""></li>
        <li><img src="img/new/banner_shap3.png" alt=""></li>
        <li><img src="img/new/banner_shap2.png" alt=""></li>
        <li><img data-parallax='{"x": -180, "y": 80, "rotateY":2000}' src="img/new/plus1.png" alt=""></li>
        <li><img data-parallax='{"x": -50, "y": -160, "rotateZ":200}' src="img/new/plus2.png" alt=""></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="doc_banner_content">
            <h2 class="text-white"><?php echo $_SESSION['nickname'].' '.$_SESSION['lname'];?></h2>
            <ul class="nav justify-content-center">
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="profile.php">Profile</a></li>
            </ul>
        </div>
    </div>
</section>

<!--================Forum Content Area =================-->
<section class="forum-user-wrapper">
    <div class="container">
        <div class="row forum_main_inner">
            <div class="col-lg-3">
                <div class="author_option">
                    <div class="author_img">
                        <img class="img-fluid" src="img/forum/author-1.jpg" alt="">
                    </div>
                    <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">
                                <i class="icon_profile"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">
                                <i class="icon_documents"></i> Topics Started
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                               aria-controls="contact" aria-selected="false">
                                <i class="icon_chat"></i> Replies Created
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="fav-tab" data-toggle="tab" href="#fav" role="tab"
                               aria-controls="fav" aria-selected="false">
                                <i class="icon_heart"></i> Favorites
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="forum_body_area">
                    <div class="forum_topic_list">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                 aria-labelledby="home-tab">
                                <div class="profile_info">
                                   <h3>Edit Profile</h3>
                                    <?php include ('errors.php');?>
                                    <form action="editProfile.php" method="post">
                                        <div class="text-right mt-5" >
                                            <input class="nav_btn btn icon_btn arrow_btn_small" href="editProfile.php" name="editprofile" id="editprofile" type="submit" value="Save Changes">
                                        </div>
                                        <ul class="navbar-nav info_list">
                                            <li><span><label for="fname">First Name:</label></span><input type="text" class="col-lg-4" required name="fname" id="fname" value="<?php echo getCurrentUserDetails()['fname'];?>"></li>
                                            <li><span><label for="lname">Last Name:</label></span><input type="text" class="col-lg-4" required name="lname" id="lname" value="<?php echo getCurrentUserDetails()['lname'];?>"></li>
                                            <li><span><label for="email">Email:</label></span><input type="email" class="col-lg-4" required name="email" id="email" value="<?php echo getCurrentUserDetails()['email'];?>"></li>
                                            <li><span><label for="password">Password:</label></span><input type="password" class="col-lg-4"  name="password" id="password" ></li>
                                            <li><span><label for="confirm-password">Confirm Password:</label></span><input type="password" class="col-lg-4"  name="confirm-password" id="confirm-password"></li>
                                        </ul>
                                    </form>
                                    <ul class="nav p_social">
                                        <li><a href="#"><i class="social_facebook"></i></a></li>
                                        <li><a href="#"><i class="social_twitter"></i></a></li>
                                        <li><a href="#"><i class="social_pinterest"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div class="input-group search_forum">
                                    <input type="text" class="form-control" placeholder="Recipient's username"
                                           aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button"
                                                id="button-addon2"><i class="icon_search"></i></button>
                                    </div>
                                </div>
                                <h2>Forum Topics Started</h2>
                                <div class="forum_l_inner">
                                    <div class="forum_head d-flex justify-content-between">
                                        <ul class="nav left">
                                            <li><i class="icon_error-circle_alt"></i> 0 Open</li>
                                            <li><a href="#"><i class=" icon_check"></i> 0 Closed</a></li>
                                        </ul>

                                    </div>
                                    <div class="forum_body">
                                        <ul class="navbar-nav topic_list">

                                        </ul>
                                    </div>
                                </div>
                                <div class="list_pagination d-flex justify-content-between">
                                    <div class="left">
                                        <p>Viewing 0 topics </p>
                                    </div>
                                    <div class="right">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item active"><a class="page-link" href="#">1</a>
                                                </li>

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="contact" role="tabpanel"
                                 aria-labelledby="contact-tab">

                            </div>
                            <div class="tab-pane fade " id="eng" role="tabpanel" aria-labelledby="eng-tab">

                            </div>
                            <div class="tab-pane fade " id="fav" role="tabpanel" aria-labelledby="fav-tab">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Forum Content Area =================-->
<?php
require_once 'footer.php';
?>
