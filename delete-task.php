<?php
require_once "bdd-crud.php";




// TODO Suppréssion d'une tâche en fonction de son ID passé en $_GET
if (isset($_GET['id'])) {
    deleteTaskById_T($_GET['id']); 
    header("location: index.php");
    exit();
}

// function deleteById_T($id) {

// $database = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
// $sql = "DELETE FROM Task WHERE id= :id";
// $stmt = $database->prepare($sql);
// $stmt->execute(['id' => $is]);

// }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une tâche</title>
</head>
<body>
   <p>suppression en cours ...</p>
    
</body>
</html>