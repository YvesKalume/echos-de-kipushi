<?php
session_start();
require_once '../vendor/autoload.php';
if (!session_id()) @session_start();
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

if ($_SESSION['status']==200 AND $_SESSION['is_admin']==1) {
    require_once '../config/functions.php';
    require_once '../config/connection.php';
    $id=htmlspecialchars($_GET['id']);
    $event=$database->events[$id];
    if (file_exists('../affiches/'.$event['flayer'])) {
        unlink('../affiches/'.$event['flayer']);
    }
    else {
        $msg->error('le fichier n\'existe pas');
    }
$event->delete();
$msg->warning('evenement <b>'.$event['titre'].'</b> supprimé','allevents.php');
}else {
    die('Vous ne pouvez pas effectué cette action');
}