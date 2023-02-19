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
$sql_config = "select * from cau_hinh";
$ket_qua_cau_hinh = mysqli_query($connect, $sql_config);
?>

<div>
    <h1> Thêm cấu hình laptop </h1>
    <form class="form" method="post" action="./process/insert_config.php">
        Tên
        <input type="text" name="ten_cau_hinh" id="ten_cau_hinh">
        <span id="loi_ten" class="loi"></span>
        <br>
        <br>
        <button type="submit" onclick="return validate()">Thêm</button>
    </form>
</div>

<div style="width:75%; height:100%; float:right; padding: 50px 50px 1px 1px; border: 1px hidden; display: block; box-sizing: border-box; text-align: center;">
    <table border="1" width="100%">
    <tr>
        <th>Mã cấu hình</th>
        <th>Tên cấu hình</th>
        <th>Xóa</th>
    </tr>
    <?php foreach ($ket_qua_cau_hinh as $cau_hinh){?>
    <tr>
        <td><?php echo $cau_hinh['ma']; ?></td>
        <td><?php echo $cau_hinh['ten']; ?></td>
        <td>
            <a href="./process/delete_config.php?ma=<?php echo $cau_hinh['ma']; ?>">
                X
            </a>
        </td>
    </tr>
    <?php } ?>
</table>
</div>

<script>
    function validate() {
        let ten_cau_hinh = document.getElementById('ten_cau_hinh').value;
        let regex_ten_cau_hinh = /^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ_ ]+)$/;
        if(ten_cau_hinh.length === 0){
            document.getElementById('loi_ten').innerHTML = 'Tên không được để trống';
            return false;
        }
        else if(!regex_ten_cau_hinh.test(ten_cau_hinh)) {
            document.getElementById('loi_ten').innerHTML = 'Tên không hợp lệ';
            return false;
        }
    }
</script>

<?php mysqli_close($connect); ?>

</body>
</html>

