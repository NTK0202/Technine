<?php

require '../../connect.php';

$url = '../all_products.php';
$ma_laptop = $_GET['ma'];
$sql_laptop = "delete from laptop where ma = '$ma_laptop'";
mysqli_query($connect, $sql_laptop);
$sql_cau_hinh_laptop = "delete from cau_hinh_laptop where ma_laptop = '$ma_laptop'";
mysqli_query($connect, $sql_cau_hinh_laptop);
$bug = mysqli_error($connect);
echo $bug;
echo "Đã xóa";
header('location:' . $url);
mysqli_close($connect);

?>
