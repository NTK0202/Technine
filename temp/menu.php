<?php

function menu_active ($dir) {
    if ($_SERVER['REQUEST_URI'] == $dir) {
        echo "class='active' href='$dir'";
    }
    else {
        echo "href='$dir'";
    }
}

?>

<div id="menu">
    <div id="menu-navbar">
        <span id="menu-btn-open-menu" class="material-icons">menu</span>
        
        <?php if ($_SERVER['REQUEST_URI'] == '/') { ?>
            <span id="menu-btn-open-cart" class="material-icons">shopping_cart</span>
        <?php } ?>
    </div>

    <div id="menu-bg"></div>

    <div id="menu-sidebar">
        <h1>
            <span class="text-blue">9</span>
            Techn<b class="text-blue">ine</b>
        </h1>

        <div id="menu-sidebar-list">
            <a <?php menu_active('/') ?>>
                <span class="material-icons">home</span>
                Trang Chủ
            </a>

            <a <?php menu_active('/list/') ?>>
                <span class="material-icons">laptop</span>
                Sản Phẩm
            </a>
            
            <!-- Login -->
            <?php if ($isLogin) { ?>

                <a <?php menu_active('/profile/') ?>>
                    <span class="material-icons">person</span>
                    Cá Nhân
                </a>

                <a <?php menu_active('/logout/') ?>>
                    <span class="material-icons">logout</span>
                    Đăng Xuất
                </a>

            <!-- Logout -->
            <?php } else { ?>

                <a <?php menu_active('/login/') ?>>
                    <span class="material-icons">login</span>
                    Đăng Nhập
                </a>

                <a <?php menu_active('/register/') ?>>
                    <span class="material-icons">person_add</span>
                    Đăng Ký
                </a>

            <?php } ?>

            <a <?php menu_active('/info/') ?>>
                <span class="material-icons">info</span>
                Thông Tin
            </a>
        </div>
    </div>
</div>