<?php
// if user $_session: en ligne echo { 
?>
    <header>
        <h1>Livre d'or</h1>
        <nav class="header">
            <ul class="list1">
                <a href="index.php">
                <li>Accueil</li></a>

                <a href="inscription.php">
                <li >Inscription</li></a>

                <a href="connexion.php">
                <li>Connexion</li></a>

                <a href="commentaire.php">                      <!-- à afficher uniquement si l'user est connecté -->
                <li>Commentaires</li></a>
            </ul>
        </nav>
        <hr>
    </header>

<!--   if User connecté alors afficher Header avec la partie connexion  
   Faire pareil pour le footer ? ou inutile si toutes parties modifiables sont dans le header.   -->

<?php
// }else{

// };
?>
