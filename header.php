<?php
// if user $_session: en ligne echo { 
?>
    <header>
        <h1>Livre d'or</h1>
        <nav class="header">
            <ul class="list1">
                <a class="head" href="index.php">
                Accueil</a>

                <a class="head" href="inscription.php">
                Inscription</a>

                <a class="head" href="connexion.php">
                Connexion</a>

                <a class="head" href="commentaire.php">                      <!-- à afficher uniquement si l'user est connecté -->
                Commentaires</a>
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
