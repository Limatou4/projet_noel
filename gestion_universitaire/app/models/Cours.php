<?php
// app/models/Cours.php

require_once __DIR__ . '/../database.php';  // Inclure le fichier de connexion à la base de données

class Cours {

    // Récupérer tous les cours visibles (visible = 1)
    public function getAll() {
        $db = new Database(); // Créer une instance de la classe Database
        $conn = $db->getConnection(); // Obtenir la connexion

        // Requête SQL pour récupérer tous les cours actifs (visible = 1)
        $query = "SELECT * FROM cours WHERE visible = 1"; 
        $result = $conn->query($query);

        // Gérer les erreurs de la requête
        if ($result === false) {
            die("Erreur dans la requête : " . $conn->error);
        }

        // Récupérer tous les résultats sous forme de tableau associatif
        $cours = $result->fetch_all(MYSQLI_ASSOC);
        return $cours;
    }

    // Fonction pour masquer un cours en mettant 'visible' à 0
    public function deleteCourse($id) {
        $db = new Database();  // Créer une instance de la classe Database
        $conn = $db->getConnection();  // Obtenir la connexion à la base de données

        // Préparer la requête SQL pour modifier la colonne 'visible' à 0
        $query = "UPDATE cours SET visible = 0 WHERE id = ?";
        $stmt = $conn->prepare($query);  // Préparer la requête

        // Vérifier si la préparation a échoué
        if (!$stmt) {
            die("Erreur de préparation de la requête : " . $conn->error);
        }

        // Lier le paramètre ID à la requête
        $stmt->bind_param("i", $id);
        $stmt->execute();  // Exécuter la requête
    }

    // Récupérer un cours par son ID
    public function getById($id) {
        $db = new Database();
        $conn = $db->getConnection();

        $query = "SELECT * FROM cours WHERE id = ? AND visible = 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();  // Retourner les données du cours sous forme de tableau associatif
    }

    // Mettre à jour un cours
    public function update($id, $nom_cours, $code_cours, $nombre_heures) {
        // Préparer la requête SQL pour mettre à jour les données du cours sans toucher à la colonne 'visible'
        $query = "UPDATE cours SET nom_cours = ?, code_cours = ?, nombre_heures = ? WHERE id = ?";
    
        // Se connecter à la base de données
        $db = new Database();
        $conn = $db->getConnection();
    
        // Préparer et exécuter la requête
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssii", $nom_cours, $code_cours, $nombre_heures, $id);
    
        // Exécuter la requête et vérifier si elle a réussi
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    // Ajouter un cours
    public function create($nom_cours, $code_cours, $nombre_heures, $visible = 1) {
        $db = new Database();
        $conn = $db->getConnection();

        // Requête SQL pour insérer un nouveau cours
        $query = "INSERT INTO cours (nom_cours, code_cours, nombre_heures, visible) 
                  VALUES (?, ?, ?, ?)";  // Le champ 'visible' est à 1 pour ajouter le cours comme actif
        $stmt = $conn->prepare($query);

        // Vérifier si la préparation a échoué
        if ($stmt === false) {
            die("Erreur de préparation de la requête : " . $conn->error);
        }

        // Lier les paramètres de la requête
        $stmt->bind_param("ssii", $nom_cours, $code_cours, $nombre_heures, $visible);

        // Exécuter la requête
        $stmt->execute();
    }
}
?>
