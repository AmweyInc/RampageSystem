<?
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../header.php');
if($_SESSION != []){
    $sql = "SELECT * FROM `match`";
    $data = getInfo($link,$sql);
    
    $id1 = $data[0]['team1'];
    $id2 = $data[0]['team2'];
    
    $sql = "SELECT `name_team` FROM `team` WHERE team.team_id = $id1 or team.team_id = $id2";
    $team = getInfo($link,$sql);
}
?>
<?if($_SESSION['role_id'] == 1):?>
    <li><a href="http://obd/match/Edit.php">Edit</a></li>
    <?endif;?>
<p>date and time: <?=$data[0]['date_and_time'];?></p>
<a>Map: <?=$data[0]['maps'];?></a>
<img src="<?=$data[0]['urlMap'];?>">
<p>Team: <?=$team[0]['name_team'];?> vs <?=$team[1]['name_team'];?></p>