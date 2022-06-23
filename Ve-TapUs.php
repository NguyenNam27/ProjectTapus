<?php
require_once "config.php";
$db = new Database();
$connect = $db->getConnect();
    require_once('templates/head.php');
?>
<link rel="stylesheet" href="css/VeTapUs.css">
<section class="tapus-info">
    <div class="tapus-info-content">
        <div class="row tapus-info-content-item">
            <div class="col-md-6 item-img p-r-5">
                <img src="images/adobestock_132623546.png" alt="">
            </div>
            <div class="col-md-6 item-info p-l-5">
                <h2>CHỈ VỚI MỘT CÚ CHẠM!</h2>
                <p>TAPUS là một sản phẩm được ra đời mục đích đưa ra giải pháp về danh thiếp điện tử giúp người dùng
                    có thể chia sẻ mọi thông tin bao gồm: địa chỉ liên lạc, sản phẩm hay thậm chí cả hồ sơ cá nhân
                    hay của doanh nghiệp cho đối tác hay khách hàng chỉ với một cú chạm. Không cần cài đặt bất kỳ
                    ứng dụng hay công cụ hỗ trợ nào, chỉ cần một chiếc điện thoại và một cú chạm, tất cả thông tin
                    đều sẽ được chia sẻ trên màn hình chỉ trong vài giây.</p>
            </div>
        </div>
        <div class="row tapus-info-content-item">
            <div class="col-md-6 item-img p-r-5">
                <img src="images/two-hand-hold-group-virtual-cog-gears-wheel-with-connection-black-background.png"
                    alt="">
            </div>
            <div class="col-md-6 item-info p-l-5">
                <h2>CÁ NHÂN HÓA</h2>
                <p>Với sự chuyển mình của cách mạng 4.0 sang 5.0, TAPUS là sản phẩm đề cao sự kết nối phá bỏ mọi
                    giới hạn và mang đến sự kết hợp hoàn hảo giữa danh thiếp truyền thống và ứng dụng công nghệ NFC.
                    Là một sản phẩm thay thế danh thiếp cá nhân truyền thống TAPUS luôn đảm bảo màu sắc cũng như cá
                    tính của mỗi cá nhân và đem tới sự tương tác bình đẳng giữa người với người.</p>
            </div>
        </div>
        <div class="row tapus-info-content-item">
            <div class="col-md-6 item-img p-r-5">
                <img src="images/831.png" alt="">
            </div>
            <div class="col-md-6 item-info p-l-5">
                <h2>KẾT NỐI THẾ GIỚI</h2>
                <p>TAPUS mang đến sản phẩm danh thiếp điện tử cá nhân hoá, cho phép khách hàng sử dụng nó như 1 loại
                    danh thiếp truyền thống nhưng vẫn có thể chia sẻ và kết nối thông tin như loại thẻ cá nhân điện
                    tử đang có trên thị trường.</p>
            </div>
        </div>
    </div>
    <div class="tapus-team">
        <h2 class="tapus-text-title">ĐỘI NGŨ TAPUS</h2>
        <div class="row tapus-team-content ">
            <div class="col-md-6 tapus-team-img p-r-5">
                <img src="images/full-width-images/banner-1.png" alt="">
            </div>
            <div class="col-md-6 tapus-team-info p-l-5">
                <h3>Đội ngũ trẻ sáng tạo trong thời đại 4.0</h3>
                <p>TAPUS hiểu rằng sự kết nối và chia sẻ thông tin trong thời đại hiện nay rất quan trọng và cần thiết
                    trong mối quan hệ giữa người với người và các doanh nghiệp với nhau. </p>
                <p>TAPUS được ra đời để thực hiện nhiệm vụ kết nối và chia sẻ thông tin cá nhân và doanh nghiệp trong
                    thời đại số như hiện nay. Trong thời đại xô bồ với nhịp sống quá nhanh như vậy, mọi thông tin dùng
                    để trao đổi cũng cần được truyền tải với tốc độ cao và tiết kiệm thời gian nhất có thể.</p>
                <p>TAPUS nhìn thấy những lợi ích và cơ hội mới không chỉ cho riêng cá nhân mà còn cho cả những doanh
                    nghiệp khi áp dụng công nghệ vào những vật phẩm truyền thống như danh thiếp điện tử.</p>
            </div>
        </div>
    </div>
    <div class="tapus-values">
        <h2 class="tapus-text-title">GIÁ TRỊ CỐT LÕI</h2>
        <div class="row tapus-values-content">
            <div class="col-md-4 ">
                <div class="values-item">
                    <img src="images/adaptation.png" alt="">
                    <h3>Thích nghi</h3>
                    <p>Trong khi cuộc sống đang không ngừng đổi mới, đội ngũ TAPUS luôn nắm bắt những xu hướng thịnh
                        hành và nhu cầu của khách hàng trên thị trường với mong muốn đem đến sự hài lòng qua những trải
                        nghiệm tốt nhất và mới nhất.</p>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="values-item">
                    <img src="images/shining.png" alt="">
                    <h3>Tinh tế</h3>
                    <p>Mọi sản phẩm, dịch vụ phải đạt chuẩn mực và ở mức hoàn thiện với chất lượng cao nhất có thể. Mọi
                        chi tiết của sản phẩm luôn phải đảm bảo mang trong đó một ý nghĩa hoặc thông điệp của cá nhân
                        khách hàng</p>
                </div>
            </div>

            <div class="col-md-4 ">
                <div class="values-item">
                    <img src="images/download-speed.png" alt="">
                    <h3>Tốc độ</h3>
                    <p>TAPUS đề cao tốc độ và sự tối ưu hóa thời gian của khách hàng. Khi khách hàng kết nối cả thế giới
                        qua một cú chạm, TAPUS sẽ đảm nhận nhiệm vụ làm hiện ra cả thế giới chỉ trong vài giây.</p>
                </div>
            </div>

        </div>
    </div>
    <div class="tapus-mission">
        <div class="row tapus-mission-content">
            <div class="col-md-6 tapus-mission-info p-r-5">
                <h3>sứ mệnh của tapus</h3>
                <p>Cái tên TAPUS đại diện cho một cộng đồng, một tập thể cùng nhau kết nối, cùng nhau sử dụng, cùng nhau
                    trao đổi, đi lên và phát triển. Kết nối và cộng sinh chính là chìa khóa của thành công, và Tapus sẽ
                    là người bạn đắc lực để cùng nhau chạm tới thành công, chạm tới một vùng trời mới tốt đẹp hơn, cũng
                    như thông điệp của TAPUS:</p>
                <h4>“TAP TO A NEW WORLD!”</h4>
            </div>
            <div class="col-md-5 tapus-mission-img p-l-5">
                <img src="images/logo.png" alt="">
                <p>TAP TO A NEW WORLD</p>
            </div>
        </div>

    </div>

</section>
<?php
    require_once('templates/footer.php');
?>