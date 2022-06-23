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
                            YOURS TAPUS
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

            <div class="row yours-tapus-content ">
                <div class="col-md-6 col-sm-12 col-xs-12 yours-tapus-content-img">
                    <img src="images/Business_Card_Mockup_028.png" alt="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 yours-tapus-content-tilte">
                    <div class="mb-3">
                        <h2>your tapus</h2>
                        <p>Danh thiếp điện tử TAPUS cá nhân hóa của riêng bạn. Thỏa sức lựa chọn thiết kế, chất liệu, giao diện
                        đại diện cho cá tính của riêng mình</p>
                    </div>
                    <div class="">
                        <h2>chỉ với xxxx đồng </h2>
                        <p>Cho xx số lượng thẻ tùy chỉnh chất liệu nhựa PVC hoặc thẻ giấy. TAPUS sẽ hiện thực hóa mọi ý
                            tưởng
                            của
                            khách hàng sao cho danh thiếp điện tử thể hiện được dấu ấn cá nhân cảu riêng mình</p>
                    </div>
                    <div class="yours-tapus-content-btn">
                        <?php
                        $get_yourtapus = mysqli_fetch_assoc(mysqli_query($connect,"select * from products where id = $id"))
                        ?>
                        <a href='addcart.php?item=<?php echo $get_yourtapus['id'] ?>' class='btnBuy' id='btnD".$id."'>Đặt hàng ngay</a>
                        <a href='addcart.php?id=<?php echo $get_yourtapus['id'] ?>' class='btnAdd' id='btnD".$id."'>Thêm vào giỏ </a>
                    </div>
                </div>
            </div>

            <div class="page-section" id="services">
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

      <?php
    require_once "templates/footer.php";
?>