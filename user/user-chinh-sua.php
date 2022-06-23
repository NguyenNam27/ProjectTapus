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
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
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

        .thong-tin-avt-icon > input {
            display: none;
        }

        #post_icon_other {
            display: none;
        }

        #image_interface {
            display: none;
        }

        /*.hidden-social{*/
        /*    visibility: hidden;*/
        /*}*/


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
</div>
<!-- End Navigation panel -->

<div class="container-fluid p-16 bg-main">
    <div class="row  ">
        <?php
        $sql_getInformation = mysqli_query($connect, "select * from cards where id = $card_id");
        $getInformation = mysqli_fetch_assoc($sql_getInformation);
        ?>
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
                            $sql_getThreeSocial = mysqli_query($connect, "select card_social.link,socials.id,socials.icon as icon,card_social.position as position,socials.name as name from card_social inner join socials on socials.id = card_social.social_id where card_id = $card_id and status = 1 and card_social.position != 0 order by card_social.position asc");
                            if (mysqli_num_rows($sql_getThreeSocial) > 0) {
                                while ($getThreeSocial = mysqli_fetch_assoc($sql_getThreeSocial)) {
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
                        <!--                                <a href="#">-->
                        <!--                                    <img src="../images/instagram.png" alt="">-->
                        <!--                                    <p>INSTAGRAM</p>-->
                        <!--                                </a>-->
                        <!--                                <a href="#">-->
                        <!--                                    <img src="../images/Image 18.png" alt="">-->
                        <!--                                    <p>INDERLINK</p>-->
                        <!--                                </a>-->


                        <div class=" phone-main-row">
                            <div class="row">
                                <?php
                                $sql_getFourSocial = mysqli_query($connect, "select card_social.link,socials.id,socials.icon as icon,card_social.position as position,socials.name as name from card_social inner join socials on socials.id = card_social.social_id where card_id = $card_id and status = 1 and card_social.position != 0 order by card_social.position asc");
                                if (mysqli_num_rows($sql_getFourSocial) > 0) {
                                    while ($getFourSocial = mysqli_fetch_assoc($sql_getFourSocial)) {
                                        ?>
                                        <div class="col-md-6 col-sm-6 col-xs-6"
                                             data-pos-second="<?php echo $getFourSocial['position'] ?>">
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
                <div class="statistical-info-header dflex">
                    <div class="statistical-info-item statistical-item1">
                        <p>Thông tin</p>
                        <div class="active"></div>
                    </div>
                    <div class="statistical-info-item statistical-item2">
                        <p>Quản lý thông tin</p>
                    </div>
                    <div class="statistical-info-item statistical-item3">
                        <p>Tuỳ chọn giao diện</p>
                    </div>
                </div>
            </div>
            <div class="statistical-info-thong-tin">
                <?php
                $infor_card = $edit->ShowInformation_Card();
                ?>
                <div class="thong-tin-avt">
                    <img src="../images/uploads/<?php echo $infor_card['image'] ?>" id="img_card" alt="">
                    <div class="thong-tin-avt-icon">
                        <label for="image">
                            <img src="../images/camera.png" alt="">
                        </label>
                        <input id="image" type="file" value="<?php echo $infor_card['image'] ?>"/>
                        <input type="hidden" id="img_hidden" value="<?php echo $infor_card['image'] ?>">
                        <input type="hidden" id="img_hidden_next">
                    </div>
                </div>

                <form action=""
                ">
                <label for="">Tên</label>
                <input type="text" name="name" id="name" value="<?php echo $infor_card['name'] ?>">
                <label for="">Chức vụ</label>
                <input type="text" name="regency" id="regency" value="<?php echo $infor_card['regency'] ?>">
                <label for="">Giới thiệu</label>
                <textarea name="description" cols="30" id="description"
                          rows="10"><?php echo $infor_card['description'] ?></textarea>
                </form>
                <div class="btn-save">
                    <button id="saveInfo">Lưu</button>
                </div>

            </div>
            <!--       Quản lý thông tin         -->
            <div class="statistical-info-quan-ly">
                <button class="btn-add">Thêm thông tin</button>
                <div class="quan-ly-info-list-item">
                    <?php
                    $sql_list_SocialCard = mysqli_query($connect, "select card_social.link,socials.id,socials.icon as icon,card_social.position as position,socials.name as name from card_social inner join socials on socials.id = card_social.social_id where card_id = $card_id and status = 1 and card_social.position != 0 order by card_social.position asc");
                    if (mysqli_num_rows($sql_list_SocialCard) > 0) {
                        while ($list_SocialCard = mysqli_fetch_assoc($sql_list_SocialCard)) {
                            ?>
                            <div class="quan-ly-info-item" data-id="<?php echo $list_SocialCard['position'] ?>">
                                <div class="item-main">
                                    <div class="item-main-img">
                                        <img src="../images/icons/<?php echo $list_SocialCard['icon'] ?>" alt="">
                                    </div>
                                    <p style="text-transform: uppercase; !important;"><?php echo $list_SocialCard['name'] ?>
                                        CỦA TÔI</p>
                                    <div class="item-main-icon">
                                        <div class="up">
                                            <i class="fas fa-chevron-up"></i>
                                        </div>
                                        <div class="down">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-icon">
                                    <input type="hidden" class="id_soc"
                                           value="<?php echo $list_SocialCard['id'] ?>">
                                    <div class="insert">
                                        <img src="../images/pen.png" alt="">
                                    </div>
                                    <div class="delete">
                                        <img src="../images/delete.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <!--    Hết Quản lý thông tin         -->

            <!--      Giao diện          -->
            <?php
            $sql_getInterface = mysqli_query($connect, "select * from interface_options where card_id=$card_id");
            if (mysqli_num_rows($sql_getInterface) > 0) {
                $getInterface = mysqli_fetch_assoc($sql_getInterface);
                ?>
                <div class="statistical-info-giao-dien">
                    <div class="giao-dien-color">
                        <p class="statistical-giao-dien-title">Màu nền</p>
                        <div class="list-color">
                            <input type="hidden" id="background_color"
                                   value="<?php echo $getInterface['background']; ?>">
                            <div class="item-color color1 ">
                                <div class="color" data-id="1"></div>
                            </div>
                            <div class="item-color color2">
                                <div class="color" data-id="2"></div>
                            </div>
                            <div class="item-color color3">
                                <div class="color" data-id="3"></div>
                            </div>
                            <div class="item-color color4">
                                <div class="color " data-id="4"></div>
                            </div>
                            <div class="item-color color5 ">
                                <div class="color " data-id="5"></div>
                            </div>
                            <div class="item-color color6 ">
                                <div class=" color " data-id="6"></div>
                            </div>
                            <div class="item-color color7 ">
                                <div class="color " data-id="7"></div>
                            </div>
                            <div class="item-color color8">
                                <div class="color " data-id="8"></div>
                            </div>
                            <div class="item-color color9">
                                <div class="color " data-id="9"></div>
                            </div>
                        </div>
                    </div>
                    <div class="giao-dien-content">
                        <div class="content-background">
                            <p class="statistical-giao-dien-title">Ảnh nền</p>
                            <div class="content-background-img">
                                <img id="img_background"
                                     src="../images/interfaces/<?php echo $getInterface['image']; ?>" alt="">
                                <input type="file" id="image_interface" value="">
                                <input type="hidden" id="get_image_interface"
                                       value="<?php echo $getInterface['image']; ?>">
                            </div>
                            <div class="content-background-btn">
                                <button id="change_imageInterface">Thay ảnh</button>
                                <button id="delete_background">Xóa</button>
                            </div>
                        </div>
                        <div class="content-intro">
                            <div class="content-intro-sample">
                                <p class="statistical-giao-dien-title">Mẫu</p>
                                <div class="content-sample-list-item">
                                    <input type="hidden" id="sample" value="<?php echo $getInterface['sample']; ?>">
                                    <div class="content-sample-item item1">
                                        <div class="sample-item " data-id="1"></div>
                                    </div>
                                    <div class="content-sample-item item2 ">
                                        <div class="sample-item " data-id="2"></div>
                                    </div>
                                    <div class="content-sample-item item3 ">
                                        <div class="sample-item " data-id="3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-intro-fillter">
                                <p class="statistical-giao-dien-title">Lọc màu nền</p>
                                <div class="content-fillter list-item">
                                    <input type="hidden" id="fillter" value="<?php echo $getInterface['filter'] ?>">
                                    <div class="fillter-item" data-id="1">
                                        <div class="fillter-item-color">
                                            <div class="fillter-color fillter-color1"></div>
                                        </div>
                                        <p>Sáng</p>
                                    </div>
                                    <div class="fillter-item" data-id="2">
                                        <div class="fillter-item-color ">
                                            <div class="fillter-color fillter-color2"></div>
                                        </div>
                                        <p>Trung bình</p>
                                    </div>
                                    <div class="fillter-item" data-id="3">
                                        <div class="fillter-item-color ">
                                            <div class="fillter-color fillter-color3"></div>
                                        </div>
                                        <p>Tối</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-save w-95">
                        <button id="save_interface">Lưu</button>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="statistical-info-giao-dien">
                    <div class="giao-dien-color">
                        <p class="statistical-giao-dien-title">Màu nền</p>
                        <div class="list-color">
                            <input type="hidden" id="background_color"
                                   value="">
                            <div class="item-color color1 ">
                                <div class="color" data-id="1"></div>
                            </div>
                            <div class="item-color color2">
                                <div class="color" data-id="2"></div>
                            </div>
                            <div class="item-color color3">
                                <div class="color" data-id="3"></div>
                            </div>
                            <div class="item-color color4">
                                <div class="color " data-id="4"></div>
                            </div>
                            <div class="item-color color5 ">
                                <div class="color " data-id="5"></div>
                            </div>
                            <div class="item-color color6 ">
                                <div class=" color " data-id="6"></div>
                            </div>
                            <div class="item-color color7 ">
                                <div class="color " data-id="7"></div>
                            </div>
                            <div class="item-color color8">
                                <div class="color " data-id="8"></div>
                            </div>
                            <div class="item-color color9">
                                <div class="color " data-id="9"></div>
                            </div>
                        </div>
                    </div>
                    <div class="giao-dien-content">
                        <div class="content-background">
                            <p class="statistical-giao-dien-title">Ảnh nền</p>
                            <div class="content-background-img">
                                <img id="img_background"
                                     src="" alt="">
                                <input type="file" id="image_interface" value="">
                                <input type="hidden" id="get_image_interface"
                                       value="">
                            </div>
                            <div class="content-background-btn">
                                <button id="change_imageInterface">Thay ảnh</button>
                                <button id="delete_background">Xóa</button>
                            </div>
                        </div>
                        <div class="content-intro">
                            <div class="content-intro-sample">
                                <p class="statistical-giao-dien-title">Mẫu</p>
                                <div class="content-sample-list-item">
                                    <input type="hidden" id="sample" value="">
                                    <div class="content-sample-item item1">
                                        <div class="sample-item " data-id="1"></div>
                                    </div>
                                    <div class="content-sample-item item2 ">
                                        <div class="sample-item " data-id="2"></div>
                                    </div>
                                    <div class="content-sample-item item3 ">
                                        <div class="sample-item " data-id="3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-intro-fillter">
                                <p class="statistical-giao-dien-title">Lọc màu nền</p>
                                <div class="content-fillter list-item">
                                    <input type="hidden" id="fillter" value="">
                                    <div class="fillter-item" data-id="1">
                                        <div class="fillter-item-color">
                                            <div class="fillter-color fillter-color1"></div>
                                        </div>
                                        <p>Sáng</p>
                                    </div>
                                    <div class="fillter-item" data-id="2">
                                        <div class="fillter-item-color ">
                                            <div class="fillter-color fillter-color2"></div>
                                        </div>
                                        <p>Trung bình</p>
                                    </div>
                                    <div class="fillter-item" data-id="3">
                                        <div class="fillter-item-color ">
                                            <div class="fillter-color fillter-color3"></div>
                                        </div>
                                        <p>Tối</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-save w-95">
                        <button id="save_interface">Lưu</button>
                    </div>
                </div>
                <?php
            }
            ?>
            <!--      Hết giao diện          -->

            <?php
            $sql_getURL = mysqli_query($connect, "select * from users where username = '$username'");
            $getURL = mysqli_fetch_assoc($sql_getURL);

            // Get base url
            $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != "off") ? "https" : "http");
            $base_url .= "://" . $_SERVER['HTTP_HOST'];
            ?>
            <div class="statistical-footer">
                <p>Đường link của bạn: </p>
                <a href="<?php echo $base_url ?>/DevSoft-TapUs/user/<?php echo $getURL['url'] ?>"><?php echo $base_url ?>
                    /user/<?php echo $getURL['url'] ?></a>
                <button id="copy">Copy</button>
                <button id="showTrang">Xem Trang</button>
            </div>
        </div>
    </div>

    <!--   Save     -->
    <div class="modal-save ">
        <div class="show-message">
            <img src="../images/checked.svg" alt="">
            <h2>ĐÃ LƯU THÔNG TIN</h2>
        </div>
    </div>
    <!--   End Save     -->

    <div class="modal modal-add">
        <div class="overlay"></div>
        <div class="add-main modal-add-main">
            <h2>Thêm đường link</h2>
            <div class="choose choose-account">
                <p>Chọn tài khoản</p>
                <i class="fas fa-chevron-down"></i>
            </div>
            <input type="text" placeholder="Nhập đường link">
            <div class="btn-save w-95">
                <button id="save_account">Lưu</button>
            </div>
        </div>
    </div>


    <!--    Modal choose option main    -->
    <div class="modal modal-choose modal-choose-main">
        <div class="overlay"></div>
        <div class="add-main">
            <div class="add-list-item">
                <div class="choose choose-item phone">
                    <p>Số điện thoại</p>
                </div>
                <div class="choose choose-item email">
                    <p>Email</p>
                </div>
                <div class="choose choose-item bank">
                    <p>Tài khoản ngân hàng</p>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="list-Social">
                    <?php
                    $list_id_default = [];
                    $sql_getSocials = mysqli_query($connect, "select * from socials where position <> 0 order by position asc");
                    while ($getSocials = mysqli_fetch_assoc($sql_getSocials)) {
                        $idSocials = $getSocials['id'];
                        $list_id_default[] = $idSocials;
                        $sql_getCardSocials = $edit->getInfoCardSocials($idSocials);
                        ?>
                        <div class="choose choose-item show" data-id="<?php echo $idSocials ?>">
                            <img class="img_icon_social" src="../images/icons/<?php echo $getSocials['icon'] ?>"
                                 alt="">
                            <p><?php echo $getSocials['name'] ?></p>
                            <!--                                <input type="hidden" id="getIdSocial_-->
                            <?php //echo $getSocials['id']
                            ?><!--" value="--><?php //echo $getSocials['id']
                            ?><!--">-->
                            <input type="hidden" id="get_nameSocial_<?php echo $idSocials ?>"
                                   value="<?php echo $getSocials['name'] ?>">
                            <input type="hidden" id="get_iconSocial_<?php echo $idSocials ?>"
                                   value="<?php echo $getSocials['icon'] ?>">
                            <?php
                            if ($sql_getCardSocials != null) {
                                $getCardSocials = mysqli_fetch_assoc($sql_getCardSocials);
                                ?>
                                <input type="hidden" id="get_link_<?php echo $idSocials ?>"
                                       value="<?php echo $getCardSocials['link'] ?>">
                                <?php
                            } else {
                                ?>
                                <input type="hidden" id="get_link_<?php echo $idSocials ?>"
                                       value="<?php echo "" ?>">
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>

                    <?php
                    $list = implode(',', $list_id_default);
                    $sql_get_get_otherSocial = (mysqli_query($connect, "select socials.id as id,socials.name as name,socials.icon as icon,card_social.link as link from card_social inner join socials on socials.id = card_social.social_id where card_social.card_id = $card_id and card_social.social_id not in (" . implode(',', $list_id_default) . ")"));
                    //                            print_r(mysqli_num_rows($sql_get_get_otherSocial));
                    if (mysqli_num_rows($sql_get_get_otherSocial) > 0) {
                        while ($list_social_other = mysqli_fetch_assoc($sql_get_get_otherSocial)) {
                            ?>
                            <div class="choose choose-item show" data-id="<?php echo $list_social_other['id'] ?>">
                                <img class="img_icon_social"
                                     src="../images/icons/<?php echo $list_social_other['icon'] ?>" alt="">
                                <p><?php echo $list_social_other['name'] ?></p>
                                <input type="hidden" class="nameSocial"
                                       id="get_nameSocial_<?php echo $list_social_other['id'] ?>"
                                       value="<?php echo $list_social_other['name'] ?>">
                                <input type="hidden" class="iconSocial"
                                       id="get_iconSocial_<?php echo $list_social_other['id'] ?>"
                                       value="<?php echo $list_social_other['icon'] ?>">
                                <input type="hidden" class="linkSocial"
                                       id="get_link_<?php echo $list_social_other['id'] ?>"
                                       value="<?php echo $list_social_other['link'] ?>">
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="choose choose-item link-diff">
                    <p>Đường link khác</p>
                </div>
                <div class="choose choose-item khach-hang">
                    <p>Xin thông tin khách hàng</p>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </div>
    </div>
    <!--  End  Modal choose option main    -->


    <!--   Modal choose Banks     -->
    <div class="modal modal-choose modal-choose-bank">
        <div class="overlay"></div>
        <div class="add-main">
            <div class="add-list-item">
                <div class="choose choose-item ">
                    <p>Tài khoản ngân hàng</p>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <?php
                $get_banks = mysqli_query($connect, "select * from banks");
                while ($show_banks = mysqli_fetch_assoc($get_banks)) {
                    $sql_getInfoCardBank = $edit->getInfoCardBanks($show_banks['id']);
                    if ($sql_getInfoCardBank != null) {
                        $getInfoCardBank = mysqli_fetch_assoc($sql_getInfoCardBank);
                        ?>
                        <div class="choose choose-item " data-id="<?php echo $show_banks['id'] ?>"
                             data-value="<?php echo $show_banks['name'] ?>">
                            <img src="../images/iconBanks/<?php echo $show_banks['icon'] ?>" alt="">
                            <p><?php echo $show_banks['name'] ?></p>
                            <input type="hidden" id="get_holder_<?php echo $show_banks['id'] ?>"
                                   value="<?php echo $getInfoCardBank['acc_holder']; ?>">
                            <input type="hidden" id="get_num_<?php echo $show_banks['id'] ?>"
                                   value="<?php echo $getInfoCardBank['acc_number']; ?>">
                        </div>
                        <?php
                    } else {

                        ?>
                        <div class="choose choose-item " data-id="<?php echo $show_banks['id'] ?>"
                             data-value="<?php echo $show_banks['name'] ?>">
                            <img src="../images/iconBanks/<?php echo $show_banks['icon'] ?>" alt="">
                            <p><?php echo $show_banks['name'] ?></p>
                            <input type="hidden" id="get_holder_<?php echo $show_banks['id'] ?>"
                                   value="<?php echo ""; ?>">
                            <input type="hidden" id="get_num_<?php echo $show_banks['id'] ?>"
                                   value="<?php echo ""; ?>">
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!--   End Modal choose Banks     -->

    <!--  Modal Phone      -->
    <div class="modal modal-phone">
        <div class="overlay"></div>
        <div class="add-main modal-add-main">
            <h2>Thêm đường link</h2>
            <div class="choose choose-account">
                <p>Số điện thoại</p>
            </div>
            <input id="phone" type="text" placeholder="Nhập số điện thoại"
                   value="<?php echo $infor_card['phone'] ?>">
            <div class="btn-save w-95">
                <button id="savePhone">Lưu</button>
            </div>
        </div>

    </div>
    <!--  End Modal Phone      -->

    <!--   Modal Email     -->
    <div class="modal modal-email">
        <div class="overlay"></div>
        <div class="add-main modal-add-main">
            <h2>Thêm đường link</h2>
            <div class="choose choose-account">
                <p>Email</p>
            </div>
            <input type="text" placeholder="Nhập email" id="email" value="<?php echo $infor_card['email'] ?>">
            <div class="btn-save w-95">
                <button id="saveEmail">Lưu</button>
            </div>
        </div>

    </div>
    <!--        End Modal Email-->

    <!--    Modal Banks    -->
    <div class="modal modal-bank">
        <div class="overlay"></div>
        <div class="add-main modal-add-main">
            <h2>Thêm đường link</h2>
            <div class="choose choose-account">
                <p id="show_name">Tên ngân hàng</p>
                <i class="fas fa-chevron-down"></i>
            </div>
            <input type="text" id="acc_holder" placeholder="Chủ tài khoản">
            <input type="text" id="acc_num" placeholder="Số tài khoản">
            <input type="hidden" id="id_bank">
            <div class="btn-save w-95">
                <button id="save_banks">Lưu</button>
            </div>
        </div>
    </div>
    <!--   End Modal Banks    -->

    <!--     Modal link Social       -->
    <div class="modal modal-link">
        <div class="overlay"></div>
        <div class="add-main modal-add-main">
            <h2>Thêm đường link</h2>
            <div class="choose choose-account">
                <img id="icon_social" src="" alt="">
                <p id="social_name"></p>
            </div>
            <input id="link_social" type="text" placeholder="Nhập đường dẫn">
            <input id="social_id" type="hidden">
            <div class="btn-save w-95">
                <button id="save_link">Lưu</button>
            </div>
        </div>

    </div>
    <!--    End Modal Social        -->

    <!--     Other Social Links       -->
    <div class="modal modal-link-diff">
        <div class="overlay"></div>
        <div class="add-main diff-link ">
            <div class="model-left">
                <input type="text" class="name_other_social" placeholder="Nhập miêu tả">
                <input type="text" class="link_other_social" placeholder="Nhập đường link">
                <p>Thêm biểu tượng</p>
                <div class="link-diff-picture">
                    <button id="open_file_other">Thêm ảnh</button>
                    <input type="file" id="post_icon_other">
                    <div class="show_demo_icon-img">
                        <img src="" alt="" class="show_demo_icon">
                    </div>
                    <!--                            <input type="radio">-->
                </div>
                <div class="btn-save ">
                    <button id="save_other_link">Lưu</button>
                </div>
            </div>
            <div class="model-right">
                <h2>Demo</h2>
                <div class="model-right-demo">
                    <div class="model-right-demo-img">
                        <img id="icon_demo" src="" alt="">
                    </div>
                    <p id="name_demo"></p>
                </div>
            </div>
        </div>
    </div>
    <!--    End Other Social Links       -->

    <!--   Info khách hàng      -->
    <div class="modal modal-info-khach-hang">
        <div class="overlay"></div>
        <div class="add-main ">
            <div class="choose choose-item choose-khach-hang">
                <p>Xin thông tin khách hàng</p>
                <i class="fas fa-chevron-down"></i>
            </div>

            <div class="info-khach-hang">
                <?php
                $sql_getMore = mysqli_query($connect, "select * from more_info where card_id = $card_id order by position");
                if (mysqli_num_rows($sql_getMore) > 0) {
                    while ($getMore = mysqli_fetch_assoc($sql_getMore)) {
                        ?>
                        <div class="info-khach-hang-title">
                            <div class="title-icon">
                                <h3>Thông tin <span class="position"><?php echo $getMore['position'] ?></span>:</h3>
                                <div class="khach-hang-icon">
                                    <img src="../images/delete.png" alt="">
                                </div>
                            </div>
                            <input type="text" value="<?php echo $getMore['info']; ?>" class="more_info">
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <h3 class="add-info-khach-hang">Thêm thông tin</h3>
            <div class="btn-save ">
                <button id="save_khachhang">Lưu</button>
            </div>
        </div>

    </div>
    <!--   End     -->
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>-->
<!--[if lt IE 10]>
<script type="text/javascript" src="../js/placeholder.js"></script><![endif]-->
<script>
    $().ready(function () {
        var color_background = $('#background_color').val();
        var sample = $('#sample').val();
        var filter = $('#fillter').val();
        var name_image = $('#get_image_interface').val();

        $('.color').each(function () {
            var each_colorBackground = $(this).attr('data-id');
            if (color_background == each_colorBackground) {
                $(this).parent().addClass('border1');
                // $(this).click();
                if (color_background == 1) {
                    $('.phone-info .overlay').css('background-color', '#C6C6C683');
                    // $('.phone-info .overlay').css('opacity', '0.3');
                } else if (color_background == 2) {
                    $('.phone-info .overlay').css('background-color', '#000000AD');
                    // $('.phone-info .overlay').css('opacity', '0.3');
                } else if (color_background == 3) {
                    $('.phone-info .overlay').css('background-color', '#F5982C86');
                    // $('.phone-info .overlay').css('opacity', '0.3');
                } else if (color_background == 4) {
                    $('.phone-info .overlay').css('background-color', '#E6F52C');
                    // $('.phone-info .overlay').css('opacity', '0.3');
                } else if (color_background == 5) {
                    $('.phone-info .overlay').css('background-color', '#AFF52C');
                    // $('.phone-info .overlay').css('opacity', '0.3');
                } else if (color_background == 6) {
                    $('.phone-info .overlay').css('background-color', '#FFEA74');
                    // $('.phone-info .overlay').css('opacity', '0.3');
                } else if (color_background == 7) {
                    $('.phone-info .overlay').css('background-color', '#7BFFD6');
                    // $('.phone-info .overlay').css('opacity', '0.3');
                } else if (color_background == 8) {
                    $('.phone-info .overlay').css('background-color', '#4CBF9B');
                    // $('.phone-info .overlay').css('opacity', '0.3');
                } else if (color_background == 9) {
                    $('.phone-info .overlay').css('background-color', '#3D38B7');
                    // $('.phone-info .overlay').css('opacity', '0.3');
                }

                return false;
            }
        });

        $('.sample-item').each(function () {
            var each_Sample = $(this).attr('data-id');
            if (each_Sample == sample) {
                $(this).parent().addClass('border2');
                // $(this).click();
                console.log('Sample' + sample);
                if (sample == 1) {
                    console.log('gg' + sample);
                    $('.phone-main h2').css("color", "#fff");
                    $('.phone-main-img').css("border", "none");
                    $('.phone-main-link a').css("border-radius", "5rem");
                    $('.phone-main-link a').css("border", "2px solid #000");
                    $('.phone-main-link a').css("background-color", "#fff");
                    $('.phone-main-link a p').css("color", "#000");
                    $('.phone-main-row').hide();
                    $('.phone-main-link').show();
                } else if (sample == 2) {
                    console.log('gg' + sample);
                    $('.phone-main h2').css("color", "#E2B45D");
                    $('.phone-main-img').css("border", "2px solid #E2B45D");
                    $('.phone-main-link a').css("border-radius", "0rem");
                    $('.phone-main-link a').css("border", "2px solid #E2B45D");
                    $('.phone-main-link a').css("background-color", "#000");
                    $('.phone-main-link a p').css("color", "#E2B45D");
                    $('.phone-main-row').hide();
                    $('.phone-main-link').show();
                } else if (sample == 3) {
                    console.log('gg' + sample);
                    $('.phone-main-row').show();
                    $('.phone-main-link').hide();
                }

                return false;
            }
        });

        $('.fillter-item').each(function () {
            if ($(this).attr('data-id') == filter) {
                $(this).children('.fillter-item-color').addClass('border1');
                // $(this).children('.fillter-item-color').children('.fillter-color').click();
                if (filter == 1) {
                    $('.phone-info .overlay').css('opacity', '0.3');
                } else if (filter == 2) {
                    $('.phone-info .overlay').css('opacity', '0.5');
                } else if (filter == 3) {
                    $('.phone-info .overlay').css('opacity', '0.7');
                }

                return false;
            }
        });

        $('.phone-info').css('background-image', "url(../images/interfaces/" + name_image + ")");
        $('.phone-main-row-item').css('background-image', "url(../images/interfaces/" + name_image + ")");
        /*
            Xử lý checked interface
     */

        /*
        Giao diện trên thay đổi
         */
        $('#name').keyup(function () {
            $('#name_phone').html($(this).val());
        });
        $('#regency').keyup(function () {
            $('#regency_phone').html($(this).val());
        });
        $('#description').keyup(function () {
            $('#description_phone').html($(this).val());
        });
        /*
           Đọc file ảnh gán giá trị ra thẻ img
        */
        $('#image').change(function () {
            var test_value = $("#image").val();
            console.log(test_value);
            var extension = test_value.split('.').pop().toLowerCase();
            if (test_value != "") {
                if ($.inArray(extension, ['png', 'gif', 'jpeg', 'jpg']) == -1) {
                    Swal.fire(
                        'Lỗi?',
                        'Ảnh không hợp lệ? Vui lòng upload lại ảnh',
                        'error'
                    )
                    return false;
                } else {
                    var file = $('#image').prop('files')[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function () {
                            $('#img_card').attr('src', reader.result);
                            $('#image_phone').attr('src', reader.result);
                            // $('#img_hidden_next').val(reader.result);
                        }
                        reader.readAsDataURL(file);
                    }
                }
            } else {
                var hidden = $('#img_hidden').val();
                $('#img_card').attr('src', '../images/uploads/' + hidden);
                $('#image_phone').attr('src', '../images/uploads/' + hidden);
            }


        });


        $('.user-login').click(function () {
            $('.modal-user').toggle();
        });


        $(".nav-logo-wrap i").click(function () {
            $(this).toggleClass('bgr-white');
            $('.user-login').toggleClass('bgr-white');
            $('.cart-white').toggle();
            $('.cart-black').toggleClass('dnone');
        });

        $('.statistical-info-item').click(function () {
            $('.active').hide();
            $(this).append('<div class="active"></div>');
        })
        $('.statistical-item1').click(function () {
            $('.statistical-info-thong-tin').show();
            $('.statistical-info-quan-ly').hide();
            $('.statistical-info-giao-dien').hide();

        });
        $('.statistical-item2').click(function () {
            $('.statistical-info-thong-tin').hide();
            $('.statistical-info-quan-ly ').show();
            $('.statistical-info-giao-dien').hide();

        });
        $('.statistical-item3').click(function () {


            $('.statistical-info-thong-tin').hide();
            $('.statistical-info-quan-ly ').hide();
            $('.statistical-info-giao-dien').show();
        });

        $('.item-color').click(function () {
            $('.item-color').removeClass('border1');
            $(this).addClass('border1');
        })
        $('.content-sample-item').click(function () {
            $('.content-sample-item').removeClass('border2');
            $(this).addClass('border2');
        });
        $('.fillter-item-color').click(function () {
            $('.fillter-item-color').removeClass('border1');
            $(this).addClass('border1');
        });
        // $('.btn-save').click(function() {
        //     $('.modal-save').show();
        //     $('.modal').hide();
        // });
        $('.modal-save').click(function () {
            $(this).hide();
        });

        $('.btn-add').click(function () {
            $('.modal-add').show();
        });
        $('.overlay').click(function () {
            $('.modal').hide();
        });


        $('.choose-account').click(function () {
            $('.modal-choose-main').show();
            $('.modal-add').hide();
        });

        /*
            Open phone modal
         */
        $('.phone').click(function () {
            $('.modal-phone').show();
        });

        /*
            Open modal email
         */
        $('.email').click(function () {
            $('.modal-email').show();
        });

        /*
            OPEN LIST BANKS
         */
        $('.bank').click(function () {
            $('.modal-choose-bank').show();
            $('.modal-choose-main').hide();
        });

        /*
              truyền các value liên quan đến banks
         */
        $('.modal-choose-bank  .choose-item').click(function () {
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-value');
            var acc_holder = $('#get_holder_' + id).val();
            var acc_num = $('#get_num_' + id).val();


            $('#show_name').html(name);
            $('#id_bank').val(id);
            $('#acc_holder').val(acc_holder);
            $('#acc_num').val(acc_num);

            $('.modal-bank').show();
            $('.modal-choose-bank').hide();
        });

        /*
            Chỉnh sửa social hiển thị
         */
        $(document).on('click', '.insert', function () {
            var id = $(this).siblings().siblings().val();
            // console.log(id);
            var name = $('#get_nameSocial_' + id).val();
            var link = $('#get_link_' + id).val();
            var icon = $('#get_iconSocial_' + id).val();

            $('#social_id').val(id);
            $('#link_social').val(link);
            $('#social_name').html(name);
            $('#icon_social').attr('src', '../images/icons/' + icon);
            $('.modal-link').show();

            // console.log($('.insert').parent().siblings());
        });


        /*
            Mở nhập social khác
         */
        $('.link-diff').click(function () {
            $('.modal-link-diff').show();
            $('.modal-choose-main').hide();
        });

        /*
            Save info cá nhân
         */
        $('#saveInfo').click(function () {
            var image = $('#img_hidden').val();
            var file_data = $('#image').prop('files')[0];
            var name = $('#name').val();
            var regency = $('#regency').val();
            var description = $('#description').val();
            if (file_data != null) {
                var form_data = new FormData();
                form_data.append('file', file_data);
                $.ajax({
                    url: 'editCard.php', // <-- point to server-side PHP script
                    dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    beforeSend: function (xhr) {
                        $('.page-loader').css('display', '');
                        $('.page-loader .loader').css('display', '');
                    },
                    complete: function (xhr) {
                        $('.page-loader').css('display', 'none');
                        $('.page-loader .loader').css('display', 'none');
                    },
                    success: function (xhr) {
                        $.post("editCard.php", {
                            name: name,
                            regency: regency,
                            description: description
                        }, function () {
                            $('.modal-save').show();
                            $('.modal').hide();
                            // $('#img_card').attr('src','../images/'+image);
                        });
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });
            } else {
                // $.post("editCard.php", {
                //     name: name,
                //     regency: regency,
                //     description: description,
                //     image: image
                // }, function () {
                //     $('.modal-save').show();
                //     $('.modal').hide();
                // });
                $.ajax({
                    url: 'editCard.php', // <-- point to server-side PHP script
                    dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                    data: {name: name, regency: regency, description: description, image: image},
                    type: 'post',
                    beforeSend: function (xhr) {
                        $('.page-loader').css('display', '');
                        $('.page-loader .loader').css('display', '');
                    },
                    complete: function (xhr) {
                        $('.page-loader').css('display', 'none');
                        $('.page-loader .loader').css('display', 'none');
                    },
                    success: function (xhr) {
                        $('.modal-save').show();
                        $('.modal').hide();
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });
            }
            // var image = $('#image').val().split('\\').pop();
            // if(image==''){
            //     image = $('#img_hidden').val();
            // }
            //    console.log(image);
            //     alert(form_data);

            // window.location.href = "./user-chinh-sua.php";
        });

        /*
      Save interface
      */
        $('#save_interface').click(function () {
            var background = $('.list-color').children('.border1').children('.color').attr('data-id');
            var sample = $('.content-sample-list-item').children('.border2').children('.sample-item').attr('data-id');
            var filter = $('.fillter-item').children('.border1').parent().attr('data-id');
            var image = $('#image_interface').prop('files')[0];

            if (image != null || image != "") {
                if (background == null) {
                    background = -1;
                }
                if (sample == null) {
                    sample = -1;
                }
                if (filter == null) {
                    filter = -1;
                }
                var form_data = new FormData();
                form_data.append('image_background', image);
                form_data.append('background', background);
                form_data.append('sample', sample);
                form_data.append('filter', filter);

                $.ajax({
                    type: 'post',
                    url: 'editCard.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function (xhr) {
                        $('.page-loader').css('display', '');
                        $('.page-loader .loader').css('display', '');
                    },
                    complete: function (xhr) {
                        $('.page-loader').css('display', 'none');
                        $('.page-loader .loader').css('display', 'none');
                    },
                    success: function (response) {
                        $('.modal-save').show();
                        $('.modal').hide();

                        $('#sample').val(sample);

                    },
                    error: function (response) {

                    }
                });
            } else {

                if (background == null) {
                    background = -1;
                }
                if (sample == null) {
                    sample = -1;
                }
                if (filter == null) {
                    filter = -1;
                }
                console.log(background, sample, filter);
                // $.post('editCard.php',{background: background,sample:sample,filter:filter},function(){
                //     $('.modal-save').show();
                //     $('.modal').hide();
                // });
                $.ajax({
                    type: 'post',
                    url: 'editCard.php',
                    data: {background: background, sample: sample, filter: filter},
                    beforeSend: function (xhr) {
                        $('.page-loader').css('display', '');
                        $('.page-loader .loader').css('display', '');
                    },
                    complete: function (xhr) {
                        $('.page-loader').css('display', 'none');
                        $('.page-loader .loader').css('display', 'none');
                    },
                    success: function (response) {
                        $('.modal-save').show();
                        $('.modal').hide();

                        $('#sample').val(sample);
                    },
                    error: function (response) {

                    }
                });
            }
        });


        /*
            Lưu value ngân hàng
         */
        $('#save_banks').click(function () {
            var id = $('#id_bank').val();
            var acc_holder = $('#acc_holder').val();
            var acc_num = $('#acc_num').val();

            console.log(acc_holder);

            $.post("editCard.php", {id_bank: id, acc_holder: acc_holder, acc_num: acc_num}, function () {
                $('#get_holder_' + id).val(acc_holder);
                $('#get_num_' + id).val(acc_num);
                $('.modal-save').show();
                $('.modal').hide();
            });
        });


        /*
            Lưu value link social
         */
        var length = $('.quan-ly-info-item').length;

        $(document).on('click', '#save_link', function (e) {
            e.preventDefault();
            var id = $('#social_id').val();
            var link = $('#link_social').val();
            var name = $('#get_nameSocial_' + id).val();
            var icon = $('#get_iconSocial_' + id).val();
            // console.log(id,link,name,icon);

            var style = $('.phone-main-link').children('a');

            var background = style.css('background-color');
            var radius = style.css('border-radius');
            var border = style.css('border');
            var color = style.children('p').css('color');

            if(background == null || radius == null || border == null || color == null){
                var sample_interfaces = $('#sample').val();
                console.log(sample);
                if(sample_interfaces==1){
                    background = '#fff';
                    radius = '5rem';
                    border = "2px solid #000";
                    color = "#000";
                }else if(sample_interfaces==2){
                    background = "#000";
                    radius = '0rem';
                    border = "2px solid #E2B45D";
                    color = "#E2B45D";
                }
            }

            console.log(id);

            if (link != "") {
                $.ajax({
                    type: "post",
                    data: {social_id_check: id, link_check: link},
                    url: "editCard.php",
                    beforeSend: function (xhr) {
                        $('.page-loader').css('display', '');
                        $('.page-loader .loader').css('display', '');
                    },
                    complete: function (xhr) {
                        $('.page-loader').css('display', 'none');
                        $('.page-loader .loader').css('display', 'none');
                    },
                    success: function (response) {
                        // console.log(response.trim());
                        if (parseInt(response.trim()) == 0) {
                            $.post("editCard.php", {social_id: id, link: link}, function () {
                                $('#get_link_' + id).val(link);
                                $('.modal-save').show();
                                $('.modal').hide();
                            });
                        } else {
                            $.post("editCard.php", {social_id: id, link: link}, function () {
                                $('#get_link_' + id).val(link);
                                $('.modal-save').show();
                                $('.modal').hide();
                                length++;
                                var str = `<div class="quan-ly-info-item" data-id="${length}">
                                <div class="item-main">
                                    <div class="item-main-img">
                                        <img src="../images/facebook (1).png" alt="">
                                    </div>
                                    <p style="text-transform: uppercase; !important;">FACEBOOK CỦA TÔI</p>
                                    <div class="item-main-icon">
                                        <div class="up">
                                            <i class="fas fa-chevron-up"></i>
                                        </div>
                                        <div class="down">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>

                                    </div>
                                </div>
                                <div class="item-icon">
                                     <input type="hidden" class='id_soc' value=''>
                                    <div class="insert">
                                        <img src="../images/pen.png" alt="">
                                    </div>
                                    <div class="delete">
                                        <img src="../images/delete.png" alt="">
                                    </div>
                                </div>
                            </div>`
                                $('.quan-ly-info-list-item').append(str);

                                var str2 = `<a href="#" data-item-id="${length}" style="border-radius: ${radius}; border: ${border}; background-color: ${background};">
                                    <div class="phone-main-link-img">
                                        <img src="${'../images/icons/' + icon}" alt="">
                                    </div>
                                    <p style="color: ${color};">${name}</p>
                                </a>`;

                                var str3 = `<div class="col-md-6 col-sm-6 col-xs-6" data-pos-second="${length}">
                                        <div class="phone-main-row-item" style="background-image: url('../images/interfaces/${name_image}')">
                                            <p>${name}</p>
                                        </div>
                                    </div>`;

                                $('.phone-main-link').append(str2);
                                $('.phone-main-row .row').append(str3);

                                $.post("editCard.php", {social_id: id, position_social: length}, function () {
                                    $('.quan-ly-info-item').each(function () {
                                        if ($(this).children('.item-icon').children('.id_soc').val() == "") {
                                            $(this).children('.item-icon').children('.id_soc').val(id);
                                            $(this).children('.item-main').children('.item-main-img').children().attr('src', '../images/icons/' + icon);
                                            $(this).children('.item-main').children('p').html(name + ' của tôi');
                                        }
                                    });
                                })
                            });
                        }
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi...',
                    text: 'Vui lòng điền đầy đủ thông tin!'
                })
            }

        });

        /*
          Xóa social hiển thị
       */
        $(document).on('click', '.delete', function () {
            var id = $(this).siblings().siblings().val();
            var that = $(this).parent().parent();
            // console.log($(this).closest('.quan-ly-info-item').attr('data-id'));
            var ok = $(this).closest('.quan-ly-info-item').attr('data-id');

            // $('.quan-ly-info-item').children('.item-icon').children('.id_soc').val();
            $.post("editCard.php", {del_social_id: id}, function () {
                $('#get_link_' + id).val('');
                that.remove();
                var list = {};
                var count = 1;
                $('.quan-ly-info-item').each(function () {
                    $(this).attr('data-id', count);
                    list[$(this).children('.item-icon').children('.id_soc').val()] = count;
                    count++;
                });
                $.post("editCard.php", {listUpdate: list});
                $('.phone-main-link a').each(function () {
                    if ($(this).attr('data-item-id') == ok) {
                        $(this).remove();
                    }
                });
                $('.phone-main-row .row .col-md-6').each(function () {
                    if ($(this).attr('data-pos-second') == ok) {
                        $(this).remove();
                    }
                });

                var data_temp = 1;
                $('.phone-main-link a').each(function () {
                    $(this).attr('data-item-id', data_temp);
                    data_temp++;
                });
                var data_temp2 = 1;
                $('.phone-main-row .row .col-md-6').each(function () {
                    $(this).attr('data-pos-second', data_temp2);
                    data_temp2++;
                });
                length--;

            });
            // console.log( $(this).parent().parent());
        });

        /*
        Lưu value link social khác
         */
        $('#save_other_link').unbind('click', '#save_other_link').click(function (e) {
            e.preventDefault();
            var style = $('.phone-main-link').children('a');


            var background = style.css('background-color');
            var radius = style.css('border-radius');
            var border = style.css('border');
            var color = style.children('p').css('color');

            var name = $(this).parent().siblings('.name_other_social').val();
            var link = $(this).parent().siblings('.link_other_social').val();
            var icon = $(this).parent().siblings('.link-diff-picture').children().siblings('#post_icon_other').prop('files')[0];

            if (name != "" && link != "" && icon != null) {
                // console.log(name,icon,link);
                var fd = new FormData();

                fd.append('icon', icon);
                fd.append('name', name);
                fd.append('link', link);

                $.ajax({
                    type: "post",
                    data: fd,
                    url: "editCard.php",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    beforeSend: function (xhr) {
                        $('.page-loader').css('display', '');
                        $('.page-loader .loader').css('display', '');
                    },
                    complete: function (xhr) {
                        $('.page-loader').css('display', 'none');
                        $('.page-loader .loader').css('display', 'none');
                    },
                    success: function (response) {
                        if (response != 0) {
                            $('.modal-save').show();
                            $('.modal').hide();

                            $('.list-Social').append(main);
                            $('.list-Social .show').each(function () {
                                if ($(this).attr('data-id') == "") {
                                    $(this).attr('data-id', response['id']);
                                    $(this).children('.img_icon_social').attr('src', '../images/icons/' + response['icon']);
                                    $(this).children('.nameSocial').attr('id', 'get_nameSocial_' + response['id']);
                                    $(this).children('.iconSocial').attr('id', 'get_iconSocial_' + response['id']);
                                    $(this).children('.linkSocial').attr('id', 'get_link_' + response['id']);
                                    $(this).children('.nameSocial').val(name);
                                    $(this).children('.iconSocial').val(response['icon']);
                                    $(this).children('.linkSocial').val(link);
                                    $(this).children('p').html(name);
                                }
                            });
                            //
                            length++;
                            var str = `<div class="quan-ly-info-item" data-id="${length}">
                                <div class="item-main">
                                    <div class="item-main-img">
                                        <img src="../images/facebook (1).png" alt="">
                                    </div>
                                    <p style="text-transform: uppercase; !important;">FACEBOOK CỦA TÔI</p>
                                    <div class="item-main-icon">
                                        <div class="up">
                                            <i class="fas fa-chevron-up"></i>
                                        </div>
                                        <div class="down">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>

                                    </div>
                                </div>
                                <div class="item-icon">
                                     <input type="hidden" class='id_soc' value=''>
                                    <div class="insert">
                                        <img src="../images/pen.png" alt="">
                                    </div>
                                    <div class="delete">
                                        <img src="../images/delete.png" alt="">
                                    </div>
                                </div>
                            </div>`
                            $('.quan-ly-info-list-item').append(str);

                            var str2 = `<a href="#" data-item-id="${length}" style="border-radius: ${radius}; border: ${border}; background-color: ${background};">
                                    <div class="phone-main-link-img">
                                        <img src="${'../images/icons/' + icon}" alt="">
                                    </div>
                                    <p style="color: ${color};">${name}</p>
                                </a>`;

                            var str3 = `<div class="col-md-6 col-sm-6 col-xs-6" data-pos-second="${length}">
                                        <div class="phone-main-row-item" style="background-image: url('../images/interfaces/${name_image}')">
                                            <p>${name}</p>
                                        </div>
                                    </div>`;

                            $('.phone-main-link').append(str2);
                            $('.phone-main-row .row').append(str3);


                            $.post("editCard.php", {social_id: response['id'], position_social: length}, function () {
                                $('.quan-ly-info-item').each(function () {
                                    if ($(this).children('.item-icon').children('.id_soc').val() == "") {
                                        $(this).children('.item-icon').children('.id_soc').val(response['id']);
                                        $(this).children('.item-main').children('.item-main-img').children().attr('src', '../images/icons/' + response['icon']);
                                        $(this).children('.item-main').children('p').html(name + ' của tôi');
                                    }
                                });
                                var phone = $(`[data-item-id="${length}"]`);
                                $(phone).children('.phone-main-link-img').children('img').attr('src', '../images/icons/' + response['icon']);
                                $('.name_other_social').val('');
                                $('.link_other_social').val('');
                                $('.show_demo_icon').attr('src', '');
                                $('#post_icon_other').val('');
                                $('#name_demo').html('');
                                $('#icon_demo').attr('src', '');
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi...',
                                text: `${name} ! đã tồn tại vui lòng thử lại`,
                            })
                        }
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi...',
                    text: `Vui lòng điền đẩy đủ thông tin`
                })
            }

        });

        /*
            Lưu sđt
         */
        $('#savePhone').click(function () {
            var phone = $('#phone').val();
            $.post("editCard.php", {phone: phone}, function () {
                $('.modal-save').show();
                $('.modal').hide();
            });
        });

        /*
        lưu email
         */
        $('#saveEmail').click(function () {
            var email = $('#email').val();
            $.post("editCard.php", {email: email}, function () {
                $('.modal-save').show();
                $('.modal').hide();
            });
        });

        var main = ` <div class="choose choose-item show" data-id="">
                                               <img class="img_icon_social" src="" alt="">
                                               <p></p>
                                               <input type="hidden" id="get_nameSocial_" class="nameSocial" value="">
                                               <input type="hidden" id="get_iconSocial_" class="iconSocial" value="">
                                               <input type="hidden" id="get_link_" class="linkSocial"  value="">
                                           </div>`;

        /*
            Show all social
         */
        $(document).on('click', '.show', function () {
            var id = $(this).attr('data-id');
            var name = $('#get_nameSocial_' + id).val();
            var icon = $('#get_iconSocial_' + id).val();
            var link = $('#get_link_' + id).val();
            console.log(link);

            $('#social_id').val(id);
            $('#link_social').val(link);
            $('#social_name').html(name);
            $('#icon_social').attr('src', '../images/icons/' + icon);

            $('.modal-link').show();
            $('.modal-choose-main').hide();
        });

        /*
            Mở input file social other
         */
        $('#open_file_other').click(function () {
            $('#post_icon_other').click();
        });

        /*
            lấy value input file truyền ra thẻ img
         */
        $('#post_icon_other').change(function () {
            var test_value = $(this).val();
            console.log(test_value);
            var extension = test_value.split('.').pop().toLowerCase();
            if (test_value != "") {
                if ($.inArray(extension, ['png', 'gif', 'jpeg', 'jpg']) == -1) {
                    Swal.fire(
                        'Lỗi?',
                        'Ảnh không hợp lệ? Vui lòng upload lại ảnh',
                        'error'
                    )
                    return false;
                } else {
                    var file = $(this).prop('files')[0];
                    // console.log($(this).siblings('.show_demo_icon').attr('src'));
                    var that = $(this);
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function () {
                            that.siblings('.show_demo_icon-img').children('.show_demo_icon').attr('src', reader.result);
                            $('#icon_demo').attr('src', reader.result);
                        }
                        reader.readAsDataURL(file);
                    }
                }
            } else {
                $('.show_demo_icon').attr('src', '');
                $('#icon_demo').attr('src', '');
            }
        });

        /*
            Open more info
         */
        $('.khach-hang').click(function () {
            $('.modal-info-khach-hang').show();
            $('.modal-choose-main').hide();
        });

        var n = $('.info-khach-hang-title').length;
        console.log(n);

        $('.add-info-khach-hang').click(function () {
            var str1 = `<div class="info-khach-hang-title">
                                <div class="title-icon">
                                    <h3>Thông tin <span class="position">${n + 1}</span>:</h3>
                                    <div class="khach-hang-icon">
                                        <img src="../images/delete.png" alt="">
                                    </div>
                                </div>
<!--                                <input type="hidden" value="${n + 1}" class="position_more">-->
                                <input type="text" class="more_info">
                            </div>`
            $('.info-khach-hang').append(str1);
            n += 1;
        });

        $(document).on('click', '.khach-hang-icon', function () {
            // var position = $(this).parent().siblings('.position_more').val();
            // console.log(position);
            $(this).closest('.info-khach-hang-title').remove();
            console.log($(this).closest('.info-khach-hang-title'));
            $('.info-khach-hang-title').each((i, e) => {
                $(e).find('.title-icon > h3').html(`Thông tin <span class="position">${i + 1}</span>:`);
            })
            n -= 1;


        });

        /*
       Open input file image background
        */

        $('#change_imageInterface').click(function () {
            $('#image_interface').click();
        });


        $('#image_interface').change(function () {
            var test_value = $(this).val();
            var extension = test_value.split('.').pop().toLowerCase();
            if (test_value != "") {
                if ($.inArray(extension, ['png', 'gif', 'jpeg', 'jpg']) == -1) {
                    Swal.fire(
                        'Lỗi?',
                        'Ảnh không hợp lệ? Vui lòng upload lại ảnh',
                        'error'
                    )
                    return false;
                } else {
                    var file = $(this).prop('files')[0];
                    var that = $(this);
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function () {
                            that.siblings('#img_background').attr('src', reader.result);
                            $('.phone-info').css('background-image', "url('" + reader.result + "')");
                            $('.phone-main-row-item').css('background-image', "url('" + reader.result + "')");
                            // $('#img_hidden').val(reader.result);
                        }
                        reader.readAsDataURL(file);
                    }
                }
            } else {
                var img_hidden = $('#get_image_interface').val();
                $('#img_background').attr('src', '../images/interfaces/' + img_hidden);
                $('.phone-info').css('background-image', "url(../images/interfaces/" + img_hidden + ")");
                $('.phone-main-row-item').css('background-image', "url(../images/interfaces/" + img_hidden + ")");
            }
        });

        /*
               Set lại back ground
         */
        $('#delete_background').click(function () {
            var name = $('#get_image_interface').val();
            $('#img_background').attr('src', '../images/interfaces/' + name);
            $('.phone-info').css('background-image', "url(../images/interfaces/" + name + ")");
            $('#image_interface').val('');
        });

        /*
            Lưu thêm thông tin khách hàng
         */
        $('#save_khachhang').click(function () {
            var list = [];
            var checkMoreInfo = 1;
            if ($('.info-khach-hang-title').length > 0) {
                $('.info-khach-hang-title').each(function () {
                    // console.log($(this).children('.more_info').val());
                    //console.log($(this).children('.title-icon').children('h3').children('.position').html());
                    if ($(this).children('.more_info').val() != "") {
                        list[$(this).children('.title-icon').children('h3').children('.position').html()] = $(this).children('.more_info').val();
                    } else {
                        checkMoreInfo = 0;
                    }
                });
                console.log(list);
                $.ajax({
                    url: "editCard.php",
                    type: "post",
                    data: {list: list},
                    beforeSend: function (xhr) {
                        $('.page-loader').css('display', '');
                        $('.page-loader .loader').css('display', '');
                    },
                    complete: function (xhr) {
                        $('.page-loader').css('display', 'none');
                        $('.page-loader .loader').css('display', 'none');
                    },
                    success: function (response) {
                        console.log(response);
                        $('.modal-save').show();
                        $('.modal').hide();
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });
            } else {
                // console.log(1);
                $.ajax({
                    url: "editCard.php",
                    type: "post",
                    data: {list: -1},
                    beforeSend: function (xhr) {
                        $('.page-loader').css('display', '');
                        $('.page-loader .loader').css('display', '');
                    },
                    complete: function (xhr) {
                        $('.page-loader').css('display', 'none');
                        $('.page-loader .loader').css('display', 'none');
                    },
                    success: function (response) {
                        console.log(response);
                        $('.modal-save').show();
                        $('.modal').hide();
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });
            }
        });


        /*
            Save account
         */
        $('#save_account').click(function () {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi...',
                text: `Vui lòng chọn thông tin để nhập`
            })
        });


        /*
               Xử lý màu ảnh
         */
        $('.color2').click(function () {
            $('.phone-info .overlay').css('background-color', '#000000AD');
            // $('.phone-info .overlay').css('opacity', '0.5');
        });
        $('.color3').click(function () {
            $('.phone-info .overlay').css('background-color', '#F5982C86');
            // $('.phone-info .overlay').css('opacity', '0.5');
        });
        $('.color1').click(function () {
            $('.phone-info .overlay').css('background-color', '#C6C6C683');
            // $('.phone-info .overlay').css('opacity', '0.5');
        });
        $('.color4').click(function () {
            $('.phone-info .overlay').css('background-color', '#E6F52C');
            // $('.phone-info .overlay').css('opacity', '0.5');
        });
        $('.color5').click(function () {
            $('.phone-info .overlay').css('background-color', '#AFF52C');
            // $('.phone-info .overlay').css('opacity', '0.5');
        });
        $('.color6').click(function () {
            $('.phone-info .overlay').css('background-color', '#FFEA74');
            // $('.phone-info .overlay').css('opacity', '0.5');
        });
        $('.color7').click(function () {
            $('.phone-info .overlay').css('background-color', '#7BFFD6');
            // $('.phone-info .overlay').css('opacity', '0.5');
        });
        $('.color8').click(function () {
            $('.phone-info .overlay').css('background-color', '#4CBF9B');
            // $('.phone-info .overlay').css('opacity', '0.5');
        });
        $('.color9').click(function () {
            $('.phone-info .overlay').css('background-color', '#3D38B7');
            // $('.phone-info .overlay').css('opacity', '0.5');
        });

        $('.item1 .sample-item').click(function () {
            // $('.phone-info .overlay').css("opacity", "0.3");
            // $('.phone-info .overlay').css("background-color", "#FFF");
            $('.phone-main h2').css("color", "#fff");
            $('.phone-main-img').css("border", "none");
            $('.phone-main-link a').css("border-radius", "5rem");
            $('.phone-main-link a').css("border", "2px solid #000");
            $('.phone-main-link a').css("background-color", "#fff");
            $('.phone-main-link a p').css("color", "#000");
            $('.phone-main-row').hide();
            $('.phone-main-link').show();

        });
        $('.item2 .sample-item').click(function () {
            // $('.phone-info .overlay').css("opacity", "0.7");
            // $('.phone-info .overlay').css("background-color", "#000");
            $('.phone-main h2').css("color", "#E2B45D");
            $('.phone-main-img').css("border", "2px solid #E2B45D");
            $('.phone-main-link a').css("border-radius", "0rem");
            $('.phone-main-link a').css("border", "2px solid #E2B45D");
            $('.phone-main-link a').css("background-color", "#000");
            $('.phone-main-link a p').css("color", "#E2B45D");
            $('.phone-main-row').hide();
            $('.phone-main-link').show();

        });
        $('.item3 .sample-item').click(function () {
            $('.phone-main-row').show();
            $('.phone-main-link').hide();
            // $('.phone-info .overlay').css("opacity", "0.5");
            // $('.phone-info .overlay').css("background-color", "#000");
        });
        $('.fillter-color1').click(function () {
            $('.phone-info .overlay').css('opacity', '0.3');
        });
        $('.fillter-color2').click(function () {
            $('.phone-info .overlay').css('opacity', '0.5');
        });
        $('.fillter-color3').click(function () {
            $('.phone-info .overlay').css('opacity', '0.7');
        });

        /*
            Link other keyup
         */
        $('.name_other_social').keyup(function () {
            $('#name_demo').html($(this).val());
        });

        $(document).on('click', '.down', function () {
            let s1 = $(this).closest('.quan-ly-info-item');
            let s2 = $(this).closest('.quan-ly-info-item').next();
            if (s2.length == 0) {
                return;
            }
            let idUp = s1.children('.item-icon').children('.id_soc').val();
            let idDown = s2.children('.item-icon').children('.id_soc').val();
            let posUp = s1.attr('data-id');
            let posDown = s2.attr('data-id');

            let phoneUpEl = $(`[data-item-id="${posUp}"]`);
            let phoneDownEl = $(`[data-item-id="${posDown}"]`);

            let phoneUpSecond = $(`[data-pos-second="${posUp}"]`);
            let phoneDownSecond = $(`[data-pos-second="${posDown}"]`);

            var list = {};
            list[idUp] = posDown;
            list[idDown] = posUp;

            $.ajax({
                type: 'post',
                url: 'editCard.php',
                data: {listUpdate: list},
                beforeSend: function (xhr) {
                    $('.page-loader').css('display', '');
                    $('.page-loader .loader').css('display', '');
                },
                complete: function (xhr) {
                    $('.page-loader').css('display', 'none');
                    $('.page-loader .loader').css('display', 'none');
                },
                success: function (response) {
                        s1.children('.item-icon').children('.id_soc').val(idDown);
                        s2.children('.item-icon').children('.id_soc').val(idUp);
                        let img1 = s1.children(0).children(0).children(0).attr('src');
                        let p1 = s1.children(0).children(1).text();
                        let img2 = s2.children(0).children(0).children(0).attr('src');
                        let p2 = s2.children(0).children(1).text();
                        s1.children('.item-main').children(0).children(0).attr('src', img2);
                        s1.children(0).children('p').text(p2);
                        s2.children('.item-main').children(0).children(0).attr('src', img1);
                        s2.children(0).children("p").text(p1);

                        // Swap phone elements
                        let phoneUpImg = $(phoneUpEl).find('img').attr('src');
                        let phoneUpPara = $(phoneUpEl).find('p').text();
                        let phoneUpSecondText = $(phoneUpSecond).children().children('p').text();
                        let phoneDownSecondText = $(phoneDownSecond).children().children('p').text();
                        $(phoneUpSecond).children().children('p').text(phoneDownSecondText);
                        $(phoneDownSecond).children().children('p').text(phoneUpSecondText);
                        $(phoneUpEl).find('img').attr('src', $(phoneDownEl).find('img').attr('src'));
                        $(phoneUpEl).find('p').text($(phoneDownEl).find('p').text());
                        $(phoneDownEl).find('img').attr('src', phoneUpImg);
                        $(phoneDownEl).find('p').text(phoneUpPara);
                },
                error: function (response) {

                }
            });

            // $.post("editCard.php", {listUpdate: list}, function () {
            //     s1.children('.item-icon').children('.id_soc').val(idDown);
            //     s2.children('.item-icon').children('.id_soc').val(idUp);
            //     let img1 = s1.children(0).children(0).children(0).attr('src');
            //     let p1 = s1.children(0).children(1).text();
            //     let img2 = s2.children(0).children(0).children(0).attr('src');
            //     let p2 = s2.children(0).children(1).text();
            //     s1.children('.item-main').children(0).children(0).attr('src', img2);
            //     s1.children(0).children('p').text(p2);
            //     s2.children('.item-main').children(0).children(0).attr('src', img1);
            //     s2.children(0).children("p").text(p1);
            //
            //     // Swap phone elements
            //     let phoneUpImg = $(phoneUpEl).find('img').attr('src');
            //     let phoneUpPara = $(phoneUpEl).find('p').text();
            //     let phoneUpSecondText = $(phoneUpSecond).children().children('p').text();
            //     let phoneDownSecondText = $(phoneDownSecond).children().children('p').text();
            //     $(phoneUpSecond).children().children('p').text(phoneDownSecondText);
            //     $(phoneDownSecond).children().children('p').text(phoneUpSecondText);
            //     $(phoneUpEl).find('img').attr('src', $(phoneDownEl).find('img').attr('src'));
            //     $(phoneUpEl).find('p').text($(phoneDownEl).find('p').text());
            //     $(phoneDownEl).find('img').attr('src', phoneUpImg);
            //     $(phoneDownEl).find('p').text(phoneUpPara);
            //     //     window.location.href="user-chinh-sua.php";
            // });
        });
        $(document).on('click', '.up', function () {
            let s1 = $(this).closest('.quan-ly-info-item');
            let s2 = $(this).closest('.quan-ly-info-item').prev();
            if (s2.length == 0) {
                return;
            }

            let idDown = s1.children('.item-icon').children('.id_soc').val();
            let idUp = s2.children('.item-icon').children('.id_soc').val();
            let posDown = s1.attr('data-id');
            let posUp = s2.attr('data-id');

            let phoneUpEl = $(`[data-item-id="${posUp}"]`);
            let phoneDownEl = $(`[data-item-id="${posDown}"]`);

            let phoneUpSecond = $(`[data-pos-second="${posUp}"]`);
            let phoneDownSecond = $(`[data-pos-second="${posDown}"]`);

            var list = {};
            list[idDown] = posUp;
            list[idUp] = posDown;

            $.ajax({
                type: 'post',
                url: 'editCard.php',
                data: {listUpdate: list},
                beforeSend: function (xhr) {
                    $('.page-loader').css('display', '');
                    $('.page-loader .loader').css('display', '');
                },
                complete: function (xhr) {
                    $('.page-loader').css('display', 'none');
                    $('.page-loader .loader').css('display', 'none');
                },
                success: function (response) {
                        s1.children('.item-icon').children('.id_soc').val(idUp);
                        s2.children('.item-icon').children('.id_soc').val(idDown);
                        let img1 = s1.children(0).children(0).children(0).attr('src');
                        let p1 = s1.children(0).children(1).text();
                        let img2 = s2.children(0).children(0).children(0).attr('src');
                        let p2 = s2.children(0).children(1).text();
                        s1.children('.item-main').children(0).children(0).attr('src', img2);
                        s1.children(0).children('p').text(p2);
                        s2.children('.item-main').children(0).children(0).attr('src', img1);
                        s2.children(0).children("p").text(p1);

                        // Swap phone elements
                        let phoneUpImg = $(phoneUpEl).find('img').attr('src');
                        let phoneUpPara = $(phoneUpEl).find('p').text();
                        let phoneUpSecondText = $(phoneUpSecond).children().children('p').text();
                        let phoneDownSecondText = $(phoneDownSecond).children().children('p').text();
                        $(phoneUpSecond).children().children('p').text(phoneDownSecondText);
                        $(phoneDownSecond).children().children('p').text(phoneUpSecondText);
                        $(phoneUpEl).find('img').attr('src', $(phoneDownEl).find('img').attr('src'));
                        $(phoneUpEl).find('p').text($(phoneDownEl).find('p').text());
                        $(phoneDownEl).find('img').attr('src', phoneUpImg);
                        $(phoneDownEl).find('p').text(phoneUpPara);
                },
                error: function (response) {

                }
            });

            // $.post("editCard.php", {listUpdate: list}, function () {
            //     s1.children('.item-icon').children('.id_soc').val(idUp);
            //     s2.children('.item-icon').children('.id_soc').val(idDown);
            //     let img1 = s1.children(0).children(0).children(0).attr('src');
            //     let p1 = s1.children(0).children(1).text();
            //     let img2 = s2.children(0).children(0).children(0).attr('src');
            //     let p2 = s2.children(0).children(1).text();
            //     s1.children('.item-main').children(0).children(0).attr('src', img2);
            //     s1.children(0).children('p').text(p2);
            //     s2.children('.item-main').children(0).children(0).attr('src', img1);
            //     s2.children(0).children("p").text(p1);
            //
            //     // Swap phone elements
            //     let phoneUpImg = $(phoneUpEl).find('img').attr('src');
            //     let phoneUpPara = $(phoneUpEl).find('p').text();
            //     let phoneUpSecondText = $(phoneUpSecond).children().children('p').text();
            //     let phoneDownSecondText = $(phoneDownSecond).children().children('p').text();
            //     $(phoneUpSecond).children().children('p').text(phoneDownSecondText);
            //     $(phoneDownSecond).children().children('p').text(phoneUpSecondText);
            //     $(phoneUpEl).find('img').attr('src', $(phoneDownEl).find('img').attr('src'));
            //     $(phoneUpEl).find('p').text($(phoneDownEl).find('p').text());
            //     $(phoneDownEl).find('img').attr('src', phoneUpImg);
            //     $(phoneDownEl).find('p').text(phoneUpPara);
            // });
        });

        $('#showTrang').click(function () {
            window.location.href = "user-trang-ca-nhan.php";

            // get base url in jq
            // var baseURL = window.location.origin;
            // console.log(baseURL);
        });

        $('#copy').click(function () {
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