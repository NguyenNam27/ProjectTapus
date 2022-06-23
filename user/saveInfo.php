<?php
require_once "../updateProfile.php";
if(isset($_SESSION['username'])){
    if(isset($_POST['name']) and isset($_POST['regency']) and isset($_POST['description'])){
        $name = isset($_POST['name']);
        $regency = isset($_POST['regency']);
        $description = isset($_POST['description']);
        $edit = new UpdateProfile($_SESSION['username']);
        $edit->updateInfomation($name,$regency,'',$description);

    }
}
?>