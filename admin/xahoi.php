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
require_once('templates/header.php');
?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách mạng xã hội</h1>

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
                                <h3 class="card-title">Danh sách mạng xã hội</h3>

                                <form action="" method="post" class=" d-flex justify-content-end w-100">
                                    <input type="text" name="name" placeholder="Nhập mã hoặc tên mxh" value= <?php  if(isset($_POST['search'])){
                                        echo $_POST['name'];
                                    }
                                    ?>>
                                    <button type="submit" name="search">Search</button>
                                </form>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Tên mạng xã hội</th>
                                        <th>Icon</th>
                                        <th>Position</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql='';
                                    if(isset($_POST['search'])){
                                        $name = $_POST['name'];
                                        $sql = "select * from socials where id like '%$name%' or name like '%$name%' order by id asc";
                                    }else{
                                        $sql = "select * from socials order by id asc";
                                    }
                                    $query = mysqli_query($connect, $sql);
                                    if(mysqli_num_rows($query)>0) {
                                        while ($rowp = mysqli_fetch_assoc($query)) {
                                            echo "<tr>";
                                            echo "<td>" . $rowp['id'] . "</td>";
                                            echo "<td>" . $rowp['name'] . "</td>";
                                            echo "<td> <img width='50px' src='../images/icons/" . $rowp['icon'] . "' alt=''></td>";
                                            echo "<td>" . $rowp['position'] . "</td>";
                                            if ($rowp['position'] != 0 and $rowp['position'] != null) {
                                                echo "<td>
                                            <a href='suasocials.php?id=" . $rowp['id'] . "'>Sửa</a>                                        
                                                </td>";
                                            }
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