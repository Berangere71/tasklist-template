<?php

require_once "bdd-crud.php";



if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

$tasks = getAllTasks($user_id);
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
    <a href="logout.php">Se déconnecter</a>
    <a href="add-task.php">Ajouter une tâche</a>
</header>

<h1>Mes tâches</h1>

<?php if (!empty($tasks)): ?>

    <?php foreach ($tasks as $task): ?>

        <div class="task">

            <h3><?= htmlspecialchars($task["title"]) ?></h3>

            <p><?= htmlspecialchars($task["description"]) ?></p>

            <p>
                Validation :
                <?= htmlspecialchars($task["validation"]) ?>
            </p>

            <a href="delete-task.php?id=<?= $task['id'] ?>">
                Supprimer
            </a>

            <a href="show-task.php?id=<?= $task['id'] ?>">
                Voir détails
            </a>

            <a href="validate-task.php?id=<?= $task['id'] ?>">
                Valider
            </a>

        </div>

    <?php endforeach; ?>

<?php else: ?>

    <p>Aucune tâche trouvée.</p>

<?php endif; ?>

</body>
</html>