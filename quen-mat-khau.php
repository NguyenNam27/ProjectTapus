<?php
// include class mail
include_once 'sendmail.php';
$mail = new Mailer();

require_once "config.php";
$db = new Database();
$connect = $db->getConnect();if(isset($_SESSION['username'])){
    echo "<script>window.location.replace('index.php')</script>";
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
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">-->
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
    <?php
    // Check Email
    if(isset($_POST['submit'])){
        $email = $_POST['email'];

        $query = mysqli_query($connect,"SELECT * FROM users WHERE users.email = '$email'");
        $res = mysqli_fetch_assoc($query);
        if(mysqli_num_rows($query) > 0){
            if($email != ''){
                $title = "Quên mật khẩu";
                $message_code = "Tài khoản của bạn là: <span style='color: green;'>" .$res['username']. "</span> <br> Mật khẩu là: <span style='color: green;'>".$res['password']."</span>";
                $mail->sendMail($email,$message_code,$title);
                echo "<script>
                        Swal.fire({
                              title: 'Tên đăng nhập và mật khẩu đã được gửi vào email vui lòng kiểm tra lại email!',
                              icon: 'success',
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                        location.href='login.php'; 
                                      }
                                    });
                    </script>";
                //header('Location: login.php');
            }
        }
        else echo "<script>Swal.fire(
                          'Lỗi',
                          'Email không tồn tại hoặc bạn chưa nhập email',
                          'error'
                        )</script>";
    }
    ?>
    <section class="home-section parallax-2" data-background="" id="home">
        <div class="js-height-full">
            <!-- Hero Content -->
            <div class="home-content">
                <div class="home-text">
                    <form class="frmLogin" action="" method="POST">
                        <h1 class="login-title" style="color: #000 !important; margin-bottom: 0">
                            Quên mật khẩu
                        </h1>
                        <p style="margin-bottom: 0 !important;">Nhập email của bạn, hệ thống sẽ gửi email cài đặt lại mật khẩu</p>
                        <input type="email" name="email" placeholder="Email" class="login-input">
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
