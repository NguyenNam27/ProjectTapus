<?php
    require_once('../config.php');
    $db = new Database();
    $connect = $db->getConnect();
    if(isset($_SESSION['username'])){

            $username = $_SESSION['username'];
            $queryu = mysqli_query($connect, "SELECT * FROM users WHERE username='$username'");
            $rowu = mysqli_fetch_assoc($queryu);
            

    }
    else echo "<script>window.location.replace('../login.php')</script>";
    require_once('templates/header.php');

if(isset($_POST['update']) and isset($_FILES['avatar'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $email_hidden = $_POST['email_hidden'];
    $description = $_POST['description'];
    $phone = $_POST['phone'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $linkedin = $_POST['linkedin'];
    if ($_FILES['avatar']['error'] > 0)
    {
        $avatar = $_POST['hidden'];
    }
    else {
        $avatar = time() . $_FILES['avatar']['name'];
        move_uploaded_file($_FILES['avatar']['tmp_name'], '../images/avatar/' . $avatar);
    }

    if($email!=$email_hidden){
        if(mysqli_num_rows(mysqli_query($connect,"SELECT * FROM users WHERE users.email = '$email'")) > 0){
            echo "<script>alert('Email đã tồn tại !! Vui lòng nhập email khác');</script>";
        }

        else{
            mysqli_query($connect, "UPDATE users SET name='$name',email='$email',description='$description', phone='$phone', avatar='$avatar', facebook='$facebook', 
                    instagram='$instagram', linkedin='$linkedin' WHERE username='$username'");
            echo "<script>alert('Cập nhật thành công');
            window.location.replace('info.php')
            </script>";
        }
    }else{
        mysqli_query($connect, "UPDATE users SET name='$name', description='$description', phone='$phone', avatar='$avatar', facebook='$facebook', 
                    instagram='$instagram', linkedin='$linkedin' WHERE username='$username'");
        echo "<script>alert('Cập nhật thành công');
            window.location.replace('info.php')
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
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên hiển thị</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?php echo $rowu['name'];?>">
                  </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $rowu['email'];?>">
                        <input type="hidden" name="email_hidden" class="form-control" id="exampleInputEmail1" value="<?php echo $rowu['email'];?>">
                    </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label><br>
                    <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $rowu['description'];?> </textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" value="<?php echo $rowu['phone'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Avatar</label>
                    <input type="file" name="avatar" class="form-control" id="exampleInputEmail1" value="<?php echo $rowu['avatar'];?>">
                      <img src="../images/avatar/<?php echo $rowu['avatar'];?>" width="200px" alt="">
                      <input type="hidden" name="hidden" class="form-control" id="exampleInputEmail1" value="<?php echo $rowu['avatar'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Facebook</label>
                    <input type="text" name="facebook" class="form-control" id="exampleInputEmail1" value="<?php echo $rowu['facebook'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Instagram</label>
                    <input type="text" name="instagram" class="form-control" id="exampleInputEmail1" value="<?php echo $rowu['instagram'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Linked In</label>
                    <input type="text" name="linkedin" class="form-control" id="exampleInputEmail1" value="<?php echo $rowu['linkedin'];?>">
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