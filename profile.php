<?php
require 'header.php';
require 'navigation.php';
require 'helpers.php'
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
            <form action="#" class="header_search_form">
                <div class="header_search_form_info">
                    <div class="form-group">
                        <div class="input-wrapper">
                            <label style="display: none" for="searchbox">Search</label>
                            <input type='search' id="searchbox" autocomplete="off" name="search"
                                   placeholder="Search for Topics...." />
                        </div>
                        <button type="submit" class="submit_btn">Search</button>
                    </div>
                    <div class="float-right">
                        <ul class="nav">
                            <li><a href="#">Advanced Search</a></li>
                        </ul>
                    </div>
                </div>

            </form>
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
                                            <?php if(isset($_REQUEST['ref'])&&$_REQUEST['ref']=='changessaved'){?>
                                                <div class="row alert media message_alert alert-success fade show" role="alert">
                                                    <i class=" icon_check_alt2"></i>
                                                    <div class="media-body">
                                                        <h5>Success</h5>
                                                        <p>Your changes have been successfully saved!</p>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icon_close"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php }?>
                                            <div class="row p_info_item_inner">
                                                <div class="col-sm-4">
                                                    <div class="p_info_item">
                                                        <img src="img/icon/p-icon-1.png" alt="">
                                                        <a href="#">
                                                            <h4>Forum Role</h4>
                                                        </a>
                                                        <a class="info_btn" href="#">User</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="p_info_item">
                                                        <img src="img/icon/p-icon-2.png" alt="">
                                                        <a href="#">
                                                            <h4>Topics Started</h4>
                                                        </a>
                                                        <a class="info_number" href="#">0</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="p_info_item">
                                                        <img src="img/icon/p-icon-3.png" alt="">
                                                        <a href="#">
                                                            <h4>Replies Created</h4>
                                                        </a>
                                                        <a class="info_number" href="#">0</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-right mt-5" >
                                                <a class="nav_btn icon_btn arrow_btn_small" href="editProfile.php"><i class="icon_profile"></i>Edit Profile</a>
                                            </div>
                                            <ul class="navbar-nav info_list">
                                                <li><span>Name:</span><?php echo getCurrentUserDetails()['fname'].' '.getCurrentUserDetails()['lname'];?></li>
                                                <li><span>Email:</span><?php echo getCurrentUserDetails()['email'];?></li>
                                                <li><span>Registered:</span><?php echo _ago(getCurrentUserDetails()['created_date']);?></li>
                                            </ul>
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
require 'footer.php';
?>
