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
   <title>Connexion</title>
</head>

<body>

   <div>
      <h1>Connexion</h1>

      <form id="Formulaire" action="" method="post">
                <label>Enter your Login</label>
                <input type="text" class="box-input" name="login" placeholder="Login" style="width: 200px; height: 50px;" required /><br>
                <label>Enter your password</label>
                <input type="password" class="box-input" name="password" placeholder="Password" style="width: 200px; height: 50px;" required /><br>
                <input type="submit" name="submit" value="S'inscrire" class="box-button"style="width: 150px; height: 50px;"/>
        </form>

   </div>

</body>
</html>

<?php
         //Requête pour chercher les données en bdd 
         if (isset($_POST["submit"])){
            $login=$_POST["login"];
            $password=$_POST["password"];
         
            if($login && $password !== ""){
               $requete = "SELECT count(*) FROM utilisateurs where login = '".$login."'";
               $exec_requete = $conn -> query($requete);
               $reponse      = mysqli_fetch_array($exec_requete);
               $count = $reponse['count(*)'];

               if($count!=0){ // nom d'utilisateur correct
                  $requete = "SELECT password FROM utilisateurs where password = '".$password."'";
                  $exec_requete = $conn -> query($requete);
                  $reponse      = mysqli_fetch_array($exec_requete);
                  $password_hash = $reponse['password'];
                  echo " <h1> connexion réussie </h1>";

                  //Probléme avec ce block
                  if (password_verify($password, $password_hash)) { //si mot de passe correct
                     // stockage des infos de l'utilisateur dans des variables session
                     $requete = "SELECT login password FROM utilisateurs where login = '".$login."'";
                     $exec_requete = $conn -> query($requete);
                     $reponse      = mysqli_fetch_array($exec_requete);
                     $_SESSION['login'] = $login;
                     $_SESSION['password'] = $reponse['password'];
                     echo "<h1>Bravo vous êtes connecté validé</h1>" $login;
                  }else{
                     echo "<h1>Tu est sur la Bonne voie </h1>";
                  }
               
               }else{
                  echo "<h1>Login ou ( password ) incorrect</h1>";
               }
            
            } else{
               echo "<h1>( Login ) ou password incorrect</h1>";
            }
         
         }

mysqli_close($conn);
// ça ou session destroy ?