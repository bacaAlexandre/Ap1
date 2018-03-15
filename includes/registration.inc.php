<h1>Titre registration</h1>

<?php


if(isset($_POST['frmRegistration'])){
    $name = $_POST['name'] ?? "";
    $firstName =  $_POST['firstname'] ?? "";
    $mail =  $_POST['mail'] ?? "";
    $password =  $_POST['password'] ?? "";

    $errors = array();

    if($name == "" || preg_match("`^([a-z]+)$`",$name) == 0) array_push($errors, "Veuillez saisir un nom");
    if($firstName == "" || preg_match("`^([a-z]+)$`",$firstName) == 0) array_push($errors, "Veuillez saisir un prénom");
    if($mail == "" || !filter_var($mail,FILTER_VALIDATE_EMAIL)) array_push($errors, "Veuillez saisir un mail");
    if($password == "") array_push($errors, "Veuillez saisir un password");



    if(count($errors) > 0){
        $message = "<ul>";
        for($i = 0; $i < count($errors); $i++){
            $message .= "<li>";
            $message .= $errors[$i];
            $message .= "</li>";
        }

        $message .= "</ul>";
        echo $message;

        $array = array(
            "usenom" => array( "value" => $_POST['name'], "name" => "name", "type" => "text", "nomChamp" => "Nom"),
            "useprenom" => array( "value" => $_POST['firstname'], "name" => "firstname", "type" => "text", "nomChamp" => "Prénom"),
            "usemail" => array( "value" => $_POST['mail'], "name" => "mail", "type" => "text", "nomChamp" => "E-mail"),
            "usepassword" => array( "value" => "", "name" => "password", "type" => "text", "nomChamp" => "Mot de passe"),
            "submit" => array( "value" => "Envoyer", "name" => "frmRegistration", "type" => "submit", "nomChamp" => ""),
        );
        $form = array(
            "action" => "#",
            "methode" => "post",
        );
        Formulaire::formulaireCreated($array, $form);
    }else{
        $rec = new Queries();
        $password = sha1($password);
        $token = uniqid(sha1(date('Y-m-d|H:m:s')),false);

        $sql = "INSERT INTO t_users
                (usenom, useprenom, usemail, usepassword,usetoken, id_groupes)
                VALUES ('$name','$firstName','$mail', '$password','$token', 3)";

        $rec->insert($sql);

        $message  = "<h1>Wunderbar !!</h1>";
        $message .= "<p>Vous êtes inscrit !!!!</p>";
        $message .= "<p>Merci de cliquer sur le lien </p>";
        $message .= "<a href='http://localhost:81/cour_php/Ap1/index.php?";
        $message .= "page=validationInscription&amp;token=";
        $message .= $token;
        $message .= "&id=";
        $message .= $rec->lastId();
        $message .= "' target='_blank'>Lien</a>";

        mail($mail, 'Confirmation', $message);

        echo "<p>Ich bin dans la base</p>";

    }
}else{
    $array = array(
        "usenom" => array( "value" => "", "name" => "name", "type" => "text", "nomChamp" => "Nom"),
        "useprenom" => array( "value" => "", "name" => "firstname", "type" => "text", "nomChamp" => "Prénom"),
        "usemail" => array( "value" => "", "name" => "mail", "type" => "text", "nomChamp" => "E-mail"),
        "usepassword" => array( "value" => "", "name" => "password", "type" => "text", "nomChamp" => "Mot de passe"),
        "submit" => array( "value" => "Envoyer", "name" => "frmRegistration", "type" => "submit", "nomChamp" => ""),
    );
    $form = array(
        "action" => "#",
        "methode" => "post",
    );
    Formulaire::formulaireCreated($array, $form);
}
