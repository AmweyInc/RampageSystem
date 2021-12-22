<?
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../header.php');

$sql = "SELECT `nickname` FROM `user`";

$array = getInfo($link,$sql);
$error = '';
$nickname = '';
$passwd = '';
$email = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $usInfo = $_POST;
    $nickname = $usInfo['nickname'];
    $passwd = $usInfo['passwd'];
    $email = $usInfo['email'];
    if($usInfo['nickname'] === '' || $usInfo['passwd'] === '')
        $error = 'Заполни все поля';
    if($array != ''){
        foreach($array as $value)
            if($usInfo['nickname'] === $value['nickname'])
                $error = 'Такой ник уже есть :(';
    }
    if(strlen($usInfo['passwd']) < 6)
        $error = 'Пароль менее 6 символов';
    if($usInfo['passwd'] != $usInfo['passwd2'])
        $error = 'Пароли не совпадают :(';
    $sql = "INSERT INTO `user`( `role_id`, `nickname`, `passwd`,`email`) VALUES ( '2','$nickname','$passwd','$email')";
}
?>
<div class="SingUp">
<form method="post">
	nickname:<br>
	<input type="text" name="nickname" value=<?=$nickname?>><br>
    Enter your email:<br>
    <input type="text" name="email" value=<?=$email?>><br>
	password:<br>
	<input type="text" name="passwd" value=<?=$passwd?>><br>
    Repeat password:<br>
    <input type="text" name="passwd2"><br>
	<button>Send</button>
	<? if($error === '' && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <? insertInfo($link,$sql); ?>
        <p>Вы успешно зарегистрировались!</p>
        <a href="SingIn.php">SingIn</a>
        <? else: ?>
            <p><?= $error ?></p>
            <? endif; ?>
</form>
</div>