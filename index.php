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
    <title>Livre d'or</title>
</head>

<body>
    <h1>Livre d'or</h1>

    <p>
        Nous sommes le :<h1><?php echo date('d/m/Y') ?></h1>
    </p>

    <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi nulla atque sint expedita nemo,<br>
        in quisquam quidem labore fugit assumenda a? Quasi iste doloremque ea unde minus reprehenderit sunt culpa.
    </p>


</body>

</html>