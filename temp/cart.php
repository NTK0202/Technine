<!-- Giỏ hàng -->
<div id="cart">
    <div id="cart-navbar">
        <div id="cart-navbar-title">
            Giỏ hàng
        </div>

        <div id="cart-navbar-btn-close">
            <span class="material-icons">close</span>
        </div>
    </div>

    <?php if (!$isLogin) { ?>
    <div class="mb-4">
        <p>Bạn chưa thể đặt hàng khi chưa đăng nhập!</p>

        <a href="/login"><div class="btn">Đăng Nhập</div></a>

        <p>
            Chưa có tài khoản? Vui lòng
            <a href="/register" class="text-blue">[Đăng Ký]</a>
        </p>
    </div>
    <?php } ?>

    asdfasdfadfs
</div>