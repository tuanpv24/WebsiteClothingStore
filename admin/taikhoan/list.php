<body>
    <div class="wrapper">
        <div class="admin">
            <h1>Danh sách khách hàng</h1>
        </div>
        <a href="index.php?act=addtk" class="btn btn-success">Thêm tài khoản</a>
        <form class="filter" action="index.php?act=listsp" method="post">
            <input type="text" name="kym" placeholder="Tìm khách hàng" />
            <input class="filter-search" type="submit" name="listok" value="Lọc khách hàng" />
        </form>
        <div class="table">
            <table class="table-bordered" border="1">
                <tr>
                    <td style="width: 100px">Id</td>
                    <td style="width: 250px">Tên tài khoản</td>
                    <td style="width: 200px">Mật khẩu</td>
                    <td style="width: 200px">Email</td>
                    <td style="width: 200px">Họ tên</td>
                    <td style="width: 200px">Địa chỉ</td>
                    <td style="width: 100px">SĐT</td>
                    <!-- <td style="width: 200px">Trạng thái</td> -->
                    <td style="width: 200px">Vai trò</td>
                    <td style="width: 300px">Chức năng</td>
                </tr>
                <?php if (isset($listtaikhoan) && is_array($listtaikhoan)) {
                    // var_dump($listtaikhoan);
                    foreach ($listtaikhoan as $account) :
                        // $khoataikhoan = "index.php?act=khoatk&id=" . $id;
                        // $molaitaikhoan = "index.php?act=molaitk&id=" . $id;
                        $sua = "index.php?act=editTk&id=" . $account['id'];
                        $xoa = "index.php?act=xoatk&id=" . $account['id'];
                ?>
                        <tr>
                            <td><?= $account['id'] ?></td>
                            <td><?= $account['user'] ?></td>
                            <td><?= $account['pass'] ?></td>
                            <td><?= $account['email'] ?></td>
                            <td><?= $account['hoten'] ?></td>
                            <td><?= $account['address'] ?></td>
                            <td><?= $account['phone'] ?></td>
                            <td><?= $account['vaitro'] ?></td>
                            <td>
                                <a class="edit" href=<?= $sua ?>>Sửa</a>
                                <a class="edit" href=<?= $xoa ?>>xóa</a>
                            </td>

                            <!-- <td>'.($trangthai === 0 ? "<p style='color: green;'>Hoạt động</p>" : "<p style='color: red;'>Bị khóa tài khoản</p>").'</td>
                <td>'.($idvaitro === 1 ? "Admin" : ($idvaitro === 2 ? "Nhân viên" : "Khách hàng")).'</td> -->
                            <!-- <td class="edit-delete">
                    '.($trangthai === 0 ? "<a href=".$khoataikhoan." onclick='return confirmUpdate()' class='delete'>
                    Khóa tài khoản
                </a>" -->
                            <!-- : "<a href=".$molaitaikhoan." onclick='return confirmUpdate()' class='detail'>Mở lại tài khoản</a>").' -->

                        </tr><?php endforeach;
                        } ?>
            </table>
        </div>
    </div>
</body>
<script>
    function confirmUpdate() {
        if (confirm("Bạn có muốn cập nhật trạng thái không ?")) {
            document.location = "index.php?act=listsp";
        } else {
            return false;
        }
    }
</script>