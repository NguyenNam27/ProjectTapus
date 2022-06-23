<?php
require_once "config.php";
$db = new Database();
$connect = $db->getConnect();
    require_once('templates/head.php');
    require_once('templates/menu.php');

      if(isset($_SESSION['login_success'])){
        unset($_SESSION['login_success']);
        echo "<script>
                    Swal.fire({
                      icon: 'success',
                      title: 'Thành công',
                      text: 'Đăng nhập thành công!'
                    });
                </script>";
    }
    if(isset($_SESSION['changePass'])){
        unset($_SESSION['changePass']);
        echo "<script>
                        Swal.fire({
                          icon: 'success',
                          title: 'Thành công',
                          text: 'Đổi mật khẩu thành công!'
                        });
                    </script>";
    }
?>

<section class="page-section" id="about">
    <div class="container relative">
        <div class="sec2-hang row">
            <img src="./images/section2-1.png" alt="" class="section2-img col-md-5">
            <div class="sec2-text col-md-7">
                <h1>TAPUS TẠO RA SỰ KẾT NỐI</h1>
                <h2>Tất cả vấn đề của sự kết nối chính là thời gian. Trong cuộc sống hối hả, bộn bề
                    nhiều lo toan, con người không có nhiều thời gian để tạo ra sự kết nối với nhau.
                    TAPUS ra đời với sứ mệnh tạo ra một thế giới kết nối mà không bị thời gian làm ảnh
                    hưởng.</h2>
            </div>

        </div>
        <div class="sec2-hang row">
            <img src="./images/section2-2.png" alt="" class="section2-img col-md-5">
            <div class="sec2-text col-md-7">
                <h1>CHỈ MẤT 1 GIÂY ĐỂ CHIA SẺ</h1>
                <h2>Chỉ với một cú chạm từ điện thoại. Mọi thông tin cá nhân, trang mạng xã hội hay
                    thậm chí là những bức ảnh của bạn đều sẽ được chia sẻ với người đối diện. Tất cả
                    thao tác chỉ vỏn vẹn trong vòng 1 giây.</h2>
                <a href="Ve-TapUs.php" class='btnDetail' style="padding: 4px 60px; !important; width: 308px; !important;">TÌM HIỂU VỀ TAPUS</a>
            </div>
        </div>

        <div class="sec2-hang row">
            <img src="./images/phone111.png" alt="" class="section2-img col-md-5">
            <div class="sec2-text col-md-7">
                <h1>TAPUS <br> NỀN TẢNG TÍCH HỢP DANH THIẾP CÁ NHÂN</h1>
                <h2>Danh thiếp điện tử TAPUS là danh thiếp thông minh cung cấp nền tảng tích hợp thông tin mà người dùng muốn chia sẻ và trao đôi.
                    <br>
                    - Bảo mật thông tin chia sẻ <br>
                    - Dễ dàng chỉnh sửa và tùy chỉnh thông tin, giao diện người dùng <br>
                    - Thỏa sức lựa chọn kiểu dáng và màu sắc <br>
                    - Không yêu cầu cài đặt <br>
                </h2>
            </div>

        </div>
    </div>
</section>

<hr class="mt-0 mb-0 " />
<!-- About Section -->
<section class="page-section">
    <div class="container relative">
        <div class="hang">
            <h2 class="tuongthich align-left">
                TƯƠNG THÍCH VỚI HỆ ĐIỀU HÀNH IOS & ANDROID
            </h2>
            <img src="./images/tuongthich-box1.png" alt="" class="box-item1">
            <img src="./images/tuongthich-box2.png" alt="" class="box-item1">



        </div>


    </div>
</section>
<!-- End About Section -->

<!-- Divider -->
<hr class="mt-0 mb-0 " />
<!-- End Divider -->

<!-- Services Section -->
<section class="page-section" id="services">


    <h2 class="products-title">
        NHỮNG SẢN PHẨM CỦA TAPUS
    </h2>
    <div class="group-sanpham">
        <?php
                            $query = mysqli_query($connect, "SELECT * FROM products");
                            $i=0;
                            while($rowp = mysqli_fetch_assoc($query)){
                                $id = $rowp['id'];
                                $name = $rowp['name'];
                                $desc = $rowp['description'];
                                $price = $rowp['price'];
                                echo "<div class='khung-sanpham'>";
                                echo "<img src='./images/index".$id.".png' alt='' id='sanpham".$id."'>";
                                echo "<div class='sanpham'>";
                                echo "<h1>".$name."</h1>";
                                echo "<h4>".$desc."</h4>";
                                echo "<h5>Giá: ".$price." VNĐ</h5>";
                                echo "</div>";
                                echo "<a href='sanphamTapUs.php?id=$id' class='btnDetail' id='btnD".$id."'>Chi tiết</a>";
                                echo "</div>";
                            };

                        ?>
    </div>

</section>
<!-- End Services Section -->


<?php
    require_once('templates/footer.php');
?>
