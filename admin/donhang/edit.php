<div class="wrapper">
    <div class="admin">

        <h1>Đơn hàng</h1>
    </div>
    <form action="index.php?act=updatedh" method="POST">
        <div>
            <?php 
            ?> <label>Tình trạng</label>

            <?php if ($onebill['trangthai'] == 1) : ?>
                <select name="trangthai">
                    <option value="1" <?php echo ($onebill['trangthai'] == 1) ? 'selected' : ''; ?>>Đơn hàng mới</option>
                    <option value="2" <?php echo ($onebill['trangthai'] == 2) ? 'selected' : ''; ?>>Đang xử lý</option>
                    <option value="3" <?php echo ($onebill['trangthai'] == 3) ? 'selected' : ''; ?>>Đang giao hàng</option>
                    <option value="4" <?php echo ($onebill['trangthai'] == 4) ? 'selected' : ''; ?>>Đã giao hàng</option>
                    <option value="5" <?php echo ($onebill['trangthai'] == 5) ? 'selected' : ''; ?>>Đơn hàng bị hủy</option>
                </select>
            <?php elseif ($onebill['trangthai'] == 2) : ?>
                <select name="trangthai">
                    <option value="2" <?php echo ($onebill['trangthai'] == 2) ? 'selected' : ''; ?>>Đang xử lý</option>
                    <option value="3" <?php echo ($onebill['trangthai'] == 3) ? 'selected' : ''; ?>>Đang giao hàng</option>
                    <option value="4" <?php echo ($onebill['trangthai'] == 4) ? 'selected' : ''; ?>>Đã giao hàng</option>
                    <option value="5" <?php echo ($onebill['trangthai'] == 5) ? 'selected' : ''; ?>>Đơn hàng bị hủy</option>
                </select>
            <?php elseif ($onebill['trangthai'] == 3) : ?>
                <select name="trangthai">
                    <option value="3" <?php echo ($onebill['trangthai'] == 3) ? 'selected' : ''; ?>>Đang giao hàng</option>
                    <option value="4" <?php echo ($onebill['trangthai'] == 4) ? 'selected' : ''; ?>>Đã giao hàng</option>
                    <option value="5" <?php echo ($onebill['trangthai'] == 5) ? 'selected' : ''; ?>>Đơn hàng bị hủy</option>
                </select>
            <?php else : ?>
                <select name="trangthai">
                    <option value="5" <?php echo ($onebill['trangthai'] == 5) ? 'selected' : ''; ?>>Đơn hàng bị hủy</option>
                </select>
            <?php endif ?>
        </div><br>

        <input type="hidden" name="iddh" value="<?php echo $onebill['id'] ?>">
        <input type="submit" name="capnhat" value="Cập nhật">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listdh1"><input type="button" value="Danh sách"></a><br>
    </form>
</div>