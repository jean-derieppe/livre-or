<?php
   session_start();
   include("header.php");
   require_once("Connect.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Livre d'or</title>
</head>
<body>
    <h1></h1>

</body>
</html>

Sur cette page on voit l’ensemble des commentaires, organisés du plus récent
au plus ancien. Chaque commentaire doit être composé d’un texte “posté le
`jour/mois/année` par `utilisateur`” suivi du commentaire. Si l’utilisateur est
connecté, sur cette page figure également un lien vers la page d’ajout de
commentaire.