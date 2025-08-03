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
try {
        return new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}
// Ajouter une tâche
function addTask($user_id, $title, $description, $validation) {
    $database = connect();
    $sql = "INSERT INTO Task (user_id, title, description, validation) VALUES (?, ?, ?, ?)";
    $stmt = $database->prepare($sql);
    return $stmt->execute([$user_id, $title, $description, $validation]);
}

// Récupérer toutes les tâches d'un utilisateur
function getAllTasks($user_id) {
    $database = connect();
    $sql = "SELECT * FROM Task WHERE user_id = ?";
    $stmt = $database->prepare($sql);
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Supprimer une tâche par ID
function deleteTaskById($id) {
    $database = connect();
    $sql = "DELETE FROM Task WHERE id = ?";
    $stmt = $database->prepare($sql);
    return $stmt->execute([$id]);
}

// récupérer une tâche par ID
function getTaskById($id) {
    $database = connect();
    $sql = "SELECT * FROM Task WHERE id = ?";
    $stmt = $database->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>