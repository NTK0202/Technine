<?php include '../head.php'; ?>

<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="../fonts-icon/themify-icons/themify-icons.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Readex+Pro&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php
include '../menu.php';
require '../connect.php';
$ma_laptop = $_GET['ma'];
$sql_config = "SELECT cau_hinh.ten AS ten_cau_hinh, cau_hinh_chi_tiet.gia_tri
                FROM cau_hinh_chi_tiet
                JOIN cau_hinh
                ON cau_hinh_chi_tiet.ma_cau_hinh = cau_hinh.ma
                JOIN cau_hinh_laptop
                ON cau_hinh_laptop.ma_cau_hinh_chi_tiet = cau_hinh_chi_tiet.ma
                JOIN laptop
                ON laptop.ma = cau_hinh_laptop.ma_laptop
                WHERE laptop.ma = '$ma_laptop'";
$result_config = mysqli_query($connect, $sql_config);
?>

<div style="width:80%; height:100%; float:right; padding: 100px 10px 1px 1px; border: 1px hidden; display: block; box-sizing: border-box; text-align: center;">
    <h1 style="color: #018DE3;">
        Chi tiết cấu hình
    </h1>
    <table border="1" width="100%">
        <tr>
            <th>Tên cấu hình</th>
            <th>Chi tiết cấu hình</th>
        </tr>
        <?php foreach ($result_config as $config){?>
            <tr>
                <td><?php echo $config['ten_cau_hinh']; ?></td>
                <td><?php echo $config['gia_tri']; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php mysqli_close($connect); ?>

</body>
</html>
