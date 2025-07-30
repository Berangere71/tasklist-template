<?php
require_once "bdd-crud.php";

function deleteById_Tâche($id) {
    // Connexion à la base de données
    // Requête SQL pour supprimer un aliment par ID
    $sql = "DELETE FROM Tâche WHERE id = $id";
    // Exécution de la requête
}

// TODO Suppréssion d'une tâche en fonction de son ID passé en $_GET


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une tache</title>
</head>
<body>
    
</body>
</html>