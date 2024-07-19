<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Giỏ hàng</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Giỏ hàng</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->

<div class="container-fluid pt-5" id="order">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <a href="index.php?act=mybill">Lịch sử đơn hàng của tôi</a>
            <?php
            $i = 1;
            $tong = 0;
            // if (isset($_SESSION['user'])) {
            ?>
            <table class="table table-bordered text-center mb-0 mt-2">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Kích cỡ</th>
                        <th>Màu</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    $tong = 0;
                    $i = 0;
                    $allsize = loadAllSize();
                    // var_dump($allsize);
                    $allcolor = loadAllColor();
                    // var_dump($_SESSION['mycart']);
                    foreach ($_SESSION['mycart'] as $cart) {
                        // var_dump($spadd);
                        extract($cart);
                        $ttien = $cart[3] * $cart[4];
                        $tong += $ttien;
                    ?>
                        <tr>
                            <td class="align-middle" style="text-align: left;"><img src="<?= $cart[2] ?>" alt="" style="width: 50px;"> <?= $cart[1] ?></td>
                            <td class="align-middle"><?= number_format($cart[3], 0, ',', ',') ?> vnđ</td>

                            <td class="align-middle"><?php
                                                        foreach ($allsize as $size) {
                                                            if ($size['id'] == $cart[5]) {
                                                                echo $size['name'];
                                                            }
                                                        }
                                                        ?></td>
                            <td class="align-middle"><?php
                                                        foreach ($allcolor as $color) {
                                                            if ($color['id'] == $cart[6]) {
                                                                echo $color['name'];
                                                            }
                                                        }
                                                        ?></td>
                            <td class="align-middle quantity" style="width: 120px;">
                                <a onclick="giam(this)" style="border: 1px solid #ccc; padding: 0px 5px; cursor: pointer;">-</a>
                                <span style="margin: 0 5px; "><?php echo $cart[4] ?></span>
                                <a onclick="tang(this)" style="border: 1px solid #ccc; padding: 0px 5px; cursor: pointer;">+</a>
                                <span style="display:none;"><?php echo $i ?></span>
                            </td>
                            <td class="align-middle"><?= number_format($ttien, 0, ',', '.') ?> vnđ</td>
                            <!-- <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td> -->
                            <!-- <td class="align-middle"><button class="btn btn-sm btn-primary"><a href="?act=delete_cart&idcart=<?= $id ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a></button></td> -->
                            <td class="align-middle">

                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="index.php?act=deletecart&idcart=<?php echo $i ?>"><i class="fa-solid fa-trash-can" style="color: #f52424;"></i></a>

                            </td>
                            <!-- <td>
                                    <form action="?act=show_cart&idcart=<?= $id ?>" method="post"><button>Sủa</button> | <button onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button></form>
                                </td> -->
                        </tr>
                    <?php $i++;
                    }

                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-12 ">

            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Phiếu thanh toán</h4>
                </div>

                <div class="card-body ">
                    <div class="d-flex justify-content-between align-items-center mb-3 pt-1 ">
                        <div class="d-flex align-items-center">
                            <h6 class="font-weight-medium">Chọn tất cả sản phẩm</h6>
                            <input type="checkbox" name="" id="" class="m-2">
                        </div>
                        <form class="mb-5 mt-3" action="">
                            <div class="input-group">
                                <input type="text" class="form-control p-4" placeholder="Mã giảm giá">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Áp mã giảm giá</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3 pt-1 ">
                        <h6 class="font-weight-medium">Tổng tiền</h6>
                        <h6 class="font-weight-medium"><?= number_format($tong, 0, ',', ',')   ?> vnđ</h6>
                    </div>
                    
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng tiền</h5>
                        <h5 class="font-weight-bold"><?= number_format($tong, 0, ',', ',')   ?> vnđ</h5>
                    </div>
                    <button class="btn btn-block btn-primary my-3 py-3"><a href="index.php?act=bill" style="color: #fff;">Tiếp tục đặt hàng</a></button>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
// } else {
//     echo "Bạn cần đăng nhập vào để mua hàng";
//     // $thongconfirm('Bạn có chắc chắn muốn xóa không?');
// }
?>
<!-- Cart End -->


<script>
    function tang(x) {
        var cha = x.parentElement;
        console.log(cha);
        var soluongcu = cha.children[1];
        console.log(soluongcu);
        var soluongmoi = parseInt(soluongcu.innerText) + 1;
        soluongcu.innerText = soluongmoi;
        var vitri = cha.children[3].innerText;
        console.log(vitri, 'vitri');

        // Gửi yêu cầu AJAX
        $.ajax({
            type: "POST",
            url: "./view/cart/update_quantity.php", // Đường dẫn đến tập lệnh PHP để xử lý cập nhật
            data: {
                vitri: vitri,
                soluong: soluongmoi
            },
            success: function(response) {
                // Xử lý phản hồi từ tập lệnh PHP (nếu cần)
                console.log("Cập nhật thành công");
                // Sau khi cập nhật thành công
                $.post('view/tableCartOrder.php', function(data) {
                    $('#order').html(data);
                })
            },
            error: function() {
                // Xử lý lỗi (nếu có)
                console.log("Lỗi khi cập nhật số lượng");
            }
        });
    }

    function giam(x) {
        var cha = x.parentElement;
        var soluongcu = cha.children[1];
        if (parseInt(soluongcu.innerText) > 1) {
            var soluongmoi = parseInt(soluongcu.innerText) - 1;
            soluongcu.innerText = soluongmoi;
            var vitri = cha.children[3].innerText;

            // Gửi yêu cầu AJAX
            $.ajax({
                type: "POST",
                url: "./view/cart/update_quantity.php", // Đường dẫn đến tập lệnh PHP để xử lý cập nhật
                data: {
                    vitri: vitri,
                    soluong: soluongmoi
                },
                success: function(response) {
                    // Xử lý phản hồi từ tập lệnh PHP (nếu cần)
                    console.log("Cập nhật thành công");
                    // Sau khi cập nhật thành công
                    $.post('view/tableCartOrder.php', function(data) {
                        $('#order').html(data);
                    })
                },
                error: function() {
                    // Xử lý lỗi (nếu có)
                    console.log("Lỗi khi cập nhật số lượng");
                }
            });
        } else {
            alert("Đặt hàng tối thiểu là 1");
        }
    }
</script>