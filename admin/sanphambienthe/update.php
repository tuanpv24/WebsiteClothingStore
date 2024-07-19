<?php
if (is_array($onespbt)) {
    extract($onespbt);
}
?>


<div class="wrapper">
    <div class="font-title">
        <h1>Sửa kích cỡ</h1>
    </div>
    <div class="form-content">
        <form action="index.php?act=editspbt" method="POST" enctype="multipart/form-data">
            <div class="row-input">
                <label> Mã biến thể </label> <br>
                <input type="text" name="id" value="<?= $id ?>" disabled>
            </div>
            <div class="row-input">
                <label>Tên sản phẩm</label> <br>
                <select name="product_id" id="">
                    <?php foreach ($listsanpham as $key => $sp) : ?>
                        <option value="<?php echo $sp['id'] ?>" <?php echo ($onespbt['product_id'] == $sp['id']) ? 'selected' : ''; ?>><?php echo $sp['name'] ?></option>
                    <?php endforeach ?>

                </select>
            </div>
            <div class="row-input">
                <label> Màu sắc </label> <br>
                <select name="color_id" id="">
                    <?php foreach ($listColor as $key => $mau) : ?>
                        <option value="<?php echo $mau['id'] ?>" <?php echo ($onespbt['color_id'] == $mau['id']) ? 'selected' : ''; ?>><?php echo $mau['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="row-input">
                <label> kích cỡ</label> <br>
                <select name="size_id" id="">

                    <?php foreach ($listsize as $key => $size) : ?>
                        <option value="<?php echo $size['id'] ?>" <?php echo ($onespbt['size_id'] == $size['id']) ? 'selected' : ''; ?>><?php echo $size['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="row-input">
                <label>Số lượng</label> <br>
                <input type="text" name="quantity" value="<?= $onespbt['quantity'] ?>">
            </div>
            <input type="hidden" name="idbt" value="<?php echo $onespbt['id'] ?>">
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