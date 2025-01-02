<?php
// app/models/RendezVous.php

require_once __DIR__ . '/../database.php';  // Inclure le fichier de connexion à la base de données

class RendezVous {

    private $conn;

    public function __construct() {
        // Créer une instance de la classe Database pour obtenir la connexion PDO
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // Récupérer tous les rendez-vous où 'visible' = 1
    // app/models/RendezVous.php

    
    // Récupérer tous les rendez-vous visibles (visible = 1)
    public function getAll() {
        $db = new Database(); // Créer une instance de la classe Database
        $conn = $db->getConnection(); // Obtenir la connexion

        // Requête SQL pour récupérer tous les rendez-vous actifs (visible = 1)
        $query = "SELECT * FROM rendezvous WHERE visible = 1"; 
        $stmt = $conn->prepare($query); // Préparer la requête
        $stmt->execute(); // Exécuter la requête

        // Gérer les erreurs de la requête
        if ($stmt === false) {
            die("Erreur dans la requête : " . $conn->errorInfo()[2]);
        }

        // Récupérer tous les résultats sous forme de tableau associatif
        $rendezvous = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rendezvous;
    }



    // Récupérer un rendez-vous par son ID
    public function getById($id) {
        // Préparer la requête pour récupérer un rendez-vous par son ID
        $query = "SELECT * FROM rendezvous WHERE id = ?";
        $stmt = $this->conn->prepare($query);  // Préparer la requête
        $stmt->execute([$id]);  // Exécuter la requête avec le paramètre ID

        // Vérifier si un rendez-vous a été trouvé
        $rendezvous = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rendezvous ? $rendezvous : null;  // Retourner le rendez-vous ou null si aucun trouvé
    }

    // Fonction pour supprimer un rendez-vous en mettant 'visible' à 0
    public function delete($id) {
        // Préparer la requête SQL pour modifier la colonne 'visible' à 0
        $query = "UPDATE rendezvous SET visible = 0 WHERE id = ?";
        $stmt = $this->conn->prepare($query);  // Préparer la requête
        $stmt->execute([$id]);  // Exécuter la requête avec le paramètre ID
    }

    public function update($id, $date, $heure, $description, $client_id) {
        // Préparer la requête SQL pour mettre à jour le rendez-vous
        $query = "UPDATE rendezvous SET date = ?, heure = ?, description = ?, client_id = ? WHERE id = ? AND visible = 1";
    
        $db = new Database();
        $conn = $db->getConnection();
    
        // Préparer la requête SQL
        $stmt = $conn->prepare($query);
    
        // Lier les paramètres
        $stmt->bindParam(1, $date);
        $stmt->bindParam(2, $heure);
        $stmt->bindParam(3, $description);
        $stmt->bindParam(4, $client_id);
        $stmt->bindParam(5, $id);
    
        // Exécuter la requête
        $success = $stmt->execute();
    
        // Retourner le résultat de l'exécution
        return $success;
    }
    
    

    // Ajouter un nouveau rendez-vous
    public function create($date, $heure, $description, $client_id, $visible) {
        // Requête SQL pour ajouter un rendez-vous
        $query = "INSERT INTO rendezvous (date, heure, description, client_id, visible) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);  // Préparer la requête
        $stmt->execute([$date, $heure, $description, $client_id, $visible]);  // Exécuter la requête avec les paramètres
    }
}
?>
