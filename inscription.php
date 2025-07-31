

<?php
require_once "bdd-crud.php";

$bdd = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
session_start();


if (isset($_SESSION["user"])) {

    header("location: index.php");
    exit();

}    

$issuccess= false;

if (
    isset($_POST["email"]) &&
    isset($_POST["password"])
) {
    // Hashage du mot de passe avant de l'enregistrer
    $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
    $request = $bdd->prepare("INSERT INTO User (email, password) VALUES (?, ?)");
    $isSuccess = $request->execute([
        $_POST["email"],
        $hashedPassword
    ]);

    if ($isSuccess) {
        $issuccess = true;
        // Redirection ou affichage d'un message de succès
        header("location: index.php"); 
        echo "Bravo tu as réussi à t'inscrire"; // Redirection vers une page de succès (à créer)
        exit();
    } else {
        // Gérer l'erreur si l'insertion échoue
        echo "Erreur lors de l'inscription.";
    }
}

// Récupérer les utilisateurs pour l'affichage
$users = $bdd->query("SELECT email, password FROM User")->fetchAll(PDO::FETCH_ASSOC);
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

</div>

<form action="" method="post">
    <input type="email" name="email" placeholder="Entrez votre email" required>
    <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
    <button type="submit">S'inscrire</button>
</form>

</body>
</html>
