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
$ma_laptop = $_GET['ma'];
$sql_update_laptop = "select * from laptop where ma = $ma_laptop";
$ket_qua_laptop = mysqli_query($connect, $sql_update_laptop);
$laptop = mysqli_fetch_array($ket_qua_laptop);

$sql_cau_hinh = "SELECT * FROM cau_hinh";
$ket_qua_cau_hinh = mysqli_query($connect, $sql_cau_hinh);

$sql_cau_hinh_chi_tiet = "SELECT * FROM cau_hinh_chi_tiet";
$ket_qua_cau_hinh_chi_tiet = mysqli_query($connect, $sql_cau_hinh_chi_tiet);
?>
<div>
    <h1> Chỉnh sửa sản phẩm </h1>
    <form class="form" method="post" action="./process/update_laptop.php">
        <input type="hidden" name="ma" value="<?php echo $ma_laptop ?>">
        Tên laptop
        <input type="text" name="ten_laptop"  id="ten_laptop" value="<?php echo $laptop['ten'] ?>">
        <span id="loi_ten" class="loi" ></span>
        <br>
        <br>
        Giá
        <input type="number" name="gia" id="gia_laptop" value="<?php echo $laptop['gia'] ?>">
        <span id="loi_gia" class="loi"></span>
        <br>
        <br>
        <div class="form-config" style="padding:5px; border:3px solid white; box-sizing: border-box; background-color: #c2d1f0; border-radius: 5px">
            Tên cấu hình
            <select name="ten_cau_hinh" style="font-size: 20px; padding: 2px; border: 1px solid #333333; box-sizing: border-box; margin: 8px;">
                <?php
                foreach ($ket_qua_cau_hinh as $cau_hinh){
                ?>
                <option name="ten_cau_hinh" value="<?php echo $cau_hinh['ma']; ?>">
                    <?php
                    echo $cau_hinh['ten'];
                    }
                    ?>
                </option>
            </select>
            Chi tiết cấu hình
            <select name="cau_hinh_chi_tiet[]" style="font-size: 20px; padding: 2px; border: 1px solid #333333; box-sizing: border-box; margin: 8px;">
                <?php
                foreach ($ket_qua_cau_hinh_chi_tiet as $chi_tiet){
                ?>
                <option name="cau_hinh_chi_tiet[]" value="<?php echo $chi_tiet['ma']; ?>">
                    <?php
                    echo $chi_tiet['gia_tri'];
                    }
                    ?>
                </option>
            </select>
        </div>

        <div id="education_fields">

        </div>
        <br>
        <input type="button" class="btn btn-add" id="add" style="padding: 3px 4px; border-radius: 5px;width: 40px;" value="+" onclick="add_config();">
        <br>
        <button type="submit" class="btn" value="Sửa" onclick="return validate()">Sửa</button>
    </form>
</div>

<script>
    let i = 1;
    function add_config() {
        i++;
        let obj = document.getElementById('education_fields');
        let divtest = document.createElement("div");
        divtest.setAttribute("class", "form" + i);
        let rdiv = 'form' + i;
        divtest.innerHTML = "<div class='form-config' style='padding:5px; border:3px solid white; box-sizing: border-box; background-color: #c2d1f0; border-radius: 5px'>\n" +
            "            Tên cấu hình\n" +
            "            <select name='ten_cau_hinh' style='font-size: 20px; padding: 2px; border: 1px solid #333333; box-sizing: border-box; margin: 8px;'>\n" +
            "                <?php foreach ($ket_qua_cau_hinh as $cau_hinh){?>" +
            "                <option name='ten_cau_hinh' value='<?php echo $cau_hinh["ma"];?>'><?php echo $cau_hinh['ten'];}?>\n" +
            "                </option>\n" +
            "            </select>\n" +
            "            Chi tiết cấu hình\n" +
            "            <select name='cau_hinh_chi_tiet[]' style='font-size: 20px; padding: 2px; border: 1px solid #333333; box-sizing: border-box; margin: 8px;'>\n" +
            "                <?php foreach ($ket_qua_cau_hinh_chi_tiet as $chi_tiet){?>\n" +
            "                <option name='cau_hinh_chi_tiet[]' value='<?php echo $chi_tiet['ma'];?>'><?php echo $chi_tiet["gia_tri"]; }?>\n" +
            "                </option>\n" +
            "            </select><br>" +
            "            <input type=\"button\" value=\"-\" class=\"btn\" style=\"padding: 2px 4px 5px 4px; border-radius: 5px;width: 40px; background-color: #ff0000\" onClick=\"remove_config("+i+")\">\n" +
            "            </div>";
        obj.appendChild(divtest)
    }

    function remove_config(rid) {
        $('.form' + rid).remove();
    }

</script>

<script>
    function validate() {
        let kiem_tra_loi = false;
        let ten_laptop = document.getElementById('ten_laptop').value;
        let gia_laptop = document.getElementById('gia_laptop').value;
        let regex_ten_laptop = /^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ_ ]+)$/;
        if(ten_laptop.length === 0){
            document.getElementById('loi_ten').innerHTML = 'Tên không được để trống';
            kiem_tra_loi = true;
        }
        else if(!regex_ten_laptop.test(ten_laptop)) {
            document.getElementById('loi_ten').innerHTML = 'Tên không hợp lệ';
            kiem_tra_loi = true;
        }
        else {
            document.getElementById('loi_ten').innerHTML = '';
        }
        if(gia_laptop.length === 0) {
            document.getElementById('loi_gia').innerHTML = 'Giá không được để trống';
            kiem_tra_loi = true;
        }
        else {
            document.getElementById('loi_gia').innerHTML = '';
        }
        if(kiem_tra_loi){
            return false;
        }
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php mysqli_close($connect); ?>

</body>
</html>
