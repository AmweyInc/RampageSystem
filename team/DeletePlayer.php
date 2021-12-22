<?
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../header.php');
if($_SESSION['role_id'] == 4 && $_SERVER['REQUEST_METHOD'] === 'POST'){
    $nick = $_POST['nickname'];
    $sql = "SELECT `user_id` FROM `user` WHERE user.nickname = '$nick'";
    $data = getInfo($link,$sql);
    $t = false;
    if($data!=null){
        $id = $data[0]['user_id'];
        $idCap = $_SESSION['user_id'];
        $sql = "SELECT `userID` FROM `storeplayers` WHERE storeplayers.teamID = (SELECT `teamID` FROM `storeplayers` WHERE storeplayers.userID = $idCap)";
        $data = getInfo($link,$sql);
        foreach($data as $value)
            if($value['userID'] == $id && $value['userID'] != $idCap){
                $sql = "DELETE FROM `storeplayers` WHERE storeplayers.userID = $id";
                insertInfo($link,$sql);
                $sql = "UPDATE `user` SET `role_id` = '2' WHERE `user`.`user_id` = '$id'";
                insertInfo($link,$sql);
                $t = true;
            }
    }
}
?>
<? if($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['role_id'] == 4): ?>
    <?if($t):?>
        <a>Player removed from the team</a>
        <?else:?>
            <a>Player not found</a>
            <?endif;?>
    <? else :?>
        <div class="DeletePlayer">
        <form method="post">
        nickname:<br>
	    <input type="text" name="nickname"><br>
	    <button>Send</button>
        </div>
        </form>
        <? endif; ?>