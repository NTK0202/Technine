<?php

session_start();

require_once __DIR__ . '/../php/db.php';
require_once __DIR__ . '/../php/func.php';
require_once __DIR__ . '/process.php';

$isLogin = check_login();

if ($isLogin) header('location:../');

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Đăng Nhập - Technine</title>
    
    <?php require __DIR__ . '/../head.php' ?>
</head>
<body>
    <div class="container">

        <!-- Menu -->
        <?php require __DIR__ . '/../temp/menu.php' ?>

        <!-- Main -->
        <div id="main">
            <form action="./" method="POST" id="form">
                <h2 class="mb-4">Đăng nhập</h2>
                <p id="error"><?php echo $error ?></p>

                <label class="input">
                    <span class="material-icons">email</span>
                    <input type="email" name="email" required placeholder="Email">
                    <p>Email</p>
                </label>

                <label class="input">
                    <span class="material-icons">lock</span>
                    <input type="password" name="password" required placeholder="Mật khẩu">
                    <p>Mật khẩu</p>
                </label>

                <div class="footer">
                    <div onclick="document.getElementById('form').submit()" class="btn mr-3 mt-3">Đăng nhập</div>

                    <div>
                        <p>Chưa có tài khoản? <a href="/register">[Đăng Ký]</a></p>
                        <p><a href="">[Quên Mật Khẩu]</a></p>
                    </div>
                </div>
            </form>
        </div>

    </div>
</body>
</html>