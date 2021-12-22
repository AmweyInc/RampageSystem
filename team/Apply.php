<?php
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../header.php');
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = $_GET['team_id'];
    $usrID = $_SESSION['user_id'];
    $sql = "INSERT INTO `applications`( `teamID`, `userID`) VALUES ('$id','$usrID')";
    insertInfo($link,$sql);
}
?>
<? if($_SERVER['REQUEST_METHOD'] === 'GET'): ?>
    <p>Application submitted!</p><br>
<? endif; ?>