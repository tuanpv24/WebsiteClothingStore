<?php
function insert_proVariant($product_id, $size_id, $color_id, $quantity)
{
   $sql = "INSERT INTO `product_variants`(`product_id`, `size_id`, `color_id`, `quantity`)
         VALUES ('$product_id','$size_id','$color_id','$quantity')";
   pdo_execute($sql);
}

function update_proVariant($idbt, $product_id, $size_id, $color_id, $quantity)
{
   $sql = "UPDATE `product_variants` SET  `product_id` = '{$product_id}',
   `size_id` = '{$size_id}', `color_id` = '{$color_id}', `quantity` = '{$quantity}' 
   WHERE id = $idbt";
   pdo_execute($sql);
}
function delete_spbt($id)
{
   $sql = "DELETE FROM product_variants WHERE id=" . $id;
   pdo_execute($sql);
}
function loadall_prov1()
{
   $sql = "SELECT sanpham.name, sanpham.price, sanpham.img, sanpham.id, sanpham.price, color.color 
    AS color_name, size.size AS size_name
    FROM sanpham
    JOIN product_variants ON sanpham.id = product_variants.id_sp
    JOIN color ON product_variants.id_color = color.id
    JOIN size ON product_variants.id_size = size.id";
   $listpv1 = pdo_query($sql);
   return $listpv1;
}

function load_one_spbt($id)
{
   $sql = "SELECT * FROM product_variants where id = $id";
   $onespbt = pdo_query_one($sql);
   return $onespbt;
}

function load_btcolor($id)
{
   $sql = "SELECT DISTINCT color.id, color.name FROM product_variants JOIN color ON 
   product_variants.color_id = color.id WHERE product_variants.product_id = $id;";
   $listcolor = pdo_query($sql);
   return $listcolor;
}

function load_btsize($id)
{
   $sql = "SELECT DISTINCT size.id, size.name FROM product_variants JOIN size ON 
   product_variants.size_id = size.id WHERE product_variants.product_id = $id;";
   $listsize = pdo_query($sql);
   return $listsize;
}

function loadall_prov()
{
   $sql = "SELECT product_variants.id, product.name, color.name 
   as name_color, size.name as name_size, product_variants.quantity
    FROM product_variants join product on product_variants.product_id=product.id join size
     on product_variants.size_id=size.id join color on product_variants.color_id=color.id order by id desc;";
   $listpv = pdo_query($sql);
   return $listpv;
}

function load_btsl($size_id, $product_id, $color_id)
{
   $sql = "SELECT soluong
    FROM product_variants  
    WHERE size_id = $size_id AND product_id = $product_id AND color_id=$color_id";
   $list = pdo_query($sql);
   return $list;
}

function load_sl($size_id, $product_id, $color_id)
{
   $sql = "SELECT quantity
    FROM product_variants  
    WHERE size_id = $size_id AND product_id = $product_id AND color_id=$color_id";
   $list = pdo_query_one($sql);
   return $list;
}

function update_soluong($soluongg, $size_id, $product_id, $color_id)
{
   $btsl = load_sl($size_id, $product_id, $color_id);
   extract($btsl);
   $sl = $quantity - $soluongg;
   $sql = "UPDATE product_variants SET quantity = $sl where size_id = $size_id AND product_id = $product_id AND color_id = $color_id ";
   pdo_execute($sql);
}


