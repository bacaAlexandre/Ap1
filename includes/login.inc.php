<?php


include "./includes/frmLogin.php";

if(isset($_POST['mail']) && $_POST['mail'] != "" && isset($_POST['password']) && $_POST['password']){
    Login::checkLogin($_POST['mail'], $_POST['password']);

}
