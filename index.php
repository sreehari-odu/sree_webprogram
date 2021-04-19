<?php require_once 'header.php';
require_once 'navigation.php'
?>




    <!--================Home Advanced Search Area =================-->
    <section class="doc_banner_area_dip">
      <ul class="list-unstyled banner_shap_img_dip">
        <li><img data-parallax='{"x": 180, "y": 80, "rotateY":2000}' src="img/home-tow/icon/plus-1.png" alt=""></li>
        <li><img data-parallax='{"x": 180, "y": 80, "rotateY":2000}' src="img/home-tow/icon/plus-1.png" alt=""></li>
        <li><img data-parallax='{"x": 180, "y": 80, "rotateY":2000}' src="img/home-tow/icon/plus-1.png" alt=""></li>
        <li><img src="img/home-tow/icon/slide-1.png" alt=""></li>
        <li><img src="img/home-tow/icon/slide-2.png" alt=""></li>
        <li><img src="img/home-tow/icon/slide-3.png" alt=""></li>
        <li><img src="img/home-tow/icon/slide-4.png" alt=""></li>
        <li><img src="img/home-tow/icon/slide-5.png" alt=""></li>
        <li><img src="img/home-tow/icon/slide-6.png" alt=""></li>
        <li><img src="img/home-tow/icon/slide-7.png" alt=""></li>
        <li><img src="img/home-tow/icon/slide-8.png" alt=""></li>
      </ul>
      <div class="container">
        <div class="doc_banner_content">
          <h2 class="wow fadeInUp">Welcome to ODU Thesis and Dissertation Portal!</h2>

            <div class="header_search_form_info">
                <form action="search.php" id="searchform" class="header_search_form" method="get">
                  <div class="form-group">
                    <div class="input-wrapper">
                        <label style="display: none" for="searchbox">Search</label>
                        <input type='search' id="searchbox" autocomplete="off" name="search"
                        placeholder="Search for Topics...." />
                        <img onclick="startDictation()" class="search_microphone" src="//i.imgur.com/cHidSVu.gif" />
                    </div>
                    <button type="submit" name="basicsearch" id="basicsearch" class="submit_btn">Search</button>
                  </div>
                    <div class="float-right">
                        <ul class="nav">
                            <li><a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"
                                   aria-controls="multiCollapseExample1">Advanced Search</a>
                        </ul>
                    </div>
                </form>

                <div class="collapse multi-collapse mt-5" style="padding-left: 8px;" id="multiCollapseExample1">
                    <div class="card card-body toggle_body">
                        <form action="search.php" method="get">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="author">Author</label>
                                        <input type="text" class="form-control" placeholder="" id="author" name="author">
                                    </div>
                                </div>
                                <!--  col-md-6   -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="department">Department</label>
                                        <input type="text" class="form-control" placeholder="" id="department" name="department">
                                    </div>
                                </div>
                                <!--  col-md-6   -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" class="form-control" placeholder="" id="subject" name="subject">
                                    </div>
                                </div>
                                <!--  col-md-6   -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="publisher">Publisher</label>
                                        <input type="tel" class="form-control" id="publisher" name="publisher">
                                    </div>
                                </div>
                                <!--  col-md-6   -->
                            </div>

                            <button type="submit" class="btn btn-primary mt-2" name="advancedsearch" id="advancedsearch">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
      </div>
    </section>
    <!--================End Home Advanced Search Area =================-->

    <!--================Header Feature Area =================-->
    <section class="h_feature_area">
      <div class="container">
        <div class="h_feature_box">
          <div class="row m-0">
            <div class="col-md-4 col-sm-6 p-0">
              <div class="h_feature_item">
                <img class="wow fadeInUp" data-wow-delay="0.2s" src="img/home-tow/icon/h-icon-1.png" alt="">
                <a href="#">
                  <h4 class="wow fadeInUp" data-wow-delay="0.3s">Community Forum</h4>
                </a>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 p-0">
              <div class="h_feature_item">
                <img class="wow fadeInUp" data-wow-delay="0.3s" src="img/home-tow/icon/h-icon-2.png" alt="">
                <a href="#">
                  <h4 class="wow fadeInUp" data-wow-delay="0.4s">Documentation</h4>
                </a>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 p-0">
              <div class="h_feature_item">
                <img class="wow fadeInUp" data-wow-delay="0.4s" src="img/home-tow/icon/h-icon-3.png" alt="">
                <a href="#">
                  <h4 class="wow fadeInUp" data-wow-delay="0.5s">24/7 Support</h4>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Header Feature Area =================-->

    <!--================Solution Area =================-->
    <section class="solution_area p_125">
      <div class="container">
        <div class="main_title text-center">
          <h2 class="wow fadeInUp" data-wow-delay="0.2s">CS 518 Class Project</h2>
          <p class="wow fadeInUp" data-wow-delay="0.4s">By Sree Hari Thiriveedhi
          </p>
        </div>

      </div>
    </section>
    <!--================End Solution Area =================-->
<?php
require_once 'footer.php'
?>

