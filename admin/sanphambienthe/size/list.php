<div class="wrapper">
    <div class="admin">
        <h1>Danh sách kích cỡ</h1>
    </div>

    <div class="function">
        <a href="index.php">Quay lại trang chủ</a>
        <a href="index.php?act=addsize" class="btn btn-success">Thêm kích thước</a>
    </div>
    <div class="table">
        <table class="table-bordered" border="1">
            <tr>

                <td style="width: 200px;">STT</td>
                <td style="width: 200px;">Mã kích cỡ</td>
                <td style="width: 100px;">Tên kích cỡ</td>
                <td style="width: 100px;">Chức năng</td>

            </tr>
            <?php
            // var_dump($listsize);
            $i = 1;
            foreach ($listsize as $bt) {
                // var_dump($bt);
                extract($bt);
                $suasize = "index.php?act=editsize&id=" . $id;
                $xoa = "index.php?act=xoasize&id=" . $id;
                $detail = "index.php?act=chitietsp&id=" . $id;

                echo '<tr>
                <td>ID ' . $i++  . '</td>
                <td>' . $id . '</td>
                <td>' . $name . '</td>
                
                
                
                <td class="edit-delete">
                    <a href="' . $suasize . '" class="edit">
                        Sửa
                    </a>
                    <a href="' . $xoa . '" onclick="return confirmDelete()" class="delete">
                        Xóa
                    </a>
            </tr>';
            }
            ?>
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