<?php
require_once "../config.php";
$db = new Database();
$connect = $db->getConnect();
if(isset($_SESSION['username'])){

    if($_SESSION['level'] == "1" ){
        $username = $_SESSION['username'];
    }
    else echo "<script>window.location.replace('../index.php')</script>";
}
else echo "<script>window.location.replace('../login.php')</script>";

if(isset($_POST['duyet'])){
    $id = $_POST['id'];
    mysqli_query($connect,"update contacts set status=1 where id = $id");
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
                        <h1>Danh sách đăng ký liên hệ</h1>
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
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">Danh sách đăng ký liên hệ</h3>
                                <form action="" method="post" class=" d-flex justify-content-end w-100">
                                    <select name="status" id="">
                                        <option value="-" <?php   if(isset($_POST['search']) and ($_POST['status'] == '-')){
                                            echo 'selected';
                                        }
                                        ?>>Tất cả</option>
                                        <option value="0" <?php  if(isset($_POST['search']) and ($_POST['status'] == 0)){
                                            echo 'selected';
                                        } ?>>Chưa phản hồi</option>
                                        <option value="1" <?php  if(isset($_POST['search']) and ($_POST['status'] == 1)){
                                            echo 'selected';
                                        } ?>>Đã phản hồi</option>
                                    </select>

                                    <button type="submit" name="search">Search</button>
                                </form>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Tên người gửi</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Nội dung liên hệ</th>
                                        <th>Trạng thái</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = '';
                                    if(isset($_POST['search'])){
                                        $valueStatus = $_POST['status'];
                                        switch ($valueStatus){
                                            case '-': $sql = "select * from contacts order by id desc"; break;
                                            case 0: $sql = "select * from contacts where status = $valueStatus order by id desc";
                                            case 1: $sql = "select * from contacts where status = $valueStatus order by id desc";
                                        }
                                    }else{
                                        $sql = "select * from contacts order by id desc";
                                    }
                                    $query = mysqli_query($connect, $sql);
                                    if(mysqli_num_rows($query)>0) {
                                        while ($rowp = mysqli_fetch_assoc($query)) {
                                            echo "<tr>";
                                            echo "<td>" . $rowp['id'] . "</td>";
                                            echo "<td>" . $rowp['name'] . "</td>";
                                            echo "<td>" . $rowp['email'] . "</td>";
                                            echo "<td>" . $rowp['phone'] . "</td>";
                                            echo "<td>" . $rowp['content'] . "</td>";
                                            if ($rowp['status'] == 0) {
                                                echo "<td><span style='color: red'>Chưa phản hồi</span></td>";
                                            } else {
                                                echo "<td><span style='color: green'>Đã phản hồi</span></td>";
                                            }
                                            echo "<td>";
                                            echo "     <form action='' method='POST'>";
                                            echo "         <input id='id' style='display:none' name='id' type='text' value='" . $rowp['id'] . "'>";
                                            if ($rowp['status'] == 0) echo "         <input type='submit' name='duyet' value='Duyệt'>";
                                            echo "     </form>";
                                            echo " </td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>

                                    </tbody>
                                </table>
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