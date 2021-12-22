<?php
require_once(dirname(__FILE__).'/../../session.php');
require_once(dirname(__FILE__).'/../../connect_to_bd.php');
require_once(dirname(__FILE__).'/../../query_bd.php');
require_once(dirname(__FILE__).'/../../header.php');
if($_SESSION['role_id'] == 4 && $_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = $_GET['id'];
    $sql = "DELETE FROM `applications` WHERE applications.userID = $id";
    insertInfo($link,$sql);
    $idCAP = $_SESSION['user_id'];
    $sql = "SELECT `teamID` FROM `storeplayers` WHERE storeplayers.userID = $idCAP";
    $data = getInfo($link,$sql);
    $teamID = $data[0]['teamID'];
    $sql = "INSERT INTO `storeplayers` (`teamID`, `userID`) VALUES ('$teamID','$id')";
    insertInfo($link,$sql);
    $sql = "UPDATE `user` SET `role_id` = '3' WHERE `user`.`user_id` = '$id'";
    insertInfo($link,$sql);
}
?>
<a>User was successfully added to the team</a>