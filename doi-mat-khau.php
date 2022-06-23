<?php
require_once "config.php";
$db = new Database();
$connect = $db->getConnect();
if(!isset($_SESSION['username'])){
    echo "<script>window.location.replace('./')</script>";
}else{
    $username = $_SESSION['username'];
}
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
        <link rel="stylesheet" href="css/ThanhToan.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>


<body class="appear-animate">
<?php
     if(isset($_POST['submit'])){
         $old_pass = $_POST['old_password'];
         $pass = $_POST['password'];
         $cf_pass = $_POST['cf_password'];

         $sql_get_User = mysqli_query($connect,"select * from users where username = '$username'");
         $get_User = mysqli_fetch_assoc($sql_get_User);

         if($old_pass == $get_User['password']){
             if($pass == $cf_pass){
                 mysqli_query($connect,"UPDATE users SET password='$cf_pass' WHERE username='$username'");
                 echo "<script>
//                            alert('Đổi mật khẩu thành công');
                            window.location.replace('./')
                            </script>";
                 $_SESSION['changePass'] = "Thành công";
             }else{
                 echo "<script>
                    Swal.fire(
                        'Thông báo?',
                        'Xác nhận mật khẩu không chính xác. Vui lòng thử lại',
                        'warning'
                    )
                  </script>";
             }
         }else{
             echo "<script>
                Swal.fire(
                    'Lỗi!!',
                    'Nhập mật khẩu cũ không chính xác. Vui lòng nhập lại',
                    'error'
                )
                  </script>";
         }
     }
?>
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

            <a class="logo-tapus" href="index.php">
                <img src="images/logo.png" alt="">
                <p>TAP TO A NEW WORLD</p>
            </a>
            <!-- Main Menu -->
            <div class="inner-nav desktop-nav">
                <!-- <ul class="clearlist scroll-nav local-scroll"> -->
                <!-- <li> -->
                <a href="gio-hang.php" class="icon-cart">
                    <img src="images/shopping-basket.png" alt="">
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
    <!-- Home Section -->
    <section class="home-section parallax-2" data-background="" id="home">

        <div class="js-height-full">
            <!-- Hero Content -->
            <div class="home-content">

                <div class="home-text">

                    <form class="frmLogin" action="" method="POST">
                        <h1 class="login-title" style="color: #000 !important; margin: 1em 0 0 0; !important;">
                            Đổi mật khẩu
                        </h1>
                        <input type="password" name="old_password" placeholder="Nhập mật khẩu cũ"  class="login-input">
                        <input type="password" name="password" placeholder="Nhập mật khẩu mới"  class="login-input">
                        <input type="password" name="cf_password" placeholder="Nhập lại mật khẩu cũ" class="login-input">
                        <input type="submit" name="submit" value="Đặt lại mật khẩu" class="login-submit">
                        <a href="login.php">Quay lại đăng nhập</a>
                    </form>



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

<?php
require_once "templates/footer.php";
?>