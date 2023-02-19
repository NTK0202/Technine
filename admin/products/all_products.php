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
$sql_laptop = "SELECT * FROM laptop";
$ket_qua_laptop = mysqli_query($connect, $sql_laptop);
?>

<div style="width:80%; height:100%; float:right; padding: 100px 10px 1px 1px; border: 1px hidden; display: block; box-sizing: border-box; text-align: center;">
    <button style="float:right; margin-bottom: 5px">
        <a href="./form_insert.php">Thêm sản phẩm mới</a>
    </button>
    <table border="1" width="100%">
        <tr>
            <th>Mã laptop</th>
            <th>Tên laptop</th>
            <th>Giá</th>
            <th>Cấu hình</th>
            <th>Chỉnh sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($ket_qua_laptop as $laptop){?>
        <tr>
            <td><?php echo $laptop['ma']; ?></td>
            <td><?php echo $laptop['ten']; ?></td>
            <td><?php echo $laptop['gia']; ?></td>
            <td>
                <a href="./read_config.php?ma=<?php echo $laptop['ma']?>">
                    Xem
                </a>
            </td>
            <td>
                <a href="form_update_laptop.php?ma=<?php echo $laptop['ma']; ?>">
                    Sửa
                </a>
            </td>
            <td>
                <a href="./process/delete_laptop.php?ma=<?php echo $laptop['ma']; ?>">
                    X
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php mysqli_close($connect); ?>

</body>
</html>
