<?php include '../head.php'; ?>

<link rel="stylesheet" href="./style_form_insert.css">
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="../fonts-icon/themify-icons/themify-icons.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Readex+Pro&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php include '../menu.php'; ?>

<div style="padding-top: 100px; padding-left: 400px">
    <h3>Hãy thêm cấu hình laptop -> thêm cấu hình chi tiết -> thêm laptop</h3>
    <button>
        <a href="./form_insert_laptop.php">Thêm laptop</a>
    </button>
    <button>
        <a href="./form_insert_config.php">Thêm cấu hình laptop</a>
    </button>
    <button>
        <a href="./form_insert_config_detail.php">Thêm cấu hình chi tiết</a>
    </button>
</div>

<style>
    button {
        display: block;
        background-color: #DDDDDD;
        border: 5px solid #ffffff;
        padding: 10px 15px;
        border-radius: 3px;
        width: 500px;
        cursor: pointer;
        font-size: 18px;
        transition-duration: 0.25s;
    }
</style>

</body>
</html>