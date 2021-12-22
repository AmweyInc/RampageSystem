<?php
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../header.php');
if($_SESSION != []){
    $sql = "SELECT * FROM `team`";
    $data = getInfo($link,$sql);
}
?>
<? if($_SESSION != []): ?>
    <html>
        <body>
            <ui>
            <? if($_SESSION['role_id'] == 2): ?>
                <li><a href="http://obd/team/CreateTeam.php">CreateTeam</a></li><br>
                <?endif;?>
                <? foreach($data as $value): ?>
                    <li><a href="http://obd/team/Team.php?team_id=<?=$value['team_id']?>&name_team=<?=$value['name_team']?>&information=<?=$value['information']?>"><?=$value['name_team']?></a></li><br>
                    <? endforeach; ?>
            </ui>
        </body>
    </html>
    <? endif; ?>