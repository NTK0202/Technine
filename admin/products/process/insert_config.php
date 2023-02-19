<?php
require '../../connect.php';

$url = '../form_insert_config.php';
$ten_cau_hinh = $_POST['ten_cau_hinh'];

$error = array();
$regex_ten = "/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ_ ]+)$/";
if(empty($ten_cau_hinh)){
    $error['loi_ten'] = 'Bạn chưa nhập tên cấu hình';
}
else if(!preg_match($regex_ten, $ten_cau_hinh)){
    $error['loi_ten'] = 'Tên không hợp lệ';
}
if(!$error) {
    $sql = "insert into cau_hinh(ten) value('$ten_cau_hinh')";
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