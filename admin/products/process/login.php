<?php

require '../../connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select * from nhan_vien where email = '$email' and mat_khau = '$password'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);

if($number_rows == 1) {
    session_start();
    $each = mysqli_fetch_array($result);
    $_SESSION['ma'] = $each['ma'];
    $_SESSION['ten'] = $each['ten'];

    header('location:../../root');
}
else{
    header('location:index.php?error=email hoặc mật khẩu không đúng');
}


$bug = mysqli_error($connect);
echo $bug;

mysqli_close($connect);
?>
