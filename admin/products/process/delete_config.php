<?php

require '../../connect.php';

$url = '../form_insert_config.php';
$ma_cau_hinh = $_GET['ma'];
$sql_cau_hinh_laptop = "SELECT ma
                        FROM cau_hinh_chi_tiet
                        WHERE ma_cau_hinh = '$ma_cau_hinh'";
$ket_qua_cau_hinh_laptop = mysqli_query($connect, $sql_cau_hinh_laptop);
foreach ($ket_qua_cau_hinh_laptop as $x){
    $i = implode(" ", $x);
    $sql = "delete from cau_hinh_laptop where ma_cau_hinh_chi_tiet = '$i'";
    mysqli_query($connect, $sql);
}

$sql_cau_hinh = "delete from cau_hinh where ma = '$ma_cau_hinh'";
mysqli_query($connect, $sql_cau_hinh);
$sql_chi_tiet = "delete from cau_hinh_chi_tiet where ma_cau_hinh = '$ma_cau_hinh'";
mysqli_query($connect, $sql_chi_tiet);

$bug = mysqli_error($connect);
echo $bug;
echo "Đã xóa";
header('location:' . $url);
mysqli_close($connect);

?>
