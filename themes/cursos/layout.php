<!DOCTYPE html>
<html>
    <head>
        <!--  SEO STUFF START HERE -->
        <title>Clean Homepage</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="robots" content="follow, index" />
        <!--  SEO STUFF END -->
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo theme_url() ?>css/bootstrap.css" />
        <link rel="stylesheet" href="<?php echo theme_url() ?>css/custom.css" />
        <link rel="stylesheet" href="<?php echo theme_url() ?>css/isotope.css" />
        <link rel="stylesheet" href="<?php echo theme_url() ?>css/flexslider.css" />
        <link rel="stylesheet" href="<?php echo theme_url() ?>css/font-awesome.css" />

        <link rel="stylesheet" href="<?php echo theme_url() ?>css/font-awesome-ie7.css" />
        <link rel="stylesheet" href="<?php echo theme_url() ?>css/jquery.fancybox.css?v=2.1.0" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo theme_url() ?>css/switcher.css" />

        <!--[if lte IE 8]>
            <link rel="stylesheet" type="text/css" href="css/IE-fix.css" />
        <![endif]-->

        <link rel="stylesheet" href="<?php echo theme_url() ?>css/orange_color_scheme.css" />
        <link rel="alternate stylesheet" type="text/css" media="screen" title="blue-theme" href="<?php echo theme_url() ?>css/blue_color_scheme.css" />
        <link rel="alternate stylesheet" type="text/css" media="screen" title="red-theme" href="<?php echo theme_url() ?>css/red_color_scheme.css" />
        <link rel="alternate stylesheet" type="text/css" media="screen" title="grenn-theme" href="<?php echo theme_url() ?>css/green_color_scheme.css" />
    </head>
    <body>
        <!-- THE LINE AT THE VERY TOP OF THE PAGE -->
        <div class="top_line"></div>
        <!-- HEADER AREA -->
        <header>
            <div class="container">
                <div class="row">
                    <!-- HEADER LOGO -->
                    <div class="span2 logo">
                        <a class="logo" href="index.html"> </a>
                    </div>
                    <!-- HEADER: PRIMARY SITE NAVIGATION -->
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="container">
                                <div class="buttons-container">
                                </div>
                                <div class="nav-collapse">
                                    <ul class="nav nav-pills">
                                        <li class="single active"><a href="index.html">HOME</a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#menu2">
                                                PAGES
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="shortcodes.html">Shortcodes</a></li>
                                                <li><a href="price_tables.html">Price Tables</a></li>
                                                <li><a href="faqs.html">FAQs</a></li>
                                                <li><a href="our_team.html">Our Team</a></li>
                                                <li><a href="executive_profile.html">Executive Profile</a></li>
                                                <li><a href="login.html">Login Page</a></li>
                                                <li><a href="login2.html">Login-2 Page</a></li>
                                                <li><a href="landing_page.html">Landing Page</a></li>
                                                <li><a href="coming_soon.html">Coming Soon Page</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#menu4">
                                                BLOG
                                            </a>

                                            <ul class="dropdown-menu">
                                                <li><a href="blog_right_column.html">News and Blog</a></li>
                                                <li><a href="blog_right_column_post.html">Blog Post</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#menu3">
                                                PORTFOLIO
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="portfolio.html">Portfolio</a></li>
                                                <li><a href="portfolio_item.html">Portfolio Item</a></li>
                                            </ul>
                                        </li>
                                        <li class="single"><a href="<?php echo site_url('contact')?>">CONTACT</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-bottom-line span12"></div>
                </div>
            </div>
        </header>
        <!-- MAIN CONTENT AREA -->
        <div class="main-content">
            <div class="container" style="border:1px solid red;">
              <?php echo $content ?>
            </div>
        </div>
        <!-- FOOTER STARTS HERE -->
        <footer id="footer">
            <div class="footer-wrapper">
                <div class="container">
                    <div class="row show-grid">
                        <div class="span8 footer-top-block">
                            <ul class="footer-nav">
                                <li><a href="#">HOME</a><span>|</span></li>
                                <li><a href="#">PAGES</a><span>|</span></li>
                                <li><a href="#">BLOG</a><span>|</span></li>
                                <li><a href="#">PORTFOLIO</a><span>|</span></li>
                                <li><a href="<?php echo base_url("/contact/") ?>">CONTACT</a></li>
                            </ul>
                        </div>
                        <div class="span4 footer-top-block">
                            <a style="float: left;" href="#">CONNECT WITH US</a>
                        </div>
                    </div>
                    <div class="row show-grid">
                        <div class="span8">
                            <span style="margin: 0 27px 40px 0; float: left; display: block;">8600 East Belmont Street. Suite 900. Dallas, TX, USA</span>
                            <span style="float: left; display: block; margin-bottom: 40px;">(214) 454-9800 <a href="mailto:hello@yourcompany.com">hello@yourcompany.com</a></span>
                        </div>
                        <div class="span4">
                            <ul class="footer-socials">
                                <li><a class="fb" href="#"></a></li>
                                <li><a class="tw" href="#"></a></li>
                                <li><a class="in" href="#"></a></li>
                                <li><a class="wf" href="#"></a></li>
                                <li><a class="fl" href="#"></a></li>
                                <li><a class="b" href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row show-grid">
                        <div class="span12">
                            <p class="bottom-p">© <a href="http://www.themeleaf.com">ThemeLeaf</a> 2013. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END FOOTER -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo theme_url() ?>js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo theme_url() ?>js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="<?php echo theme_url() ?>js/jquery.imagesloaded.min.js"></script>
        <script type="text/javascript" src="<?php echo theme_url() ?>js/jquery.isotope.js"></script>
        <script type="text/javascript" src="<?php echo theme_url() ?>js/jquery.fancybox.pack.js?v=2.1.0"></script>
        <script type="text/javascript" src="<?php echo theme_url() ?>js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="<?php echo theme_url() ?>js/jquery.imagesloaded.min.js"></script>
        <script type="text/javascript" src="<?php echo theme_url() ?>js/custom.js"></script>
        <!-- Color Selector: remove this script to disable -->
        
    </body>
</html>