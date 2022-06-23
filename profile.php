<?php
    require_once('config.php');
    if(isset($_GET['url'])){
        $url=$_GET['url'];
        $query=mysqli_query($connect,"SELECT * FROM `users` WHERE `url`= '$url'");
        $rowu = mysqli_fetch_assoc($query);
        $name = $rowu['name'];
        $desc = $rowu['description'];
        $facebook = $rowu['facebook'];
        $instagram = $rowu['instagram'];
        $linkedin = $rowu['linkedin'];
        $avatar = $rowu['avatar'];
    }
    else echo "<script>window.location.replace('index.php')</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <title>Trang Cá Nhân</title>
</head>
<body>
    <div class="row1">
        <a href="index.html" class="logo">TAPUS.</a>
        <!-- <a href="dangnhap.html" class="dangnhap">ĐĂNG NHẬP</a> -->
    </div>
    <div class="title">Trang Cá Nhân</div>
    <div class="chinhsua">
        <?php 
            if(isset($_SESSION['username']) && $rowu['username'] == $_SESSION['username']){
                echo "<a href='#' class='chinhsuabtn'>Chỉnh sửa</a>";
            }
        ?>
    </div>
    <div class="row2">
        <div class="col1">
            <div class="avatar">
                <img src="<?php echo $avatar; ?>">
            </div>
        </div>
        <div class="col2">
            <div class="name"><?php echo $name; ?></div>
            <div class="gioithieu"><?php echo $desc; ?></div>
            <a href="<?php echo $facebook; ?>"><div class="social-box"><img src="../images/facebook (1).png" alt=""> FACEBOOK CỦA TÔI</div></a>
            <a href="<?php echo $instagram; ?>"><div class="social-box"><img src="../images/instagram2.png" alt="">INSTAGRAM CỦA TÔI</div></a>
            <a href="<?php echo $linkedin; ?>"><div class="social-box"><img src="../images/linkedin.png" alt="">LINKEDIN CỦA TÔI</div></a>
            
        </div>
    </div>
</body>
</html>