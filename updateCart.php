<?php
    session_start();
    require_once "config.php";
    $db = new Database();
    $connect = $db->getConnect();
    if(isset($_POST['id']) && isset($_POST['num'])){
        $id = $_POST['id'];
        $num = $_POST['num'];
        $query = mysqli_query($connect,"select * from products where id = $id");
        $row = mysqli_fetch_assoc($query);
        $price = $row['price'];
        if(isset($_SESSION['cart'][$id])) {
            if ($num < 1) {
                $_SESSION['cart'][$id] = null;
            } else {
                $_SESSION['cart'][$id] = array(
                    "quantity" => $num,
                    "total" => $price * $num
                );
            }
        }
    }
?>

<?php
//    session_start();
//    if(isset($_POST['id']) && isset($_POST['num'])){
//        $id = $_POST['id'];
//        $num = $_POST['num'];
//
//        if(isset($_SESSION['cart'][$id])){
//            $_SESSION['cart'][$id] = $num;
//        }
//    }
//?>
