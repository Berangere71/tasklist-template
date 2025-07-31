<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
session_start ();

if (isset($_SESSION["user_id"]) == true) {

    header ("location: index.php");
    exit();
}
// Vérifiez si le formulaire a été soumis
if (isset($_POST["email"]) && isset($_POST["password"])) {
    // Préparez la requête d'insertion
    $request = $bdd->prepare("SELECT * FROM User WHERE email=?");
    
    // Exécutez la requête avec les valeurs du formulaire
    $request->execute([$_POST["email"]]);
    
    // Affichez le résultat de l'exécution
    $user = $request->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($_POST["password"], $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        header("location: index.php");
        exit();
    }
    else {
        echo"identifiants incorrects";
    }
    
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
     <a href="logout.php">se déconnecter</a>
<a href="inscription.php">Créer un compte</a>

<h1>Se connecter</h1>


<form action="User" method="post">
    <input type="email" name="email" placeholder="Entrez votre email" required>
    <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
    <button type="submit">Se connecter</button>
</form>

</body>
</html>
