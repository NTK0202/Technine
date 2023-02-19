<?php

require '../../connect.php';

$url = '../all_products.php';
$ma_laptop = $_POST['ma'];
$ten_laptop = $_POST['ten_laptop'];
$gia = $_POST['gia'];
$ma_chi_tiet = $_POST['cau_hinh_chi_tiet'];


$error = array();
$regex_ten = "/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ_ ]+)$/";
if(empty($ten_laptop)){
    $error['loi_ten'] = 'Bạn chưa nhập tên laptop';
}
else if(!preg_match($regex_ten, $ten_laptop)){
    $error['loi_ten'] = 'Tên không hợp lệ';
}
if(empty($gia)){
    $error['loi_gia'] = 'Bạn chưa nhập giá';
}
if(!$error) {
    $sql_laptop = "update laptop set 
            ten = '$ten_laptop',
            gia = '$gia'
            where 
            ma = '$ma_laptop' ";
    mysqli_query($connect, $sql_laptop);

    $sql_delete_cau_hinh = "delete from cau_hinh_laptop where ma_laptop = '$ma_laptop'";
    mysqli_query($connect, $sql_delete_cau_hinh);


    foreach ($ma_chi_tiet as $chi_tiet) {
        $sql_cau_hinh_laptop = "insert into cau_hinh_laptop(ma_laptop,ma_cau_hinh_chi_tiet) value('$ma_laptop','$chi_tiet')";
        mysqli_query($connect, $sql_cau_hinh_laptop);
    }
    echo "Sửa thành công";
    header('location:' . $url);
}
else {
    echo "Dữ liệu nhập vào không hợp lệ";
}
$bug = mysqli_error($connect);
echo $bug;

mysqli_close($connect);
?>