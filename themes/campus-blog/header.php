<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PhNews</title>

    <?php wp_head(); ?>
</head>




<body <?php body_class(); // assign wordpress classes to the body element ?>>
    <header id="header" >
        <!-- =====================
            TOP HEADER
        ======================= -->

        <div class="top-header">
            <div class="container">
                <ul class="top-links">
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <div class="buttons">
                        <a href="signup.html" class="btn btn-info">SignUp</a>
                        <a href="login.html" class="btn btn-secondary">Login</a>
                    </div>
                </ul>
                <div class="follow-us d-flex">
                    <div class="social-links">
                        <a href="#"><i class="fa fa-facebook-f"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-whatsapp"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </div>
                    <div class="user">
                        <div class="user-avatar">
                            <img src="img/new4.jpg" alt="" class="img-fluid">
                        </div>
                        <ul class="user-tools">
                            <li><a href="#"><i class="fa fa-pencil mr-2"></i> Create Post</a></li>
                            <li><a href="#"><i class="fa fa-upload mr-2"></i> Uploads</a></li>
                            <li><a href="#"><i class="fa fa-edit mr-2"></i> Edit profile</a></li>
                            <li><a href="#"><i class="fa fa-cogs mr-2"></i> Settings</a></li>
                            <li><a href="#"><i class="fa fa-power-off mr-2"></i> LogOut</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- ==========================================
                BOTTOM  HEADER
    ===========================================-->
        <div class="bottom-header">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a href="index.html" class="navbar-brand">
                        <h1>CampusYarn<sub>.com</sub></h1>
                    </a>
                    <div class="navbar-header">
                        <button type="button" id="nav-toggle" class="navbar-toggler" data-toggle="collapse"
                            data-target="#navigation-menu">
                            <span class="toggler-icon">
                                <i class="fa fa-bars text-dark fa-2x"></i>
                            </span>
                        </button>
                    </div>
                    <div id="navigation-menu" class="collapse navbar-collapse" role="navigation">
                        <ul class="navbar-nav ml-auto text-left">
                            <li class="nav-item"><a href="index.html" class="nav-link selected-nav  px-4">Home</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link  px-4">gossips</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link  px-4">albums</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link  px-4">How to</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link  px-4">Unisports</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link  px-4">fashion</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!--=============================
        SEARCH BAR SECTION
    ============================== -->
        <div class="search-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm col-md-12">
                        <!-- <div class="banner d-flex justify-content-center mb-2">
                            <img src="img/banner-01.jpg" alt="" class="img-fluid">
                        </div> -->
                        <form action="">
                            <div class="from-group search-area col-sm col-md-6 col-lg-3 ml-auto p-0 ">
                                <button type="submit"><i class="fa fa-search"></i></button><input type="text"
                                    placeholder="search this blog" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>