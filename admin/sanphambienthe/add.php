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
            <h1>Thêm sản phẩm biến thể</h1>
        </div>
        <div class="form-content">
            <form action="index.php?act=addspbt" method="POST">
                <div class="row-input">
                    <label> Mã biến thể </label> <br>
                    <input type="text" name="id" disabled>
                </div>
                <div class="row-input">
                    <label>Tên sản phẩm</label> <br>
                    <select name="product_id" id="">
                        <?php
                        foreach ($listsanpham as $sp) {
                            extract($sp);
                            echo '<option value="' . $id . '">' . $name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="row-input">
                    <label> Màu sắc </label> <br>
                    <select name="color_id" id="">
                        <?php
                        foreach ($listColor as $color) {
                            extract($color);
                            echo '<option value="' . $id . '">' . $name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="row-input">
                    <label> kích cỡ</label> <br>
                    <select name="size_id" id="">
                        <?php
                        foreach ($listsize as $size) {
                            extract($size);
                            echo '<option value="' . $id . '">' . $name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="row-input">
                    <label>Số lượng</label> <br>
                    <input type="text" name="quantity">
                </div>
                <div class="row-btn">
                    <input onclick="return confirmEdit()" type="submit" name="themmoi" value="Thêm">
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    function confirmEdit() {
        if (confirm("Bạn có thêm sản phẩm biến thể không ?")) {
            document.location = "index.php?act=listspbt";
        } else {
            return false;
        }
    }
</script>

</html>

<!-- END HEADER -->