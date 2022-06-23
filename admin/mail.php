<?php
    require_once "../config.php";
    $db = new Database();
    $connect = $db->getConnect();
    if(isset($_SESSION['username'])){
        
        if($_SESSION['level'] == "1" ){
            $username = $_SESSION['username'];
            $querycf = mysqli_query($connect, "SELECT * FROM config");
            $rowcf = mysqli_fetch_assoc($querycf);
            
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
                <h3 class="card-title">Cấu hình nhận email</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email nhận thông báo</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $rowcf['email'];?>">
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
              </form>
              <?php
                if(isset($_POST['email'])){
                    $email = $_POST['email'];
                    mysqli_query($connect,"UPDATE config SET email='$email'");
                    echo "<script>alert('Cập nhật thành công');
                        window.location.replace('mail.php')
                        </script>";
                }
              ?>
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