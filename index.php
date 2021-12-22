<?
require_once('session.php');
require_once('connect_to_bd.php');
require_once('query_bd.php');
require_once('header.php');
$sql = "SELECT `championship_info`,`reward_to_winners`,`name` FROM `championship`";
$info = getInfo($link,$sql);
?>
<a><?=$info[0]['name']?></a>
<p>Information championship</p>
<p><?= $info[0]['championship_info']?></p>
<p>Prize to the winner: <?=$info[0]['reward_to_winners']?> $</p>
