<?php
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../header.php');
$error = '';
if($_SESSION['role_id'] == 2 && $_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $info = $_POST['info'];
    $sql = "SELECT `name_team` FROM `team`";
    $data = getInfo($link,$sql);
    foreach($data as $value)
        if($value['name_team'] == $name)
            $error = 'team name is taken';
}
?>
<? if($_SESSION['role_id'] == 2): ?>
    <div class="CreateTeam">
    <form method="post">
    team name:<br>
	<input type="text" name="name"><br>
	Information:<br>
	<input type="text" name="info"><br>
	<button>Send</button>
	<? if($error === '' && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <?$sql = "INSERT INTO `team`(`name_team`, `information`) VALUES ('$name','$info')";     //создаем команду?>
        <?insertInfo($link,$sql);?>
        <?$sql = "SELECT `team_id` FROM `team` WHERE team.name_team = '$name'";     //сохраняем id команды?>
        <?$data = getInfo($link,$sql);?>
        <?$team_id = $data[0]['team_id'];?>
        <?=$team_id?>
        <?$_SESSION['role_id']=4;?>
        <?$sql = "UPDATE `user` SET `role_id` = '4' WHERE user.user_id = '$id'";        //обновляем роль пользователя?>
        <?insertInfo($link,$sql);?>
        <?$sql = "DELETE FROM `applications` WHERE applications.userID = $id";?>
        <?insertInfo($link,$sql);?>
        <?$sql = "INSERT INTO `storeplayers`(`teamID`, `userID`) VALUES ('$team_id','$id')";        //сохраняем пользователя в команду?>
        <?insertInfo($link,$sql);?>
        <p>team created!!!</p>
        <? else: ?>
            <p><?= $error ?></p>
            <? endif; ?>
    </form>
    </div>
    <?endif;?>