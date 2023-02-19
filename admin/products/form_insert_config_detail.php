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
$sql_detail = "SELECT cau_hinh_chi_tiet.ma, cau_hinh.ten, cau_hinh_chi_tiet.gia_tri
            FROM cau_hinh_chi_tiet
            JOIN cau_hinh
            ON cau_hinh_chi_tiet.ma_cau_hinh = cau_hinh.ma";
$ket_qua_cau_hinh_chi_tiet = mysqli_query($connect, $sql_detail);
?>

<div>
    <h1> Thêm cấu hình chi tiết </h1>
    <form class="form" method="post" action="process/insert_config_detail.php">
        Tên cấu hình
        <select name="ten_cau_hinh" style="font-size: 20px;">
            <?php
            $sql_cau_hinh = "SELECT * FROM cau_hinh";
            $ket_qua_cau_hinh = mysqli_query($connect, $sql_cau_hinh);
            foreach ($ket_qua_cau_hinh

            as $cau_hinh){
            ?>
            <option name="ten_cau_hinh" value="<?php echo $cau_hinh['ma']; ?>">
                <?php
                echo $cau_hinh['ten'];
                }
                ?>
            </option>
        </select>
        <br>
        Giá trị
        <input type="text" name="gia_tri" id="gia_tri">
        <span id="loi_gia_tri" class="loi"></span>
        <br>
        <br>
        <button type="submit" onclick="return validate()">Thêm</button>
    </form>
</div>

<div style="width:75%; height:100%; float:right; padding: 50px 50px 1px 1px; border: 1px hidden; display: block; box-sizing: border-box; text-align: center;">
    <table border="1" width="100%">
        <tr>
            <th>Mã</th>
            <th>Tên cấu hình</th>
            <th>Chi tiết</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($ket_qua_cau_hinh_chi_tiet as $chi_tiet){?>
            <tr>
                <td><?php echo $chi_tiet['ma']; ?></td>
                <td><?php echo $chi_tiet['ten']; ?></td>
                <td><?php echo $chi_tiet['gia_tri']; ?></td>
                <td>
                    <a href="./process/delete_config_detail.php?ma=<?php echo $chi_tiet['ma']; ?>">
                        X
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<script>
    function validate() {
        let gia_tri = document.getElementById('gia_tri').value;
        let regex_gia_tri = /^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ_\s\S]+)$/;
        if(gia_tri.length === 0){
            document.getElementById('loi_gia_tri').innerHTML = 'Giá trị không được để trống';
            return false;
        }
        else if(!regex_gia_tri.test(gia_tri)) {
            document.getElementById('loi_gia_tri').innerHTML = 'Giá trị không hợp lệ';
            return false;
        }
    }
</script>

<?php mysqli_close($connect); ?>

</body>
</html>

