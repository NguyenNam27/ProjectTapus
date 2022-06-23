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
    $get = mysqli_query($connect,"select * from banks where id = $id");
    $rowp = mysqli_fetch_assoc($get);
}

if(isset($_POST['submit']) && isset($_FILES['image'])) {
    $name = $_POST['name'];
    if ($_FILES['image']['error'] > 0)
    {
       $image = $_POST['hidden'];
    }
    else {
        $image = time() . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/iconBanks/' . $image);
    }
    mysqli_query($connect,"update banks set name = '$name',icon = '$image' where id = $id");

    header("Location: nganhang.php");
}

require_once('templates/header.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa ngân hàng</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sửa ngân hàng</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên ngân hàng:</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo $rowp['name'] ?>" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Icon:</label>
                                        <input type="file" name="image" class="form-control" value="" id="exampleInputEmail1">
                                        <input type="hidden" name="hidden" value="<?php echo $rowp['icon'] ?>">
                                        <img src="../images/iconBanks/<?php echo $rowp['icon'] ?>" width="100px;" alt="">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Sửa</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
require_once('templates/footer.php');
?>
