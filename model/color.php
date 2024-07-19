<?php
function insert_color($name_color)
{
    $sql = "INSERT INTO `color`( `name`) VALUES ('$name_color')";
    pdo_query($sql);
}

function load_all_color()
{
    $sql = "SELECT `id`, `name` FROM `color` WHERE 1";
    $listColor = pdo_query($sql);
    return $listColor;
}

function load_one_color($id)
{
    $sql = "SELECT * FROM `color` WHERE id = '$id'";
    $onecolor =  pdo_query_one($sql);
    return $onecolor;
}

function update_color($name_color)
{
    $sql = "UPDATE `color` SET `name`='{$name_color}' WHERE 1";
    pdo_execute($sql);
}
function delete_color($id)
{
    $sql = "DELETE FROM `color` WHERE `color`.`id` = '$id';";
    pdo_execute($sql);
}
