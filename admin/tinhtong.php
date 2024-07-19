<?php

function tinhtongsp(){
    $sql = "SELECT Count(*) AS total FROM sanpham";
    $tongsp = pdo_query($sql);
    return $tongsp;
}

function tinhtongdm(){
    $sql = "SELECT Count(*) AS total FROM danhmuc";
    $tongdm = pdo_query($sql);
    return $tongdm;
}

function tinhtongkhachhang(){
    $sql = "SELECT Count(*) AS total FROM khachhang";
    $tongkhachhang = pdo_query($sql);
    return $tongkhachhang;
}

function tinhtongbinhluan(){
    $sql = "SELECT Count(*) AS total FROM binhluan";
    $tongbinhluan = pdo_query($sql);
    return $tongbinhluan;
}
?>