<?php
function insert_size($name_size)
{
    $sql = "INSERT INTO `size`( `name`) VALUES ('$name_size')";
    pdo_query($sql);
}

function load_all_size()
{
    $sql = "SELECT `id`, `name` FROM `size` WHERE 1";
    $listsize = pdo_query($sql);
    return $listsize;
}
function delete_size($id)
{
    $sql = "DELETE FROM `size` WHERE `size`.`id` = '$id';";
    pdo_execute($sql);
}
function update_size($name_size)
{
    $sql = "UPDATE `size` SET `name`='{$name_size}' WHERE 1";
    pdo_execute($sql);
}

function load_one_size($id)
{
    $sql = "SELECT * FROM `size` WHERE id=" . $id;
    $os =  pdo_query_one($sql);
    return $os;
}
