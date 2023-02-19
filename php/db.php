<?php

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'cuikhotk_techn');
define('DB_PASSWORD', 'Techn@123');
define('DB_NAME', 'cuikhotk_do_an_1');

function connect () {
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("[Database] Kết nối thất bại");

    header("Content-type: text/html; charset=utf-8");
    mysqli_set_charset($conn, 'UTF8');

    return $conn;
}

function disconnect ($conn) {
    mysqli_close($conn);
}

function insert ($conn, $table, $data) {
    $field_list = '';
    $value_list = '';
    
    foreach ($data as $key => $value) {
        $field_list .= ",$key";
        $value_list .= ",'" . $conn->real_escape_string($value) . "'";
    }
    
    $sql = 'INSERT INTO ' . $table . '(' . trim($field_list, ',') . ') VALUES (' .trim($value_list, ',') . ')';
    $result = $conn->query($sql);

    return $result;
}

function update ($conn, $table, $data, $where) {
    $sql = '';
    
    foreach ($data as $key => $value) {
        $sql .= "$key = '" . $conn->real_escape_string($value) . "',";
    }
    
    $sql = 'UPDATE ' . $table . ' SET ' . trim($sql, ',') . ' WHERE ' . $where;
    $result = mysqli_query($conn, $sql);

    return $result;
}

function remove ($conn, $table, $where) {
    $sql = "DELETE FROM $table WHERE $where";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function get_list ($conn, $sql) {
    $result = mysqli_query($conn, $sql);
    
    if (!$result) die('[Database class - get_list] Truy vấn sai');
    
    $return = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    
    mysqli_free_result($result);
    return $return;
}

function get_row ($conn, $sql) {
    $result = mysqli_query($conn, $sql);
    
    if (!$result) die('[Database class - get_row] Truy vấn sai');
    
    $row = mysqli_fetch_assoc($result);
    
    mysqli_free_result($result);
    
    if ($row) return $row;
    return false;
}

// get_count($conn, 'select count(*) from table where abc');
function get_count ($conn, $sql) {
    $result = mysqli_query($conn, $sql);
    if (!$result) die('[Database class - get_count] Truy vấn sai');

    $result = mysqli_fetch_array($result)['count(*)'];
    return $result;
}