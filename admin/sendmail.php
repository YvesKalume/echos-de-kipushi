<?php
session_start();
 mail('yveskalumenoble@gmail.com','test','voici un test de mail',$_SESSION['display_name']);