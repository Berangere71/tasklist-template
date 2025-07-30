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
    // Remplacez les valeurs ci-dessous par celles de votre base de données
    $host = 'localhost';
    $dbname = 'votre_base';
    $user = 'votre_utilisateur';
    $password = 'votre_mot_de_passe';
    return new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
}

//create
function add($nom, $type, $calories) {
    $db = connect();
    $sql = "INSERT INTO aliments (nom, type, calories) VALUES (:nom, :type, :calories)";
    $stmt = $db->prepare($sql);
    $stmt->execute(['nom' => $nom, 'type' => $type, 'calories' => $calories]);
}

//read
function getById($id) {
    $db = connect();
    $sql = "SELECT * FROM Tâche WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//read
function getAll() {
    $db = connect();
    $sql = "SELECT * FROM Tâche";
    return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

//delete
function deleteById($id) {
    $db = connect();
    $sql = "DELETE FROM Tâche WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(['id' => $id]);
}

//update
function update($id, $email, $tâche, $description, $validation) {
    $db = connect();
    $sql = "UPDATE Tâche SET email = :email, tâche = :tâche, description = :description, validation = :validation, WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(['id' => $id, 'email' => $email, 'tâche' => $tâche, 'descriptionn' => $description, 'validation' => $validation]);
}
?>

<?php
function connect_database() : PDO{
    $database = new PDO("mysql:host=127.0.0.1;dbname=app-database","root","root");
    return $database;
}
// CRUD User
// Create (signin)
function create_user(string $email,string $password) : int | null {
    $database = connect_database();
    // TODO

    return $user_id;
}
// Read (login)
function get_user(int $id) : array | null {
    $database = connect_database();
    // TODO 

    return $user;
}


// CRUD Task
// Create
function add_task(string $name,string $description) : int | null {
    $database = connect_database();

    
    return $task_id;
}

//Read
function get_task(int $id) : array | null {
    $database = connect_database();
    // TODO
    return $task;
}

function get_all_task() : array | null {
    $database = connect_database();
    // TODO
    return $tasks;
}

// Delete (BONUS)
function delete_task(int $id) : bool{
    $database = connect_database();
    // TODO
    return $isSuccessful;
}