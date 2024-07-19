<?php
function insert_sanpham($tensp, $des, $giasp, $quantity, $hinh, $iddm)
{
    $sql = "INSERT INTO product(name, des, price, quantity, img, id_dm ) values ('$tensp', '$des', '$giasp','$quantity','$hinh','$iddm')";
    pdo_execute($sql);
}
function delete_sanpham($id)
{
    $sql = "DELETE FROM product WHERE id=" . $id;
    pdo_execute($sql);
}
function loadall_sanpham($kyw = "", $iddm = 0)
{
    $sql = "SELECT * FROM product where 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and id_dm ='" . $iddm . "'";
    }
    $sql .= " ORDER BY id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadall_sanpham_home()
{
    $sql = "SELECT * FROM product where 1 order by id desc limit 0,4";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham($id)
{
    $sql = "SELECT * FROM product where id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}


function load_ten_dm($iddm)
{
    if ($iddm > 0) {
        $sql = "SELECT * FROM danhmuc where id=" . $iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}
function update_sanpham($id, $tensp, $des, $giasp, $quantity, $hinh, $iddm)
{
    if ($hinh != "") {
        // $sql="update sanpham set iddm='".$iddm."',name='".$tensp."',price='".$giasp."',mota='".$mota."',img='".$hinh."' where id=".$id;
        $sql =  "UPDATE `product` SET  `id_dm` = '{$iddm}',
         `name` = '{$tensp}', `price` = '{$giasp}', `des` = '{$des}',`quantity`
          = '{$quantity}', `img` = '{$hinh}' WHERE `product`.`id` = $id";
    } else {
        //  $sql="update product set iddm='".$iddm."',name='".$tensp."',price='".$giasp."',mota='".$mota."' where id=".$id;
        $sql =  "UPDATE `product` SET `name` = '{$tensp}', `price` = '{$giasp}', `des` = '{$des}',`quantity` = '{$quantity}', `id_dm` = '{$iddm}' WHERE `product`.`id` = $id";
    }
    pdo_execute($sql);
}


function loadall_sanpham_top8()
{
    $sql = "SELECT * FROM product where 1 order by luotxem desc limit 0,8";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadone_sanpham_cungloai($id, $iddm)
{
    $sql = "SELECT * FROM product where id_dm=" . $iddm . " and id<>" . $id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function update_matxem($idsp)
{
    $sql = "UPDATE product set luotxem = luotxem + 1 WHERE '$idsp'";
    pdo_query($sql);
}
function load_sl1($id)
{
    $sql = "SELECT quantity
    FROM product  
    WHERE id = $id";
    $list = pdo_query_one($sql);
    return $list;
}


function update_soluong2($soluongg, $id)
{
    $ssl = load_sl1($id);
    extract($ssl);
    $sl = $quantity - $soluongg;
    $sql = "UPDATE prodcut SET quantity = $sl where id = $id ";
    pdo_execute($sql);
}
function countsp1($key)
{
    $sql = "SELECT COUNT(quantity) as sl FROM `product` ";
    if ($key != "") {
        $sql .= "WHERE  $key < price AND price < " . $key + 100;
    }
    return pdo_query($sql);
}
function locPrice()
{
    $sql = "SELECT * FROM `product` WHERE price BETWEEN 10 AND 100;";
    return pdo_query($sql);
}

//sản phẩm biến thể
function loadAllSize()
{
    $sql = "SELECT * FROM size ORDER BY id desc";
    $listSize = pdo_query($sql);
    return $listSize;
}
function loadAllColor()
{
    $sql = "SELECT * FROM color ORDER BY id desc";
    $listColor = pdo_query($sql);
    return $listColor;
}

function tangluotxem($idsp)
{
    $sanpham = loadone_sanpham($idsp);
    $luotxem = $sanpham['luotxem'] + 1;
    $sql = "UPDATE product set luotxem = $luotxem where id = $idsp";
    pdo_execute($sql);
}
