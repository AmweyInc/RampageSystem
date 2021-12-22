<?
require_once(dirname(__FILE__).'/../../session.php');
require_once(dirname(__FILE__).'/../../connect_to_bd.php');
require_once(dirname(__FILE__).'/../../query_bd.php');
require_once(dirname(__FILE__).'/../SelectUser.php');
require_once(dirname(__FILE__).'/../../header.php');
if($_SESSION['role_id'] == 1){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_SESSION['sel_id'];
        if($_SESSION['sel_role_id'] != 1){
            if($_SESSION['sel_role_id'] == 3){
                $sql = "DELETE FROM `storeplayers` WHERE storeplayers.userID = $id";//удаляем игрока из команды
                insertInfo($link,$sql);
            }
            if($_SESSION['sel_role_id'] == 4){
                $sql = "SELECT * FROM `storeplayers` WHERE 1";
                $data = getInfo($link,$sql);
                foreach($data as $value){
                    if($value['userID'] == $id){
                        $teamID = $value['teamID'];
                        break;
                    }
                }
                $sql = "SELECT * FROM `storeplayers`";
                $dataS = getInfo($link,$sql);
                foreach($dataS as $value){// Всем игрокам команды ставим роль пользователя, поскольку удаляем команду!
                    if($value['teamID'] == $teamID){
                        $id = $value['userID'];
                        $sql = "UPDATE `user` SET `role_id` = '2' WHERE `user`.`user_id` = '$id'";
                        insertInfo($link,$sql);
                    }
                }
                $sql = "DELETE FROM `storeplayers` WHERE storeplayers.teamID = $teamID"; //удаляем всех игроков команды(если такие есть)
                insertInfo($link,$sql);
                $sql = "DELETE FROM `storeteams` WHERE storeteams.teamID = $teamID"; //удаляем все матчи команды(если такие есть)
                insertInfo($link,$sql);
                $sql = "DELETE FROM `applications` WHERE applications.teamID = $teamID"; //удаляем все заявки в команду(если такие есть)
                insertInfo($link,$sql);
                $sql = "DELETE FROM `team` WHERE team.team_id = $teamID"; //удаляем команду
                insertInfo($link,$sql);
            }
            if($_SESSION['sel_role_id'] == 2){
                $sql = "DELETE FROM `applications` WHERE applications.userID = $id";//удаляем заявки пользователя в команду
                insertInfo($link,$sql);
            }
            $sql = "DELETE FROM `user` WHERE user.user_id = $id";//удаляем пользователя
            insertInfo($link,$sql);
            header ('Location: ../ChangeUser.php');
        }
    }
}
?>
<? if($_SESSION['role_id'] == 1): ?>
    <div class="Remove">
    <form method="post">
    
	Are you sure you want to delete the user: <?= $_SESSION['sel_nickname'];?><br>
	<button>Yup</button>
    </form>
    </div>
    <?endif;?>