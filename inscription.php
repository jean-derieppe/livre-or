<?php
session_start();
require_once("header.php");
require_once("Connect.php");

if (isset($_POST["submit"])){  
    
    if (isset($_POST['login']) && isset($_POST['password'])){
    $login=$_POST["login"];
    $pass=$_POST["password"];
    $repass=$_POST["repass"];
    $erreur='';
        
        // si egalité des $pass alors vérifier si le $login existent
        if ( $pass == $repass ){
            $req = "SELECT count(*) FROM utilisateurs where login = '".$login."'";
            $exec_requete = $conn -> query($req);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];

            //s'il n'existe pas alors
            if ($count == 0){
                // créer la requête pour insérer dans utilisateurs, les valeurs login , prénom , nom et password)
                $req = "INSERT INTO `utilisateurs`(`login`, `password`) VALUES ('$login', '$pass')";
                // envoyer la requête
                $create = $conn->query($req);
                // Redirection vers la page connexion.php
                header ('Location: connexion.php');
            }
            else{
                $erreur = "<h1>Login déja existant<h1>";
            }
        }
        else{
            $erreur = "<h1>Mots de passe non similaire.<h1>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <title>Inscription Livre d'or</title>
</head>

<body>
    <div>
        <h1>Veuillez-vous inscrire à ce livre d'or</h1>
        
        <p>Participez à la vie de ce livre d'or et faite participer vos ami(e)s.</p>

        <form id="Formulaire" action="" method="post">
                <strong><label>Entrez votre Login</label></strong><br>
                <input type="text" class="box-input" name="login" placeholder="Login" required /><br>
                <strong><label>Entrez votre Mots de passe</label></strong><br>
                <input type="password" class="box-input" name="password" placeholder="Password" required /><br>
                <strong><label>Confirmez votre Mots de passe</label></strong><br>
                <input type="password" name="repass" placeholder="Confirm password" required /><br>
                <input type="submit" name="submit" value="S'inscrire" class="box-button"/>
                <hr>
                <p>Déjà inscrit? <a id="locate" href="connexion.php">Connectez-vous ici</a></p>
                <hr class="hr1">
                <?php
                    // si la variable $erreur existe alors echo
                    if(isset($erreur)){
                        echo "$erreur";
                    }
                ?>
        </form>

    </div>
</body>

</html>

<?php
mysqli_close($conn); 
?>