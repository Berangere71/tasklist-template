<?php
require_once "bdd-crud.php"; // inclure le fichier de fonction CRUD
session_start(); //démarrer la session
$bdd=connect();

// TODO Redirection vers la page login.php si l'utilisateur n'est pas connecté
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// TODO Afficher la liste des tâches de l'utilisateur connecté
// Récupérer les tâches de l'utilisateur connecté
$title = getAllTasks($user_id);

// Récupérer l'identifiant de l'utilisateur connecté
$user_id = $_SESSION["user_id"];
$db = connect(); // Fonction de connexion à la base de données


// Gestion de l'ajout d'une nouvelle tâche
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    if (!empty($title) && !empty($description)) {
        // Insertion dans la base de données
        addTask($user_id, $title, $description); // Appeler la fonction d'ajout
        header("Location: index.php"); // Redirection
        exit();
     
        header("Location: index.php");
        exit();
    }
}
 header("Location: add-task.php"); 
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste tâches</title>
</head>
<body>
    <header>
        <a href="login.php">se connecter</a>
        <a href="logout.php">se déconnecter</a>
        <a href="inscription.php">Créer un compte</a>

        
    </header>
    <h1>Liste des tâches</h1>
    <div class="tasks"> 

    <?php foreach ($taches as $tâche): ?>
                <li>
                    <strong><?php echo htmlspecialchars($tâche['Tâche']); ?></strong>: 
                    <?php echo htmlspecialchars($tâche['Description']); ?>
                </li>
            <?php endforeach; ?>
    </div>
        <!-- TODO Afficher la liste des tâches de l'utilisateur connecté -->
         
 
    <h2>Ajouter une nouvelle tâche</h2>

    
</body>
</html>
