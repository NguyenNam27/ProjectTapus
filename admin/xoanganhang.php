<?php
require_once('../config.php');
$db = new Database();
$connect = $db->getConnect();
if(isset($_SESSION['username'])){
    if($_SESSION['level'] == "1" ){
        $username = $_SESSION['username'];
        $queryu = mysqli_query($connect, "SELECT * FROM users WHERE username='$username'");
        $rowu = mysqli_fetch_assoc($queryu);
    }
    else echo "<script>window.location.replace('../index.php')</script>";
}
else echo "<script>window.location.replace('../login.php')</script>";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($connect,"delete from banks where id = $id");
    header("Location: nganhang.php");
}
?>