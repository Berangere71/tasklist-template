

<?php
require_once "bdd-crud.php";
session_start();

$database = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");



$isSuccess = false;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $database = connect();
        
        // Vérifier si l'email existe déjà
        $checkEmail = $database->prepare("SELECT id FROM User WHERE email = ?");
        $checkEmail->execute([$_POST["email"]]);
        
        if ($checkEmail->fetch()) {
            $error = "Cet email est déjà utilisé.";
        } else {
            // Hashage du mot de passe
            $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
            
            $request = $database->prepare("INSERT INTO User (email, password) VALUES (?, ?)");
            $isSuccess = $request->execute([$_POST["email"], $hashedPassword]);
            
            if ($isSuccess) {
                header("Location: login.php");
                exit();
            } else {
                $error = "Erreur lors de l'inscription.";
            }
        }
    }
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

<?php if ($error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>


<form action= "" method="post">
    <input type="email" name="email" placeholder="Entrez votre email" required>
    <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
    <button type="submit">S'inscrire</button>
</form>

<a href="login.php">Se connecter</a>


</body>
</html>
