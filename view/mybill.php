<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
  <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
    <h1 class="font-weight-semi-bold text-uppercase mb-3">Lịch sử đơn hàng</h1>
    <div class="d-inline-flex">
      <p class="m-0"><a href="">Home</a></p>
      <p class="m-0 px-2">-</p>
      <p class="m-0">Giỏ hàng</p>
    </div>
  </div>
</div>
<div class="container-fluid pt-5" id="order">
  <div class="row px-xl-5">
    <div class="col-lg-12 table-responsive mb-5">
      <table class="table table-bordered text-center mb-0 mt-2">
        <thead>
          <tr>
            <!-- <th scope="col">Ảnh</th> -->
            <th>STT</th>
            <th>Mã đơn hàng</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Ngày đặt</th>
            <th>Thanh toán</th>
            <th>Tình trạng</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($listbill as $key => $bill) {
            $countsp = loadall_cart_count($bill['id']);
            $ttdh = get_ttdh($bill['trangthai']);
            $pttt = get_pttt($bill['pay']);
          ?>
            <tr>
              <td><?php echo $key + 1 ?></td>
              <td>DA1-<?php echo $bill['id'] ?></td>
              <td><?php echo $countsp ?></td>
              <td><?php echo number_format($bill['tong'], 0, ",", ".") ?> VND</td>
              <td><?php echo date("d/m/Y", strtotime($bill['ngaydathang'])) ?></td>
              <td><?php echo $bill['pay'] ?></td>
              <td><?php echo $ttdh ?></td>
              <td style="text-align: left;">
                <a href="index.php?act=chitietbill&idb=<?php echo $bill['id'] ?>"><input type="button" value="Xem chi tiết"></a>
                <?php if ($bill['trangthai'] == 1 || $bill['trangthai'] == 2) : ?>
                  <a onclick="return confirm('Bạn có chắc muốn hủy đơn hàng')" href="index.php?act=updateb&idb=<?php echo $bill['id'] ?>"><input type="button" value="Hủy"></a>
                <?php endif ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</div>