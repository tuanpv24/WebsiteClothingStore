<?php

function insert_cart($id_user, $id_product, $img, $name, $color, $size,  $price, $soluong, $thanhtien, $idbill)
{
    $sql = "INSERT INTO `giohang`(`id_user`, `id_product`, `img`, `name`, `color`, `size`, `price`, `soluong`, `thanhtien`, `idbill`)
     values ('$id_user','$id_product','$img','$name','$color', '$size','$price','$soluong','$thanhtien','$idbill')";
    pdo_execute($sql);
}
function select_cart($iduser)
{
    $sql = "SELECT sanpham.name, sanpham.img, sanpham.price, taikhoan.user, sanpham.id as idsp, cart.soluong, cart.id, cart.id_color, cart.id_size as idcart FROM sanpham JOIN cart ON sanpham.id = cart.id_pro JOIN taikhoan ON cart.id_user = taikhoan.id WHERE cart.id_user = '$iduser'";
    return pdo_query($sql);
}

function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $tongtien = $cart[3] * $cart[4];
        $tong += $tongtien;
    }
    return $tong;
}
function add_bill($id_user, $ngaydathang, $email, $address, $phone, $hoten, $pay, $tong)
{
    $sql = "INSERT INTO `donhang`( `id_user`, `ngaydathang`, `email`, `address`, `phone`, `hoten`, `pay`, `tong`) 
    VALUES ('$id_user','$ngaydathang','$email','$address','$phone','$hoten','$pay','$tong')";
    return pdo_execute_return_lastInsertId($sql);
}
function loadall_cart($idbill)
{
    $sql = "SELECT * FROM giohang where idbill=$idbill order by name desc";
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_cart_count($idbill)
{
    $sql = "SELECT * FROM giohang where idbill=$idbill";
    $bill = pdo_query($sql);
    return count($bill);
}
function loadone_bill($id)
{
    $sql = "SELECT * FROM donhang where id=$id";
    $onebill = pdo_query_one($sql);
    return $onebill;
}
function loadall_bill($id_user)
{
    $sql = "SELECT * FROM donhang where id_user=$id_user order by id desc ";
    $listbill = pdo_query($sql);
    return $listbill;
}
function updatebill($id)
{
    $sql = "UPDATE donhang SET trangthai = 5 where id=$id";
    pdo_execute($sql);
}
function update_bill11($id1, $trangthai)
{
    $sql = "UPDATE donhang SET `trangthai` = '$trangthai' WHERE id = $id1";
    pdo_execute($sql);
}
//Đếm số lượng để phân trang
function count_bill($id_user)
{
    $sql = "SELECT * FROM donhang where id_user=$id_user";
    return count(pdo_query($sql));
}
function loadall_billdh()
{
    $sql = "SELECT * FROM donhang where 1 order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
//......................................
function dem_cart($iduser)
{
    $conn = pdo_get_connection();
    $sql = $conn->prepare("SELECT * FROM `cart` WHERE id_user='$iduser'");
    $sql->execute();
    $dem = $sql->rowCount();
    return $dem;
}
function delete_sp_cart($id)
{
    $sql = "DELETE FROM cart WHERE id = $id";
    pdo_execute($sql);
}

function  update_sl($iduser, $id_pro)
{
    $sql = "UPDATE cart SET cart.soluong = cart.soluong + 1 WHERE id_user = '$iduser' AND id_pro = '$id_pro'";
    pdo_execute($sql);
}
function delete_cart($idcart)
{
    $sql = "DELETE FROM cart WHERE id = $idcart";
    pdo_execute($sql);
}

function loadHoaDonUser($iduser)
{
    // $sql = "SELECT donhangchitiet.id, donhangchitiet,
    // donhangchitiet.soLuong, donhangchitiet.name, donhangchitiet.image, donhangchitiet.price,
    // donhangchitiet.soluong,  donhang.ngayDatHang, donhang.trangthai FROM donhangchitiet
    // LEFT JOIN donhang ON donhang.id = donhangchitiet.id WHERE id_user='$iduser'";
    $sql = "SELECT * FROM `donhangchitiet`";

    $cart = pdo_query($sql);
    return $cart;
}



function join_cz()
{
    $sql = "SELECT sanpham.id, color.color AS color_name, size.size AS size_name
    FROM sanpham
    JOIN sanphambienthe ON sanpham.id = sanphambienthe.id_sp
    JOIN color ON sanphambienthe.id_color = color.id
    JOIN size ON sanphambienthe.id_size = size.id";
    pdo_execute($sql);
}
function join_cz1($iduser)
{
    $sql = "SELECT cart.name, cart.price, cart.image, cart.soluong, cart.id_pro, color.color AS color_name, size.size 
    AS size_name FROM cart JOIN color ON cart.id_color = color.id JOIN size ON cart.id_size = size.id WHERE 
    cart.id_user = '$iduser';";
    $listjoin =  pdo_query($sql);
    return $listjoin;
}

function get_pttt($n)
{
    switch ($n) {
        case '1':
            $tt = "Thanh toán trực tiếp";
            break;
        case '2':
            $tt = "Thanh toán online";
            break;
        default:
            $tt = "Chưa nhận phương thức thanh toán";
            break;
    }
    return $tt;
}

function get_ttdh($n)
{
    switch ($n) {
        case '1':
            $tt = "Đơn hàng mới";
            break;
        case '2':
            $tt = "Đang xử lý";
            break;
        case '3':
            $tt = "Đang giao hàng";
            break;
        case '4':
            $tt = "Đã giao hàng";
            break;
        case '5':
            $tt = "Đơn hàng bị hủy";
            break;
        case '6':
            $tt = "Đang chờ duyệt";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}
