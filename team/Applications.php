<?php
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../header.php');
if($_SESSION['role_id'] == 4){
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `user` WHERE user.user_id IN (SELECT `userID` FROM `applications` WHERE applications.teamID IN (SELECT `teamID` FROM `storeplayers` WHERE storeplayers.userID = $id))";
    $data = getInfo($link,$sql);
}
?>

<? if($_SESSION['role_id'] == 4): ?>
    <?foreach($data as $value):?>
            <li><a href="http://obd/team/ViewApplication/ShowApplInfo.php?id=<?=$value['user_id']?>&nick=<?=$value['nickname']?>&email=<?=$value['email']?>"><?=$value['nickname'];?></a></li><br>
            <?endforeach;?>
    <? endif; ?>

