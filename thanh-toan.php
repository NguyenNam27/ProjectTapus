<?php
    session_start();
require_once "config.php";
$db = new Database();
$connect = $db->getConnect();

    include_once "sendmail.php";
    $mail = new Mailer();

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
    <link rel="stylesheet" href="css/user-chinh-sua.css">
    <link rel="stylesheet" href="css/ThanhToan.css">
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
                    <img class="cart-black" src="images/shopping-basket.png" alt="">
                    <img class="cart-white" src="images/shopping-basket white.png" alt="" style="display:none;">
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

<?php

if(isset($_POST['submit'])){

    if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['phone']) and isset($_POST['city']) and isset($_POST['state']) and isset($_POST['ward']) and  isset($_POST['address']) and isset($_POST['rd-pay'])){
        if($_POST['name']!="" and $_POST['email']!="" and $_POST['phone']!="" and $_POST['city']!="" and $_POST['state']!="" and $_POST['ward']!="" and $_POST['address']!="" and $_POST['rd-pay']!="") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $ward = $_POST['ward'];
            $address = $_POST['address'];
            $voucher = $_POST['voucher'];
            $rd_pay = $_POST['rd-pay'];

            if (isset($_SESSION['cart'])) {
                $listPro = $_SESSION['cart'];
                $numPro = count($listPro);
                $checkNull = 0;
                foreach ($listPro as $key => $value) {
                    if ($listPro[$key] == null) {
                        $checkNull++;
                    }
                }
                if ($numPro != $checkNull) {
                    $query = mysqli_query($connect, "INSERT INTO orders (name, email, phone,city,state,ward,address,voucher,payment_method,status)
                        VALUES ('$name', '$email', '$phone', '$city', '$state', '$ward', '$address','$voucher', $rd_pay,0)");

                    // get id order
                    $checkIDOrder = mysqli_query($connect, "select * from orders order by id desc limit 1");
                    $row = mysqli_fetch_assoc($checkIDOrder);
                    $id_order = $row['id'];
                    // set mail
                    $content_mail = "Kh??ch h??ng: $name <br> Email: $email <br> S??? ??i???n tho???i: $phone <br> ???? ?????t mua c??c s???n ph???m: ";
                    $title_mail = "C?? m???t ????n ?????t h??ng m???i t??? kh??ch h??ng";
                    $sql_getEmail = mysqli_query($connect, "select * from config");
                    $get_email = mysqli_fetch_assoc($sql_getEmail);
                    $email_admin = $get_email['email'];

                    foreach ($listPro as $key => $value) {
                        if ($listPro[$key] != null) {
                            $sql_getProducts = mysqli_query($connect, "select * from products where id = $key");
                            $products = mysqli_fetch_assoc($sql_getProducts);
                            $name_pro = $products['name'];
                            $quantity = $listPro[$key]['quantity'];
                            $total = $listPro[$key]['total'];

                            $content_mail = $content_mail . "<br> T??n s???n ph???m: $name_pro, S??? l?????ng: $quantity <br>";

                            $insert_detail = mysqli_query($connect, "INSERT INTO order_details (product_id, order_id, quantity,total)
                        VALUES ($key,$id_order,$quantity,'$total')");
                        }
                    }

                    if (isset($_SESSION['ghichu'])) {
                        $note = $_SESSION['ghichu'];
                        $content_mail .= "Ghi ch??: $note";
                    } else {
                        $content_mail .= "Kh??ng c?? ghi ch??";
                    }

                    /*
                     * Send mail
                     */

                    $mail->sendMail($email_admin, $content_mail, $title_mail);

                    unset($_SESSION['cart']);
                    unset($_SESSION['ghichu']);

                    $_SESSION['thanhtoan'] = "success";
                } else {
                    echo "<script>
                Swal.fire(
                    'Th??ng b??o?',
                    'Gi??? h??ng c???a b???n ch??a c?? s???n ph???m.',
                    'warning'
                )
                  </script>";
                }
            }
        }else{
            echo "<script>
                    Swal.fire(
                        'Th??ng b??o?',
                          'Vui l??ng ??i???n ?????y ????? th??ng tin.',
                          'warning'
                        )
                   // window.history.back();
                    </script>";
        }
    }
    else{
        echo "<script>
                    Swal.fire(
                        'Th??ng b??o?',
                          'Vui l??ng ??i???n ?????y ????? th??ng tin.',
                          'warning'
                        )
                   // window.history.back();
                    </script>";
    }
}
?>
<!--    <div class="menu-pc">-->
<!--        <ul>-->
<!--            <li class="mn1"><a href="index.php">Trang ch???</a></li>-->
<!--            <li class="mn1"><a href="Ve-TapUs.php">V??? ch??ng t??i</a></li>-->
<!--            <li class="mn1"><a href="sanpham.php">S???n ph???m</a></li>-->
<!--            <li class="mn2"><a href="#">Tapus PVC</a></li>-->
<!--            <li class="mn2"><a href="yours-tapus.php">Your Tapus</a></li>-->
<!--            <li class="mn2"><a href="#">Stickus</a></li>-->
<!--            <li class="mn1"><a href="huong-dan-su-dung.php">H?????ng d???n s??? d???ng</a></li>-->
<!--            <li class="mn1"><a href="dang-ky-lien-he.php">????ng k?? li??n h???</a></li>-->
<!--        </ul>-->
<!--    </div>-->
<!--     End Navigation panel -->

    <div class="container-fluid m4">
        <form action="" method="post" class="form-thanh-toan">
            <div class="row tapus-pay">
            <div class="col-md-6 tapus-pay-left">
                <h2>TH??NG TIN THANH TO??N </h2>
                <div class="pay-left-input">
                    <input type="text" name="name" placeholder="H??? v?? t??n">
                    <input type="text" name="email" placeholder="Email">
                    <input type="text" name="phone" placeholder="S??? ??i???n tho???i">
                    <div class="pay-left-input-address">
                        <input type="text" name="city" placeholder="Ch???n T???nh/Th??nh ph???">
                        <input type="text" name="state" placeholder="Ch???n Qu???n/Huy???n">
                        <input type="text" name="ward" placeholder="Ch???n Ph?????ng/X??">

                    </div>
                    <input type="text" name="address" placeholder="S??? nh??, t??n ???????ng, ???">
                </div>
                <h2>PH????NG TH???C THANH TO??N</h2>
                <ul>
                    <?php
                        $sql_getPaymentsBank = mysqli_query($connect,"select * from payments_method where position <> 0 order by position asc");
                        if(mysqli_num_rows($sql_getPaymentsBank)>0){
                        while($getPaymentsBank = mysqli_fetch_assoc($sql_getPaymentsBank)){
                        $idBank = $getPaymentsBank['id'];
                    ?>
                    <li>
                        <input type="radio"  name="rd-pay" value="<?php echo $getPaymentsBank['id'] ?>">
                        <div class="pay-check">
                            <p><?php echo $getPaymentsBank['name'] ?></p>
                            <?php
                                if($getPaymentsBank['icons'] != null or $getPaymentsBank['icons'] != ""){
                            ?>
                                    <img src="images/icons_payment/<?php echo $getPaymentsBank['icons'] ?>" alt="">
                            <?php
                                }
                            ?>
                        </div>
                        <div class="paypal <?php echo $getPaymentsBank['position'] ?>">
                            <?php
                            $sql_getPaymentsMethod1 = mysqli_query($connect,"select * from payments where payments_method_id = $idBank order by position asc");
                            if(mysqli_num_rows($sql_getPaymentsMethod1)>0){
                            while($getPaymentsMethod1 = mysqli_fetch_assoc($sql_getPaymentsMethod1)){
                            ?>
                            <div class="tapus-paypal  <?php echo $getPaymentsBank['position'] ?> ">
                                    <div class="tapus-paypal-info">
                                        <p>Ng??n h??ng: <?php echo $getPaymentsMethod1['name_bank']; ?> </p>
                                        <p>Ch??? t??i kho???n: <?php echo $getPaymentsMethod1['acc_holder'] ?></p>
                                        <p>S??? t??i kho???n: <?php echo $getPaymentsMethod1['acc_number'] ?></p>
                                    </div>
                                    <img src="images/qr/<?php echo $getPaymentsMethod1['qr_image'] ?>" alt="">
                            </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </li>
                    <?php
                        }
                        }
                    ?>

                    <?php
                        $sql_getPaymentsCOD = mysqli_query($connect,"select * from payments_method where position = 0");
                        if(mysqli_num_rows($sql_getPaymentsCOD)>0){
                            $getPaymentsCOD = mysqli_fetch_assoc($sql_getPaymentsCOD);
                    ?>
                    <li>
                        <input type="radio" name="rd-pay" value="<?php echo $getPaymentsCOD['id'] ?>">
                        <div class="pay-check">
                            <p><?php echo $getPaymentsCOD['name'] ?></p>
                        </div>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>

            <div class="col-md-5 tapus-pay-right">

                <?php
                if(isset($_SESSION['cart'])) {
                    $list_pro = $_SESSION['cart'];
                    $num = count($list_pro);
                    $count_null = 0;
                    $check = true;
                    $sumTien = 0;
                    foreach ($list_pro as $key) {
                        if (is_null($key)) {
                            $count_null++;
                        } else {
                            $sumTien += $key['total'];
                        }
                    }

                    if ($num != $count_null) {
                        foreach ($list_pro as $key => $value) {
                            if ($list_pro[$key] != null) {
                                $query = mysqli_query($connect, "SELECT * FROM `products` WHERE `id`= '$key'");
                                $res = mysqli_fetch_assoc($query);
                ?>
                <div class="tapus-pay-product">
                    <img src="images/imageProducts/<?php echo $res['img'] ?>" alt="">
                    <div class="tapus-pay-product-info">
                        <p><?php echo $res['name'] ?></p>
                        <p>Gi??: <?php echo number_format($list_pro[$key]['total'],0,'.','.') ?> ??</p>
                        <div class="product-number dflex">
                            <span>-</span>
                            <p><?php echo $list_pro[$key]['quantity'] ?></p>
                            <span>+</span>
                        </div>
                    </div>
                </div>
                <?php
                            }
                        }
                    }else{
                ?>
                <div class="tapus-pay-product">
                    <h4>B???n ch??a c?? s???n ph???m n??o</h4>
                </div>
                <?php
                    }
                }else{
                ?>
                    <div class="tapus-pay-product">
                        <h4>B???n ch??a c?? s???n ph???m n??o</h4>
                    </div>
                <?php
                }
                ?>
                <div class="tapus-pay-input">
                    <input type="text" name="voucher">
                    <button>??p d???ng</button>
                </div>
                <div class="tapus-pay-price">
                    <p>T???NG </p>
                    <p><?php
                        if(isset($sumTien))
                        echo number_format($sumTien,0,'.','.');
                        else
                            echo 0;
                            ?> ??</p>
                </div>
                <div class="tapus-pay-btn dflex">
                    <button id="submit" name="submit">HO??N T???T ????N H??NG</button>
                    <a href="gio-hang.php">Quay l???i gi??? h??ng</a>
                </div>
            </div>
            </div>
        </form>
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
<?php
if(isset($_SESSION['thanhtoan'])){
    unset($_SESSION['thanhtoan']);
    echo "<script type='text/javascript'>
                    $('.modal-save').show();
        </script>";

}
?>
<script>
    $().ready(function () {
        $('input[type="radio"]').click(function () {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
           // console.log(targetBox);
            $(".tapus-paypal").not(targetBox).hide();
            $(targetBox).show();
        });
        $('.modal-save').click(function(){
            $(this).hide();
        });
        $('.user-login').click(function (){
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