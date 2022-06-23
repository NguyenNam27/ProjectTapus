<?php
    require_once "updateProfile.php";
    require_once "config.php";
    $db = new Database();
    $connect = $db->getConnect();

    $update = new UpdateProfile('kientran');

    if(isset($_POST['submit'])){
        $update->updateInfomation($_POST['name'],$_POST['regency'],$_POST['image'],$_POST['des']);
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="name">
    <input type="text" name="regency">
    <input type="text" name="image">
    <input type="text" name="des">

    <input type="submit" name="submit">
</form>

<?php
$querry = mysqli_query($connect,"select * from banks");
while($show_banks = mysqli_fetch_assoc($querry)){
    ?>
    <div class="choose choose-item ">
        <img src="../images/<?php echo $show_banks['icon'] ?>" alt="">
        <p><?php echo $show_banks['name'] ?></p>
    </div>
    <?php
}
?>
</body>
</html>
