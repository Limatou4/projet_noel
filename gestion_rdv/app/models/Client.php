<?php
// app/models/Client.php

require_once __DIR__ . '/../database.php';  // Inclure le fichier de connexion à la base de données

class Client {

    // Récupérer tous les clients visibles (visible = 1)
    public function getAll() {
        $db = new Database(); // Créer une instance de la classe Database
        $conn = $db->getConnection(); // Obtenir la connexion

        // Requête SQL pour récupérer tous les clients actifs (visible = 1)
        $query = "SELECT * FROM client WHERE visible = 1"; 
        $stmt = $conn->prepare($query); // Préparer la requête
        $stmt->execute(); // Exécuter la requête

        // Gérer les erreurs de la requête
        if ($stmt === false) {
            die("Erreur dans la requête : " . $conn->errorInfo()[2]);
        }

        // Récupérer tous les résultats sous forme de tableau associatif
        $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clients;
    }

    // Fonction pour masquer un client en mettant 'visible' à 0
    public function deleteClient($id) {
        $db = new Database();  // Créer une instance de la classe Database
        $conn = $db->getConnection();  // Obtenir la connexion à la base de données

        // Préparer la requête SQL pour modifier la colonne 'visible' à 0
        $query = "UPDATE client SET visible = 0 WHERE id = ?";
        $stmt = $conn->prepare($query);  // Préparer la requête

        // Vérifier si la préparation a échoué
        if ($stmt === false) {
            die("Erreur de préparation de la requête : " . $conn->errorInfo()[2]);
        }

        // Lier le paramètre ID à la requête
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();  // Exécuter la requête
    }

    // Récupérer un client par son ID
    public function getById($id) {
        $db = new Database();
        $conn = $db->getConnection();

        $query = "SELECT * FROM client WHERE id = ? AND visible = 1";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);  // Retourner les données du client sous forme de tableau associatif
        return $result;
    }

    // Mettre à jour un client
    public function update($id, $nom, $prenom, $email, $telephone) {
        // Préparer la requête SQL pour mettre à jour les données du client sans toucher à la colonne 'visible'
        $query = "UPDATE client SET nom = ?, prenom = ?, email = ?, telephone = ? WHERE id = ?";
    
        // Se connecter à la base de données
        $db = new Database();
        $conn = $db->getConnection();
    
        // Préparer et exécuter la requête
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $nom, PDO::PARAM_STR);
        $stmt->bindParam(2, $prenom, PDO::PARAM_STR);
        $stmt->bindParam(3, $email, PDO::PARAM_STR);
        $stmt->bindParam(4, $telephone, PDO::PARAM_STR);
        $stmt->bindParam(5, $id, PDO::PARAM_INT);
    
        // Exécuter la requête et vérifier si elle a réussi
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    // Ajouter un client
    public function create($nom, $prenom, $email, $telephone, $visible = 1) {
        $db = new Database();
        $conn = $db->getConnection();

        // Requête SQL pour insérer un nouveau client
        $query = "INSERT INTO client (nom, prenom, email, telephone, visible) 
                  VALUES (?, ?, ?, ?, ?)";  // Le champ 'visible' est à 1 pour ajouter le client comme actif
        $stmt = $conn->prepare($query);

        // Vérifier si la préparation a échoué
        if ($stmt === false) {
            die("Erreur de préparation de la requête : " . $conn->errorInfo()[2]);
        }

        // Lier les paramètres de la requête
        $stmt->bindParam(1, $nom, PDO::PARAM_STR);
        $stmt->bindParam(2, $prenom, PDO::PARAM_STR);
        $stmt->bindParam(3, $email, PDO::PARAM_STR);
        $stmt->bindParam(4, $telephone, PDO::PARAM_STR);
        $stmt->bindParam(5, $visible, PDO::PARAM_INT);

        // Exécuter la requête
        $stmt->execute();
    }
}
?>
