<?php

$name = $_POST['name'] ?? false;
$gender = $_POST['gender'] ?? false;
$email  = $_POST['email'] ?? false;
$password  = $_POST['password'] ?? false;
$repassword = $_POST['repassword'] ?? false;

$err_name = false;
$err_gender = false;
$err_email = false;
$err_password = false;

$isValid = true;

// Not enough
if ($name || $gender !== false || $email || $password || $repassword) {
    if (!$name) {
        $err_name = 'Tên không được để trống';
        $isValid = false;
    }
    if ($gender === false) {
        $err_gender = 'Giới tính không được để trống';
        $isValid = false;
    }
    if (!$email) {
        $err_email = 'Email không được để trống';
        $isValid = false;
    }

    if (!$password) {
        $err_password = 'Mật khẩu không được để trống';
        $isValid = false;
    }
    else if ($password !== $repassword) {
        $err_password = 'Mật khẩu nhập lại không khớp';
        $isValid = false;
    }
}

// Full
if ($name && $gender !== false && $email && $password && $repassword) {
    if (validate_form()) {
        $isValid = false;
    }

    if ($isValid) {
        signup();
    }
}

function validate_form () {
    $isError = false;

    $name = $GLOBALS['name'];
    $gender = $GLOBALS['gender'];
    $email = $GLOBALS['email'];
    $password = $GLOBALS['password'];

    // Name
    if (strlen($name) <= 3) {
        $GLOBALS['err_name'] = 'Tên quá ngắn';
        $isError = true;
    }
    else if (strlen($name) > 100) {
        $GLOBALS['err_name'] = 'Tên quá dài';
        $isError = true;
    }
    else {
        $GLOBALS['name'] = validate($name);
    }

    // Gender
    if ($gender != 0 && $gender != 1) {
        $GLOBALS['err_gender'] = 'Giới tính không hợp lệ - ' . $gender;
        $isError = true;
    }

    // Email
    if (!is_email($email)) {
        $GLOBALS['err_email'] = 'Email không hợp lệ';
        $isError = true;
    }

    $conn = connect();
    $count = get_count($conn, "select count(*) from khach_hang where email='$email'");

    if ($count > 0) {
        $GLOBALS['err_email'] = 'Email đã được sử dụng';
        $isError = true;
    }

    // Password
    if (!is_password($password)) {
        $GLOBALS['err_password'] = 'Mật khẩu phải từ 6 kí tự, bao gồm chữ hoa, chữ thường, số và kí tự đặc biệt';
        $isError = true;
    }

    return $isError;
}

function signup () {
    $name = $GLOBALS['name'];
    $gender = $GLOBALS['gender'];
    $email = $GLOBALS['email'];
    $password = $GLOBALS['password'];

    $hash = hash_password($password);

    // Insert to database
    $conn = connect();

    $result = insert($conn, 'khach_hang', array(
        'ten' => $name,
        'gioi_tinh' => $gender,
        'email' => $email,
        'mat_khau' => $hash
    ));

    $id = $conn->insert_id;
    disconnect($conn);

    if ($result) {
        // Save cookie
        $cookie = encode_cookie($id, $hash);
        setcookie('id', $cookie, time() + (86400 * 30), '/');

        header('location:../');
    }
    else {
        die('Có lỗi xảy ra, vui lòng thử lại sau!');
    }
}