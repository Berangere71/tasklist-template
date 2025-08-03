<?php
require_once "bdd-crud.php";
session_start();
// BONUS Afficher les détails d'une tâche spécifique en fonction de son ID passé en $_GET


// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$task = null;
if (isset($_GET['id'])) {
    $database = connect();
    $stmt = $database->prepare("SELECT * FROM Task WHERE id = ? AND user_id = ?");
    $stmt->execute([$_GET['id'], $_SESSION["user_id"]]);
    $task = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShowTask</title>
</head>
<body>
   <h1>Détails de la tâche</h1>
    
    <?php if ($task): ?>
        <h2><?= htmlspecialchars($task["title"]) ?></h2>
        <p><strong>Description:</strong> <?= htmlspecialchars($task["description"]) ?></p>
        <p><strong>Validation:</strong> <?= htmlspecialchars($task["validation"]) ?></p>
        <a href="index.php">Retour à la liste</a>
        <a href="deletetask.php?id=<?= $task['id'] ?>">Supprimer</a>
    <?php else: ?>
        <p>Tâche non trouvée.</p>
        <a href="index.php">Retour à la liste</a>
    <?php endif; ?>
</body>
</html> 
