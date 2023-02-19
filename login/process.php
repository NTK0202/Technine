<?php

$email = $_POST['email'] ?? false;
$password = $_POST['password'] ?? false;

$error = false;

if ($email || $password) {
    if (!$email || !$password) {
        $error = 'Email và mật khẩu không được để trống!';
    }
}

if ($email && $password) {
    // Get data
    $conn = connect();
    $user = get_row($conn, "select * from khach_hang where email='$email'");
    disconnect($conn);

    // Check
    if (!$user) {
        $error = 'Tài khoản hoặc mật khẩu không chính xác';
    }
    else {
        $hash = hash_password($password);
        
        if ($hash !== $user['mat_khau']) $error = 'Tài khoản hoặc mật khẩu không chính xác';
    }

    // Login
    if ($error === false) {
        // Save cookie
        $cookie = encode_cookie($user['ma'], $hash);
        setcookie('id', $cookie, time() + (86400 * 30), '/');

        header('location:../');
    }
}