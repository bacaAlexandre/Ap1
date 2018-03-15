<?php

$array = array(
    "arttitre" => array( "value" => "", "name" => "arttitre", "type" => "text", "nomChamp" => "Titre"),
    "artchapo" => array( "value" => "", "name" => "artchapo", "type" => "text", "nomChamp" => "Chapo"),
    "artcontenu" => array( "value" => "", "name" => "artcontenu", "type" => "textarea", "nomChamp" => "Contenu"),
    "submit" => array( "value" => "Envoyer", "name" => "frmArticle", "type" => "submit", "nomChamp" => ""),
);
$form = array(
    "action" => "#",
    "methode" => "post",
);

Formulaire::formulaireCreated($array, $form);


$titre = $_POST['arttitre'] ?? "";
$chapo =  $_POST['artchapo'] ?? "";
$contenu =  $_POST['artcontenu'] ?? "";

$errors = array();
if($titre == "" ) array_push($errors, "Veuillez saisir un titre");
if($chapo == "" ) array_push($errors, "Veuillez saisir un chapo");
if($contenu == "" ) array_push($errors, "Veuillez saisir un contenu");


if(count($errors) > 0){
    $message = "<ul>";
    for($i = 0; $i < count($errors); $i++){
        $message .= "<li>";
        $message .= $errors[$i];
        $message .= "</li>";
    }

    $message .= "</ul>";
    echo $message;
}else{
    $rec = new Queries();

    $sql = "INSERT INTO t_articles
        (arttitre, artchapo, artcontenu)
        VALUES ('".$_POST['arttitre']."','".$_POST['artchapo']."','".$_POST['artcontenu']."')";

    $rec->insert($sql);
    echo "<p>Article ajouté </p>";
}
