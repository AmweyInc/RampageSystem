<?php
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../session.php');
if($_SERVER['REQUEST_METHOD'] === 'GET' && $_SESSION['role_id'] == 3){
    $id = $_SESSION['user_id'];
    $sql = "DELETE FROM `storeplayers` WHERE storeplayers.userID = $id";
    insertInfo($link,$sql);
    $sql = "UPDATE `user` SET `role_id` = '2' WHERE `user`.`user_id` = '$id'";
    insertInfo($link,$sql);
    $_SESSION['role_id'] = 2;
    header('Location: http://obd');
}
?>