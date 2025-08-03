<?php
require_once "bdd-crud.php";
session_start(); //démarrer la session
// $bdd=connect();


// Connexion à la base de données


if (!isset($_SESSION["user_id"])) {  
    header("Location: login.php");
    exit();
}

$isSuccess = false;

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $validation = $_POST["validation"];
    
    if (!empty($title) && !empty($description) && !empty($validation)) {
        $result = addTask($_SESSION["user_id"], $title, $description, $validation);
        if ($result) {
            $isSuccess = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une tâche</title>
</head>
<body>
    <!-- TODO Formulaire pour ajouter une tâche -->
     <h1> Ajouter des tâches </h1>

<form action="" method="post">
       <input type="text" name="title" placeholder="Titre de la tâche" required>
     <input type="text" name="description" placeholder="Description de la tâche" required>
      <select name="validation" required>
            <option value="">Choisir validation</option>
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select>
        <button type="submit">Ajouter la tâche</button>
    </form>

<?php if($isSuccess):?>
    <p>Nouvelle tâche ajoutée avec succès</p>
    <a href="index.php">Voir toutes les tâches</a>
    <?php endif;?>
     <a href="index.php"> Retour à la liste</a>
    
</body>
</html>