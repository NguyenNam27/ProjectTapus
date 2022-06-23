<?php

     require_once "config.php";
     $db = new Database();
     $connect = $db->getConnect();

    require_once('templates/head.php');
?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if(isset($_SESSION['addcart'])){
        unset($_SESSION['addcart']);
        echo "<script>
                        Swal.fire({
                          icon: 'success',
                          title: 'Thành công',
                          text: 'Đã thêm mới 1 sản phẩm vào giỏ hàng của bạn!'
                        });
                    </script>";
    }
    ?>
        
            <section class="page-section" id="services">
                <h2 class="products-title">
                    NHỮNG SẢN PHẨM CỦA TAPUS
                </h2>
                <p class=products-caption>
                    Ứng dụng công nghệ NFT hiện đại vào sản xuất danh thiếp cá nhân, TAPUS hân hạnh được mang tới các dòng sản phẩm thẻ cá nhân điện tử dưới nhiều hình thức và định dạng, phù hợp với mọi nhu cầu và sở thích
                </p>
                   
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
                                echo "<img src='./images/sanpham".$id.".png' alt='' id='sanpham".$id."'>";
                                echo "<div class='sanpham'>";
                                echo "<h1>".$name."</h1>";
                                echo "<h4>".$desc."</h4>";
                                echo "<h5>Giá: ".$price." VNĐ</h5>";
                                echo "</div>";
                                echo "<div class='btn-product'>";
                                echo "<a href='addcart.php?id=$id' class='btnAdd' id='btnD".$id."'>Thêm vào giỏ </a>";
                                echo "<a href='addcart.php?item=$id' class='btnBuy' id='btnD".$id."'>Đặt hàng ngay</a>";
                                echo "</div>";
                                echo "</div>";
                            };
                        ?>
            </div>
            </section>
            <section class="page-section" id="services">
                <h2 class="products-title">
                    ĐẶC ĐIỂM VƯỢT TRỘI CỦA TAPUS
                </h2>
                <div class="dacdiem">
                    <div class="dacdiem-left">
                        <div class="box-dacdiem dd1">
                        <h1>TÙY CHỈNH THÔNG TIN</h1>
                        <p>Tất cả thông tin được hiện ra qua TAPUS đều hoàn toàn được bố trí và tùy chỉnh bởi cá nhân khách hàng. TAPUS hỗ trợ mọi định dạng thông tin bao gồm hình ảnh, văn bản, liên kết và video.</p>
                        </div>
                        <div class="box-dacdiem dd2">
                            <h1>CÁ NHÂN HÓA GIAO DIỆN</h1>
                            <p>Giao diện thẻ và trang cá nhân hoàn toàn được cá nhân hóa dựa vào mục đích và sở thích của khách hàng. Với dòng sản phẩm YOUR TAPUS, khách hàng sẽ có nhiều tùy chọn trong việc điều chỉnh hơn.</p>
                        </div>
                    </div>
                    <div class="dacdiem-mid">
                        <img src="./images/dacdiem.png" alt="">
                    </div>
                    <div class="dacdiem-right">
                        <div class="box-dacdiem dd3">
                            <h1>THỐNG KÊ TRAFFIC </h1>
                            <p>Tất cả thông tin được hiện ra qua TAPUS đều hoàn toàn được bố trí và tùy chỉnh bởi cá nhân khách hàng. TAPUS hỗ trợ mọi định dạng thông tin bao gồm hình ảnh, văn bản, liên kết và video.</p>
                        </div>
                        <div class="box-dacdiem dd4">
                            <h1>ĐA DẠNG HÌNH THỨC</h1>
                            <p>TAPUS cho ra đời đa dạng sản phẩm với đặc điểm và phục vụ cho nhiều mục đích khác nhau.</p>
                        </div>
                    </div>
                </div>
            </section>
<?php
    require_once('templates/footer.php');
?>