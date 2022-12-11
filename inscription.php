<?php
   session_start();
   require_once("header.php");
   require_once("Connect.php");
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
            <h1>inscription</h1>
                <label>Enter your Login</label>
                <input type="text" class="box-input" name="login" placeholder="Login" style="width: 200px; height: 50px;" required /><br>
                <label>Enter your password</label>
                <input type="password" class="box-input" name="password" placeholder="Password" style="width: 200px; height: 50px;" required /><br>
                <label>Confirm your password</label>
                <input type="password" name="repass" placeholder="Confirm password" style="width: 200px; height: 50px;" required />
                <input type="submit" name="submit" value="S'inscrire" class="box-button"style="width: 150px; height: 50px;"/>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST["submit"])){
    $login=$_POST["login"];
    $pass=$_POST["password"];
    $repass=$_POST["repass"];
        
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
            echo "<h1>Login déja existant<h1>";
        }
    }
    else{
        echo "<h1>Mots de passe non similaire.<h1>";
    }
}
mysqli_close($conn); 

?>