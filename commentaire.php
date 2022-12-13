<?php
   session_start();
   include("header.php");
   require_once("Connect.php");
?>
<!-- Condition particuliére pour autoriser seulement user connecté a voir cette page dans le header ? -->

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
   <title>Commentaires</title>
</head>

<body>
   <div>
      <h1> Bienvenue dans la section commentaires du livre d'or </h1>
      <!-- Ce formulaire ne contient qu’un champ permettant de rentrer son commentaire et
      un bouton de validation. Il n’est accessible qu’aux utilisateurs connectés. Chaque
      utilisateur peut poster plusieurs commentaires ( les modifier ou les supprimer). -->
   </div>
   <div>
         <form id="formulaire" action="" method="post">
            <h2>Votre Commentaire :</h2>
            <textarea id="story" name="story"rows="8" cols="55" placeholder="Enter your Comment..."></textarea><br>
            <input type="submit" name='submit' value='submit'>
            <hr>
            <p>Pas de compte ? <a id="locate" href="inscription.php">Inscrivez-vous ici</a></p>
         </form>
   </div>
<?php 
if(!isset($_session_id) != 0 ) {
   Echo "Veuillez commenter";

}else{
   echo "veuillez vous connecter";
}

?>

</body>
</html>
<!-- Afficher les commentaires du plus récent au plus anciens avec date et id de USER  -->