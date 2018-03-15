<?php


class Login
{
    public static function checkLogin(String $mail, String $password)
    {
        $rec = new Queries();
        $password = sha1($password);
        if(filter_var($mail,FILTER_VALIDATE_EMAIL)){
            $sql = "SELECT id_users, usenom, useprenom
                FROM t_users
                WHERE usemail ='".$mail."' AND usepassword = '".$password."'";

            $reponse = $rec->select($sql)->fetch();

            if($reponse != null){
                $_SESSION['id'] = $reponse -> id_users;
                $_SESSION['nom'] = $reponse -> usenom;
                $_SESSION['prenom'] = $reponse -> useprenom;
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }



    }
}