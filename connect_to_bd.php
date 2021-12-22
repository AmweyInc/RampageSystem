<?
define('BD_NAME','localhost');
define('TB_NAME','championship');
$link = mysqli_connect(BD_NAME,'root','',TB_NAME);


if(mysqli_connect_errno())
        exit(mysqli_connect_error() . "<br>" . 'GG');
?>