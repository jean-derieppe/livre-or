<?php
   session_start();
   require_once("header.php");
   require_once("Connect.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="style.css" media="screen" type="text/css"/>
   <title>Connexion</title>
</head>

<body>

   <div>
      <h1>Connexion</h1>

      <form id="formulaire" action="" method="post">
            <label><b>Login</b></label><br>
            <input type="text" placeholder="Enter your login" name="login" required><br>
            <label><b>Mot de passe</b></label><br>
            <input type="password" placeholder="Enter your password" name="password" required><br>
            <input type="submit" name='submit' value='submit'>
            <hr>
            <p>Pas de compte ? <a id="locate" href="inscription.php">Inscrivez-vous ici</a></p>
            <hr class="hr1">
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
                  // var_dump($reponse);
                  // print_r($reponse);

                  // //Probléme avec ce block
                  // if (password_verify($password, $password_hash)) { //si mot de passe correct
                  //    // stockage des infos de l'utilisateur dans des variables session
                  //    $requete = "SELECT * FROM utilisateurs WHERE login = '$login' AND password = '$pass' ";
                  //    $exec_requete = $conn -> query($requete);
                  //    $reponse      = mysqli_fetch_array($exec_requete);
                  //    $_SESSION['login'] = $login;
                  //    $_SESSION['password'] = $reponse['password'];
                  //    echo "<h1>Bravo vous êtes connecté validé</h1>";
                  // }else{
                  //    echo "<h1>Tu est sur la Bonne voie </h1>";
                  // }
               
               }else{
                  echo "<h1>Login ou ( password ) incorrect</h1>";
               }
            
            } else{
               echo "<h1>( Login ) ou password incorrect</h1>";
            }
         
         }

mysqli_close($conn);
// ça ou session destroy ?
