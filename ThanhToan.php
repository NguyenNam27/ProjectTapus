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
    <link rel="stylesheet" href="css/user-chinh-sua.css">
    <link rel="stylesheet" href="css/ThanhToan.css">

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
        <nav class="main-nav  transparent stick-fixed">
            <div class="full-wrapper relative ">
                <!-- Logo ( * your text or image into link tag *) -->
                <div class="nav-logo-wrap local-scroll">
                    <i class=" fas fa-bars"></i>
                </div>

                <a class="logo-tapus" href="#">
                    <img src="images/logo.png" alt="">
                    <p>TAP TO A NEW WORLD</p>
                </a>
                <!-- Main Menu -->
                <div class="inner-nav desktop-nav">
                    <!-- <ul class="clearlist scroll-nav local-scroll"> -->
                    <!-- <li> -->
                    <a href="#" class="icon-cart ">
                        <img class="cart-black" src="images/shopping-basket.png" alt="">
                        <img class="cart-white" src="images/shopping-basket white.png" alt="" style="display:none;">
                    </a>
                    <a href="#" class="icon-login user-login">
                        <img src="images/user-avatar.png" alt="">
                    </a>
                    <?php 
                                    if(isset($_SESSION['username'])){
                                        echo "<a href='user/' class='user-login login hs-line-3  mb-xs-10'>".$_SESSION['username']."</a>";
                                    } 
                                    else echo "<a href='login.php' class='user-login login hs-line-3  mb-xs-10 ml-2'>????NG NH???P</a>";
                                ?>
                    <!-- </li>
                    </ul> -->
                </div>
            </div>
        </nav>
        <div class="menu-pc">
            <ul>
                <li class="mn1"><a href="index.php">Trang ch???</a></li>
                <li class="mn1"><a href="Ve-TapUs.php">V??? ch??ng t??i</a></li>
                <li class="mn1"><a href="sanpham.php">S???n ph???m</a></li>
                <li class="mn2"><a href="#">Tapus PVC</a></li>
                <li class="mn2"><a href="yours-tapus.php">Your Tapus</a></li>
                <li class="mn2"><a href="#">Stickus</a></li>
                <li class="mn1"><a href="huong-dan-su-dung.php">H?????ng d???n s??? d???ng</a></li>
                <li class="mn1"><a href="dang-ky-lien-he.php">????ng k?? li??n h???</a></li>
            </ul>
        </div>
        <!-- End Navigation panel -->

        <div class="container-fluid m4">
            <div class="row tapus-pay">
                <div class="col-md-6 tapus-pay-left">
                    <h2>TH??NG TIN THANH TO??N </h2>
                    <div class="pay-left-input">
                        <input type="text" placeholder="H??? v?? t??n">
                        <input type="text" placeholder="Email">
                        <input type="text" placeholder="S??? ??i???n tho???i">
                        <div class="pay-left-input-address">
                            <input type="text" placeholder="Ch???n T???nh/Th??nh ph???">
                            <input type="text" placeholder="Ch???n Qu???n/Huy???n">
                            <input type="text" placeholder="Ch???n Ph?????ng/X??">
                        </div>
                        <input type="text" placeholder="S??? nh??, t??n ???????ng, ???">
                    </div>
                    <h2>PH????NG TH???C THANH TO??N</h2>
                    <ul>
                        <li>
                            <input type="radio" name="rd-pay" value="1">
                            <div class="pay-check">
                                <p>Thanh to??n chuy???n kho???n ng??n h??ng</p>
                            </div>
                            <div class="paypal 1">
                                <div class="tapus-paypal 1">
                                    <div class="tapus-paypal-info">
                                        <p>Ng??n h??ng: ??? </p>
                                        <p>Ch??? t??i kho???n: ???</p>
                                        <p>S??? t??i kho???n: ???</p>
                                    </div>
                                    <img src="images/Image 23.png" alt="">
                                </div>
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="rd-pay" value="2">
                            <div class="pay-check dflex">
                                <p>Thanh to??n qua v?? ??i???n t??? Momo</p>
                                <img src="images/Image 23.png" alt="">
                            </div>
                            <div class="paypal 2">
                                <div class="tapus-paypal 2">
                                    <div class="tapus-paypal-info">
                                        <p>Ng??n h??ng: ??? </p>
                                        <p>Ch??? t??i kho???n: ???</p>
                                        <p>S??? t??i kho???n: ???</p>
                                    </div>
                                    <img src="images/Image 23.png" alt="">
                                </div>
                            </div>

                        </li>
                        <li>
                            <input type="radio" name="rd-pay" value="3">
                            <div class="pay-check dflex">
                                <p>Thanh to??n PayPal</p>
                                <img src="images/Image 22.png" alt="">
                            </div>
                            <div class="paypal 3">
                                <div class="tapus-paypal 3">
                                    <div class="tapus-paypal-info">
                                        <p>Ng??n h??ng: ??? </p>
                                        <p>Ch??? t??i kho???n: ???</p>
                                        <p>S??? t??i kho???n: ???</p>
                                    </div>
                                    <img src="images/Image 23.png" alt="">
                                </div>
                            </div>

                        </li>
                        <li>
                            <input type="radio" name="rd-pay" value="4">
                            <div class="pay-check d-flex">
                                <p>Thanh to??n PayPal</p>
                                <img src="images/Image 24.png" alt="">
                            </div>
                            <div class="paypal 4">
                                <div class="tapus-paypal 4">
                                    <div class="tapus-paypal-info">
                                        <p>Ng??n h??ng: ??? </p>
                                        <p>Ch??? t??i kho???n: ???</p>
                                        <p>S??? t??i kho???n: ???</p>
                                    </div>
                                    <img src="images/Image 23.png" alt="">
                                </div>
                            </div>

                        </li>
                        <li>
                            <input type="radio" name="rd-pay" value="5">
                            <div class="pay-check">
                                <p>Thanh to??n khi giao h??ng (COD)</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-5 tapus-pay-right">
                    <div class="tapus-pay-product">
                        <img src="images/112Copy.png" alt="">
                        <div class="tapus-pay-product-info">
                            <p>TAPUS PVC CARD</p>
                            <p>Gi??:</p>
                            <div class="product-number dflex">
                                <span>-</span>
                                <p>1</p>
                                <span>+</span>
                            </div>
                        </div>

                    </div>

                    <div class="tapus-pay-input">
                        <input type="text">
                        <button>??p d???ng</button>
                    </div>
                    <div class="tapus-pay-price">
                        <p>T???NG </p>
                        <p>...??</p>
                    </div>
                    <div class="tapus-pay-btn dflex">
                        <button>HO??N T???T ????N H??NG</button>
                        <a href="#">Quay l???i gi??? h??ng</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-save modal-save-thanh-toan">
                <div class="show-message">
                    <img src="images/checked.svg" alt="">
                    <h2>C???M ??N B???N ???? ?????T H??NG S???N PH???M C???A TAPUS </h2>
                    <p>Ch??ng t??i s??? li??n l???c v???i b???n trong th???i gian s???m nh???t</p>
                </div>
            </div>
        <!-- Foter -->
        <footer class="page-section bg-gray-lighter footer pb-60">
            <div class="row footer-main">
                <div class="col-4 col-md-4 text-contact">
                    <h4>THEO D??I CH??NG T??I</h4>
                    <a href="#"><img src="./images/facebook.png" alt=""></a>
                    <a href="#"><img src="./images/pngwing.com (1).png" alt=""></a>
                    <a href="#"><img src="./images/icons8-zalo-100 (1).png" alt=""></a>
                </div>

                <div class="col-4 col-md-4 text-contact">
                    <h4>TH??NG TIN LI??N H???</h4>
                    <p>
                        ?????a ch???:<br />
                        H?? N???i: T???ng 8, 81 Ho??ng Ng??n, Qu???n Thanh Xu??n, H?? N???i <br>
                        H??? Ch?? Minh: S??? 173/22, ???????ng s??? 20, Ph?????ng 5, Qu???n G?? V???p, H??? Ch?? Minh<br>
                        Email: marketing@homiezmultimedia.com<br>
                        Hotline: 0903202068
                    </p>
                </div>
                <div class="col-4 col-md-4 text-contact">
                    <ul>
                        <li><a href="#">Trang ch???</a></li>
                        <li><a href="Ve-TapUs.php">V??? ch??ng t??i</a></li>
                        <li><a href="sanpham.php">S???n ph???m</a></li>
                        <li><a href="#">H?????ng d???n s??? d???ng</a></li>
                        <li><a href="#">????ng k?? li??n h???</a></li>
                        <li><a href="chinh-sach-bao-mat.php">??i???u kho???n d???ch v??? v?? ch??nh s??ch b???o m???t</a></li>
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
    $().ready(function() {
        $('input[type="radio"]').click(function() {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".tapus-paypal").not(targetBox).hide();
            $(targetBox).show();
        });
        $(".nav-logo-wrap i").click(function() {
            $(this).toggleClass('bgr-white');
            $('.user-login').toggleClass('bgr-white');
            $('.cart-white').toggle();
            $('.cart-black').toggleClass('dnone');
        });
        $('.tapus-pay-btn button').click(function(){
            $('.modal-save').show();
        });
        $('.modal-save').click(function(){
            $(this).hide();
        })
    })
    </script>
</body>

</html>