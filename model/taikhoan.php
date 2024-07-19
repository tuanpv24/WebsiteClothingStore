<?php
function insert_taikhoan($user, $pass, $email, $hoten,  $address, $phone)
{
    $sql = "INSERT INTO taikhoan(user, pass, email, hoten, address, phone) values ('$user', '$pass', '$email','$hoten', '$address', '$phone')";
    pdo_execute($sql);
}
function insert_taiKhoan_admin($id, $user, $pass, $email, $hoten,  $address, $phone, $vaitro)
{
    $sql = "INSERT INTO taikhoan(user, pass, email, hoten, address, phone, vaitro) VALUES('$user', '$pass', '$email','$hoten', '$address', '$phone', '$vaitro')";
    pdo_execute($sql);
}
function update_Account_admin($id, $user, $pass, $email, $hoten,  $address, $phone, $vaitro)
{

    $sql = "UPDATE taikhoan SET id='$id', user='$user', pass='$pass', email='$email', hoten= '$hoten', address='$address', phone='$phone', vaitro='$vaitro' WHERE id='$id'";
    pdo_execute($sql);
}
function loadOne_taiKhoan($id)
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM taikhoan WHERE id = $id";
    $tk = pdo_query_one($sql);
    return $tk;
}
function checkuser($user, $pass)
{
    $sql = "SELECT * FROM taikhoan where user='" . $user . "' and pass='" . $pass . "' ";
    $sp = pdo_query_one($sql);
    return $sp;
}
function checkemail($email)
{
    $sql = "SELECT * FROM taikhoan where email='" . $email . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function update_taikhoan($id, $user, $pass, $email, $hoten,  $address, $phone)
{
    $sql = "update taikhoan set user='" . $user . "',pass='" . $pass . "',email='" . $email . "',hoten='" . $hoten . "', address='" . $address . "', phone='" . $phone . "' where id=" . $id;
    pdo_execute($sql);
}


function loadall_taikhoan()
{
    $sql = "SELECT * FROM taikhoan ORDER BY id desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}


function delete_taikhoan($id)
{
    $sql = "DELETE FROM taikhoan WHERE id = $id";
    pdo_execute($sql);
}
