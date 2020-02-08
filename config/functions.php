<?php
function formatname ($string){
        $string=str_replace(" ","_",$string);//suppression des espaces dans le fichier
        $string=str_replace("'","",$string);//suppression des tirets dans le fichier
        $string=str_replace("(","",$string);//suppression des parenthese dans le fichier
        $string=str_replace(")","",$string);//suppression des parenthese dans le fichier
        return $string;
}