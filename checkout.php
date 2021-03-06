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
            $mail->Body    = 'B???n c?? 1 ????n h??ng m???i t???i Tapus. Vui l??ng check trong trang qu???n l??!';
        
            $mail->send();
            echo "  <script>
                    alert('?????t h??ng th??nh c??ng!')
                    window.location.href('index.php')
            </script>";

        } catch (Exception $e) {
            echo "L???i h??? th???ng: {$mail->ErrorInfo}";
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

    <title>Thanh To??n</title>
</head>
<body>
    <div class="row1">
        <a href="index.php" class="logo">TAPUS.</a>
        <a href="login.php" class="dangnhap">????NG NH???P</a>
    </div>
    <form action="" method="POST">
        <div class="row2">
            <div class="thongtin">
                <div class="title">
                    TH??NG TIN THANH TO??N
                </div>
                <input type="text" name="product_id" value="<?php echo $product_id; ?>" style="display:none;">
                <input type="text" id="name" name="name" placeholder="H??? v?? T??n">
                <input type="text" id="email" name="email" placeholder="Email">
                <input type="text" id="phone" name="phone" max="10" placeholder="S??? ??i???n tho???i">
                <div class="group1">
                    <input type="text" id="tinhthanh" name="tinhthanh" placeholder="T???nh/Th??nh ph???">
                    <input type="text" id="quanhuyen" name="quanhuyen" placeholder="Qu???n/Huy???n">
                    <input type="text" id="phuongxa" name="phuongxa" placeholder="Ph?????ng/X??">  
                </div>                              
                <input type="text" id="address" name="address" placeholder="S??? nh??, t??n ???????ng...">
                
                <div class="title2">
                    PH????NG TH???C THANH TO??N
                </div>
                <div class="radio-group">
                    <input type="radio" id="COD" name="phuongthuc" value="1" checked> <p>Thanh to??n khi nh???n h??ng (COD)</p>
                </div>
                
            </div>
            <div class="banggia">
                <div class="banggia-nen">
                    <div class="item-info">
                        <img src="./images/sanpham1.png" alt="">
                        <div class="item-info-text">
                            <div class="item-name"><?php echo $rowp['name']; ?></div>
                            <div class="item-price">GI??: <span id="gia"><?php echo $rowp['price']; ?></span></div>
                            <div class="quantity">
                                <div id="down" onclick="downgia()">-</div>
                                <input type="text" id="quantity" name="quantity" onkeyup="thaydoigia()" value="1">
                                <div id="up" onclick="upgia()">+</div>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="voucher">
                        <input type="text" id="voucher" name="voucher" placeholder="M?? gi???m gi??">
                        <button id="applyVoucher">??P D???NG</button>
                    </div>
                    <div class="voucher">
                        <div class="text1" >Ph?? ship</div>
                        <input type="text" name="feeShip" id="feeship" value="0" style="display:none;">
                        <p class="feeShip" id="phiship">0 VN??</p> 
                    </div>
                    <div class="voucher">
                        <div class="text2">T???NG</div>
                        <p class="total" id="tong"><?php echo $rowp['price']; ?> VN??</p> 
                        <input type="text" name="total" id="total" value="<?php echo $rowp['price']; ?>" style="display:none;">
                    </div>
                    
                    <input type="submit" id="dathang" name="dathang" value="HO??N T???T ????N H??NG">
                </div>    
            </div>
        </div>
    </form>

    <script src="./js/checkout.js"></script>
</body>
</html>