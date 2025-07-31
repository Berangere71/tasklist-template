<?php
require_once "bdd-crud.php";

function add_Tâche($tâche, $description, $validation) {
    // Connexion à la base de données
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
    // Requête SQL pour mettre à jour un aliment
    $sql = "INSERT INTO Tâche (tâche, description, validation) VALUES ('$tâche', '$description', '$validation)"; 
    // Exécution de la requête
    $stmt = $bdd->prepare($sql);
    $stmt->execute(['tâche' => $tâche, 'description' => $description, 'validation' => $validation]);
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
     <input type="tâche" name="tâche" placeholder="saisir la tâche" required>
     <input type="description" name="description" placeholder="décrivez votre tâche" required>
     <input type="validation" name="validation" placeholder="valider par oui ou non" required>
      <button type="submit">envoyer</button>

    
</body>
</html>