<?php
 session_start();
 try
 {
     $bdd = new PDO('mysql:host=localhost;dbname=site_eau;charset=utf8', 'root', '');
 }
 catch(Exception $e)
 {
         die('Erreur : '.$e->getMessage());
 }
$qte=1;
$numcommande=1;
$infoproduit=1;
$insertprd = $bdd->prepare("INSERT INTO possede(numerocommande, numpro, quantite) VALUES(?, ?,?)");
  $insertprd->execute(array($numcommande, $infoproduit, $qte));
?>