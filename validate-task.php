<?php
require_once "bdd-crud.php";
session_start();
// BONUS Valider une tache dans la BDD et redirection vers la page d'accueil

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $database = connect();
    $stmt = $database->prepare("UPDATE Task SET validation = 'oui' WHERE id = ? AND user_id = ?");
    $stmt->execute([$_GET['id'], $_SESSION["user_id"]]);
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>validate Task</title>
</head>
<body>
    <p>Validation en cours...</p>
</body>
</html>