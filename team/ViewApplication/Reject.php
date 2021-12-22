<?php
require_once(dirname(__FILE__).'/../../session.php');
require_once(dirname(__FILE__).'/../../connect_to_bd.php');
require_once(dirname(__FILE__).'/../../query_bd.php');
require_once(dirname(__FILE__).'/../../header.php');
if($_SESSION['role_id'] == 4 && $_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = $_GET['id'];
    $sql = "DELETE FROM `applications` WHERE applications.userID = $id";
    insertInfo($link,$sql);
}
?>
<? if($_SESSION['role_id'] == 4 && $_SERVER['REQUEST_METHOD'] === 'GET'): ?>
    <a>Request deleted</a>
    <? endif; ?>