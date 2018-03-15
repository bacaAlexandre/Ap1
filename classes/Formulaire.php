<?php


class Formulaire
{
    public static function formulaireCreated($array, $form){
        $reponse = "<form  action=".$form['action']." method=".$form['methode'].">";
        foreach ($array as $data){
            $reponse .= "<div >";
            if($data['type'] == "submit"){
                $reponse .= "<input name='".$data['name']."'type='".$data['type']."' value='".$data['value']."'/>";
            }else{
                $reponse .= "<label for= '".$data['name']."' >";
                $reponse .= $data['nomChamp'];
                $reponse .= "</label>";
                $reponse .= "<input id='".$data['name']."'name='".$data['name']."'type='".$data['type']."' value='".$data['value']."'/>";
            }

            $reponse .= "</div>";
        }

        $reponse .= "</form>";
        echo $reponse ;


    }
}