<?php
    require_once "../config.php";
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

    if(isset($_POST['update'])){
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $renewpass = $_POST['renewpass'];
        if($newpass != $renewpass){
            echo "<script>alert('Mật khẩu nhập lại không khớp')</script>";
        }
        else if($rowu['password'] != $oldpass){
            echo "<script>alert('Mật khẩu cũ không đúng')</script>";
        }
        else{
            mysqli_query($connect,"UPDATE users SET password='$newpass' WHERE username='$username'");
            echo "<script>alert('Cập nhật thành công');
            window.location.replace('index.php')
            </script>";
        }           
    }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cấu hình</h1>
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
                <h3 class="card-title">Cấu hình thông tin cá nhân</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mật khẩu cũ</label>
                    <input type="password" name="oldpass" class="form-control" id="exampleInputEmail1" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mật khẩu mới</label>
                    <input type="password" name="newpass" class="form-control" id="exampleInputEmail1" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nhập lại khẩu mới</label>
                    <input type="password" name="renewpass" class="form-control" id="exampleInputEmail1" value="">
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
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