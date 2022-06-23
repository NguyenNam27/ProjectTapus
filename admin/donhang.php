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
    require_once "../sendmail.php";
    $mail = new Mailer();
    if(isset($_POST['duyet'])){
        $id = $_POST['id'];
        mysqli_query($connect, "UPDATE orders SET status = '1' WHERE id='$id'");
        $getMail = mysqli_fetch_assoc(mysqli_query($connect, "select * from orders where id = $id"));

        $email = $getMail['email'];
        $title_mail = "Đặt hàng thành công";
        $content_mail = "Đơn hàng của bạn đã được xác nhận. Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi!";

        $mail->sendMail($email,$content_mail,$title_mail);
    }
    if(isset($_POST['huy'])){
        $id = $_POST['id'];
        mysqli_query($connect, "UPDATE orders SET status = '2' WHERE id='$id'");
        $getMail = mysqli_fetch_assoc(mysqli_query($connect, "select * from orders where id = $id"));

        $email = $getMail['email'];
        $title_mail = "Đơn hàng đã bi hủy";
        $content_mail = "Đơn hàng của bạn bị hủy....!";

        $mail->sendMail($email,$content_mail,$title_mail);
    }
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Đơn đặt hàng</h1>
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
                <h3 class="card-title">Danh sách đơn đặt hàng</h3>
                  <form action="" method="post" class="d-flex justify-content-end w-100">
                      <select name="status" id="">
                          <option value="-" <?php   if(isset($_POST['search']) and ($_POST['status'] == '-')){
                                    echo 'selected';
                                }
                          ?>>Tất cả</option>
                          <option value="0" <?php  if(isset($_POST['search']) and ($_POST['status'] == 0)){
                              echo 'selected';
                          } ?>>Đang chờ duyệt</option>
                          <option value="1" <?php  if(isset($_POST['search']) and ($_POST['status'] == 1)){
                              echo 'selected';
                          } ?>>Đã thanh toán</option>
                          <option value="2" <?php  if(isset($_POST['search']) and ($_POST['status'] == 2)){
                              echo 'selected';
                          } ?>>Đã hủy</option>
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
                      <th>Tên khách hàng</th>
                      <th>Email</th>
                      <th>Số điện thoại</th>
                      <th>Thành phố</th>
                      <th>Quận</th>
                      <th>Phường</th>
                      <th>Địa chỉ</th>
                      <th>Phương thức thanh toán</th>
                      <th>Trạng thái</th>
                      <th>Chức năng</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql = '';
                        if(isset($_POST['search'])){
                            $valueStatus = $_POST['status'];
                            switch ($valueStatus){
                                case '-': $sql = "select orders.*,payments_method.name as method_name from orders inner join payments_method on orders.payment_method = payments_method.id order by id desc"; break;
                                case 0: $sql = "select orders.*,payments_method.name as method_name from orders inner join payments_method on orders.payment_method = payments_method.id where status = $valueStatus order by id desc"; break;
                                case 1: $sql = "select orders.*,payments_method.name as method_name from orders inner join payments_method on orders.payment_method = payments_method.id where status = $valueStatus order by id desc"; break;
                                case 2: $sql = "select orders.*,payments_method.name as method_name from orders inner join payments_method on orders.payment_method = payments_method.id where status = $valueStatus order by id desc"; break;
                            }
                        }else{
                            $sql = "select orders.*,payments_method.name as method_name from orders inner join payments_method on orders.payment_method = payments_method.id order by orders.id desc";
                        }
                        $query = mysqli_query($connect, $sql);
                        if(mysqli_num_rows($query)>0) {
                            while ($rowp = mysqli_fetch_assoc($query)) {
                                echo "<tr>";
                                echo "<td>" . $rowp['id'] . "</td>";
                                echo "<td>" . $rowp['name'] . "</td>";
                                echo "<td>" . $rowp['email'] . "</td>";
                                echo "<td>" . $rowp['phone'] . "</td>";
                                echo "<td>" . $rowp['city'] . "</td>";
                                echo "<td>" . $rowp['state'] . "</td>";
                                echo "<td>" . $rowp['ward'] . "</td>";
                                echo "<td>" . $rowp['address'] . "</td>";
                                echo "<td>" . $rowp['method_name'] . "</td>";
                                if ($rowp['status'] == 0) {
                                    echo "<td><span style='color: yellow;'>Chờ thanh toán</span></td>";
                                } else if ($rowp['status'] == 1) {
                                    echo "<td><span style='color: green;'>Đã thanh toán</span></td>";
                                } else echo "<td><span style='color: red;'>Đã hủy</span></td>";
                                echo "<td id='getID'>";
                                echo "     <form action='' method='POST'>";
                                echo "         <input id='id' style='display:none' name='id' type='text' value='" . $rowp['id'] . "'>";
                                if ($rowp['status'] == 0) echo "         <input type='submit' name='duyet' value='Duyệt'> | ";
                                if ($rowp['status'] != 2) echo "         <input type='submit' name='huy' value='Hủy'>";
                                echo "     </form>";
                                echo " </td>";
                                echo "<td>";
                                echo "<button type='button' class='show'  data-toggle='modal' data-target='#exampleModal'>
                                    Chi tiết đơn hàng
                            </button>";
                                echo "</td>";
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
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- /.content-wrapper -->
  
<?php
    require_once('templates/footer.php');
?>

<script>
    $(document).ready(function(){
        $('.show').click(function(e){
            e.preventDefault();
            var that = $(this);
            var id = that.parent().siblings('#getID').children().children('#id').val();
            console.log(id);
            // $.ajax({
            //    type: 'POST',
            //    url: '../test.php',
            //     data: 100,
            //     success: function (response){
            //        alert('ok');
            //        console.log(response);
            //     }
            //     error: function(response){
            //        alert('error');
            //     }
            // });
                $(".modal-body").load("show-order-details.php", {id: id});
        });
    });
</script>


