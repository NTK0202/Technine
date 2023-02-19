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
    <title>Đăng Ký Tài Khoản - Technine</title>
    
    <?php require __DIR__ . '/../head.php' ?>
</head>
<body>
    <div class="container">

        <!-- Menu -->
        <?php require __DIR__ . '/../temp/menu.php' ?>

        <!-- Main -->
        <div id="main">
            <form action="./" method="POST" id="form">
                <h2 class="mb-4">Đăng ký</h2>
                
                <label class="input">
                    <span class="material-icons">person</span>
                    <input type="text" name="name" value="<?php echo $name ?>" required placeholder="Tên hiển thị">
                    <p>Tên hiển thị</p>
                </label>
                <p class="text-red px-3 mt--2"><?php echo $err_name ?></p>

                <div class="radio-box">
                    <p>
                        <span class="material-icons mr-2">transgender</span>
                        <span>Giới tính</span>
                    </p>

                    <label class="radio">
                        <input type="radio" name="gender" value="0" required <?php if ($gender === '0') echo 'checked' ?>>

                        <span>
                            <span class="material-icons">male</span>
                            <span>Nam</span>
                        </span>
                    </label>

                    <label class="radio">
                        <input type="radio" name="gender" value="1" required <?php if ($gender === '1') echo 'checked' ?>>
                        
                        <span>
                            <span class="material-icons mr-2">female</span>
                            <span>Nữ</span>
                        </span>
                    </label>
                </div>
                <p class="text-red px-3 mt--2"><?php echo $err_gender ?></p>

                <label class="input">
                    <span class="material-icons">email</span>
                    <input type="email" name="email" value="<?php echo $email ?>" required placeholder="Email">
                    <p>Email</p>
                </label>
                <p class="text-red px-3 mt--2"><?php echo $err_email ?></p>

                <label class="input">
                    <span class="material-icons">lock</span>
                    <input type="password" name="password" required placeholder="Mật khẩu">
                    <p>Mật khẩu</p>
                </label>
                <p class="text-red px-3 mt--2"><?php echo $err_password ?></p>

                <label class="input">
                    <span class="material-icons">lock</span>
                    <input type="password" name="repassword" required placeholder="Nhập lại mật khẩu">
                    <p>Nhập lại</p>
                </label>

                <div class="footer">
                    <div class="btn mr-3 mt-3" onclick="document.getElementById('form').submit()">Đăng ký</div>

                    <div>
                        <p>Đã có tài khoản? <a href="/login">[Đăng Nhập]</a></p>
                        <p><a href="">[Quên Mật Khẩu]</a></p>
                    </div>
                </div>
            </form>
        </div>

    </div>
</body>
</html>