<?php


class CallPage
{
    public static function display(String $page){

        $page = "./includes/" . $page . ".inc.php";

        $files = glob("./includes/*.inc.php");

        if(in_array($page, $files))
            include $page;
        else
            include "./includes/home.inc.php";
    }
}