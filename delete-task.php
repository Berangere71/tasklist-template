<?php
require_once "bdd-crud.php";




// TODO Suppréssion d'une tâche en fonction de son ID passé en $_GET

function deleteById_Tâche($id) {
    // Connexion à la base de données
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
    // Requête SQL pour supprimer un aliment par ID
    $sql = "DELETE FROM Tâche WHERE id = $id";
    // Exécution de la requête
    $stmt = $bdd->prepare($sql);
    $stmt->execute(['id' => $id]);
}

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