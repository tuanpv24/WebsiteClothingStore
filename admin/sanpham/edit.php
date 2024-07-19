<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $hinhpath = "<img src='" . $hinhpath . "' width='100px' height='100px'>";
} else {
    $hinhpath = "No file img!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

</style>

<body>

    <div class="wrapper">
        <div class="font-title">
            <h1>Sửa sản phẩm</h1>
        </div>
        <div class="form-content">
            <form action="index.php?act=editsp" method="POST" enctype="multipart/form-data">
                <div class="row-input">
                    <label> Mã sản phẩm </label> <br>
                    <input type="text" name="id" value="<?= $id ?>">
                </div>
                <div class="row-input">
                    <label>Tên Sản phẩm </label> <br>
                    <input type="text" name="tensp" value="<?= $name ?>">
                </div>
                <div class="row-input">
                    <label>Giá tiền</label> <br>
                    <input type="text" name="giasp" value="<?= $price ?>">
                </div>
                <div class="row-input">
                    <label>Hình ảnh: </label> <br>
                    <input type="file" name="hinh"><br>
                    <?= $hinhpath ?>
                </div>
                <div class="row-input">
                    <label>Mô tả </label> <br>
                    <input type="text" name="des" value="<?= $des ?>">
                </div>
                <div class="row-input">
                    <label>Danh mục </label> <br>
                    <select name="iddm" id="">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($listdanhmuc as $key => $value) {
                            if ($iddm == $value['id']) {
                                echo '<option value="' . $value['id'] . '" selected>' . $value['name'] . '</option>';
                            } else {
                                echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="row-input">
                    <label>Số lượng </label> <br>
                    <input type="text" name="quantity" value="<?= $quantity ?>">
                </div>
                <div class="row-input">
                    <label>Lượt xem </label> <br>
                    <input type="text" name="luotxem" value="<?= $luotxem ?>">
                </div>
                
                <div class="row-btn">
                    <input onclick="return confirmEdit()" type="submit" name="capnhat" value="Sửa">
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    function confirmEdit() {
        if (confirm("Bạn có hoàn tất sửa không ?")) {
            document.location = "index.php?act=listsp";
        } else {
            return false;
        }
    }
</script>

</html>

<!-- END HEADER -->