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
    <link rel="stylesheet" href="css/ThanhToan.css">
    <link rel="stylesheet" href="css/gio-hang.css">

</head>

<body class="appear-animate">
<script>
    $('.user-login').click(function (){
        $('.modal-user').toggle();
    });
</script>
<?php
    if(isset($_POST['submit'])){
        $note = $_POST['ghichu'];
        $_SESSION['ghichu'] = $note;
        header("Location: thanh-toan.php");
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


<div class="container">
    <section class="page-section content-cart" id="services">

        <h2 class="products-title cart">
            GI??? H??NG C???A B???N
        </h2>

        <?php
        //Tong tien
        $sum = 0;

        if (isset($_SESSION['cart'])) {
            $list_pro = $_SESSION['cart'];
            // print_r($list_pro);
            // s??? l?????ng id s???n ph???m trong list ??? session
            $num = count($list_pro);
            $count_null = 0;
            $check = true;
            foreach($list_pro as $key){
                if(is_null($key)){
                    $count_null++;
                }
            }

            if ($num != $count_null) {
                // $key: m?? s???n ph???m, $value: s??? l?????ng s???n ph???m
                foreach ($list_pro as $key => $value) {
                    if ($list_pro[$key] != null) {
                        $query = mysqli_query($connect, "SELECT * FROM `products` WHERE `id`= '$key'");
                        $res = mysqli_fetch_assoc($query);
                        $sum += $list_pro[$key]['total'];
                        ?>
                        <div class="row products">
                            <div class="col-md-4 ">
                                <img src="images/imageProducts/<?php echo $res['img'] ?>" alt="">
                            </div>
                            <div class="col-md-8 products-content">
                                <p><?php echo $res['name'] ?></p>
                                <p class="price" data-value="<?php echo $res['price'] ?>">
                                    Gi??: <?php echo number_format($res['price'],0,'.','.') ?> ??</p>
                                <div class="quantity">
                                    <div class="quantity-num">
                                        <span class="diff" data-id="<?php echo $key ?>">-</span>
                                        <input type="number" class="num-card"
                                               value="<?php echo $list_pro[$key]['quantity'] ?>">
                                        <span class="add" data-id="<?php echo $key ?>">+</span>
                                    </div>
                                    <div class="quantity-price">
                                        <p class="total-pro"
                                           data-value="<?php echo $list_pro[$key]['total'] ?>"> <?php echo number_format($list_pro[$key]['total'],0,'.','.') ?>
                                            ??</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            } else {
                ?>
                <div class="row products">
                    <h4>B???n ch??a c?? s???n ph???m n??o trong gi??? h??ng</h4>
                </div>
                <?php
            }
        }else{

        ?>
            <div class="row products">
                <h4>B???n ch??a c?? s???n ph???m n??o trong gi??? h??ng</h4>
            </div>
        <?php
        }
        ?>
        <form action="" method="post" style="width: 100% !important;">
        <div class="note">
            <textarea name="ghichu" id="" cols="30" rows="10" placeholder="Ghi ch??"><?php
                                    if(isset($_SESSION['ghichu'])){
                //                        unset($_SESSION['ghichu']);
                                       echo $_SESSION['ghichu'];
                                    }
                                ?></textarea>
        </div>

        <div class="sum-price">
            <p>T???ng ti???n</p>
            <p id="vnd"><?php echo number_format($sum,0,'.','.') ?> ??</p>
        </div>

        <div class="action">
            <div class="action-child">
                <input id="checkout" name="submit" type="submit" value="Thanh to??n">
                <a href="sanphamTapUs.php" id="continue-shopping">Ti???p t???c mua h??ng</a>
            </div>
        </div>
        </form>

    </section>
</div>
<?php
require_once "templates/footer.php";
?>

<script>
    $(".nav-logo-wrap i").click(function() {
        $(this).toggleClass('bgr-white');
        $('.user-login').toggleClass('bgr-white');
        $('.cart-white').toggle();
        $('.cart-black').toggleClass('dnone');
    });


    $(function(){

    $('.diff').click(function (e) {
        e.preventDefault();
        var that = $(this);
        var num = that.siblings().val();
        var id = that.attr('data-id');
        var price = that.parent().parent().siblings('.price').attr('data-value');
        num--;
        if (num < 0) num = 0;
        that.siblings().val(num);
        $.post('updateCart.php', {'id': id, 'num': num}, function () {
            console.log(num);
            that.parent().siblings().children().attr('data-value' , num * price);
            that.parent().siblings().children().html((num * price).toLocaleString('vi-VN') + ' ??');
            var res=0;
            $.each($('.total-pro'), function (index, value) {
                var temp = parseFloat($(value).attr('data-value'));
                res+=temp;
            });
            $('#vnd').html(res.toLocaleString('vi-VN') + ' ??');
       });
    });

    $('.add').click(function (e) {
        e.preventDefault();
        var that = $(this);
        var num = that.siblings('.num-card').val();
        var id = that.attr('data-id');
        var price = that.parent().parent().siblings('.price').attr('data-value');
        num++;
        that.siblings('.num-card').val(num);
        $.post('updateCart.php', {'id': id, 'num': num}, function () {
            console.log(num);
           that.parent().siblings().children().attr('data-value', num * price);
           that.parent().siblings().children().html((num * price).toLocaleString('vi-VN') + ' ??');
            var res=0;
            $.each($('.total-pro'), function (index, value) {
                var temp = parseFloat($(value).attr('data-value'));
                res+=temp;
            });
            $('#vnd').html(res.toLocaleString('vi-VN') + ' ??');
        });
    });

    $('.num-card').change(function (e) {
        e.preventDefault();
        var that = $(this);
        var num = that.val();
        var id = that.siblings().attr('data-id');
        var price = that.parent().parent().siblings('.price').attr('data-value');
        that.val(num);
        $.post('updateCart.php', {'id': id, 'num': num}, function () {
            that.parent().siblings().children().attr('data-value', num * price);
            that.parent().siblings().children().html((num * price).toLocaleString('vi-VN') + ' ??');
            var res=0;
            $.each($('.total-pro'), function (index, value) {
                var temp = parseFloat($(value).attr('data-value'));
                res+=temp;
            });
            $('#vnd').html(res.toLocaleString('vi-VN') + ' ??');
        });
    });


    });
</script>

<!--<script>-->
<!---->
<!--       $('.diff').click(function(e){-->
<!--           e.preventDefault();-->
<!--           var id = $(this).attr('data-id');-->
<!--           var num = parseInt(document.getElementById('num-pro-'+id).value);-->
<!--           num-=1;-->
<!--           if(num<0) num=0;-->
<!--           document.getElementById('num-pro-'+id).value = num;-->
<!--           $.post('updateCart.php',{'id': id,'num': num},function(){-->
<!--               var price = parseFloat(document.getElementById('price-pro-'+id).innerHTML);-->
<!--               //var sum_price = parseFloat(document.getElementById('sum-price-'+id).innerHTML);-->
<!--               document.getElementById('sum-price-'+id).innerHTML = (price * num).toLocaleString('vi', {style : 'currency', currency : 'VND'});-->
<!--               // l???y list ID t??? session-->
<!--               var res = 0;-->
<!--               $.each($('.total-pro') , function (index,value){-->
<!--                   res += parseFloat($(value).text());-->
<!--                   res = res.toLocaleString('vi', {style : 'currency', currency : 'VND'});-->
<!--               });-->
<!--               document.getElementById('vnd').innerHTML = res;-->
<!--           });-->
<!--       });-->
<!---->
<!--       $('.add').click(function(e){-->
<!--           e.preventDefault();-->
<!--           var id = $(this).attr('data-id');-->
<!--           var num = parseInt(document.getElementById('num-pro-'+id).value);-->
<!--           num+=1;-->
<!--           document.getElementById('num-pro-'+id).value = num;-->
<!--           $.post('updateCart.php',{'id': id,'num': num},function(){-->
<!--               var price = parseFloat(document.getElementById('price-pro-'+id).innerHTML);-->
<!--               document.getElementById('sum-price-'+id).innerHTML = (price * num).toLocaleString('vi', {style : 'currency', currency : 'VND'});-->
<!--               var res = 0;-->
<!--               $.each($('.total-pro') , function (index,value){-->
<!--                   res += parseFloat($(value).text());-->
<!--                   res = res.toLocaleString('vi', {style : 'currency', currency : 'VND'});-->
<!--               });-->
<!--               document.getElementById('vnd').innerHTML = res;-->
<!--           });-->
<!--       });-->
<!---->
<!---->
<!--       $('.num-card').change(function(){-->
<!--           var id = $(this).attr('data-id');-->
<!--           var num = parseInt(document.getElementById('num-pro-'+id).value);-->
<!--           $.post('updateCart.php',{'id': id,'num': num},function(){-->
<!--               var price = parseFloat(document.getElementById('price-pro-'+id).innerHTML);-->
<!--               document.getElementById('sum-price-'+id).innerHTML = (price * num).toLocaleString('vi', {style : 'currency', currency : 'VND'});-->
<!---->
<!--               var res = 0;-->
<!--               $.each($('.total-pro') , function (index,value){-->
<!--                   res += parseFloat($(value).text());-->
<!--                   res = res.toLocaleString('vi', {style : 'currency', currency : 'VND'});-->
<!--               });-->
<!--               document.getElementById('vnd').innerHTML = res;-->
<!--           });-->
<!--       });-->
<!---->
<!---->
<!--</script>-->


