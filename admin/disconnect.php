<?php
    session_start();
    session_destroy();
    require_once '../vendor/autoload.php';
    if (!session_id()) @session_start();
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->info('Vous vous êtes deconnecté avec succes','login.php',true);