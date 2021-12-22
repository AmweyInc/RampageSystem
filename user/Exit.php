<?require_once(dirname(__FILE__).'/../session.php');?>

<? if($_SESSION != []): ?>
    <div class="Exit">
        <?$_SESSION = []?>
        <?session_destroy()?>
        <? header('Location: http://obd'); ?>
    </div>
    <?endif;?>