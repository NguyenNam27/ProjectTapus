<?php
    require_once('config.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $query = mysqli_query($connect, "SELECT * FROM products WHERE id='$product_id'");
        $rowp = mysqli_fetch_assoc($query);
    }
    if(isset($_POST['dathang'])){
        $querycf = mysqli_query($connect, "SELECT * FROM config");
        $rowcf = mysqli_fetch_assoc($querycf);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST['tinhthanh'];
        $state = $_POST['quanhuyen'];
        $ward = $_POST['phuongxa'];
        $address = $_POST['address'];
        $shipping_method = $_POST['phuongthuc'];
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $voucher = $_POST['voucher'];
        $feeship = $_POST['feeShip'];
        $total = $_POST['total'];
        mysqli_query($connect, "INSERT INTO `orders`(name,email,phone,city,state,ward,address,shipping_method,product_id,quantity,voucher,feeship,total) 
                                VALUES('$name','$email','$phone','$city','$state','$ward','$address','$shipping_method','$product_id','$quantity','$voucher','$feeship','$total')");
        
        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'hoangloki12kk@gmail.com';                     //SMTP username
            $mail->Password   = 'xexdmquorxlgsmkv';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('hoangloki12kk@gmail.com', 'Tapus');
            $mail->addAddress($rowcf['email']);     //Add a recipient
        
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'New order from TAPUS';
            $mail->Body    = 'Bạn có 1 đơn hàng mới tại Tapus. Vui lòng check trong trang quản lý!';
        
            $mail->send();
            echo "  <script>
                    alert('Đặt hàng thành công!')
                    window.location.href('index.php')
            </script>";

        } catch (Exception $e) {
            echo "Lỗi hệ thống: {$mail->ErrorInfo}";
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/checkout.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <title>Thanh Toán</title>
</head>
<body>
    <div class="row1">
        <a href="index.php" class="logo">TAPUS.</a>
        <a href="login.php" class="dangnhap">ĐĂNG NHẬP</a>
    </div>
    <form action="" method="POST">
        <div class="row2">
            <div class="thongtin">
                <div class="title">
                    THÔNG TIN THANH TOÁN
                </div>
                <input type="text" name="product_id" value="<?php echo $product_id; ?>" style="display:none;">
                <input type="text" id="name" name="name" placeholder="Họ và Tên">
                <input type="text" id="email" name="email" placeholder="Email">
                <input type="text" id="phone" name="phone" max="10" placeholder="Số điện thoại">
                <div class="group1">
                    <input type="text" id="tinhthanh" name="tinhthanh" placeholder="Tỉnh/Thành phố">
                    <input type="text" id="quanhuyen" name="quanhuyen" placeholder="Quận/Huyện">
                    <input type="text" id="phuongxa" name="phuongxa" placeholder="Phường/Xã">  
                </div>                              
                <input type="text" id="address" name="address" placeholder="Số nhà, tên đường...">
                
                <div class="title2">
                    PHƯƠNG THỨC THANH TOÁN
                </div>
                <div class="radio-group">
                    <input type="radio" id="COD" name="phuongthuc" value="1" checked> <p>Thanh toán khi nhận hàng (COD)</p>
                </div>
                
            </div>
            <div class="banggia">
                <div class="banggia-nen">
                    <div class="item-info">
                        <img src="./images/sanpham1.png" alt="">
                        <div class="item-info-text">
                            <div class="item-name"><?php echo $rowp['name']; ?></div>
                            <div class="item-price">GIÁ: <span id="gia"><?php echo $rowp['price']; ?></span></div>
                            <div class="quantity">
                                <div id="down" onclick="downgia()">-</div>
                                <input type="text" id="quantity" name="quantity" onkeyup="thaydoigia()" value="1">
                                <div id="up" onclick="upgia()">+</div>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="voucher">
                        <input type="text" id="voucher" name="voucher" placeholder="Mã giảm giá">
                        <button id="applyVoucher">ÁP DỤNG</button>
                    </div>
                    <div class="voucher">
                        <div class="text1" >Phí ship</div>
                        <input type="text" name="feeShip" id="feeship" value="0" style="display:none;">
                        <p class="feeShip" id="phiship">0 VNĐ</p> 
                    </div>
                    <div class="voucher">
                        <div class="text2">TỔNG</div>
                        <p class="total" id="tong"><?php echo $rowp['price']; ?> VNĐ</p> 
                        <input type="text" name="total" id="total" value="<?php echo $rowp['price']; ?>" style="display:none;">
                    </div>
                    
                    <input type="submit" id="dathang" name="dathang" value="HOÀN TẤT ĐƠN HÀNG">
                </div>    
            </div>
        </div>
    </form>

    <script src="./js/checkout.js"></script>
</body>
</html>