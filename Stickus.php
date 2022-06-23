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
    <link rel="stylesheet" href="css/yours-tapus.css">
    <link rel="stylesheet" href="css/stickus.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="appear-animate">
<?php
if(isset($_SESSION['addcart'])){
    unset($_SESSION['addcart']);
    echo "<script>
                    Swal.fire({
                      icon: 'success',
                      title: 'Thành công',
                      text: 'Đã thêm mới 1 sản phẩm vào giỏ hàng của bạn!'
                    });
                </script>";
}
?>
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
                            STICKUS
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
                        echo "<a href='login.php' class='icon-login user-login'><img src='images/user-avatar.png' ></a>";
                        echo "<a href='login.php' class='login user-login hs-line-3  mb-xs-10'>ĐĂNG NHẬP</a>";}
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

        <div class="container">
            <div class=" yours-tapus-content stickus-content">
                <div class="row">

                    <div class="col-md-6 col-sm-12 col-xs-12 yours-tapus-content-tilte">
                        <h2>stickus</h2>
                        <p>Sự kết hợp giữa danh thiếp cá nhân điện tử với hình dán sticker nhỏ gọn, thuận tiện.
                        Có thể dán ở trên mọi bề mặt, thuận tiện cho mục đích quảng bá sản phẩm và thông tin ở khắp mọi nơi.</p>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 yours-tapus-content-img">
                        <img src="images/sticker.png" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 yours-tapus-content-tilte">
                        <div class="">
                            <h2>chỉ với xxxx đồng </h2>
                            <p>Sở hữu ngay gói STICKUS gồm xx sản phẩm với chất liệu giấy một mặt dính (sticker). Màu
                                sắc, nội dung trên STICKUS đều hoàn toàn có thể tùy chỉnh theo mục đích và sở thích của
                                khách hàng.</p>
                        </div>
                        <div class="yours-tapus-content-btn">
                            <?php
                            $get_stickus = mysqli_fetch_assoc(mysqli_query($connect,"select * from products where id = $id"))
                            ?>
                            <a href='addcart.php?item=<?php echo $get_stickus['id'] ?>' class='btnBuy' id='btnD".$id."'>Đặt hàng ngay</a>
                            <a href='addcart.php?id=<?php echo $get_stickus['id'] ?>' class='btnAdd' id='btnD".$id."'>Thêm vào giỏ </a>

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 yours-tapus-content-img stickus-img
                    ">
                        <img class="img1" src="images/rm363-b05-google-mockup.png" alt="">
                        <img class="img1" src="images/rm363-b05-google-mockup1.png" alt="">
                        <img class="img1" src="images/rm363-b05-google-mockup1.png" alt="">
                    </div>
                </div>
                <div class="page-section" id="services">
                    <h2 class="products-title-text">
                        CÁCH SỬ DỤNG
                    </h2>
                    <div class=" row product-diff">
                        <div class="col-md-6 col-sm-12 col-xs-12 yours-tapus-content-img stickus-img ">
                            <img class="img2" src="images/rm363-b05-google-mockup.png" alt="">
                            <img class="img2" src="images/rm363-b05-google-mockup1.png" alt="">
                            <img class="img2" src="images/rm363-b05-google-mockup1.png" alt="">
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 yours-tapus-content-tilte">
                            <h2>Lựa chọn thiết kế stickus</h2>
                            <p> Khách hàng có thể lựa chọn hình ảnh có sẵn từ TAPUS hoặc sử dụng hình ảnh do bản thân tự
                                thiết kế</p>
                        </div>
                    </div>
                    <div class=" row product-diff dflex">
                        <div class="col-md-6 col-sm-12 col-xs-12 yours-tapus-content-img ">
                            <img class="img2" src="images/185.png" alt="">
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 yours-tapus-content-tilte">
                            <h2>Lựa chọn thiết kế stickus</h2>
                            <p> Khách hàng có thể lựa chọn hình ảnh có sẵn từ TAPUS hoặc sử dụng hình ảnh do bản thân tự
                                thiết kế</p>
                        </div>
                    </div>
                </div>
                <div class="row stickus-use dflex">
                    <div class="col-md-6 stickus-use-img">
                        <img src="images/Scroll Group 7.png" alt="" style="width:100%">
                    </div>
                    <div class=" col-md-6 stickus-use-info">
                        <div class="stickus-use-info-item">
                            <h2>SỬ DỤNG STICKUS</h2>
                            <p>Lựa chọn bề mặt và bóc lớp giấy bên dưới để lộ ra mặt dính của STICKUS. </p>
                        </div>
                        <div class="stickus-use-info-item">
                            <h2>thành công</h2>
                            <p>Tiến hành dùng điện thoại, chạm nhẹ vào STICKUS đã dính trên bề mặt. Mọi thông tin bạn mong muốn sẽ hiển thị thành công trên màn hình điện thoại!</p>
                        </div>
                    </div>
                </div>
                <div class="page-section" id="services">
                    <h2 class="products-title-text">
                        Những sản phẩm khác của tapus
                    </h2>
                    <div class=" row product-diff">
                        <?php
                            $sql_get_other_product = mysqli_query($connect,"select * from products where id <> $id");
                            while($get_other_product = mysqli_fetch_assoc($sql_get_other_product)){
                        ?>
                        <div class="col-md-5 col-sm-12 col-xs-12 product-diff-item">
                            <div class="product-diff-item-img">
                                <img src="images/sanpham<?php echo $get_other_product['id'] ?>.png" alt="">
                            </div>
                            <div class="product-diff-item-info">
                                <h3><?php echo $get_other_product['name'] ?></h3>
                                <span><?php echo $get_other_product['description'] ?></span>
                                <p>GIÁ: <?php echo number_format($get_other_product['price'],0,'.','.')  ?> đ</p>
                            </div>
                            <div class="product-diff-item-btn">
                                <a href="sanphamTapUs.php?id=<?php echo $get_other_product['id'] ?>" class='btnBuy btnChiTiet'>Chi tiết</a>
                            </div>
                        </div>
                                <?php
                            }
                                ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="page-section" id="services">
            <h2 class="products-title-text">
                BẮT ĐẦU VỚI TAPUS CỦA RIÊNG BẠN
            </h2>
            <div class="group-tapus">
                <div class="row">
                    <div class="col-md-4 group-tapus-item">
                        <div class="group-tapus-item-img">
                            <img src="images/Group 104.png" alt="">
                        </div>
                        <h3>liên hệ</h3>
                        <p>Liên hệ & gửi ý tưởng thiết kế YOUR TAPUS</p>
                    </div>
                    <div class="col-md-4 group-tapus-item">
                        <div class="group-tapus-item-img">
                            <img src="images/Scroll Group 2.png" alt="">
                        </div>
                        <h3>nhận thiết kế mẫu</h3>
                        <p>TAPUS sẽ gửi lại sản phẩm mẫu theo ý tưởng của khách hàng</p>
                    </div>
                    <div class="col-md-4 group-tapus-item">
                        <div class="group-tapus-item-img">
                            <img src="images/Group 281.png" alt="">
                        </div>
                        <h3>Nhận sản phẩm</h3>
                        <p>Một khi thiết kế đạt yêu cầu, TAPUS sẽ bắt đầu sản xuất và gửi bộ sản phẩm hoàn thiện cho
                            khách
                            hàng.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-section" id="services">
            <h2 class="products-title-text">
                Những sản phẩm khác của tapus
            </h2>
            <div class=" row product-diff">
                <div class="col-md-5 col-sm-12 col-xs-12 product-diff-item">
                    <div class="product-diff-item-img">
                        <img src="images/112.png" alt="">
                        <img src="images/113.png" alt="">
                    </div>
                    <div class="product-diff-item-info">
                        <h3>TAPUS PVC CARD</h3>
                        <span>Danh thiếp điện tử TAPUS cá nhân hóa tùy chỉnh thông tin</span>
                        <p>GIÁ:</p>
                    </div>
                    <div class="product-diff-item-btn">
                        <a href="#" class='btnBuy'>Chi tiết</a>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12 product-diff-item">
                    <div class="product-diff-item-img image">
                        <img src="images/sticker.png" alt="">
                    </div>
                    <div class="product-diff-item-info">
                        <h3>STICKUS</h3>
                        <span>Danh thiếp điện tử TAPUS dạng sticker, nhỏ gọn và thuận tiện</span>
                        <p>GIÁ:</p>
                    </div>
                    <div class="product-diff-item-btn">
                        <a href="#" class='btnBuy'>Chi tiết</a>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
<?php
require_once "templates/footer.php";
?>