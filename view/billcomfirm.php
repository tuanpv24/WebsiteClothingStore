<div class="container-fluid pt-5" id="order">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <div class="billcomfirm">
                <h4>Cảm ơn bạn đã mua hàng</h4>
                <p>Chào <?php echo $_SESSION['user']['user'] ?>, đơn hàng của bạn với mã DA1-<?php echo $bill['id'] ?> đã được đặt thành công</p>
                <p>Chúng tôi sẽ liên hệ với bạn qua thông tin bạn cung cấp, dưới đây là thông tin bạn đã đặt hàng</p>
                <div class="content-bill">
                    <div>

                        <p>Mã đơn hàng: DA1-<?php echo $bill['id'] ?></li>
                        </p>
                        <p>Ngày đặt hàng: <?php echo date("d/m/Y", strtotime($bill['ngaydathang'])) ?></p>
                        <p>Tổng đơn hàng: <?php echo number_format($bill['tong'], 0, ",", ".") ?> VND</p>
                        <?php $pttt = get_pttt($bill['pay']) ?>
                        <p>Phương thức thanh toán: <?php echo $bill['pay'] ?></p>
                    </div>
                    <div>
                        <p>Người đặt hàng: <?php echo $bill['hoten'] ?></p>
                        <p>Địa chỉ: <?php echo $bill['address'] ?></p>
                        <p>Email: <?php echo $bill['email'] ?></p>
                        <p>Số điện thoại: <?php echo $bill['phone'] ?></p>
                    </div>
                </div>
                <p>Cảm ơn <?php echo $_SESSION['user']['user'] ?> đã tin dùng sản phẩm của 3MEN!</p>
                <div class="btn-a">
                    <a href="index.php" style="margin-right:30px;">Tiếp tục mua hàng</a>
                    <a href="index.php?act=mybill">Theo dõi đơn hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>