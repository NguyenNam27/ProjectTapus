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
            <h1>Sản phẩm</h1>
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
                <h3 class="card-title">Danh sách sản phẩm</h3>
                  <a href="addsanpham.php" class="btn btn-success">Thêm sản phẩm</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tên sản phẩm</th>
                      <th>Mô tả</th>
                      <th>Ảnh sản phẩm</th>
                      <th style="width: 40px">Giá</th>
                      <th style="width: 40px">Chức năng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $query = mysqli_query($connect, "SELECT * FROM products");
                        if(mysqli_num_rows($query)>0) {
                            while ($rowp = mysqli_fetch_assoc($query)) {
                                echo "<tr>";
                                echo "<td>" . $rowp['id'] . "</td>";
                                echo "<td>" . $rowp['name'] . "</td>";
                                echo "<td>" . $rowp['description'] . "</td>";
                                echo "<td> <img width='50px' src='../images/imageProducts/" . $rowp['img'] . "' alt=''></td>";
                                echo "<td>" . $rowp['price'] . "</td>";
                                echo "<td><a href='suasanpham.php?id=" . $rowp['id'] . "'>Sửa</a>
<a href='xoasanpham.php?id=" . $rowp['id'] . "' onclick= \"return confirm('Bạn chắc chắn chứ');\">Xóa</a></td>";
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