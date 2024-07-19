<div class="wrapper">
    <div class="admin">

        <h1>Đơn hàng</h1>
    </div>
    <form action="#" method="post">
        <div class="table">
            <table class="table-bordered" border="1">
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Khách hàng</th>
                    <th>Số lượng sp</th>
                    <th>Tổng giá tiền</th>
                    <th>Ngày đặt</th>
                    <th>Thanh toán</th>
                    <th>Tình trạng</th>
                    <th>Chức năng</th>
                </tr>
                <tbody>
                    <?php
                    // var_dump($listbill);
                    // $editdh1 = "index.php?act=editdh1&id=" . $id;
                    foreach ($listbill as $key => $bill) {
                        $countsp = loadall_cart_count($bill['id']);
                        $ttdh = get_ttdh($bill['trangthai']);
                        $pttt = get_pttt($bill['pay']);
                    ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td>DA1-<?php echo $bill['id'] ?></td>
                            <td>
                                <?php echo $bill['hoten'] ?><br>
                                <?php echo $bill['email'] ?><br>
                                <?php echo $bill['address'] ?><br>
                                <?php echo $bill['phone'] ?>
                            </td>
                            <td><?php echo $countsp ?></td>
                            <td><?php echo number_format($bill['tong'], 0, ",", ".") ?> VND</td>
                            <td><?php echo date("d/m/Y", strtotime($bill['ngaydathang'])) ?></td>
                            <td><?php echo $bill['pay'] ?></td>
                            <td><?php echo $ttdh ?></td>
                            <td>
                                <?php if ($bill['trangthai'] != 4 && $bill['trangthai'] != 5) : ?>
                                    <a href="index.php?act=editdh1&iddh=<?php echo $bill['id'] ?>"><input type="button" value="Cập nhật"></a>
                                <?php endif ?>
                                <a href="index.php?act=ctdh1&iddh=<?php echo $bill['id'] ?>"><input type="button" value="Xem chi tiết"></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

        </div>
    </form>
</div>