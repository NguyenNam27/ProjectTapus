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

    <link rel="stylesheet" href="css/slideMain.css">
    <link rel="stylesheet" href="css/yours-tapus.css">
    <link rel="stylesheet" href="css/header.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
        <!-- images/full-width-images/banner-1.png -->
        <section class="home-section bg-dark-alfa-30 parallax-2" data-background="" id="home">
            <div class="slider">
                <div class="slide slide1  active">
                </div>
                <div class="slide slide2  ">
                </div>
                <div class="slide slide3 ">
                </div>
            </div>
            <div class="js-height-full">
                <div class="black"></div>
                <!-- Hero Content -->
                <h1 class="slide-title slide1-title"></h1>
                <!-- K???t n???i c??? th??? gi???i ch??? qua m???t c?? ch???m! -->
                <!-- <h1 class="slide-title slide2-title">G???n k???t x?? h???i qua TAPUS</h1>
                <h1 class="slide-title slide3-title">Chia s??? th??ng tin ti???n l???i</h1> -->
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

                <!-- <a href='login.php' class='hs-line-3 '>????NG NH???P</a> -->
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
                                        echo "<a href='login.php' class='login hs-line-3  mb-xs-10'>????NG NH???P</a>";
                                    }
                                ?>
                    <div class="modal-user">
                        <ul>
                            <li><a href="user/user-trang-ca-nhan.php">Trang c?? nh??n</a></li>
                            <li><a href="user/user-thong-ke.php">Th???ng k??</a></li>
                            <li><a href="logout.php">????ng xu???t</a></li>
                            <li><a href="doi-mat-khau.php">?????i m???t kh???u</a></li>
                        </ul>
                    </div>
                    <!-- </li>
                    </ul> -->
                </div>
            </div>
        </nav>
        <div class="menu-pc">
            <ul>
                <li class="mn1"><a href="index.php">Trang ch???</a></li>
                <li class="mn1"><a href="Ve-TapUs.php">V??? ch??ng t??i</a></li>
                <li class="mn1"><a href="sanphamTapUs.php">S???n ph???m</a></li>
                <?php
                    $querry = mysqli_query($connect,"select * from products");
                    while($rows = mysqli_fetch_assoc($querry)){
                ?>
                <li class="mn2"><a href="sanphamTapUs.php?id=<?php echo $rows['id'] ?>"><?php echo $rows['name'] ?></a></li>
                <?php
                    }
                ?>
                <li class="mn1"><a href="huong-dan-su-dung.php">H?????ng d???n s??? d???ng</a></li>
                <li class="mn1"><a href="dang-ky-lien-he.php">????ng k?? li??n h???</a></li>
            </ul>
        </div>
        <!-- End Navigation panel -->