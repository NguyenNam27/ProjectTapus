<?php
require_once "../config.php";
$db = new Database();
$connect = $db->getConnect();
if(isset($_POST['id'])) {
$id = $_POST['id'];
$sql = mysqli_query($connect,"select * from order_details inner join products on products.id = order_details.product_id where order_id = $id");
?>
<table class="table table-bordered">
    <thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>Tên sản phẩm</th>
        <th>Mã đặt hàng</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($rowp = mysqli_fetch_assoc($sql)){
        echo "<tr>";
        echo "<td>".$rowp['id']."</td>";
        echo "<td>".$rowp['name']."</td>";
        echo "<td>".$rowp['order_id']."</td>";
        echo "<td>".$rowp['quantity']."</td>";
        echo "<td>".$rowp['total']."</td>";
    }
    }
    ?>

    </tbody>
</table>

