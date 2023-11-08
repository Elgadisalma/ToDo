<?php
$serveur = "localhost";
$utilisateur_db = "root";
$mot_de_passe_db = "";
$base_de_donnees = "todo list";

$connexion = mysqli_connect($serveur, $utilisateur_db, $mot_de_passe_db, $base_de_donnees);
?>


define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD',"");
define('DB_NAME','todo list');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link == false){
    mysqli_connect_error();
    die("Error: could not connect");
}
