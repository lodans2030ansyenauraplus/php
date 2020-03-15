<?php

/**
 * Verifie si le possede existe, le crée sinon
 * @return booleen
 */
function creationpossede(){
   if (!isset($_SESSION['possede'])){
      $_SESSION['possede']=array();
      $_SESSION['possede']['numpro'] = array();
      $_SESSION['possede']['qteProduit'] = array();
      $_SESSION['possede']['prix'] = array();
      $_SESSION['possede']['verrou'] = false;
   }
   return true;
}


/**
 * Ajoute un article dans le possede
 * @param string $numpro
 * @param int $qteProduit
 * @param float $prix
 * @return void
 */
function ajouterArticle($numpro,$qteProduit,$prix){

   //Si le possede existe
   if (creationpossede() && !isVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($numpro,  $_SESSION['possede']['numpro']);

      if ($positionProduit !== false)
      {
         $_SESSION['possede']['qteProduit'][$positionProduit] += $qteProduit ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['possede']['numpro'],$numpro);
         array_push( $_SESSION['possede']['qteProduit'],$qteProduit);
         array_push( $_SESSION['possede']['prix'],$prix);
         $insertprd = $bdd->prepare("INSERT INTO possede(numpro, quantite, prix) VALUES(?, ?, ?)");
                          $insertprd->execute(array($numpro, $qteProduit, $prix));
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}



/**
 * Modifie la quantité d'un article
 * @param $numpro
 * @param $qteProduit
 * @return void
 */
function modifierQTeArticle($numpro,$qteProduit){
   //Si le possede existe
   if (creationpossede() && !isVerrouille())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qteProduit > 0)
      {
         //Recharche du produit dans le possede
         $positionProduit = array_search($numpro,  $_SESSION['possede']['numpro']);

         if ($positionProduit !== false)
         {
            $_SESSION['possede']['qteProduit'][$positionProduit] = $qteProduit ;
         }
      }
      else
      supprimerArticle($numpro);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

/**
 * Supprime un article du possede
 * @param $numpro
 * @return unknown_type
 */
function supprimerArticle($numpro){
   //Si le possede existe
   if (creationpossede() && !isVerrouille())
   {
      //Nous allons passer par un possede temporaire
      $tmp=array();
      $tmp['numpro'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prix'] = array();
      $tmp['verrou'] = $_SESSION['possede']['verrou'];

      for($i = 0; $i < count($_SESSION['possede']['numpro']); $i++)
      {
         if ($_SESSION['possede']['numpro'][$i] !== $numpro)
         {
            array_push( $tmp['numpro'],$_SESSION['possede']['numpro'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['possede']['qteProduit'][$i]);
            array_push( $tmp['prix'],$_SESSION['possede']['prix'][$i]);
         }

      }
      //On remplace le possede en session par notre possede temporaire à jour
      $_SESSION['possede'] =  $tmp;
      //On efface notre possede temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}


/**
 * Montant total du possede
 * @return int
 */
function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['possede']['numpro']); $i++)
   {
      $total += $_SESSION['possede']['qteProduit'][$i] * $_SESSION['possede']['prix'][$i];
   }
   return $total;
}


/**
 * Fonction de suppression du possede
 * @return void
 */
function supprimepossede(){
   unset($_SESSION['possede']);
}

/**
 * Permet de savoir si le possede est verrouillé
 * @return booleen
 */
function isVerrouille(){
   if (isset($_SESSION['possede']) && $_SESSION['possede']['verrou'])
   return true;
   else
   return false;
}

/**
 * Compte le nombre d'articles différents dans le possede
 * @return int
 */
function compterArticles()
{
   if (isset($_SESSION['possede']))
   return count($_SESSION['possede']['numpro']);
   else
   return 0;

}

?>