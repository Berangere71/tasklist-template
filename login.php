<?php
session_start ();

if (isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

$error = null;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $database = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
        $request = $database->prepare("SELECT * FROM User WHERE email = ?");
        $request->execute([$_POST["email"]]);
        $user = $request->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($_POST["password"], $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            header("Location: index.php");
            exit();
        } else {
            $error = "Email ou mot de passe incorrect.";
        }
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

<?php if ($error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>


<form action= "" method="post">
    <input type="email" name="email" placeholder="Entrez votre email" required>
    <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
    <button type="submit">Se connecter</button>
</form>



</body>
</html>
