<?php

session_start();
if(empty($_SESSION['ten'])){
    header('Location:../index.php?error=Bạn cần đăng nhập');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technine</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../fonts-icon/themify-icons/themify-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<?php
require '../connect.php';
?>

<body>
<div id="div_tong">

    <div id="div_trai" style="background-color: white">
        <ul>
            <li class="menu">
                <h2>
                    <a href="../root" style="font-size: 40px">
                        <span class="logo">9</span>
                        Techn<b class="logo">ine</b>
                    </a>
                </h2>
            </li>
            <li class="menu">
                <a href="../root">
                    <i class="ti-home"></i>
                    <span>Trang chủ</span>
                </a>
            </li>
            <li class="menu">
                <a href="../products/all_products.php">
                    <i class="ti-package"></i>
                    Sản phẩm đang kinh doanh
                </a>
            </li>
            <li class="menu">
                <a href="../products/order.php">
                    <i class="ti-shopping-cart"></i>
                    Đơn hàng
                </a>
            </li>
            <li class="menu">
                <a href="">
                    <i class="ti-settings"></i>
                    Cài đặt
                </a>
            </li>

        </ul>
    </div>

    <div id="div_phai">
        <div class="tren">
            <div class="tim_kiem">
                <a href="../products/process/logout.php" class="tai_khoan">
                    Đăng xuất
                </a>
                <i class="icon ti-bell"></i>
                <i class="icon ti-comment"></i>
                <a href="" class="tai_khoan">
                    <?php echo $_SESSION['ten'] ?>
                </a>
                <button>
                    <a href="../products/form_insert.php">
                        Thêm sản phẩm mới
                    </a>
                </button>
                <button>
                    <a href="../products/all_products.php">
                        Chỉnh sửa sản phẩm
                    </a>
                </button>
            </div>

            <div class="don_hang">
                <ul>
                    <li>
                        <a class="tinh_trang_don_hang" href="../products/order.php">
                            <i class="ti-layers-alt"></i>
                            Tất cả đơn hàng(1052)
                        </a>
                    </li>
                    <li>
                        <a class="tinh_trang_don_hang" href="">
                            <i class="ti-reload"></i>
                            Đang xử lí(363)
                        </a>
                    </li>
<!--                    <li>-->
<!--                        <a class="tinh_trang_don_hang" href="">-->
<!--                            <i class="ti-truck"></i>-->
<!--                            Đang giao(158)-->
<!--                        </a>-->
<!--                    </li>-->
                    <li>
                        <a class="tinh_trang_don_hang" href="">
                            <i class="ti-check-box"></i>
                            Đã giao(624)
                        </a>
                    </li>
                    <li>
                        <a class="tinh_trang_don_hang" href="">
                            <i class="ti-trash"></i>
                            Hủy(65)
                        </a>
                    </li>
                </ul>

            </div>
        </div>

        <div class="duoi">
<!--            <div class="phan_tu_so_1">-->
<!--                <a href="../products/all_products.php">-->
<!--                    <h3>Kho hàng</h3>-->
<!--                </a>-->
<!--                <ul class="kho_hang">-->
<!--                </ul>-->
<!--            </div>-->

            <div class="phan_tu_so_2">
                <h2>Biểu đồ thống kê</h2>
                <div>
                    <canvas id="bieu_do_thong_ke" style="width:55%; height:95%"></canvas>
                </div>
                <script src="../Bieu_do_thong_ke/Bieu_do_thong_ke.js"></script>
            </div>

            <div class="phan_tu_so_3">
                <div class="trai_3">
                    <h2>Tình trạng kinh doanh</h2>
                    <h4>Hoạt động kinh doanh ngày hôm nay</h4>
                    <div>
                        <canvas id="kinh_doanh"></canvas>
                        <script src="../Bieu_do_thong_ke/Tinh_trang_kinh_doanh.js"></script>
                    </div>
                </div>

                <div class="phai_3">
                    <h2>Kế hoạch tổ chức sự kiện sắp diễn ra</h2>
                    <ul>
                        <li><a href="">Black friday</a></li>
                        <li><a href="">Noel</a></li>
                        <li><a href="">Tết nguyên đán</a></li>
                    </ul>
                </div>
            </div>

            <div class="phan_tu_so_4">
                <h2>Phân tích sản phẩm bán ra</h2>
                <div>
                    <canvas id="phan_tich_san_pham_ban_ra"></canvas>
                    <script src="../Bieu_do_thong_ke/Phan_tich_san_pham_ban_ra.js"></script>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$bug = mysqli_error($connect);
echo $bug;

mysqli_close($connect);
?>

</body>
</html>