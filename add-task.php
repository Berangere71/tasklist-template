<?php
require_once "bdd-crud.php";

function add_Tâche($email, $tâche, $description, $validation) {
    // Connexion à la base de données
    // Requête SQL pour mettre à jour un aliment
    $sql = "INSERT INTO Tâche (email, tâche, description, validation) VALUES ('$email', '$tâche', '$description', '$validation)"; 
    // Exécution de la requête
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- TODO Formulaire pour ajouter une tâche -->
    
</body>
</html>