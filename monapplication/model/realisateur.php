<?php
require ("connexion.php"); 

$sql = 'SELECT * FROM films';
$sth = $bdd->prepare($sql);
//$sth->bindValue(':email', $mail, PDO::PARAM_STR);
$sth->execute();
$mailExist = $sth->fetchAll();

if ( count($mailExist)> 0)
{
$callBack = $mailExist;//'<p style="color:red">Votre adresse mail est déjà enregistrée !</p>';


//return;
}
