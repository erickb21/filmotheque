<?php 
define ("db_name","annuaire_films");
define ("server_name","localhost");
define ("user","root");
define ("password","");
try{
$bdd = new PDO('mysql:host=' .constant("server_name").';dbname=' .constant("db_name") .';charset=utf8', constant('user'),constant('password')); 
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){die('erreur connexion :' .$e->getMessage());}