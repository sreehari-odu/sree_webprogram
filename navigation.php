<!--================Menu Area =================-->
<header class="header_area">
    <nav class="navbar navbar-expand-lg menu_one menu_purple sticky-nav">
        <div class="container">
            <a class="navbar-brand header_logo" href="index.php">
                <img class="first_logo sticky_logo" src="img/logo.png" srcset="img/logo-2x.png 2x" alt="logo">
                <img class="white_logo main_logo" src="img/logo-w.png" srcset="img/logo-w2x.png 2x" alt="logo">
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="menu_toggle">
                        <span class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <span class="hamburger-cross">
                            <span></span>
                            <span></span>
                        </span>
                    </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav menu ml-auto">
                    <li class="nav-item dropdown submenu active">
                        <a href="index.php" class="nav-link dropdown-toggle">Home</a>
                    </li>


                    <li class="nav-item dropdown submenu">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Forum
                        </a>
                        <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                           data-toggle="dropdown"></i>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="#" class="nav-link">Forums Home</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Popular Topics</a></li>
                        </ul>
                    </li>
                    <?php
                    if(isset($_SESSION['uname'])){
                    ?>
                    <li class="nav-item dropdown submenu">
                        <a href="profile.php" class="nav-link dropdown-toggle">Profile</a>
                    </li>

                        <?php
                    }
                    ?>
                </ul>
                <?php
                if(!isset($_SESSION['uname'])){
                ?>
                    <div class="right-nav">
                        <a class="nav_btn not-round-btn" href="signin.php">Login</a>
                    </div>
                <?php
                }else{
                ?>
                    <div class="right-nav">
                        <a class="nav_btn not-round-btn" href="logout.php">Logout</a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
</header>
<!--================End Menu Area =================-->