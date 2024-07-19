<!-- <?php
if (is_array($tk)) {
    extract($tk);
}
?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

</style>

<body>

    <div class="wrapper">
        <div class="font-title">
            <h1>Sửa khách hàng</h1>
        </div>
        <div class="form-content">
            <form action="index.php?act=updateTk" method="POST">
                <div class="row-input">
                    <label> Mã khách hàng </label> <br>
                    <input type="text" name="id" value="<?= $id ?>" >
                </div>
                <div class="row-input">
                    <label>User</label> <br>
                    <input type="text" name="user" value="<?= $user ?>">
                </div>
                <div class="row-input">
                    <label>Mật khẩu</label> <br>
                    <input type="text" name="pass" value="<?= $pass ?>">
                </div>
                <div class="row-input">
                    <label> Email</label> <br>
                    <input type="text" name="email" value="<?= $email ?>">
                </div>
                <div class="row-input">
                    <label>Họ tên </label> <br>
                    <input type="text" name="hoten" value="<?= $hoten ?>">
                </div>
                <div class="row-input">
                    <label>Địa chỉ </label> <br>
                    <input type="text" name="address" value="<?= $address ?>">
                </div>
                <div class="row-input">
                    <label>Ngày tạo </label> <br>
                    <input type="date" name="ngaytao" value="<?= $ngaytao ?>">
                </div>
                <div class="row-input">
                    <label>Số điện thoại </label> <br>
                    <input type="text" name="phone" value="<?= $phone ?>">
                </div>
                <div class="row-input">
                    <label>Vai trò </label> <br>
                    <input type="text" name="vaitro" value="<?= $vaitro ?>">
                </div>
                <div class="row-btn">
                    <input onclick="return confirmEdit()" type="submit" name="capnhat" value="Sửa">
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    function confirmEdit() {
        if (confirm("Bạn có hoàn tất sửa không ?")) {
            document.location = "index.php?act=listtk";
        } else {
            return false;
        }
    }
</script>

</html>

<!-- END HEADER -->