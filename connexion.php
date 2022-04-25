<?php
session_start();
try
{
$connexion = new PDO('mysql:host=localhost;dbname=jeunes_sans_complex;charset=utf8', 'root', '');
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}
?>

