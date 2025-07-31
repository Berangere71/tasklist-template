<?php
require_once "bdd-crud.php";

$bdd = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
session_start();

// TODO Redirection vers la page login.php si l'utilisateur n'est pas connecté
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// TODO Afficher la liste des tâches de l'utilisateur connecté


// Récupérer les tâches de l'utilisateur connecté
$user_id = $_SESSION["user_id"];
$db = connect(); // Fonction de connexion à la base de données
$sql = "SELECT * FROM Task WHERE user_id = :user_id";
$stmt = $db->prepare($sql);
$stmt->execute(['user_id' => $user_id]);
$taches = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Gestion de l'ajout d'une nouvelle tâche
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tâche = $_POST['Tâche'];
    $description = $_POST['Description'];
    
    // Insertion dans la base de données
    $insert_sql = "INSERT INTO Task (user_id, Tâche, Description) VALUES (:user_id, :Tâche, :Description)";
    $insert_stmt = $db->prepare($insert_sql);
    $insert_stmt->execute(['user_id' => $user_id, 'Tâche' => $tâche, 'Description' => $description]);

    // Redirection pour éviter la double soumission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
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
    <form method="POST" action="">
        <label for="Tâche">Tâche:</label>
        <input type="text" name="Tâche" id="tâche" required>
        
        <label for="Description">Description:</label>
        <input type="text" name="Description" id="description" required>
        
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
