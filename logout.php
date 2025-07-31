<?php
// TODO Destruction de la session pour déconnecter l'utilisateur et redirection vers la page de connexion
session_start();
session_destroy();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>

</head>
<body>
   <a href="login.php">Retourner à la page de connexion</a>
</body>
</html>
