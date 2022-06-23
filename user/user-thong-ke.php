

<?php
require_once "../config.php";
require_once "../updateProfile.php";
$db = new Database();
$connect = $db->getConnect();


if (!isset($_SESSION['username'])) {
    echo "<script>window.location.replace('../login.php')</script>";
} else {
    $username = $_SESSION['username'];
    $edit = new UpdateProfile($username);
    $card_id = $edit->getCardId();
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style-responsive.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/vertical-rhythm.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/user-trang-ca-nhan.css">
    <link rel="stylesheet" href="../css/user-thong-ke.css">
    <link rel="stylesheet" href="../css/user-chinh-sua.css">
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

            <a class="logo-tapus" href="../index.php">
                <img src="../images/logo.png" alt="">
                <p>TAP TO A NEW WORLD</p>
            </a>
            <!-- Main Menu -->

        </div>
    </nav>

    <!-- End Navigation panel -->
    <div class="container-fluid p-16 bg-main">
        <div class="row  ">
            <?php
            $sql_getInformation = mysqli_query($connect,"select * from cards where id = $card_id");
            $getInformation = mysqli_fetch_assoc($sql_getInformation);

            $sql_getInterface = mysqli_query($connect, "select * from interface_options where card_id=$card_id");
            $getInterface = mysqli_fetch_assoc($sql_getInterface);

            ?>
            <input type="hidden" id="background_color" value="<?php echo $getInterface['background']; ?>">
            <input type="hidden" id="sample" value="<?php echo $getInterface['sample']; ?>">
            <input type="hidden" id="fillter" value="<?php echo $getInterface['filter']; ?>">
            <input type="hidden" id="get_image_interface" value="<?php echo $getInterface['image']; ?>">

            <div class="col-md-5 statistical-phone ">
                <div class="phone-info">
                    <img class="images1" src="../images/phone.png" alt="">
                    <div class="overlay"></div>
                    <div class="phone-info-main">
                        <div class="phone-main">
                            <div class="phone-main-img">
                                <img src="../images/uploads/<?php echo $getInformation['image'] ?>" id="image_phone" alt="">
                            </div>
                            <h2 id="name_phone"><?php echo $getInformation['name']; ?></h2>
                            <p id="regency_phone"><?php echo $getInformation['regency'] ?></p>
                            <div class="phone-main-intro">
                                <p id="description_phone"><?php echo $getInformation['description'] ?></p>
                            </div>

                            <div class="phone-main-link">
                                <?php
                                $sql_getThreeSocial = mysqli_query($connect,"select card_social.link,socials.id,socials.icon as icon,card_social.position as position,socials.name as name from card_social inner join socials on socials.id = card_social.social_id where card_id = $card_id and status = 1 and card_social.position != 0 order by card_social.position asc");
                                if(mysqli_num_rows($sql_getThreeSocial)>0){
                                    while($getThreeSocial = mysqli_fetch_assoc($sql_getThreeSocial)){
                                        ?>
                                        <a href="#" data-item-id="<?php echo $getThreeSocial['position']; ?>">
                                            <div class="phone-main-link-img">
                                                <img src="../images/icons/<?php echo $getThreeSocial['icon']; ?>" alt="">
                                            </div>
                                            <p><?php echo $getThreeSocial['name'] ?></p>
                                        </a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class=" phone-main-row">
                                <div class="row">
                                    <?php
                                    $sql_getFourSocial = mysqli_query($connect,"select card_social.link,socials.id,socials.icon as icon,card_social.position as position,socials.name as name from card_social inner join socials on socials.id = card_social.social_id where card_id = $card_id and status = 1 and card_social.position != 0 order by card_social.position asc");
                                    if(mysqli_num_rows($sql_getFourSocial)>0){
                                        while($getFourSocial = mysqli_fetch_assoc($sql_getFourSocial)){
                                            ?>
                                            <div class="col-md-6 col-sm-6 col-xs-6" data-pos-second="<?php echo $getFourSocial['position'] ?>">
                                                <div class="phone-main-row-item">
                                                    <p><?php echo $getFourSocial['name'] ?></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="phone-logo">
                            <img src="../images/logo.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 p0">
                <div class="statistical-info">
                    <div class="statistical-info-title">
                        <p>Thống kê</p>
                    </div>
                    <div class="statistical-info-content">
                        <div class="statistical-info-content-title">
                            <h3>Thống kê Tapus của bạn</h3>
                        </div>

                        <?php
                            $sql_getStatistic = mysqli_query($connect,"select * from statistic where card_id = $card_id");
                            if(mysqli_num_rows($sql_getStatistic)>0){
                                $getStatistic = mysqli_fetch_assoc($sql_getStatistic);
                        ?>
                        <div class="statistical-info-content-box ">
                            <div class="content-box-list-item dflex">
                                <div class="content-box-item dflex">
                                    <p>Truy cập:</p>
                                    <span><?php echo $getStatistic['access_count'] ?> lượt</span>
                                </div>
                                <div class="content-box-item dflex">
                                    <p>Lượt chạm:</p>
                                    <span><?php echo $getStatistic['tap_count'] ?> lượt</span>
                                </div>
                            </div>
                            <div class="content-box-list-item dflex">
                                <div class="content-box-item dflex">
                                    <p>Lưu danh bạ:</p>
                                    <span><?php echo $getStatistic['saved_contact'] ?> lượt</span>
                                </div>
                                <div class="content-box-item dflex">
                                    <p>Lượt click:</p>
                                    <span><?php echo $getStatistic['click_count'] ?> lượt</span>
                                </div>
                            </div>
                        </div>
                        <?php
                            }else{
                                ?>
                                <div class="statistical-info-content-box ">
                                    <div class="content-box-list-item dflex">
                                        <div class="content-box-item dflex">
                                            <p>Truy cập:</p>
                                            <span>0 lượt</span>
                                        </div>
                                        <div class="content-box-item dflex">
                                            <p>Lượt chạm:</p>
                                            <span>0 lượt</span>
                                        </div>
                                    </div>
                                    <div class="content-box-list-item dflex">
                                        <div class="content-box-item dflex">
                                            <p>Lưu danh bạ:</p>
                                            <span>0 lượt</span>
                                        </div>
                                        <div class="content-box-item dflex">
                                            <p>Lượt click:</p>
                                            <span>0 lượt</span>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                        <div class="statistical-info-btn">
                            <button id="load">Cập nhật</button>
                        </div>
                        <div class="statistical-info-content-analysis">
                            <h3>Phân tích theo trang</h3>
                            <?php
                                $sql_getSocial = mysqli_query($connect,"select card_social.link,socials.id,socials.icon as icon,card_social.position as position,socials.name as name,card_social.count from card_social inner join socials on socials.id = card_social.social_id where card_id = $card_id and status = 1 and card_social.position != 0 order by card_social.position asc");
                                if(mysqli_num_rows($sql_getSocial)>0){
                                    while($getSocial = mysqli_fetch_assoc($sql_getSocial)){;
                            ?>
                            <div class="analysis-item dflex">
                                <div class="analysis-item-img">
                                    <img src="../images/icons/<?php echo $getSocial['icon'] ?>" alt="">
                                </div>
                                <p style="text-transform: uppercase;"><?php echo $getSocial['name'] ?> CỦA TÔI</p>
                                <span><?php echo $getSocial['count']?> lượt</span>
                            </div>
                            <?php
                                }
                                }
                            ?>
                        </div>
                        </div>
                    </div>
                </div>
            <?php
            $sql_getURL = mysqli_query($connect,"select * from users where username = '$username'");
            $getURL = mysqli_fetch_assoc($sql_getURL);

            // Get base url
            $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != "off") ? "https" : "http");
            $base_url .= "://".$_SERVER['HTTP_HOST'];
            ?>
            <div class="statistical-footer">
                <p>Đường link của bạn: </p>
                <a href="<?php echo $base_url ?>/user/<?php echo $getURL['url'] ?>"><?php echo $base_url ?>/user/<?php echo $getURL['url'] ?></a>
                <button id="copy">Copy</button>
                <button id="showTrang">Xem Trang</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Foter -->

    <!-- End Foter -->
</div>
<!-- End Page Wrap -->
<!-- JS -->
<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/SmoothScroll.js"></script>
<script type="text/javascript" src="../js/jquery.scrollTo.min.js"></script>
<script type="text/javascript" src="../js/jquery.localScroll.min.js"></script>
<script type="text/javascript" src="../js/jquery.viewport.mini.js"></script>
<script type="text/javascript" src="../js/jquery.countTo.js"></script>
<script type="text/javascript" src="../js/jquery.appear.js"></script>
<script type="text/javascript" src="../js/jquery.sticky.js"></script>
<script type="text/javascript" src="../js/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="../js/jquery.fitvids.js"></script>
<script type="text/javascript" src="../js/owl.carousel.min.js"></script>
<script type="text/javascript" src="../js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="../js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="../js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="../js/gmap3.min.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script>
<script type="text/javascript" src="../js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="../js/jquery.simple-text-rotator.min.js"></script>
<script type="text/javascript" src="../js/all.js"></script>
<script type="text/javascript" src="../js/contact-form.js"></script>
<!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->
<script>
    $().ready(function() {
        var color_background = $('#background_color').val();
        var sample = $('#sample').val();
        var filter = $('#fillter').val();
        var name_image = $('#get_image_interface').val();

        console.log(color_background,sample,filter,name_image);

                if(color_background==1) {
                    $('.phone-info .overlay').css('background-color', '#C6C6C683');
                    $('.phone-info .overlay').css('opacity', '0.5');
                }else if(color_background==2) {
                    $('.phone-info .overlay').css('background-color', '#000000AD');
                    $('.phone-info .overlay').css('opacity', '0.5');
                }else if(color_background==3) {
                    $('.phone-info .overlay').css('background-color', '#F5982C86');
                    $('.phone-info .overlay').css('opacity', '0.5');
                }else if(color_background==4) {
                    $('.phone-info .overlay').css('background-color', '#E6F52C');
                    $('.phone-info .overlay').css('opacity', '0.5');
                }else if(color_background==5) {
                    $('.phone-info .overlay').css('background-color', '#AFF52C');
                    $('.phone-info .overlay').css('opacity', '0.5');
                }else if(color_background==6) {
                    $('.phone-info .overlay').css('background-color', '#FFEA74');
                    $('.phone-info .overlay').css('opacity', '0.5');
                }else if(color_background==7) {
                    $('.phone-info .overlay').css('background-color', '#7BFFD6');
                    $('.phone-info .overlay').css('opacity', '0.5');
                }else if(color_background==8) {
                    $('.phone-info .overlay').css('background-color', '#4CBF9B');
                    $('.phone-info .overlay').css('opacity', '0.5');
                }else if(color_background==9) {
                    $('.phone-info .overlay').css('background-color', '#3D38B7');
                    $('.phone-info .overlay').css('opacity', '0.5');
                }

                if(sample==1) {
                    $('.phone-main h2').css("color", "#fff");
                    $('.phone-main-img').css("border", "none");
                    $('.phone-main-link a').css("border-radius", "5rem");
                    $('.phone-main-link a').css("border", "2px solid #000");
                    $('.phone-main-link a').css("background-color", "#fff");
                    $('.phone-main-link a p').css("color", "#000");
                    $('.phone-main-row').hide();
                    $('.phone-main-link').show();
                }else if(sample==2) {
                    $('.phone-main h2').css("color", "#E2B45D");
                    $('.phone-main-img').css("border", "2px solid #E2B45D");
                    $('.phone-main-link a').css("border-radius", "0rem");
                    $('.phone-main-link a').css("border", "2px solid #E2B45D");
                    $('.phone-main-link a').css("background-color", "#000");
                    $('.phone-main-link a p').css("color", "#E2B45D");
                    $('.phone-main-row').hide();
                    $('.phone-main-link').show();
                }else if(sample==3) {
                    console.log('gg' + sample);
                    $('.phone-main-row').show();
                    $('.phone-main-link').hide();
                }



                if(filter==1) {
                    $('.phone-info .overlay').css('opacity', '0.3');
                }else if(filter==2) {
                    $('.phone-info .overlay').css('opacity', '0.5');
                } else if(filter==3) {
                    $('.phone-info .overlay').css('opacity', '0.7');
                }

        $('.phone-info').css('background-image',"url(../images/interfaces/"+name_image+")");
        $('.phone-main-row-item').css('background-image',"url(../images/interfaces/"+name_image+")");

        $('.user-login').click(function() {
            $('.modal-user').toggle();
        });
        $(".nav-logo-wrap i").click(function() {
            $(this).toggleClass('bgr-white');
            $('.user-login').toggleClass('bgr-white');
            $('.cart-white').toggle();
            $('.cart-black').toggleClass('dnone');
        });

        $('#showTrang').click(function(){
            window.location.href="user-trang-ca-nhan.php";
        });

        $('#load').click(function(){
           window.location.href = "user-thong-ke.php";
        });

        $('#copy').click(function(){
            var link = $(this).siblings('a').html();
            // Create a "hidden" input
            var aux = document.createElement("input");

            aux.setAttribute("value", link);
            // Append it to the body
            document.body.appendChild(aux);
            // Highlight its content
            aux.select();
            // Copy the highlighted text
            document.execCommand("copy");
            // Remove it from the body
            document.body.removeChild(aux);

            $('.modal-save').show();
            $('.modal').hide();
        });
    })
</script>
</body>
</html>
