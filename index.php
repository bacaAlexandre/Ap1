<?php

include "./includes/header.php";


//$page = (isset($_GET["page"])&& $_GET != "")?  $page = $_GET['page']: $page = "home";
$page = $_GET['page'] ?? "";

$page = "./includes/" . $page . ".inc.php";

$files = glob("./includes/*.inc.php");

if(in_array($page, $files))
    include $page;
else
    include "./includes/home.inc.php";




include "./includes/footer.php";