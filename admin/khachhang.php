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
    require_once('templates/header.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Khách hàng</h1>
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
                <h3 class="card-title">Danh sách khách hàng</h3>
                  <form action="" method="post" class=" d-flex justify-content-end w-100">
                      <input type="text"     <input type="text" name="id" placeholder="Nhập mã khách hàng" value= <?php  if(isset($_POST['search'])){
                          echo $_POST['id'];
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
                      <th>Tên khách hàng</th>
                      <th>Email</th>
                      <th>Avatar</th>
                      <th>Mô tả</th>
                      <th>Số điện thoại</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = '';
                    if(isset($_POST['search'])){
                        $id = $_POST['id'];
                        $sql = "select * from users where id like'%$id%' or name like '%$id%' or email like '%$id%'";
                    }else{
                        $sql = "select * from users";
                    }
                        $query = mysqli_query($connect, $sql);
                        if(mysqli_num_rows($query)>0) {
                            while ($rowp = mysqli_fetch_assoc($query)) {
                                echo "<tr>";
                                echo "<td>" . $rowp['id'] . "</td>";
                                echo "<td>" . $rowp['name'] . "</td>";
                                echo "<td>" . $rowp['email'] . "</td>";
                                echo "<td> <img width='50px' src='../images/avatar/" . $rowp['avatar'] . "' alt=''></td>";
                                echo "<td>" . $rowp['description'] . "</td>";
                                echo "<td>" . $rowp['phone'] . "</td>";
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