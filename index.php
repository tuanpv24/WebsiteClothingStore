<?php
ob_start();
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/binhluan.php";
// include "model/validate_thanhtoan.php";
include "model/cart.php";
include "model/donhang.php";
include "model/sanphambienthe.php";
include "model/color.php";
include "model/size.php";
include "view/header.php";
include "global.php";
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}
$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top8();
$dmtop3 = loadall_danhmuc_top3();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];    
    switch ($act) {
        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/sanpham.php";
            break;
        case 'sanphamall':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['id_dm']) && ($_GET['id_dm'] > 0)) {
                $iddm = $_GET['id_dm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/tatcasanpham.php";
            break;
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                tangluotxem($_GET['idsp']);
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                $listcolor = load_btcolor($_GET['idsp']);
                $listsize = load_btsize($_GET['idsp']);
                extract($onesp);
                $sp_cung_loai = loadone_sanpham_cungloai($id, $id_dm);
                $binhluan = loadall_binhluan($_GET['idsp']);
                include "view/chitietsanpham.php";
            } else {
                include "view/home.php";
            }
            break;

        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $hoten = $_POST['hoten'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                insert_taikhoan($user, $pass, $email, $hoten,  $address, $phone);
                $thongbao = "Đã đăng ký thành công!";
            }
            // $thongbao = "chưa thêm đc";
            include "view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    // $_SESSION['dem'] = dem_cart($_SESSION['user']['id']);
                    header("Location: index.php");
                } else {
                    $thongbao = "Tài khoản không tồn tại";
                }
            }
            include "view/taikhoan/dangnhap.php";
            break;
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $id = $_POST['id'];
                // update_taikhoan($id, $user, $pass, $email, $address, $phone);
                $_SESSION['user'] = checkuser($user, $pass);
                $thongbao = "Cập nhật tài khoản thành công!  ";
                // header('Location: index.php?act=edit_taikhoan');
            }
            include "view/taikhoan/edit_taikhoan.php";
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                } else {
                    $thongbao = "Email không tồn tại";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;
        case 'addtocart':
            if (isset($_POST['btn']) && ($_POST['btn'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $hinh = $_POST['img'];
                $price = $_POST['price'];
                if (isset($_POST['soluong'])) {
                    $soluong = $_POST['soluong'];
                } else {
                    $soluong = 1;
                }
                $tongtien = $price * $soluong;
                if (isset($_POST['id_size']) && !empty($_POST['id_size'])) {
                    $id_size = $_POST['id_size'];
                } else {
                    $id_size = 0;
                }
                if (isset($_POST['id_color']) && !empty($_POST['id_color'])) {
                    $id_color = $_POST['id_color'];
                } else {
                    $id_color = 0;
                }
                // $id_color = $_POST['id_color'];
                // $id_size = $_POST['id_size'];
                $fg = 0;
                $i = 0;
                foreach ($_SESSION['mycart'] as $item) {
                    // var_dump($item);
                    if ($item[1] == $name && $item[6] == $id_color && $item[5] == $id_size) {
                        $slnew = $soluong + $item[4];
                        $_SESSION['mycart'][$i][4] = $slnew;
                        $_SESSION['mycart'][$i][7] = $_SESSION['mycart'][$i][4] * $_SESSION['mycart'][$i][3];
                        $fg = 1;
                        break;
                    }
                    $i++;
                }
                if ($fg == 0) {
                    $spadd = [$id, $name, $hinh, $price, $soluong, $id_size, $id_color,  $tongtien];
                    array_push($_SESSION['mycart'], $spadd);
                }
                // update_soluong2($soluong, $id);
            }
            include "view/cart/cart.php";
            break;
        case 'deletecart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header("location: index.php?act=viewcart");
            break;
        case 'viewcart':
            include "view/cart/cart.php";
            break;
        case "bill":
            if (empty($_SESSION['mycart'])) {
                header("location: index.php?act=viewcart");
            }

            include "view/bill.php";
            break;
        case "billcomfirm":
            if (isset($_SESSION['user'])) {
                $id_user = $_SESSION['user']['id'];
            }
            if (isset($_SESSION['user'])) {
                if (isset($_POST['redirect']) && $_POST['redirect']) {
                    if (isset($_POST['thanhtoan']) && $_POST['thanhtoan'] == "offline") {
                        $hoten = $_POST['name'];
                        $address = $_POST['address'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $pay = $_POST['thanhtoan'];
                        // $soluongg = $_POST['quantity'];
                        $ngaydathang = date('Y-m-d');
                        $tong = tongdonhang();
                        $idbill = add_bill($id_user, $ngaydathang, $email, $address, $phone, $hoten, $pay, $tong);
                        //insert into cart: $_SESSION['mycart'] & idbill
                        foreach ($_SESSION['mycart'] as $cart) {
                            insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[6], $cart[5], $cart[3], $cart[4], $cart[7], $idbill);
                            if ($cart[5] != 0 && $cart[6] != 0) {
                                update_soluong($cart[4], $cart[5], $cart[0], $cart[6]);
                            }
                            // xóa $_SESSION['cart']
                            $_SESSION['mycart'] = [];
                        }
                    } elseif (isset($_POST['thanhtoan']) && $_POST['thanhtoan'] == 'vnpay') {
                        $hoten = $_POST['name'];
                        $address = $_POST['address'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $pay = $_POST['thanhtoan'];
                        $ngaydathang = date('Y-m-d');
                        $tong = tongdonhang();
                        $idbill = add_bill($id_user, $ngaydathang, $email, $address, $phone, $hoten, $pay, $tong);
                        foreach ($_SESSION['mycart'] as $cart) {
                            insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[6], $cart[5], $cart[3], $cart[4], $cart[7], $idbill);
                            if ($cart[5] != 0 && $cart[6] != 0) {
                                update_soluong($cart[4], $cart[5], $cart[0], $cart[6]);
                            }
                            // xóa $_SESSION['cart']
                            $_SESSION['mycart'] = [];
                        }
                        echo 'thanh toan thanh cong';
                        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); 
                        date_default_timezone_set('Asia/Ho_Chi_Minh');

                        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                        $vnp_Returnurl = "http://localhost/php1/duan1t/index.php?act=billcomfirm";
                        $vnp_TmnCode = "WG6RCT6R"; //Mã website tại VNPAY 
                        $vnp_HashSecret = "EMNBSNLHGWLGFOQXDXZZQGNONOSETZZF"; //Chuỗi bí mật
                        $startTime = date("YmdHis");
                        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
                        $vnp_TxnRef = time() . ''; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                        $vnp_OrderInfo = 'hahah';
                        $vnp_OrderType = 'noi dung thanh toan';
                        $vnp_Amount = $tong * 100;
                        $vnp_Locale = 'vn';
                        $vnp_BankCode = 'NCB';
                        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                        $vnp_ExpireDate = $expire;

                        $inputData = array(
                            "vnp_Version" => "2.1.0",
                            "vnp_TmnCode" => $vnp_TmnCode,
                            "vnp_Amount" => $vnp_Amount,
                            "vnp_Command" => "pay",
                            "vnp_CreateDate" => date('YmdHis'),
                            "vnp_CurrCode" => "VND",
                            "vnp_IpAddr" => $vnp_IpAddr,
                            "vnp_Locale" => $vnp_Locale,
                            "vnp_OrderInfo" => $vnp_OrderInfo,
                            "vnp_OrderType" => $vnp_OrderType,
                            "vnp_ReturnUrl" => $vnp_Returnurl,
                            "vnp_TxnRef" => $vnp_TxnRef,
                            "vnp_ExpireDate" => $vnp_ExpireDate,
                        );

                        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                            $inputData['vnp_BankCode'] = $vnp_BankCode;
                        }
                        //     // if (isset($vnp_Bill1_State) && $vnp_Bill1_State != "") {
                        //     //     $inputData['vnp_Bill1_State'] = $vnp_Bill1_State;
                        //     // }

                        // var_dump($inputData);
                        ksort($inputData);
                        $query = "";
                        $i = 0;
                        $hashdata = "";
                        foreach ($inputData as $key => $value) {
                            if ($i == 1) {
                                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                            } else {
                                $hashdata .= urlencode($key) . "=" . urlencode($value);
                                $i = 1;
                            }
                            $query .= urlencode($key) . "=" . urlencode($value) . '&';
                        }

                        $vnp_Url = $vnp_Url . "?" . $query;
                        if (isset($vnp_HashSecret)) {
                            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                        }
                        $returnData = array(
                            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                        );
                        if (isset($_POST['thanhtoan'])) {
                            header('Location: ' . $vnp_Url);
                            die();
                        } else {
                            echo json_encode($returnData);
                        }
                    } else {
                        $error = "Vui lòng chọn phương thức thanh toán";
                    }
                }
            }


            $bill = loadone_bill($idbill);
            include "view/billcomfirm.php";
            break;
        case 'lichsu':
            $idd = $_SESSION["user"]["id"];
            $list = loadHoaDonUser($idd);
            include "view/lichsu.php";
            break;
        case 'mybill':
            $dsb = count_bill($_SESSION['user']['id']);
            // $sotrang = ceil($dsb / $soluongbill);
            $listbill = loadall_bill($_SESSION['user']['id']);
            // echo 'Đây là giỏ hàng cảu bạn!!!!!!';
            include "view/mybill.php";
            break;
        case 'chitietbill':
            if (isset($_GET['idb']) && $_GET['idb'] > 0) {
                $bill = loadone_bill($_GET['idb']);
                $ctdh = loadall_cart($_GET['idb']);
            }
            include "view/chitietbill.php";
            break;
        case 'updateb':
            if (isset($_GET['idb']) && $_GET['idb'] > 0) {
                updatebill($_GET['idb']);
                header("location: index.php?act=mybill");
            }
            break;


        case 'thoat':
            session_unset();
            header("Location: index.php");
            break;
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
ob_end_flush();
