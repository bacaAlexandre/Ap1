<?php


class Redirection
{
    public static function redirect($url){
        echo "<script type='text/javascript'>";
        echo "window.location.replace('http://localhost:81/cour_php/AP1/$url');";
        echo "</script>";
    }
}