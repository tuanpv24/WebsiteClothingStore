<link rel="stylesheet" href="./CSS/header.css">
<link rel="stylesheet" href="./CSS/footer.css">
<link rel="stylesheet" href="./CSS/home.css">
<link rel="stylesheet" href="./CSS/add.css">
<link rel="stylesheet" href="./CSS/aside.css">
<link rel="stylesheet" href="./CSS/edit.css">
<link rel="stylesheet" href="./CSS/list.css">
<link rel="stylesheet" href="./CSS/thongke.css">
<link rel="stylesheet" href="./CSS/index.css">
<link rel="stylesheet" href="./CSS/chitietsp.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<?php
include "header.php";
include "../model/pdo.php";
// include "../model/thongke.php";
include "../model/binhluan.php";
include "../model/taikhoan.php";
include "../model/sanpham.php";
include "../model/danhmuc.php";
include "../model/sanphambienthe.php";
include "../model/size.php";
include "../model/color.php";
include "../model/cart.php";
include "../model/donhang.php";
include "../global.php";
include "../model/thongke.php";
// include "../model/vaitro.php";
// include "tinhtong.php";
// include "test.php";
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            // kiểm tra xem ng dùng có click vào nút add hay không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                $hinh = $_FILES['hinh']['name'];
                //                    echo $hinh;
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                //                    echo $target_file;
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                    //                        echo "Bạn đã upload ảnh thành công";
                } else {
                    //                        echo "Upload ảnh không thành công";
                }
                insert_danhmuc($tenloai, $hinh);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/edit.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];;
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                // update_sanpham($id, $iddm, $tensp, $giasp, $hinh, $des);
                update_danhmuc($id, $tenloai, $hinh);
                $thongbao = "Cập nhật thành công";
            } else {
                $thongbao = "kh cập nhật thành công!";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

            //sanr phaamr
        case "addsp":
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $des = $_POST['des'];
                $quantity = $_POST['quantity'];
                $hinh = $_FILES['hinh']['name'];
                //                    echo $hinh;
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                //                    echo $target_file;
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                    //                        echo "Bạn đã upload ảnh thành công";
                } else {
                    //                        echo "Upload ảnh không thành công";
                }
                //                    echo $iddm;
                insert_sanpham($tensp, $des, $giasp, $quantity, $hinh, $iddm);
                $thanhcong = "Thêm thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            // $listsanpham = loadall_sanpham("", 0);
            include "sanpham/add.php";
            break;
        case "listsp":
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kym = $_POST['kym'];
                $iddm = $_POST['iddm'];
            } else {
                $kym = "";
                $iddm = 0;
            };
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kym, $iddm);
            include "sanpham/list.php";
            break;
        case 'suasanpham':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/edit.php";
            break;

        case "editsp":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $des = $_POST['des'];
                $quantity = $_POST['quantity'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                // update_sanpham($id, $iddm, $tensp, $giasp, $hinh, $des);
                update_sanpham($id, $tensp, $des, $giasp, $quantity, $hinh, $iddm);
                $thongbao = "cập nhật thành công!";
            } else {
                $thongbao = "kh nhật thành công!";
            }
            $listsanpham = loadall_sanpham();
            include "sanpham/list.php";
            break;

        case "xoasp":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            // $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;

        case "chitietsp":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/chitiet.php";
            break;

            // tài khoản 
        case "addtk":
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $hoten = $_POST['hoten'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $vaitro = $_POST['vaitro'];
                // $avatar = $_POST['avatar'];
                insert_taiKhoan_admin($id, $user, $pass, $email, $hoten, $address, $phone, $vaitro);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/add.php";
            break;
        case "listtk":
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case "editTk":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $tk = loadOne_taiKhoan($_GET['id']);
            }
            include "taikhoan/edit.php";
            break;
        case "xoatk":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
            }
            // $listdanhmuc = loadall_danhmuc();
            $listtaikhoan = loadall_taikhoan();

            include "taikhoan/list.php";
            break;
        case "updateTk":
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $hoten = $_POST['hoten'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $vaitro = $_POST['vaitro'];
                // $avatar = $_POST['avatar'];
                update_Account_admin($id, $user, $pass, $email, $hoten, $address, $phone, $vaitro);
            }
            // $listTk = loadAll_TaiKhoan();
            $listtaikhoan = loadAll_TaiKhoan();
            include "taikhoan/list.php";

            // include "taikhoan/list.php";
            break;
        case "listcmt":
            $listBl = loadAll_comment();
            include "binhluan/binhluan.php";
            break;
        case "xoacmt":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                delete_binhLuan($id);
            }
            $listBl = loadAll_comment();
            include "binhluan/binhluan.php";
            break;
            //sản phẩm biến thể
        case "addspbt":
            if (isset($_POST['themmoi'])) {
                $product_id = $_POST['product_id'];
                $color_id = $_POST['color_id'];
                $size_id = $_POST['size_id'];
                $quantity = $_POST['quantity'];
                insert_proVariant($product_id, $size_id, $color_id, $quantity);
            }
            $listsize = load_all_size();
            $listColor = load_all_color();
            $listsanpham = loadall_sanpham("", 0);
            include "sanphambienthe/add.php";
            break;
        case "listspbt":
            $listpv = loadall_prov();
            include "sanphambienthe/list.php";
            break;
        case "xoaspbt":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_spbt($_GET['id']);
            }
            $listpv = loadall_prov();
            include "sanphambienthe/list.php";
            break;
        case "updatespbt":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $onespbt = load_one_spbt($_GET['id']);
            }
            $listpv = loadall_prov();
            $listsanpham = loadall_sanpham("", 0);
            $listsize = load_all_size();
            $listColor = load_all_color();
            include "sanphambienthe/update.php";
            break;
        case "editspbt":
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $idbt = $_POST['idbt'];
                $product_id = $_POST['product_id'];
                $color_id = $_POST['color_id'];
                $size_id = $_POST['size_id'];
                $quantity = $_POST['quantity'];
                update_proVariant($idbt, $product_id, $size_id, $color_id, $quantity);
            }
            $listpv = loadall_prov();
            include "sanphambienthe/list.php";
            break;

            //size
        case "addsize":
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $product_id = $_POST['product_id'];
                $color_id = $_POST['color_id'];
                $size_id = $_POST['size_id'];
                $quantity = $_POST['quantity'];
                insert_size($name_size);
            }
            include "sanphambienthe/size/add.php";
            break;
        case "listsize":
            $listsize = load_all_size();
            include "sanphambienthe/size/list.php";
            break;
        case "xoasize":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_size($_GET['id']);
            }
            $listsize = load_all_size();
            include "sanphambienthe/size/list.php";
            break;
        case "editsize":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $size = load_one_size($_GET['id']);
            }
            $listsize = load_all_size();
            include "sanphambienthe/size/update.php";
            break;
        case "updatesize":
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                // $id = $_POST['id'];
                $name_size = $_POST['name'];
                update_size($name_size);
            }
            $listsize = load_all_size();
            include "sanphambienthe/size/list.php";
            break;
            //color
        case "addcolor":
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                // $id = $_POST['id'];
                $name_color = $_POST['name'];
                insert_color($name_color);
            }
            include "sanphambienthe/color/add.php";
            break;
        case "listcolor":
            $listColor = load_all_color();
            include "sanphambienthe/color/list.php";
            break;
        case "xoacolor":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_color($_GET['id']);
            }
            $listColor = load_all_color();
            include "sanphambienthe/color/list.php";
            break;
        case "editcolor":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $color = load_one_color($_GET['id']);
            }
            $listcolor = load_all_color();
            include "sanphambienthe/color/update.php";
            break;
        case "updatecolor":
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                // $id = $_POST['id'];
                $name_color = $_POST['name'];
                update_color($name_color);
            }
            $listcolor = load_all_color();
            include "sanphambienthe/color/list.php";
            break;

            //Đơn hàng
            //Danh sách đơn hàng
        case 'listdh1':
            $listbill = loadall_billdh();
            include "donhang/list.php";
            break;
            //Chi tiết đơn hàng
        case 'ctdh1':
            if (isset($_GET['iddh']) && $_GET['iddh'] > 0) {
                // $ctdh = loadall_cart($_GET['iddh']);
                $ctdh = loadall_cart($_GET['iddh']);
            }
            include "donhang/chitiet.php";
            break;
            //Cập nhật đơn hàng
        case "editdh1":
            if (isset($_GET['iddh']) & $_GET['iddh'] > 0) {
                $onebill = loadone_bill($_GET['iddh']);
            }
            $listbill = loadall_billdh();
            include "donhang/edit.php";
            break;
        case "updatedh":
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                // $id = $_POST['id'];
                $trangthai = $_POST['trangthai'];
                $id = $_POST['iddh'];
                update_bill11($id, $trangthai);
            }
            $listbill = loadall_billdh();
            include "donhang/list.php";
            break;
        case 'editdh1':
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                if (isset($_GET['iddh']) & $_GET['iddh'] > 0) {
                    $id = $_POST['iddh'];
                }
                // $trangthai = $_POST['trangthai'];
                // $id1 = $_POST['iddh'];
                // update_bill11($id1, $trangthai);
                header("location: index.php?act=listdh1");
            }
            $onebill = loadone_bill($_GET['iddh']);
            include "donhang/edit.php";
            break;
        case "thongke":
            $listthunhap = thongkethunhap();
            $listthunhap1 = thongkethunhap1();
            $listthunhap2 = thongkethunhap2();
            $listthongke = loadall_thongke();
            include "thongke/thongke.php";
            break;
        case "donhang":
            // $listdonhang = loadAllDonHang();
            include "donhang/list.php";
            break;

        default:

            $tongdm = tinhtongdm();
            $tongsp = tinhtongsp();
            $tongbl = tinhtongbinhluan();
            $tongkhachhang = tinhtongkhachhang();
            $listthongke = loadall_thongke();
            $listthunhap = thongkethunhap();
            include "home.php";
            break;
    }
} else {
    $listthunhap = thongkethunhap();
    $listthongke = loadall_thongke();
    $tongdm = tinhtongdm();
    $tongsp = tinhtongsp();
    $tongbl = tinhtongbinhluan();
    $tongkhachhang = tinhtongkhachhang();
    // $listdanhmuc = loadAllDm();
    // $listsanpham = loadAllSp();
    include "home.php";
}
include "footer.php";
?>
<script src="./JS/script.js"></script>