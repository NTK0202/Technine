<?php
ini_set('display_errors', 'on');

define('SALT', 'Technine@doan1!9999');

// --------------------------------------------------
// Account
// --------------------------------------------------

function is_password ($pwd) {
    return (preg_match("#.*^(?=.{6,30})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $pwd) == 1);
}

function is_email ($email) {
    return (preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email) == 1);
}

function check_login () {
    // Session
    if (isset($_SESSION['id'])) return true;

    // Cookie
    if (!isset($_COOKIE['id'])) return false;
    $data = decode_cookie($_COOKIE['id']);
    $id = $data['id'];
    
    // Get user info
    $conn = connect();
    $user = get_row($conn, "select * from khach_hang where ma='$id'");
    disconnect($conn);

    // Check user info
    if (!$user) return false;
    if ($user['mat_khau'] !== $data['password']) return false;

    // Save user info
    $_SESSION['id'] = $user['ma'];
    $_SESSION['name'] = $user['ten'];
    $_SESSION['gender'] = $user['gioi_tinh'];
    $_SESSION['email'] = $user['email'];

    return true;
}

// --------------------------------------------------
// Security
// --------------------------------------------------

function validate ($str) {
    $str = str_replace("'", '&#39;', $str);
    $str = str_replace('"', '&quot;', $str);
    $str = str_replace('<', '&lt;', $str);
    $str = str_replace('>', '&gt;', $str);
    return $str;
}

function encode_id ($id) {
    $id += 1000000;
    return base_convert($id, 10, 36);
}

function decode_id ($id) {
    $id = base_convert($id, 36, 10);
    $id -= 1000000;
    return $id;
}

function hash_password ($pwd) {
    $hash = md5($pwd . SALT);
    return $hash;
}

function encode_cookie ($id, $hash) {
    $str = encode_id($id) . 'Technine' . $hash;
    $encoded = str_rot13($str);

    return $encoded;
}

function decode_cookie ($str) {
    $decoded = str_rot13($str);
    $arr = explode('Technine', $decoded);
    
    return array(
        'id' => decode_id($arr[0]),
        'password' => $arr[1]
    );                                                
}