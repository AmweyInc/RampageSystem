<?
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../header.php');
function selectUser($id,$nickname,$passwd,$email,$role) : void{
    $_SESSION['sel_id'] = $id;
    $_SESSION['sel_nickname'] = $nickname;
    $_SESSION['sel_passwd'] = $passwd;
    $_SESSION['sel_email'] = $email;
    $_SESSION['sel_role_id'] = $role;
}
function cancelSelection(){
    unset($_SESSION['sel_id']);
    unset($_SESSION['sel_nickname']);
    unset($_SESSION['sel_passwd']);
    unset($_SESSION['sel_email']);
    unset($_SESSION['sel_role_id']);
}
?>