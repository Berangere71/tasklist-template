<?php
require_once "bdd-crud.php";
session_start(); //démarrer la session
$bdd=connect();


// Connexion à la base de données


if (isset($_POST["title"]) && isset ($_POST["description"]) && isset ($_POST["validation"])) {

    addTask (
            $_SESSION ["User_id"],
            $_POST ["title"],
            $_POST ["description"],
            $_POST ["validation"]);

}
var_dump ($_POST)
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
<form method="POST" action="">
<h1> Ajouter des tâches </h1>

       <input type="text" name="title" placeholder="saisir la tâche" required>
     <input type="text" name="description" placeholder="décrivez votre tâche" required>
     <input type="text" name="validation" placeholder="valider par oui ou non" required>
      <button type="submit">envoyer</button>

    </form>


     
    
</body>
</html>