<?php
$host = "127.0.0.1";
$database = "app-database";
$bdd = new PDO("mysql:host=$host;dbname=$database", "root", "root");


// Vérifiez si le formulaire a été soumis
if (isset($_POST["email"]) && isset($_POST["password"])) {
    // Préparez la requête d'insertion
    $request = $bdd->prepare("INSERT INTO User(email, password) VALUES(?, ?)");
    
    // Exécutez la requête avec les valeurs du formulaire
    $request->execute([$_POST["email"], $_POST["password"]]);
    
    // Affichez le résultat de l'exécution
    $resultat = $request;
    var_dump($resultat);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

<h1>INSCRIPTION</h1>

<div class="User">
    <?php foreach($User as $users): ?>
        <div class="users"> 
            <h2><?= 'email: ' . htmlspecialchars($users['email']); ?></h2>
            <h2><?= 'password: ' . htmlspecialchars($users['password']); ?></h2>
        </div>
    <?php endforeach; ?>
</div>

<form action="User" method="post">
    <input type="email" name="email" placeholder="Entrez votre email" required>
    <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
    <button type="submit">s'inscrire</button>
</form>

</body>
</html>
