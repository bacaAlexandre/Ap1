<?php


//include "./includes/frmLogin.php";

$array = array(
    "usemail" => array( "value" => "", "name" => "mail", "type" => "text", "nomChamp" => "E-mail"),
    "usepassword" => array( "value" => "", "name" => "password", "type" => "text", "nomChamp" => "Mot de passe"),
    "submit" => array( "value" => "Envoyer", "name" => "", "type" => "submit", "nomChamp" => ""),
);
$form = array(
    "action" => "#",
    "methode" => "post",
);
Formulaire::formulaireCreated($array, $form);



if(isset($_POST['mail']) && $_POST['mail'] != "" && isset($_POST['password']) && $_POST['password']){
    if(Login::checkLogin($_POST['mail'], $_POST['password'])){
        Redirection::redirect('index.php?page=home');
    }else{
        echo "Erreur";
    }

}

