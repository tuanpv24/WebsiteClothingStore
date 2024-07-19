<?php
if (is_array($size)) {
    extract($size);
}
?>


<div class="wrapper">
    <div class="font-title">
        <h1>Sửa kích cỡ</h1>
    </div>
    <div class="form-content">
        <form action="index.php?act=updatesize" method="POST" enctype="multipart/form-data">
            <div class="row-input">
                
                <label> Mã sản phẩm </label> <br>
                <input type="text" name="id" value="<?= $id ?>" disabled>
            </div>
            <div class="row-input">
                <label>Tên Sản phẩm </label> <br>
                <input type="text" name="name" value="<?= $name ?>">
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