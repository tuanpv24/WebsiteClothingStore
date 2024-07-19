<?php
function loadall_thongke()
{
    $a = "select danhmuc.id as madm, danhmuc.name as tendm, count(product.id) as countsp, min(product.price)
    as minprice, max(product.price) as maxprice, avg(product.price) as avgprice";
    $a .= " from product left join danhmuc 
    on danhmuc.id = product.id_dm";
    $a .= " group by danhmuc.id order by danhmuc.id desc";
    $listthongke = getdata($a);
    return $listthongke;
}


function tinhtongkhachhang()
{
    $sql = "SELECT Count(*) AS total FROM taikhoan";
    $tongkhachhang = pdo_query($sql);
    return $tongkhachhang;
}

function tinhtongsp()
{
    $sql = "SELECT Count(*) AS total FROM product";
    $tongsp = pdo_query($sql);
    return $tongsp;
}

function tinhtongdm()
{
    $sql = "SELECT Count(*) AS total FROM danhmuc";
    $tongdm = pdo_query($sql);
    return $tongdm;
}



function tinhtongbinhluan()
{
    $sql = "SELECT Count(*) AS total FROM binhluan";
    $tongbinhluan = pdo_query($sql);
    return $tongbinhluan;
}

function thongkethunhap()
{
    $sql = "SELECT DATE_FORMAT(donhang.ngaydathang, '%Y-%m-%d') AS 'thangvanam', SUM(giohang.soluong * giohang.price) AS
    'doanhthu' FROM donhang JOIN giohang ON donhang.id = giohang.idbill WHERE donhang.trangthai = 4 
    GROUP BY DATE_FORMAT(donhang.ngaydathang, '%Y-%m-%d') ORDER BY MAX(donhang.ngaydathang) DESC LIMIT 4";
    return pdo_query($sql);
}
function thongkethunhap1()
{
    $sql = "SELECT DATE_FORMAT(donhang.ngaydathang, '%Y-%m') AS 'thangvanam', SUM(giohang.soluong * giohang.price) AS
    'doanhthu' FROM donhang JOIN giohang ON donhang.id = giohang.idbill WHERE donhang.trangthai = 4 
    GROUP BY DATE_FORMAT(donhang.ngaydathang, '%Y-%m') ORDER BY MAX(donhang.ngaydathang) DESC LIMIT 4";
    return pdo_query($sql);
}
function thongkethunhap2()
{
    $sql = "SELECT DATE_FORMAT(donhang.ngaydathang, '%Y') AS 'thangvanam', SUM(giohang.soluong * giohang.price) AS
    'doanhthu' FROM donhang JOIN giohang ON donhang.id = giohang.idbill WHERE donhang.trangthai = 4 
    GROUP BY DATE_FORMAT(donhang.ngaydathang, '%Y') ORDER BY MAX(donhang.ngaydathang) DESC LIMIT 4";
    return pdo_query($sql);
}

