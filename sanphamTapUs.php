
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if($id == 1){
            require_once('tap-us-pvc.php');
        }
        else if($id ==2){
            require_once('yours-tapus.php');
        }
        else if($id ==3){
            require_once ('Stickus.php');
        }
    }else{
        require_once ('sanpham.php');
    }
?>
