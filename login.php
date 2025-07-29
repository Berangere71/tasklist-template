<?php
require_once "bdd-crud.php";
// TODO Connection Utilisateur via la session

$host = "127.0.0.1";
$database = "app-database";
$bdd = new PDO("mysql:host=$host;dbname=$database", "root", "root");

// Vérifiez si le formulaire a été soumis
if (isset($_POST["email"]) && isset($_POST["password"])) {
    // Préparez la requête de sélection
    $request = $bdd->prepare("SELECT * FROM User WHERE email = ?");
    
    // Exécutez la requête avec l'email fourni
    $request->execute([$_POST["email"]]);
    $User = $request->fetch(PDO::FETCH_ASSOC);

    // Vérifiez si l'utilisateur existe et si le mot de passe correspond
    if ($User && $_POST["password"] == $User["password"]) {
        // Affichez le résultat de l'exécution
        $resultat = $request;
        var_dump($resultat);
    } else {
        echo "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Connexion</h1>
    <!-- TODO Formulaire de connexion -->
    <a href="inscription.php">Pas de compte ? S'inscrire</a>
</body>
</html>