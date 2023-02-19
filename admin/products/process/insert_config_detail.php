<?php

require '../../connect.php';

$url = '../form_insert_config_detail.php';
$ma_cau_hinh = $_POST['ten_cau_hinh'];
$gia_tri = $_POST['gia_tri'];

$error = array();
$regex = "/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ_ ]+)$/";
if(empty($gia_tri)){
    $error['loi_ten'] = 'Bạn chưa nhập giá trị';
}
else if(!preg_match($regex, $gia_tri)){
    $error['loi_ten'] = 'Giá trị không hợp lệ';
}
if(!$error) {
    $sql = "insert into cau_hinh_chi_tiet(ma_cau_hinh,gia_tri) value('$ma_cau_hinh','$gia_tri')";
    mysqli_query($connect, $sql);
    echo "Thêm thành công";
    header('location:' . $url);
}
else {
    echo "Dữ liệu nhập vào không hợp lệ";
}
$bug = mysqli_error($connect);
echo $bug;
mysqli_close($connect);
?>