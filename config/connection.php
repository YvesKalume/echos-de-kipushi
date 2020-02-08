<?php
    include 'notorm/NotORM.php';
    require_once 'root.php';
    try {
        $db= new PDO ('mysql:host='.HOST.';dbname='.DATABASE.'',''.USER.'',''.PASSWORD.'');
        $database= new NotORM($db);
    } catch (EXception $e) {
        die('Erreur : '.$e->getMessage());
    }