

<div class="container-fluid pt-5" id="order">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0 mt-2">
                <div class="contact-info">
                    <p style="font-size: 20px;margin-bottom:10px">Thông tin người đặt</p>
                    <p>Tên: <?php echo $bill['hoten'] ?></p>
                    <p>Email: <?php echo $bill['email'] ?></p>
                    <p>Địa chỉ: <?php echo $bill['address'] ?></p>
                    <p>Số điện thoại: <?php echo $bill['phone'] ?></p>
                </div>
                <thead>
                    <tr>
                        <!-- <th scope="col">Ảnh</th> -->
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Kích cỡ</th>
                        <th>Màu</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // var_dump($ctdh);
                    $allsize = loadAllSize();
                    // var_dump($allsize);
                    $allcolor = loadAllColor();
                    // $img = $img_path . $img;
                    foreach ($ctdh as $key => $sp) {
                        $img = $img_path . $sp['img'];
                    ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><img src="<?php echo $sp[3] ?>" alt="" width="70px" height="50px"></td>
                            <td><?php echo $sp['name'] ?></td>
                            <td><?php
                                foreach ($allsize as $size) {
                                    if ($size['id'] == $sp['size']) {
                                        echo $size['name'];
                                    }
                                }
                                ?></td>
                            <td><?php
                                foreach ($allcolor as $color) {
                                    if ($color['id'] == $sp['color']) {
                                        echo $color['name'];
                                    }
                                }
                                ?></td>

                            <td><?php echo number_format($sp['price'], 0, ",", ".") ?> VNĐ</td>
                            <td><?php echo $sp['soluong'] ?></td>
                            <td style="text-align: left;">
                                <?php echo number_format($sp['thanhtien'], 0, ",", ".") ?> VNĐ
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>