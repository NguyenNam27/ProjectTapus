<?php
    require_once "../config.php";
    require_once "../updateProfile.php";
    $db = new Database();
    $connect = $db->getConnect();

if(isset($_GET['url'])){
    $url = $_GET['url'];

    $sql_getInfo = mysqli_query($connect,"select * from users where url = '$url'");
    if(mysqli_num_rows($sql_getInfo)>0) {
        $getInfo = mysqli_fetch_assoc($sql_getInfo);

        $username = $getInfo['username'];
        $edit = new UpdateProfile($getInfo['username']);
        $card_id = $edit->getCardId();
    }
}else{
    if (!isset($_SESSION['username'])) {
        echo "<script>window.location.replace('../index.php')</script>";
    } else {
        $username = $_SESSION['username'];
        $edit = new UpdateProfile($username);
        $card_id = $edit->getCardId();
    }
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
    <link rel="shortcut icon" href="../images/favicon.png">
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../images/apple-touch-icon-114x114.png">
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

        <?php
            $sql_idUser = mysqli_query($connect,"select * from users where username = '$username'");
            $getIdUser = mysqli_fetch_assoc($sql_idUser);
            $idUser = $getIdUser['id'];

            $sql_getProfile = mysqli_query($connect,"select * from cards where user_id = $idUser");
            if(mysqli_num_rows($sql_getProfile)>0){
            $getProfile = mysqli_fetch_assoc($sql_getProfile);
            $card_id = $getProfile['id'];
            $sql_getInterface = mysqli_query($connect,"select * from interface_options where card_id = $card_id");
            if(mysqli_num_rows($sql_getInterface)>0){
                $getInterface = mysqli_fetch_assoc($sql_getInterface);
        ?>
                <input type="hidden" id="background" value="<?php echo $getInterface['background'] ?>">
                <input type="hidden" id="sample" value="<?php echo $getInterface['sample'] ?>">
                <input type="hidden" id="image" value="<?php echo $getInterface['image'] ?>">
                <input type="hidden" id="filter" value="<?php echo $getInterface['filter'] ?>">
                <?php
            }
                ?>

                <?php
                $check_tap=1;
                if(isset($_GET['url'])){
                    if(isset($_SESSION['username'])){
                        $getUsernameTap = $_SESSION['username'];
                        if($username==$getUsernameTap){
                            $check_tap=0;
                        }else{
                            $check_tap=1;
                        }
                    }else{
                        $check_tap=1;
                    }
                }else{
                    $check_tap=0;
                }
                ?>
                <input type="hidden" value="<?php echo $check_tap ?>" class="check_tap">
                <?php
                    $check_access=1;
                if(isset($_GET['url'])){
                    if(isset($_SESSION['username'])){
                        $getUsernameTap = $_SESSION['username'];
                        if($username==$getUsernameTap){
                            $check_access=0;
                        }else{
                            $check_access=1;
                        }
                    }else{
                        $check_access=0;
                    }
                }else{
                    $check_access=0;
                }
                ?>
                <input type="hidden" value="<?php echo $check_access ?>" class="check_access">

        <div class="container-fluid ">
            <input type="hidden" value="<?php echo $card_id ?>" id="card_id">
            <div class="user-main">
                <div class="user-info">
                    <div class="user-info-img">
                        <img src="../images/uploads/<?php echo $getProfile['image'] ?>" alt="">
                    </div>
                    <h2><?php echo $getProfile['name'] ?></h2>
                    <p><?php echo $getProfile['regency'] ?></p>
                    <div class="user-info-intro">
                        <p><?php echo $getProfile['description'] ?></p>
                    </div>
                    <?php
                         $check=1;
                        if(isset($_SESSION['username'])){
                            if($username == $_SESSION['username']){
                    ?>
                                <input type="hidden" class="check" value="<?php echo $check ?>">
                    <div class="user-info-button">
                        <a href="user-chinh-sua.php">
                            <img src="../images/pen.png" alt="">
                            <p>Chỉnh sửa</p>
                        </a>
                        <a href="user-thong-ke.php">
                            <img src="../images/pen.png" alt="">
                            <p>Thống kê</p>
                        </a>
                    </div>
                    <?php
                            }
                            else{
                                $check=0;
                                ?>
                                <input type="hidden" class="check" value="<?php echo $check ?>">
                    <?php
                            }
                        }
                    ?>
                    <div class="user-info-link" style="display: none">
                        <?php
                        // get fb
                        $sql_getScocial = mysqli_query($connect,"select card_social.link,socials.id,socials.icon as icon,card_social.position as position,socials.name as name from card_social inner join socials on socials.id = card_social.social_id where card_id = $card_id and status = 1 and card_social.position != 0 order by card_social.position asc");
                        if(mysqli_num_rows($sql_getScocial)>0){

                            while($getSocial = mysqli_fetch_assoc($sql_getScocial)){
                                ?>
                                <div class="user-info-link-item">
                                    <input type="hidden" value="<?php echo $getSocial['id']?>" class="getID">
                                    <a href="<?php echo $getSocial['link'] ?>" class="link" target="_blank">
                                       <div class="user-info-link-item-img">
                                            <img src="../images/icons/<?php echo $getSocial['icon'] ?>" alt="">
                                       </div>
                                        <p><?php echo $getSocial['name'] ?></p>
                                    </a>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="user-main-row">
                        <div class="row">
                            <?php
                            $sql_getFourSocial = mysqli_query($connect,"select card_social.link,socials.id,socials.icon as icon,card_social.position as position,socials.name as name from card_social inner join socials on socials.id = card_social.social_id where card_id = $card_id and status = 1 and card_social.position != 0 order by card_social.position asc");
                            if(mysqli_num_rows($sql_getFourSocial)>0){
                                while($getFourSocial = mysqli_fetch_assoc($sql_getFourSocial)){
                                    ?>
                                        <div class="item">
                                    <input type="hidden" value="<?php echo $getFourSocial['id']?>" class="getID">
                                    <a href="<?php echo $getFourSocial['link'] ?>" target="_blank" class="col-md-6 col-sm-6 col-xs-6 link" data-pos-second="<?php echo $getFourSocial['position'] ?>">
                                        <div class="user-main-row-item">
                                            <p><?php echo $getFourSocial['name'] ?></p>
                                        </div>
                                    </a>
                                        </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-main-overlay"></div>
        </div>
        <?php
            }
        ?>
        <!-- Foter -->
        <footer class="page-section bg-gray-lighter footer ">
            <div class="footer-logo">
                <img src="../images/logo.png" alt="">
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
    <!--[if lt IE 10]><script type="text/javascript" src="../js/placeholder.js"></script><![endif]-->
    <script>
    $().ready(function() {

        var card_id_statistic = $('#card_id').val();
        var check_tap = $('.check_tap').val();
        var check_access = $('.check_access').val();

        if(check_tap==1){
            $.ajax({
                        url: 'StatisticController.php',
                        type: 'post',
                        data: {card_id_tap:card_id_statistic},
                        success: function(response){

                        },
                        error: function(response){

                        }
                    });
        }

        if(check_access==1){
            $.ajax({
                url: 'StatisticController.php',
                type: 'post',
                data: {card_id_access:card_id_statistic},
                success: function(response){

                },
                error: function(response){

                }
            });
        }



        var color_background = $('#background').val();
        var sample = $('#sample').val();
        var filter = $('#filter').val();
        var name_image = $('#image').val();

        console.log(color_background,sample,filter,name_image);

        if(color_background==1) {
            $('.user-main-overlay').css('background-color', '#C6C6C683');
            // $('.user-main').css('opacity', '0.5');
        }else if(color_background==2) {
            $('.user-main-overlay').css('background-color', '#000000AD');
            // $('.user-main').css('opacity', '0.5');
        }else if(color_background==3) {
            $('.user-main-overlay').css('background-color', '#F5982C86');
            // $('.user-main').css('opacity', '0.5');
        }else if(color_background==4) {
            $('.user-main-overlay').css('background-color', '#E6F52C');
            // $('.user-main').css('opacity', '0.5');
        }else if(color_background==5) {
            $('.user-main-overlay').css('background-color', '#AFF52C');
            // $('.user-main').css('opacity', '0.5');
        }else if(color_background==6) {
            $('.user-main-overlay').css('background-color', '#FFEA74');
            // $('.user-main').css('opacity', '0.5');
        }else if(color_background==7) {
            $('.user-main-overlay').css('background-color', '#7BFFD6');
            // $('.user-main').css('opacity', '0.5');
        }else if(color_background==8) {
            $('.user-main-overlay').css('background-color', '#4CBF9B');
            // $('.user-mainuser-main').css('opacity', '0.5');
        }else if(color_background==9) {
            $('.user-main-overlay').css('background-color', '#3D38B7');
            // $('.user-main').css('opacity', '0.5');
        }

        if(sample==1) {
            $('.user-info h2').css("color", "#fff");
            $('.user-info-img').css("border", "none");
            $('.user-info-link-item a').css("border-radius", "5rem");
            $('.user-info-link-item a').css("border", "2px solid #000");
            $('.user-info-link-item a').css("background-color", "#fff");
            $('.user-info-link-item a p').css("color", "#000");
            $('.user-main-row').hide();
            $('.user-info-link').show();
        }else if(sample==2) {
            $('.user-info h2').css("color", "#E2B45D");
            $('.user-info-img').css("border", "2px solid #E2B45D");
            $('.user-info-link-item a').css("border-radius", "0rem");
            $('.user-info-link-item a').css("border", "2px solid #E2B45D");
            $('.user-info-link-item a').css("background-color", "#000");
            $('.user-info-link-item a p').css("color", "#E2B45D");
            $('.user-main-row').hide();
            $('.user-info-link').show();
        }else if(sample==3) {
            $('.user-main-row').show();
            $('.user-info-link').hide();
        }else{
            $('.user-info h2').css("color", "#fff");
            $('.user-info-img').css("border", "none");
            $('.user-info-link-item a').css("border-radius", "5rem");
            $('.user-info-link-item a').css("border", "2px solid #000");
            $('.user-info-link-item a').css("background-color", "#fff");
            $('.user-info-link-item a p').css("color", "#000");
            $('.user-main-row').hide();
            $('.user-info-link').show();
        }

        if(filter==1) {
            $('.user-main-overlay').css('opacity', '0.3');
        }else if(filter==2) {
            $('.user-main-overlay').css('opacity', '0.5');
        } else if(filter==3) {
            $('.user-main-overlay').css('opacity', '0.7');
        }

            $('body').css('background-image',"url(../images/interfaces/"+name_image+")");


        $('.user-main-row-item').css('background-image',"url(../images/interfaces/"+name_image+")");

        $('.user-login').click(function() {
            $('.modal-user').toggle();
        });
        
        $(".nav-logo-wrap i").click(function() {
            $(this).toggleClass('bgr-white');
            $('.user-login').toggleClass('bgr-white');
            $('.cart-white').toggle();
            $('.cart-black').toggleClass('dnone');
        });

        $('.link').click(function(){
            // var check = $('.check').val();
           var social_id = $(this).siblings('.getID').val();
           var card_id = $('#card_id').val();


           if(check_tap==1){

               $.ajax({
                   url: 'StatisticController.php',
                   type: 'post',
                   data: {social_id:social_id,card_id:card_id},
                   success: function(response){

                   },
                   error: function(response){

                   }
               });
           }


        });
    })
    </script>
</body>

</html>