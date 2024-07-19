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
            <h1>Thêm kích cỡ</h1>
        </div>
        <div class="form-content">
            <form action="index.php?act=addcolor" method="POST">
                
                <div class="row-input">
                    <label> Mã màu </label> <br>
                    <input type="text" name="id" disabled>
                </div>
                <div class="row-input">
                    <label>Tên màu</label> <br>
                    <input type="text" name="name">
                </div>
                <div class="row-btn">
                    <input onclick="return confirmEdit()" type="submit" name="themmoi" value="Thêm">
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