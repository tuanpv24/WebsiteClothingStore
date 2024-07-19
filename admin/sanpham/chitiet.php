<?php
if(is_array($sanpham)){
    extract($sanpham);
}
$image = ".././Ảnh/$img";
if(is_file($image)){
    $img = "<img src='".$image."' alt=''>";
} else {
    echo "";
}
?>
<div class="wrapper">
    <div class="container-h1">
        <h1>Chi tiết sản phẩm</h1>
    </div>
    <div class="container">
        <div class="list-product-img">
            <img src="../Img/<?=$img?>" alt="">
        </div>
        <div class="list-product-detail">
            <p>Id sản phẩm: <?=$id?></p>
            <p>Tên sản phẩm: <?=$name?></p>
            <p>Giá: <?=$giatien?>đ</p>
            <p>Mô tả: <?=$mota?></p>
            <p>Tên danh mục: <?php foreach ($listdanhmuc as $danhmuc) { 
                    extract($danhmuc);
                    if($iddm === $id){
                        echo $name;
                    } 
             } ?></p>
            <p>Lượt xem: <?=$luotxem?></p>
            <p>Ngày tạo: <?=$ngaytao?></p>
            <p>Mức giảm giá: <?=$mucgiamgia?>%</p>

        </div>
    </div>
    <iframe src="./sanpham/binhluan.php?idpro=<?php if(is_array($sanpham)){
    extract($sanpham);
    } 
    echo $id;?>" width="700px" height="300px" frameborder="0"></iframe>
    <div class="function-back">
        <a href="index.php?act=listsp">Quay lại trang sản phẩm</a>
    </div>
</div>