<?php

session_start();

require_once __DIR__ . '/php/db.php';
require_once __DIR__ . '/php/func.php';

$isLogin = check_login();

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Trang Chủ - Đồ Án Lập Trình Website Cơ Bản</title>
    <script async src="/lib/siema.min.js"></script>
    
    <?php require __DIR__ . '/head.php' ?>
</head>
<body>
    <div class="container">

        <!-- Menu -->
        <?php require __DIR__ . '/temp/menu.php' ?>

        <!-- Main -->
        <div id="main">

            <div id="header">
                <!-- Search bar -->
                <form action="./">
                    <label class="search">
                        <span class="material-icons">search</span>
                        <input type="search" name="search" placeholder="Tìm kiếm sản phẩm">
                    </label>
                </form>
                
                <!-- Slideshow -->
                <div class="siema">
                    <div>
                        <h1>SALE TO CUỐI NĂM</h1>
                        <p>
                            12/12 - Học sinh sinh viên mua laptop được giảm 5%
                            <br>
                            Tối đa 500k
                        </p>
                    </div>

                    <div>
                        <h1>LAPTOP GAMING</h1>
                        <p>
                            RTX 3060 mạnh mẽ, trải nghiệm cực đỉnh
                            <br>
                            Miễn phí giao hàng toàn quốc
                        </p>
                    </div>

                    <div>
                        <h1>LAPTOP VĂN PHÒNG</h1>
                        <p>
                            Giảm sốc cuối năm
                            <br>
                            Trả góp với lãi suất 0%
                        </p>
                    </div>

                    <div>
                        <h1>TECHNINE</h1>
                        <p>
                            Tưng bừng khai trương
                            <br>
                            Quà tặng cực khủng
                        </p>
                    </div>
                    
                    <div>
                        <h1>LAPTOP DOANH NHÂN</h1>
                        <p>
                            Lịch lãm sang trọng
                            <br>
                            Khẳng định đẳng cấp
                        </p>
                    </div>
                </div>

                <!-- Filter -->
                <div id="header-navbar">
                    <div class="order-by">
                        <form action="">
                            <span class="material-icons">sort</span>

                            <select name="order-by">
                                <option value="">Sắp xếp theo</option>
                                <option value="low">Giá thấp tới cao</option>
                                <option value="hight">Giá cao tới thấp</option>
                            </select>
                        </form>

                        <span id="header-btn-open-filter" class="material-icons">filter_alt</span>
                    </div>

                    <div id="header-filter">
                        <div class="main">
                            <div id="header-filter-navbar">
                                <div id="header-filter-navbar-title">
                                    Bộ lọc
                                </div>
                
                                <div id="header-filter-navbar-btn-close">
                                    <span class="material-icons">close</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="body">
                <div class="grid-list">
                    <a href="javascript:void(0)" class="grid-item">
                        <img src="https://lumen.thinkpro.vn//backend/uploads/product/avatar/2021/11/17/dell-inspiron-5510-chinh-hang-0wt8r1-thinkprojpg">
                        <h3>Dell Inspiron 5510 (Chính hãng)</h3>
                        <p>23.490.000</p>
                    </a>

                    <a href="javascript:void(0)" class="grid-item">
                        <img src="https://lumen.thinkpro.vn//backend/uploads/product/avatar/2021/10/29/ideapad-1-11igl05-ct1-05-thinkpro-1jpg">
                        <h3>Lenovo Ideapad 1 (Chính hãng)</h3>
                        <p>9.490.000</p>
                    </a>

                    <a href="javascript:void(0)" class="grid-item">
                        <img src="https://lumen.thinkpro.vn//backend/uploads/product/avatar/2021/10/14/hp-14s-intel-gen-10jpg">
                        <h3>HP 14s (Nhập khẩu)</h3>
                        <p>15.490.000</p>
                    </a>

                    <a href="javascript:void(0)" class="grid-item">
                        <img src="https://lumen.thinkpro.vn//backend/uploads/product/avatar/2021/9/28/dell-latitude-5410jpg">
                        <h3>Dell Latitude 5410</h3>
                        <p>17.990.000</p>
                    </a>

                    <a href="javascript:void(0)" class="grid-item">
                        <img src="https://lumen.thinkpro.vn//backend/uploads/product/avatar/2021/6/18/inspiron5515-mistblue-0jpg">
                        <h3>Dell Inspiron 15 5515 AMD</h3>
                        <p>21.490.000</p>
                    </a>

                    <a href="javascript:void(0)" class="grid-item">
                        <img src="https://lumen.thinkpro.vn//backend/uploads/product/avatar/2021/6/11/gigag5-0jpg">
                        <h3>GIGABYTE G5 Gaming Laptop</h3>
                        <p>26.990.000</p>
                    </a>

                    <a href="javascript:void(0)" class="grid-item">
                        <img src="https://lumen.thinkpro.vn//backend/uploads/product/avatar/2021/6/8/g513-grey-0jpg">
                        <h3>ASUS ROG Strix G15 (G513)</h3>
                        <p>23.990.000</p>
                    </a>

                    <a href="javascript:void(0)" class="grid-item">
                        <img src="https://lumen.thinkpro.vn//backend/uploads/product/avatar/2021/5/20/a315-56-black-0jpg">
                        <h3>Acer Aspire 3 15 Intel (Chính hãng)</h3>
                        <p>11.990.000</p>
                    </a>

                    <a href="javascript:void(0)" class="grid-item">
                        <img src="https://lumen.thinkpro.vn//backend/uploads/product/avatar/2021/5/13/tufdashf15-den-logo-0jpg">
                        <h3>ASUS TUF Dash F15 (Chính hãng)</h3>
                        <p>26.990.000</p>
                    </a>
                </div>

                <div class="paging">
                    <span>1</span>
                    <a href="javascript:void(0)">2</a>
                    <a href="javascript:void(0)">3</a>
                    <a href="javascript:void(0)">55</a>
                    <a href="javascript:void(0)">56</a>
                    <a href="javascript:void(0)">57</a>
                </div>
            </div>
        </div>

        <!-- Cart -->
        <?php require __DIR__ . '/temp/cart.php' ?>

    </div>
</body>
</html>