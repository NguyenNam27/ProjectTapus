<!DOCTYPE html>
<html>

<head>
    <title>TAPUS.</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="Roman Kirichik">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-responsive.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/vertical-rhythm.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/user-trang-ca-nhan.css">
    <style>
    .main-nav {
        background-color: white !important;
    }
    </style>
</head>

<body class="appear-animate">

    <!-- Page Loader -->
    <div class="page-loader">
        <div class="loader">Loading...</div>
    </div>
    <!-- End Page Loader -->

    <!-- Page Wrap -->
    <div class="page" id="top">
        <!-- Navigation panel -->
        <nav class="main-nav  stick-fixed">
            <div class="full-wrapper relative ">
                <!-- Logo ( * your text or image into link tag *) -->
                <a class="logo-tapus" href="#">
                    <img src="images/logo.png" alt="">
                    <p>TAP TO A NEW WORLD</p>
                </a>
                <!-- Main Menu -->
            </div>
        </nav>
        <!-- End Navigation panel -->
        <div class="container-fluid ">
            <div class="user-main">
                <div class="user-info">
                    <div class="user-info-img">
                        <img src="images/user-avatar.png" alt="">
                    </div>
                    <h2>Tên</h2>
                    <p>Chức vụ</p>
                    <div class="user-info-intro">
                        <p>Giới thiệu</p>
                    </div>
                    <div class="user-info-button">
                        <a href="user-chinh-sua.php">
                            <img src="images/pen.png" alt="">
                            <p>Chỉnh sửa</p>
                        </a>
                        <a href="user-thong-ke.php">
                            <img src="images/pen.png" alt="">
                            <p>Thống kê</p>
                        </a>
                    </div>
                    <div class="user-info-link">
                        <a href="#">
                            <img src="images/facebook (1).png" alt="">
                            <p>FACEBOOK</p>
                        </a>
                        <a href="#">
                            <img src="images/instagram.png" alt="">
                            <p>INSTAGRAM</p>
                        </a>
                        <a href="#">
                            <img src="images/Image 18.png" alt="">
                            <p>INDERLINK</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Foter -->
        <footer class="page-section bg-gray-lighter footer ">
            <div class="footer-logo">
                <img src="images/logo.png" alt="">
                <p>TAP TO A NEW WORLD</p>
            </div>
            <!-- Top Link -->
            <div class="local-scroll">
                <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
            </div>
            <!-- End Top Link -->
        </footer>
        <!-- End Foter -->
    </div>
    <!-- End Page Wrap -->


    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="js/jquery.localScroll.min.js"></script>
    <script type="text/javascript" src="js/jquery.viewport.mini.js"></script>
    <script type="text/javascript" src="js/jquery.countTo.js"></script>
    <script type="text/javascript" src="js/jquery.appear.js"></script>
    <script type="text/javascript" src="js/jquery.sticky.js"></script>
    <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script type="text/javascript" src="js/gmap3.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="js/jquery.simple-text-rotator.min.js"></script>
    <script type="text/javascript" src="js/all.js"></script>
    <script type="text/javascript" src="js/contact-form.js"></script>
    <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->
    <script>
    $().ready(function() {
        $('.user-login').click(function() {
            $('.modal-user').toggle();
        });

        $(".nav-logo-wrap i").click(function() {
            $(this).toggleClass('bgr-white');
            $('.user-login').toggleClass('bgr-white');
            $('.cart-white').toggle();
            $('.cart-black').toggleClass('dnone');
        });

    })
    </script>
</body>

</html>