<div class="wrapper">
  <div class="admin">
    <h1>Danh sách bình luận</h1>
  </div>
  <div class="table">
    <table class="table-bordered" border="1">
      <tr>
        <td style="width: 50px;">Id user</td>
        <td style="width: 50px;">Id product</td>
        <td style="max-width: 500px;">Nội dung</td>
        <td style="width: 150px;">Ngày bình luận</td>
        <td style="width: 150px;">Chức năng</td>
      </tr>
      <?php
      foreach ($listBl as $ds) {
        // extract($ds);
        extract($ds);
        $xoacmt = "index.php?act=xoacmt&id=" . $id;
        echo '<tr>
                <td>' . $id_user . '</td>
                <td>' . $id_product . '</td>
                <td>' . $noidung . '</td>
                <td>' . $ngaydang . '</td>    
                <td>
                    <a href="' . $xoacmt . '" onclick="return confirmDelete()" class="delete">
                Xóa
                    </a>
                </td>
                </tr>';
      }
      ?>
    </table>
  </div>
</div>
<script>
  function confirmDelete() {
    if (confirm("Bạn có muốn xóa không ?")) {
      document.location = "index.php?act=listcmt";
    } else {
      return false;
    }
  }
</script>