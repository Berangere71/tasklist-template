<?php
/**
 * Ce fichier contient les fonctions de CRUD pour les utilisateurs et les tâches.
 * Il est utilisé pour interagir avec la base de données.
 * Presque toutes les pages de l'application utilisent ce fichier.
 * 
 * A vous de remplir ces fonction pour qu'elles fonctionnent correctement.
 * 
 * Vous pourrez ainsi facilment les utiliser dans les autres fichiers et construire votre site sans plus vous soucis du SQL.
 */

// Connexion à la base de données
function connect() {

  
    return new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
}

// Ajouter une tâche
function addTask($user_id, $title, $description, $validation) {
    $db = connect();
    $sql = "INSERT INTO Task (user_id, title, description, validation) VALUES (:user_id, :title, :description, :validation)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        'user_id' => $user_id, 
        'title' => $title, 
        'description' => $description,
        'validation' => $validation]);
}

// Récupérer toutes les tâches d'un utilisateur
function getAllTasks($user_id,) {
    $db = connect();
    $sql = "SELECT * FROM Task WHERE user_id = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->execute(['user_id' => $user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Supprimer une tâche par ID
function deleteTaskById($id) {
    $db = connect();
    $sql = "DELETE FROM Task WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(['id' => $id]);
}
?>