<?php
require_once('session.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="http://obd/style.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <span>
                <ui>
                <li><a href="http://obd/index.php">home</a></li>
                <? if($_SESSION === []): ?>
                    <li><a href="http://obd/authorization/SingIn.php">Sing In</a></li>
                    <li><a href="http://obd/authorization/SingUp.php">Sing Up</a></li>
                <? else: ?>
                    <li><a href="http://obd/user/Settings.php"><?= $_SESSION['nickname'] ?></a></li>
                    <li><a href="http://obd/team/ShowTeam.php">Team`s</a></li>
                    <li><a href="http://obd/match/MatchInfo.php">Match</a></li>
                    <? if($_SESSION['role_id'] == 1): ?>
                        <li><a href="http://obd/admins/ChangeInfo.php">Change information</a></li>
                        <li><a href="http://obd/admins/ChangeUser.php">Change user`s</a></li>
                    <? endif; ?>
                    <? if($_SESSION['role_id'] == 3 || $_SESSION['role_id'] == 4): ?>
                        <li><a href="http://obd/team/MyTeam.php">My Team</a></li>
                    <? endif; ?>
                <? endif;?>

                </ui>
            </span>
        </header>
    </body>
</html>