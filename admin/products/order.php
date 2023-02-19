<?php include '../head.php'; ?>

<link rel="stylesheet" href="./style_form_insert.css">
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="../fonts-icon/themify-icons/themify-icons.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Readex+Pro&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<body>

<?php
include '../menu.php';
require '../connect.php';
$sql_order = "SELECT hoa_don.ma, laptop.ten AS ten_san_pham, so_dia_chi.ten_nguoi_nhan, so_dia_chi.dia_chi_nhan_hang, so_dia_chi.sdt_nguoi_nhan, 
                     (hoa_don_chi_tiet.so_luong * hoa_don_chi_tiet.gia_san_pham) AS tong_tien
            FROM hoa_don_chi_tiet
            JOIN hoa_don
            ON hoa_don_chi_tiet.ma_hoa_don = hoa_don.ma
            JOIN laptop
            ON hoa_don_chi_tiet.ma_san_pham = laptop.ma
            JOIN khach_hang
            ON khach_hang.ma = hoa_don.ma_khach_hang
            JOIN so_dia_chi 
            ON so_dia_chi.ma_khach_hang = khach_hang.ma";
$result_order = mysqli_query($connect, $sql_order);
?>

<h1> Tất cả đơn hàng </h1>
<div style="width:75%; height:100%; float:right; padding: 50px 50px 1px 1px; border: 1px hidden; display: block; box-sizing: border-box; text-align: center;">
    <table border="1" width="100%">
        <tr>
            <th>Mã</th>
            <th>Tên sản phẩm</th>
            <th>Tên người nhận</th>
            <th>Địa chỉ nhận hàng</th>
            <th>Số điện thoại</th>
            <th>Tổng tiền</th>
        </tr>
        <?php foreach ($result_order as $order){?>
            <tr>
                <td><?php echo $order['ma']; ?></td>
                <td><?php echo $order['ten_san_pham']; ?></td>
                <td><?php echo $order['ten_nguoi_nhan']; ?></td>
                <td><?php echo $order['dia_chi_nhan_hang']; ?></td>
                <td><?php echo $order['sdt_nguoi_nhan']; ?></td>
                <td><?php echo $order['tong_tien']; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php mysqli_close($connect); ?>

</body>
</html>

