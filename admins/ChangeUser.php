<?
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../header.php');
require_once('SelectUser.php');
$error = '';
$nickname = '';
$user;
if($_SESSION['role_id'] == 1){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nickname = $_POST['nickname'];
        $sql = "SELECT * FROM `user`";
        $data = getInfo($link,$sql);
        foreach($data as $value){
            if($value['nickname'] == $nickname){
                $user = $value;
                break;
            }
        }
        if(!isset($user))
            $error = 'User is not found';
    }
}

?>
<? if($_SESSION['role_id'] == 1): ?>
    <div class="ChangeUser">
    <form method="post">
    nickname:<br>
	<input type="text" name="nickname" value=<?=$nickname?>><br>
	<button>Send</button>
	<? if($error === '' && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>nickname : <?=$user['nickname']?></p>
        <p>password : <?=$user['passwd']?></p>
        <p>email : <?=$user['email']?></p>
        <p>Your actions?</p>
        <?selectUser($user['user_id'],$user['nickname'],$user['passwd'],$user['email'],$user['role_id']);?>
        <a href="ActionsWithUsers/Edit.php">Edit</a>
        <a href="ActionsWithUsers/Remove.php">Delete</a>
        <a href="/../index.php">Главная</a>
        <? else: ?>
            <p><?= $error ?></p>
            <? endif; ?>
    </form>
    </div>
    <?endif;?>