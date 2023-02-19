<?php

session_start();

require_once __DIR__ . '/../php/db.php';
require_once __DIR__ . '/../php/func.php';

$isLogin = check_login();

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Trang Chủ - Đồ Án Lập Trình Website Cơ Bản</title>
    
    <?php require __DIR__ . '/../head.php' ?>
</head>
<body>
    <div class="container">

        <!-- Menu -->
        <?php require __DIR__ . '/../temp/menu.php' ?>

        <!-- Main -->
        <div id="main">
            
        </div>

    </div>
</body>
</html>