<div class="wrapper">
    <div class="admin">
        <h1>Danh sách sản phẩm</h1>
    </div>
    <form action="index.php?act=listsp" method="post">
        <input type="text" name="kyw">
        <select name="iddm" id="">
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '<option value="' . $id . '">' . $name . '</option>';
            }
            ?>
        </select>
        <input type="submit" name="listok" value="GO">
    </form>
    <div class="function">
        <a href="index.php">Quay lại trang chủ</a>
        <a href="index.php?act=binhluan">Bình luận</a>
        <a href="index.php?act=addsp" class="btn btn-success">Thêm sản phẩm</a>
    </div>
    <div class="table">
        <table class="table-bordered" border="1">
            <tr>
                <td style="width: 50px;">Id</td>
                <td style="width: 200px;">Tên sản phẩm</td>
                <td style="width: 100px;">Giá</td>
                <td style="width: 100px;">Ảnh</td>
                <td style="width: 250px;">Mô tả</td>
                <td style="width: 250px;">Số lượng</td>
                <td style="width: 250px;">Lượt xem</td>
                <td style="width: 150px;">Chức năng</td>
            </tr>
            <?php
            foreach ($listsanpham as $sanpham) {
                // var_dump($sanpham);
                extract($sanpham);
                $suasanpham = "index.php?act=suasanpham&id=" . $id;
                $xoasp = "index.php?act=xoasp&id=" . $id;
                $detail = "index.php?act=chitietsp&id=" . $id;
                $hinhpath = "../upload/" . $img;
                if (is_file($hinhpath)) {
                    $hinh = "<img src= '" . $hinhpath . "' width='100px' height='100px'>";
                } else {
                    $hinh = "No file img!";
                }
                echo '<tr>
                <td>' . $id . '</td>
                <td>' . $name . '</td>
                <td>' . number_format($price , 0, ",", ",") . ' vnđ</td>
                <td>' . $hinh . '</td>
                <td>' . $des . '</td>
                <td>' . $quantity . '</td>
                <td>' . $luotxem . '</td>
                
                <td class="edit-delete">
                <a href="' . $detail . '" class="detail">
                        Chi tiết sản phẩm
                    </a>
                    <a href="' . $suasanpham . '" class="edit">
                        Sửa
                    </a>
                    <a href="' . $xoasp . '" onclick="return confirmDelete()" class="delete">
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