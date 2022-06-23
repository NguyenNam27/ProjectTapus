<?php
require_once "config.php";
$db = new Database();
$connect = $db->getConnect();
?>
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


</head>

<body class="appear-animate">

    <!-- Page Loader -->
    <div class="page-loader">
        <div class="loader">Loading...</div>
    </div>
    <!-- End Page Loader -->

    <!-- Page Wrap -->
    <div class="page" id="top">

        <!-- Home Section -->
        <section class="home-section bg-dark-alfa-30 parallax-2" data-background="images/full-width-images/banner-2.png"
            id="home">

            <div class="js-height-full">
                <div class="black"></div>
                <!-- Hero Content -->
                <div class="home-content">

                    <div class="home-text">


                        <h1 class="hs-line-11 mb-20 mb-xs-10 mt-220 mt-sm-0 taptap">
                            CHÍNH SÁCH BẢO MẬT
                        </h1>


                    </div>
                </div>
                <!-- End Hero Content -->

                <!-- Scroll Down -->
                <div class="local-scroll">
                    <a href="#about" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i></a>
                </div>
                <!-- End Scroll Down -->

            </div>
        </section>
        <!-- End Home Section -->

        <!-- Navigation panel -->
        <nav class="main-nav dark transparent stick-fixed">
            <div class="full-wrapper relative ">
                <!-- Logo ( * your text or image into link tag *) -->
                <div class="nav-logo-wrap local-scroll">
                    <i class=" fas fa-bars"></i>
                </div>
                <!-- <div class="mobile-nav">
                    <i class="fa fa-bars"></i>
                </div> -->
                <a class="logo-tapus" href="index.php">
                    <img src="images/logo.png" alt="">
                    <p>TAP TO A NEW WORLD</p>
                </a>

                <!-- <a href='login.php' class='hs-line-3 '>ĐĂNG NHẬP</a> -->
                <!-- Main Menu -->
                <div class="inner-nav desktop-nav">
                    <!-- <ul class="clearlist scroll-nav local-scroll"> -->
                    <!-- <li> -->
                    <a href="gio-hang.php" class="icon-cart">
                        <img src="images/shopping-basket white.png" alt="">
                    </a>
                    <?php
                    if(isset($_SESSION['username'])){
                        $username =  $_SESSION['username'];
                        $get_name = mysqli_fetch_assoc(mysqli_query($connect,"select * from users where username = '$username'"));
                        $avatar = $get_name['avatar'];
                        echo "<a href='#' class='icon-login user-login'><img src='images/avatar/".$avatar."'></a>";
                        echo "<a href='#' class='login user-login hs-line-3  mb-xs-10'>".$get_name['name']."</a>";
                    }
                    else {
                        echo "<a href='login.php' class='icon-login'><img src='images/user-avatar.png' ></a>";
                        echo "<a href='login.php' class='login hs-line-3  mb-xs-10'>ĐĂNG NHẬP</a>";
                    }
                    ?>
                    <div class="modal-user">
                        <ul>
                             <li><a href="user/user-trang-ca-nhan.php">Trang cá nhân</a></li>
                            <li><a href="user/user-thong-ke.php">Thống kê</a></li>
                            <li><a href="logout.php">Đăng xuất</a></li>
                            <li><a href="doi-mat-khau.php">Đổi mật khẩu</a></li>
                        </ul>
                    </div>
                    <!-- </li>
                    </ul> -->
                </div>

            </div>
        </nav>
        <div class="menu-pc">
            <ul>
                <li class="mn1"><a href="index.php">Trang chủ</a></li>
                <li class="mn1"><a href="Ve-TapUs.php">Về chúng tôi</a></li>
                <li class="mn1"><a href="sanphamTapUs.php">Sản phẩm</a></li>
                <?php
                $querry = mysqli_query($connect,"select * from products");
                while($rows = mysqli_fetch_assoc($querry)){
                    ?>
                    <li class="mn2"><a href="sanphamTapUs.php?id=<?php echo $rows['id'] ?>"><?php echo $rows['name'] ?></a></li>
                    <?php
                }
                ?>
                <li class="mn1"><a href="huong-dan-su-dung.php">Hướng dẫn sử dụng</a></li>
                <li class="mn1"><a href="dang-ky-lien-he.php">Đăng ký liên hệ</a></li>
            </ul>
        </div>
        <!-- End Navigation panel -->

        <section>
            <img src="./images/chinhsachbaomat.png" alt="">
        </section>

        <!-- Foter -->
        <footer class="page-section bg-gray-lighter footer pb-60">
            <div class="row footer-main">
                <div class="col-4 col-md-4 text-contact">
                    <h4>THEO DÕI CHÚNG TÔI</h4>
                    <a href="#"><img src="./images/facebook.png" alt=""></a>
                    <a href="#"><img src="./images/pngwing.com (1).png" alt=""></a>
                    <a href="#"><img src="./images/icons8-zalo-100 (1).png" alt=""></a>
                </div>

                <div class="col-4 col-md-4 text-contact">
                    <h4>THÔNG TIN LIÊN HỆ</h4>
                    <p>
                        Địa chỉ:<br />
                        Hà Nội: Tầng 8, 81 Hoàng Ngân, Quận Thanh Xuân, Hà Nội <br>
                        Hồ Chí Minh: Số 173/22, Đường số 20, Phường 5, Quận Gò Vấp, Hồ Chí Minh<br>
                        Email: marketing@homiezmultimedia.com<br>
                        Hotline: 0903202068
                    </p>
                </div>
                <div class="col-4 col-md-4 text-contact">
                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="Ve-TapUs.php">Về chúng tôi</a></li>
                        <li><a href="sanpham.php">Sản phẩm</a></li>
                        <li><a href="#">Hướng dẫn sử dụng</a></li>
                        <li><a href="#">Đăng kí liên hệ</a></li>
                        <li><a href="chinh-sach-bao-mat.php">Điều khoản dịch vụ và chính sách bảo mật</a></li>
                    </ul>
                </div>

            </div>
            <div class="footer-content text-align-center ">2021 TAPUS</div>

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
        $('.user-login').click(function () {
            $('.modal-user').toggle();
        });
    </script>
</body>

</html>