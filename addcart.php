<?php
session_start();
require_once "config.php";
$db = new Database();
$connect = $db->getConnect();

$id=0;
if(isset($_GET['item']) or isset($_GET['id'])){
    if(isset($_GET['item'])){
        $id = $_GET['item'];
    }else{
        $id = $_GET['id'];
    }
    $query = mysqli_query($connect,"select * from products where id = $id");
    $row = mysqli_fetch_assoc($query);
    $price = $row['price'];
    if(isset($_SESSION['cart'][$id])){
        $qty = $_SESSION['cart'][$id]['quantity'];
        $qty++;
        $res = $qty * $price;
        $_SESSION['cart'][$id] = array(
            "quantity" => $qty,
            "total" => $res
        );
    }
    else{
        $_SESSION['cart'][$id] = array(
            "quantity" => 1,
            "total" => $price
        );
    }

    if(isset($_GET['item'])){
        header("location:gio-hang.php");
        exit();
    }else{
        $_SESSION['addcart'] = "thành công";
        echo "<script>window.history.back()</script>";
    }


}


?>

