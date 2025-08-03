<?php
require_once "bdd-crud.php"; // inclure le fichier de fonction CRUD
session_start(); //démarrer la session


$user_id = $_SESSION ["user_id"];

// TODO Redirection vers la page login.php si l'utilisateur n'est pas connecté
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$Task = getAllTasks($user_id);
 
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des tâches</title>
</head>
<body>
    <header>
        
        <a href="logout.php">se déconnecter</a>
        <a href="add-task.php">Ajouter une tâche</a>
    </header>

    <h1>Mes tâches</h1>
<!--     
!-- TODO Afficher la liste des tâches de l'utilisateur connecté --> 
<?php if (!empty($tasks)): ?>
        <?php foreach ($tasks as $task): ?>
            <div class="task">
                <h3><?= htmlspecialchars($task["title"]) ?></h3>
                <p><?= htmlspecialchars($task["description"]) ?></p>
                <p>Validation: <?= htmlspecialchars($task["validation"]) ?></p>
                <a href="deletetask.php?id=<?= $task['id'] ?>">Supprimer</a>
                <a href="show-task.php?id=<?= $task['id'] ?>">Voir détails</a>
                <a href="validate-task.php?id=<?= $task['id'] ?>">Valider</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucune tâche trouvée.</p>
    <?php endif; ?>
</body>
</html>
