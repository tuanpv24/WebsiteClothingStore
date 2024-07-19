<div class="wrapper">
    <div class="admin">
        <h1>Danh sách màu</h1>
    </div>
    <div class="function">
        <a href="index.php">Quay lại trang chủ</a>
        <a href="index.php?act=addcolor" class="btn btn-success">Thêm màu</a>
    </div>
    <div class="table">
        <table class="table-bordered" border="1">
            <tr>

                <td style="width: 200px;">STT</td>
                <td style="width: 200px;">Mã màu</td>
                <td style="width: 100px;">Tên màu</td>
                <td style="width: 100px;">Chức năng</td>

            </tr>
            <?php
            // var_dump($listColor);
            $i = 1;
            foreach ($listColor as $bt) {
                // var_dump($bt);
                extract($bt);
                $editcolor = "index.php?act=editcolor&id=" . $id;
                $xoacolor = "index.php?act=xoacolor&id=" . $id;
                $detail = "index.php?act=chitietsp&id=" . $id;

                echo '<tr>
                <td>ID ' . $i++  . '</td>
                <td>' . $id . '</td>
                <td>' . $name . '</td>
                
                
                
                <td class="edit-delete">
                
                    <a href="' . $editcolor . '" class="edit">
                        Sửa
                    </a>
                    <a href="' . $xoacolor . '" onclick="return confirmDelete()" class="delete">
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