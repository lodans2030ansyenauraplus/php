<?php
	session_start();
	require_once('fonctionpannier.php');
	
							$bdd = new PDO('mysql:host=localhost;dbname=site_eau;charset=utf8', 'root', '');
							$numpro = "1";
							$qteProduit = "1";
							$prix = "5";
							$numerocommande = "1";
							$etat = 'actif';
							$insertprd = $bdd->prepare('INSERT INTO possede(numerocommande, numpro, quantite, etat, prix) VALUES(?, ?; ?, ?, ?)');
                            $insertprd->execute(array($numerocommande, $numpro, $qteProduit, $etat, $prix));

?>