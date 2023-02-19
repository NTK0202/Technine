<?php

session_start();

require_once __DIR__ . '/../php/db.php';
require_once __DIR__ . '/../php/func.php';

$isLogin = check_login();

if (!$isLogin) header('location:/login');

// Logout
$action = $_GET['action'] ?? false;

if ($action == 'logout') {
    setcookie('id', null, -1, '/');
    session_destroy();

    header('location:../');
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Đăng Xuất - Đồ Án Lập Trình Website Cơ Bản</title>
    
    <?php require __DIR__ . '/../head.php' ?>
</head>
<body>
    <div class="container">

        <!-- Menu -->
        <?php require __DIR__ . '/../temp/menu.php' ?>

        <!-- Main -->
        <div id="main">
            <div class="container-sm">
                <h2>Đăng Xuất</h2>
                <p>Bạn có chắc muốn đăng xuất không?</p>
                <br>

                <a href="./?action=logout"><div class="btn">Đăng Xuất</div></a>
            </div>
        </div>

    </div>
</body>
</html>