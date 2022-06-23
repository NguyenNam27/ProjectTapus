<?php
    require_once('../config.php');
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
            <h1>Trang quản trị</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php
    require_once('templates/footer.php');
?>