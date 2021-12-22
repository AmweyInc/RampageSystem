<?php
require_once(dirname(__FILE__).'/../../session.php');
require_once(dirname(__FILE__).'/../../header.php');
if($_SESSION['role_id'] == 4 && $_SERVER['REQUEST_METHOD'] === 'GET'){
    $nick = $_GET['nick'];
    $email = $_GET['email'];
    $id = $_GET['id'];
}
?>
<? if($_SESSION['role_id'] == 4 && $_SERVER['REQUEST_METHOD'] === 'GET'): ?>
    Nickname:
    <p><?=$nick?></p>
    Email:
    <p><?=$email?></p>
    <li><a href="http://obd/team/ViewApplication/Accept.php?id=<?=$id?>">Accept</a></li>
    <li><a href="http://obd/team/ViewApplication/Reject.php?id=<?=$id?>">Reject</a></li>
    <? endif; ?>