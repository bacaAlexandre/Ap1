<h1>Titre validation inscription</h1>

<?php



$rec = new Queries();

$sql = "SELECT id_users 
        FROM t_users
        WHERE id_users =". $_GET['id']." AND usetoken ='".$_GET['token']."' AND usemailvalid = 0";


$reponse = $rec->select($sql)->fetch();




if($reponse != null){
    $sql = "UPDATE t_users SET usemailvalid = 1 WHERE id_users = ".$reponse->id_users;
    $rec->insert($sql);
}else{
    echo "dommage";
}