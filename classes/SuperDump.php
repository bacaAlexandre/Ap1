<?php

class SuperDump
{
    public static function dump($data){

        if (is_array($data)){
            echo " <pre>";
            echo   print_r($data);
            echo  "</pre>";

        }else{
            return var_dump($data);
        }
    }
}
