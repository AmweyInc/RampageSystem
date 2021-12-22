<?php
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../header.php');
if($_SESSION['role_id'] == 3 || $_SESSION['role_id'] == 4){
    $usrID = $_SESSION['user_id'];
    $sql = "SELECT * FROM `team` WHERE team.team_id IN (SELECT `teamID` FROM `storeplayers` WHERE storeplayers.userID = $usrID)";
    $data = getInfo($link,$sql);
    $id = $data[0]['team_id'];
    $name = $data[0]['name_team'];
    $info = $data[0]['information'];
}
?>
<? if($_SESSION['role_id'] == 3 || $_SESSION['role_id'] == 4): ?>
    <li><a href="http://obd/team/Team.php?team_id=<?=$id?>&name_team=<?=$name?>&information=<?=$info?>"><?=$name?></a></li><br>
    <? endif; ?>