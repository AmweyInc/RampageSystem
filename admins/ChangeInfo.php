<?
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../header.php');
$error = '';
$sql = "SELECT `championship_info`,`reward_to_winners` FROM `championship`";
$info = getInfo($link,$sql);
if($_SESSION != []){
    if($_SESSION['role_id'] == 1){
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if($_POST['info'] == '' || $_POST['prize'] == '')
                $error = 'Не все поля заполнены';
            $inf = $_POST['info'];
            $priz = $_POST['prize'];
            $sql = "UPDATE `championship` SET `championship_info` = '$inf', `reward_to_winners` = $priz WHERE `championship`.`id` = '1'";
        }
    }
}
?>
<? if($_SESSION['role_id'] == 1): ?>
    <div class="ChangeInfo">
    <form method="post">
    Tournament information:<br>
	<input type="text" name="info" value=<?=$info[0]['championship_info']?>><br>
	Prize to the winner:<br>
	<input type="text" name="prize" value=<?=$info[0]['reward_to_winners']?>><br>
	<button>Send</button>
	<? if($error === '' && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <? insertInfo($link,$sql); ?>
        <p>Информация изменена!</p>
        <? else: ?>
            <p><?= $error ?></p>
            <? endif; ?>
    </form>
    </div>
    <?endif;?>