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
            <form action="index.php?act=addtk" method="POST">
                <div class="row-input">
                    <label> Mã khách hàng </label> <br>
                    <input type="text" name="id" disabled>
                </div>
                <div class="row-input">
                    <label>User</label> <br>
                    <input type="text" name="user">
                </div>
                <div class=" row-input">
                    <label>Mật khẩu</label> <br>
                    <input type="text" name="pass">
                </div>
                <div class=" row-input">
                    <label> Email</label> <br>
                    <input type="text" name="email">
                </div>
                <div class="row-input">
                    <label>Họ tên </label> <br>
                    <input type="text" name="hoten">
                </div>
                <div class="row-input">
                    <label>Địa chỉ </label> <br>
                    <input type="text" name="address">
                </div>
                <div class="row-input">
                    <label>Ngày tạo </label> <br>
                    <input type="date" name="ngaytao">
                </div>
                <div class="row-input">
                    <label>Số điện thoại </label> <br>
                    <input type="text" name="phone">
                </div>
                <div class="row-input">
                    <label>Vai trò </label> <br>
                    <input type="text" name="vaitro">
                </div>
                <div class="row-btn">
                    <input onclick="return confirmEdit()" type="submit" name="themmoi" value="Sửa">
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    function confirmEdit() {
        if (confirm("Bạn có thêm tài khoản không ?")) {
            document.location = "index.php?act=listtk";
        } else {
            return false;
        }
    }
</script>

</html>

<!-- END HEADER -->