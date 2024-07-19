<div class="wrapper">
    <div class="admin">
        <h1>Danh sách sản phẩm</h1>
    </div>

    <div class="function">
        <a href="index.php">Quay lại trang chủ</a>
        <a href="index.php?act=addspbt" class="btn btn-success">Thêm sản phẩm</a>
    </div>
    <div class="table">
        <table class="table-bordered" border="1">
            <tr>

                <td style="width: 200px;">Mã Biến Thể</td>
                <td style="width: 100px;">Tên Sản Phẩm</td>
                <td style="width: 100px;">Kích thước</td>
                <td style="width: 250px;">Màu Sắc</td>
                <td style="width: 250px;">Số lượng</td>
                <td style="width: 250px;">Chức năng</td>

            </tr>
            <?php
            foreach ($listpv as $bt) {
                // var_dump($bt);
                extract($bt);
                $updatespbt = "index.php?act=updatespbt&id=" . $id;
                $xoaspbt = "index.php?act=xoaspbt&id=" . $id;

                echo '<tr>
                <td>ID ' . $id . '</td>
                <td>' . $name . '</td>
                <td>' . $name_color . '</td>
                <td>' . $name_size . '</td>
                <td>' . $quantity . '</td>
                
                
                <td class="edit-delete">
                    <a href="' . $updatespbt . '" class="edit">
                        Sửa
                    </a>
                    <a href="' . $xoaspbt . '" onclick="return confirmDelete()" class="delete">
                        Xóa
                    </a>
            </tr>';
            } ?>
        </table>
    </div>
</div>
<script>
    function confirmDelete() {
        if (confirm("Bạn có muốn xóa không ?")) {
            document.location = "index.php?act=listsp";
        } else {
            return false;
        }
    }
</script>