<?php
if (is_array($dm)) {
    extract($dm);
}

$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $hinhpath = "<img src='" . $hinhpath . "' width='250px' height='250px'>";
} else {
    $hinhpath = "No file img!";
}

?>

<body>

    <div class="wrapper">
        <div class="font-title">
            <h1>Sửa danh mục</h1>
        </div>
        
        <div class="form-content">
            <form action="index.php?act=updatedm" method="POST" enctype="multipart/form-data">
                <div class="row-input">
                    <label> Mã danh mục </label> <br>
                    <input type="text" name="maloai" disabled>
                </div>
                <div class="row-input">
                    <label>Tên danh mục</label> <br>
                    <input type="text" name="tenloai" value="<?php if (isset($name) && ($name != "")) echo $name ?>">
                </div>
                <div class="row-input">
                    <label>Ảnh đại diện: </label> <br>
                    <input type="file" name="hinh"><br>
                    <?= $hinhpath ?>
                </div>
                <div class="row-btn">
                    <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
                    <input onclick="return confirmEdit()" type="submit" name="capnhat" value="Cập nhật">
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    function confirmEdit() {
        if (confirm("Bạn có muốn hoàn tất sửa không")) {
            document.location = "index.php?act=listdm";
        } else {
            return false;
        }
    }
</script>

<!-- END HEADER -->