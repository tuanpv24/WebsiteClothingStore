<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Thanh toán</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Thanh toán</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Cart Start -->

<div class="container-fluid pt-5">
    <form action="index.php?act=billcomfirm" method="post">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <h4 class="mb-4">Thông tin đặt hàng</h4>
                
                <?php
                if (isset($_SESSION['user'])) {
                    $name = $_SESSION['user']['user'];
                    $address = $_SESSION['user']['address'];
                    $email = $_SESSION['user']['email'];
                    $phone = $_SESSION['user']['phone'];
                } else {
                    $name = "";
                    $address = "";
                    $email = "";
                    $phone = "";
                }
                ?>

                <div class="form-group">
                    <label for="name">Người đặt hàng</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $name ?>" />

                </div>
                <div class="form-group">
                    <label for="name">Địa chỉ </label>
                    <input type="text" class="form-control" id="address" name="address" value="<?= $address ?>" />

                </div>
                <div class="form-group">
                    <label for="name">Email </label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" />

                </div>
                <div class="form-group">
                    <label for="name">Điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $phone ?>" />
                </div>

            </div>
            <div class="col-md-6">
                <h4 class="mb-4">Phương thức thanh toán</h4>
                <input type="radio" name="thanhtoan" value="offline" /> Thanh toán khi nhận hàng <br />
                <input type="radio" id="" name="thanhtoan" value="vnpay" /> Thanh toán online <br />
            </div>

        </div>
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Kích cỡ</th>
                            <th>Màu</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        $allsize = loadAllSize();
                        $allcolor = loadAllColor();
                        $i = 1;
                        $tong = 0;
                        $maxDisplay = 10000;
                        $displayCount = 0;
                        $allProducts = []; // Mảng để theo dõi tất cả sản phẩm
                        $uniqueProducts = []; // Mảng để theo dõi sản phẩm duy nhất
                        $a = 0;
                        // var_dump($_SESSION['mycart']);
                        foreach ($_SESSION['mycart'] as $cart) {
                            $soluong = 1;
                            extract($cart);
                            $tongtien = intval($cart[3]) * intval($cart[4]);
                            $tong += $tongtien;
                            $productKey = $cart[0]; // Sử dụng một trường duy nhất để xác định sản phẩm, 
                            //có thể là ID sản phẩm hoặc một trường khác

                            // Thêm sản phẩm vào danh sách tất cả sản phẩm
                            $allProducts[] = $productKey;

                            // Nếu sản phẩm chưa xuất hiện trong danh sách sản phẩm duy nhất, thêm nó vào
                            if (!in_array($productKey, $uniqueProducts)) {
                                $uniqueProducts[] = $productKey;
                            }
                            if ($displayCount < $maxDisplay) {
                                $a++
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
                                    <td class="align-middle">
                                        <?= $cart[4]  ?>
                                    </td>
                                    <td class="align-middle"><?= number_format($tongtien, 0, ',', '.') ?> vnđ</td>

                                    <!-- <td>
                                <form action="?act=show_cart&idcart=<?= $id ?>" method="post"><button>Sủa</button> | <button onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button></form>
                            </td> -->
                                </tr>
                        <?php $displayCount++;
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12 text-align-left">


                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">

                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng đơn hàng</h6>
                            <h6 class="font-weight-medium"><?= $tong ?> vnđ</h6>
                        </div>
                        
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <input type="hidden" name="idbill" value="<?= $id ?>">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Thanh toán</h5>
                            <h5 class="font-weight-bold"><?= number_format($tong , 0, ',', '.') ?> vnđ</h5>
                            <input type="text" name="tongtien" hidden value="<?= $tong  ?>">
                        </div>
                        <p class="text-danger"><?= (isset($error) ? $error : '') ?></p>
                        <input type="hidden" name="thanhtien" value="<?php echo number_format($tong, 0, ",", ".") ?> ?>">
                        <button name="redirect" value="btn_thanh" class="btn btn-block btn-primary my-3 py-3" onclick="return kiemtraform()">Thanh toán</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
<!-- Cart End -->

<script>
    //Validate thông báo chưa nhập
    function kiemtraform() {
        var name = document.getElementById("name");
        if (name.value == "") {
            alert("Vui lòng nhập tên!");
            name.focus();
            return false;
        }
        var address = document.getElementById("address");
        if (address.value == "") {
            alert("Vui lòng nhập địa chỉ!");
            address.focus();
            return false;
        }
        var email = document.getElementById("email");
        if (email.value == "") {
            alert("Vui lòng nhập email!");
            email.focus();
            return false;
        }
        var phone = document.getElementById("tel");
        if (phone.value == "") {
            alert("Vui lòng nhập sdt!");
            phone.focus();
            return false;
        }
        var confirmPayment = confirm("Xác nhận thanh toán?");
        if (confirmPayment) {
            return true; // Nếu người dùng chấp nhận, tiếp tục thanh toán
        } else {
            return false; // Nếu người dùng không chấp nhận, không thanh toán
        }
    }
</script>