
<!DOCTYPE html>
<!-- saved from url=(0051)http://ukieweb.com/envato/ukiecard/style1/blog.html -->
<html lang="en" style="overflow-y: hidden;"><!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Blog | zweqi</title>
    <meta name="author" content="ukieweb">
    <meta name="keywords" content="ukieCard, css3, template, html5 template">
    <meta name="description" content="ukieCard - Personal Vcard &amp; Resume HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <base href="<?php echo site_url(); ?>"/>
    <!-- Font Awesome -->
    <link type="text/css" media="all" href="assets/front/css/font-awesome.min.css" rel="stylesheet">
    <!-- Libs CSS -->
    <link type="text/css" media="all" href="assets/front/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link type="text/css" media="all" href="assets/front/css/animate.css" rel="stylesheet">
    <link type="text/css" media="all" href="assets/front/css/switcher.css" rel="stylesheet">
    <!-- Template CSS -->
    <link type="text/css" media="all" href="assets/front/css/style.css" rel="stylesheet">
    <!-- Switcher CSS -->
    <link href="assets/front/css/color-blue.css" rel="stylesheet" type="text/css" data-color="color-blue" media="all" id="stylesheet-new">
    <!-- Responsive CSS -->
    <link type="text/css" media="all" href="assets/front/css/respons.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="144x144" href="http://ukieweb.com/envato/ukiecard/style1/assets/img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="http://ukieweb.com/envato/ukiecard/style1/assets/img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="http://ukieweb.com/envato/ukiecard/style1/assets/img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" href="http://ukieweb.com/envato/ukiecard/style1/assets/img/favicons/apple-touch-icon.png">
    <link rel="shortcut icon" href="http://ukieweb.com/envato/ukiecard/style1/assets/img/favicons/favicon.png">
    <!-- Google Fonts -->
    <link href="assets/front/css/css" rel="stylesheet" type="text/css">

</head>
<body>

<!-- Load page -->
<div class="animationload" style="display: none;">
    <div class="loader" style="display: none;"></div>
</div>
<!-- End load page -->

<div id="wraper">

    <!-- Start Head section -->
    <header class="head">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-8 col-sm-11 col-lg-11">
                    <img class="logo-page" src="assets/front/img/blog_l.png" alt="Ukieweb">
                    <!-- Title Page -->
                    <h2 class="title">Blog</h2>
                    <!-- Description Page -->
                    <h4 class="sub-title">I write here my thoughts</h4>
                </div>
                <div class="col-xs-4 col-sm-1 col-lg-1 text-right">
                    <a href="welcome/index" ><img src="assets/front/img/close.png" width="60px" class="btn-close hover-animate"alt=""></a>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </header>
    <!-- End Head section -->

    <section class="blog padding-block">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-8">
                    <!-- start post -->
                    <?php foreach($blogs as $blog){ ?>
                    <div class="post">
                        <!-- start photo -->
                        <div class="photo">
                            <img src="<?php echo $blog->img_src;?>" alt="UkieWeb">
                        </div>
                        <!-- end photo -->
                        <!-- start title post -->
                        <h3 class="title title-blog"><?php echo $blog->title;?></h3>
                        <!-- end title post -->
                        <div class="entry-byline">
                            <i class="fa fa-user"></i>
                            <span class="entry-author right-border">
                                    <span>Jonh Doe</span>
                            </span>
                            <i class="fa fa-clock-o"></i>
                            <time class="entry-published right-border"><?php echo $blog->add_time;?></time>
                            <i class="fa fa-comment"></i>
                            <span class="comments-link"><?php echo $blog->click;?> Click</span>
                        </div>
                        <!-- start desc post -->
                        <p><?php echo mb_substr($blog->content,0,65); ?>...</p>

                        <!-- end desc post -->
                        <a href="blog/blog_detail?id=<?php echo $blog->article_id;?>" class="btn hover-animate btn-color-hover">Read More</a>
                    </div>
                    <?php }?>
                    <!-- end post -->


                    <!-- start pagination -->
                    <div class="pagination">
<!--                        <span class="page-numbers current">1</span>-->
<!--                        <a class="page-numbers" href="">2</a>-->
<!--                        <span class="page-numbers dots">.....</span>-->
<!--                        <a class="next page-numbers">Next</a>-->
                        <?php echo$this->pagination->create_links();?>
                    </div>
                    <!-- end pagination -->
                </div>
            <?php include'sidebar.php'?>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <!-- Start Footer section -->
    <footer class="footer">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <!-- start phone number -->
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <a href="index.html#" class="hover-animate">
                        <span class="ukie-icons hover-animate"><i class="fa fa-phone"></i></span> 139-3656-2467
                    </a>
                </div>
                <!-- end phone number -->
                <!-- start email -->
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <a href="index.html#" class="hover-animate">
                        <span class="ukie-icons hover-animate"><i class="fa fa-paper-plane"></i></span> 13936562467@163.com
                    </a>
                </div>
                <!-- end email -->
                <!-- start address -->
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <a href="index.html#" class="hover-animate">
                        <span class="ukie-icons hover-animate"><i class="fa fa-map-marker"></i></span>哈尔滨理工大学
                    </a>
                </div>
                <!-- end address -->
                <!-- start Copyright -->

                <!-- end Copyright -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </footer>
    <!-- End Footer section -->

</div>

<!-- Scroll to Top -->
<a href="" class="btn scrollToTop"><i class="fa fa-angle-up"></i></a>
<!-- End Scroll to Top -->
<?php include'login_register.php'?>

<!-- Scripts -->
<script src="assets/front/js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="assets/front/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/front/js/jquery.appear.js" type="text/javascript"></script>
<script src="assets/front/js/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="assets/front/js/jquery.mixitup.min.js" type="text/javascript"></script>
<script src="assets/front/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<script src="assets/front/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="assets/front/js/jquery.inview.min.js" type="text/javascript"></script>
<script src="assets/front/js/jquery.knob.min.js" type="text/javascript"></script>
<script src="assets/front/js/jquery.cookie.js" type="text/javascript"></script>
<script src="assets/front/js/scripts.js" type="text/javascript"></script>


<div id="ascrail2000" class="nicescroll-rails nicescroll-rails-vr" style="width: 4px; z-index: 999999; cursor: default; position: fixed; top: 0px; height: 100%; right: 0px; opacity: 0;"><div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 2px; height: 148px; border: 1px solid rgb(255, 255, 255); border-radius: 5px; background-color: rgb(255, 255, 255); background-clip: padding-box;"></div></div></body></html>