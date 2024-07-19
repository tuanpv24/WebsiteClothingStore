<body>
    <div class="wrapper">
        <div class="admin">

            <h1>Đơn hàng</h1>
        </div>
        <form class="filter" action="index.php?act=listsp" method="post">
            <input type="text" name="kym" />
            <select name="iddm" id="">
                <option value="0" selected>Tất cả</option>
                <option value="'.$id.'"></option>
            </select>
            <input class="filter-search" type="submit" name="listok" value="Lọc đơn hàng" />
        </form>
        <div class="table">
            <table class="table-bordered" border="1">
                <tr>
                    <th>STT</th>
                    
                    <th>Tên sản phẩm</th>
                    <th>Kích cỡ</th>
                    <th>Màu</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <tbody>
                    <?php
                    $allsize = loadAllSize();
                    $allcolor = loadAllColor();
                    // var_dump($ctdh);
                    foreach ($ctdh as $key => $sp) {
                        $img = $img_path . $sp[3];
                    ?>

                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            
                            <td><?php echo $sp['name'] ?></td>
                            <td><?php
                                foreach ($allsize as $size) {
                                    if ($size['id'] == $sp['size']) {
                                        echo $size['name'];
                                    }
                                }
                                ?>
                            </td>
                            <td><?php
                                foreach ($allcolor as $color) {
                                    if ($color['id'] == $sp['color']) {
                                        echo $color['name'];
                                    }
                                }
                                ?>
                            </td>
                            <td><?php echo number_format($sp['price'], 0, ",", ".") ?> VNĐ</td>
                            <td><?php echo $sp['soluong'] ?></td>
                            <td><?php echo number_format($sp['thanhtien'], 0, ",", ".") ?> VNĐ</td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

        </div>
    </div>

</body>
<script>
    function confirmUpdate() {
        if (confirm("Bạn có muốn cập nhật trạng thái không ?")) {
            document.location = "index.php?act=donhang";
            alert("Cập nhật thành công");
        } else {
            return false;
        }
    }