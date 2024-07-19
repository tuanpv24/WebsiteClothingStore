<div class="wrapper">
    <div class="font-title">
        <h1>Thêm mới sản phẩm</h1>
    </div>
    <div class="form-content">
        <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
            <div class="row-input">
                <label> Mã sản phẩm </label> <br>
                <input type="text" name="id" disabled>
            </div>
            <div class="row-input">
                <label>Tên Sản phẩm </label> <br>
                <input type="text" name="tensp">
            </div>
            <div class="row-input">
                <label>Giá </label> <br>
                <input type="text" name="giasp">
            </div>
            <div class="row-input">
                <label>Ảnh </label> <br>
                <input type="file" name="hinh">
            </div>
            <div class="row-input">
                <label>Mô tả </label> <br>
                <input type="text" name="des">
            </div>
            <div class="row-input">
                <label> Danh mục </label> <br>
                <select name="iddm" id="">
                    <!--                      <option value="">Danh mục 1</option>-->
                    <!--                      <option value="">Danh mục 2</option>-->
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
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
                <input onclick="return confirmAdd()" type="submit" name="themmoi" value="Thêm">
            </div>
        </form>
    </div>
</div>
<script>
    function confirmAdd() {
        if (confirm("Bạn có muốn thêm không")) {
            document.location = "index.php?act=listsp";
        } else {
            return false;
        }
    }
</script>
<!-- END HEADER -->