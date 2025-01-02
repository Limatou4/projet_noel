<?php
// app/models/Etudiant.php

require_once __DIR__ . '/../database.php';  // Inclure le fichier de connexion à la base de données

// app/models/Etudiant.php

require_once __DIR__ . '/../database.php';  // Inclure le fichier de connexion à la base de données

class Etudiant {

    // Récupérer tous les étudiants où 'visible' = 1
    public function getAll() {
        $db = new Database();  // Créer une instance de la classe Database
        $conn = $db->getConnection();  // Obtenir la connexion à la base de données

        // Requête SQL pour récupérer tous les étudiants où 'visible' = 1
        $query = "SELECT * FROM etudiants WHERE visible = 1";
        $result = $conn->query($query);  // Exécuter la requête

        // Vérifier si la requête a retourné des résultats
        if ($result) {
            // Récupérer tous les résultats sous forme de tableau associatif
            $etudiants = $result->fetch_all(MYSQLI_ASSOC);
            return $etudiants;  // Retourner la liste des étudiants visibles
        } else {
            return [];  // Retourner un tableau vide si aucun étudiant n'est trouvé
        }
    }

    // Récupérer un étudiant par son ID
    public function getById($id) {
        $db = new Database();  // Créer une instance de la classe Database
        $conn = $db->getConnection();  // Obtenir la connexion à la base de données

        // Préparer la requête pour récupérer un étudiant par son ID
        $query = "SELECT * FROM etudiants WHERE id = ?";
        $stmt = $conn->prepare($query);  // Préparer la requête

        // Vérifier si la préparation a échoué
        if (!$stmt) {
            die("Erreur de préparation de la requête : " . $conn->error);
        }

        $stmt->bind_param("i", $id);  // Lier le paramètre ID à la requête
        $stmt->execute();  // Exécuter la requête

        $result = $stmt->get_result();  // Récupérer le résultat de la requête

        // Vérifier si un étudiant a été trouvé
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();  // Retourner l'étudiant
        } else {
            return null;  // Aucun étudiant trouvé
        }
    }

    // Fonction pour supprimer un étudiant en mettant 'visible' à 0
    public function delete($id) {
        $db = new Database();  // Créer une instance de la classe Database
        $conn = $db->getConnection();  // Obtenir la connexion à la base de données

        // Préparer la requête SQL pour modifier la colonne 'visible' à 0
        $query = "UPDATE etudiants SET visible = 0 WHERE id = ?";
        $stmt = $conn->prepare($query);  // Préparer la requête

        // Vérifier si la préparation a échoué
        if (!$stmt) {
            die("Erreur de préparation de la requête : " . $conn->error);
        }

        // Lier le paramètre ID à la requête
        $stmt->bind_param("i", $id);
        $stmt->execute();  // Exécuter la requête
    }

    // app/models/Etudiant.php


    // Mettre à jour un étudiant
public function update($id, $nom, $prenom, $email, $filiere, $visible) {
    // Préparer la requête SQL pour mettre à jour les données de l'étudiant sans toucher à la colonne 'visible'
    $query = "UPDATE etudiants SET nom = ?, prenom = ?, email = ?, filiere = ?, visible = ? WHERE id = ?";

    // Se connecter à la base de données
    $db = new Database();
    $conn = $db->getConnection();

    // Préparer et exécuter la requête
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssii", $nom, $prenom, $email, $filiere, $visible, $id);  // Liaison des paramètres

    // Exécuter la requête et vérifier si elle a réussi
    if ($stmt->execute()) {
        return true;  // Retourner true si l'opération a réussi
    } else {
        return false;  // Retourner false en cas d'échec
    }
}

    

public function create($nom, $prenom, $email, $filiere, $visible) {
    $db = new Database();  // Créer une instance de la classe Database
    $conn = $db->getConnection();  // Obtenir la connexion à la base de données

    // Requête SQL pour ajouter un étudiant
    $query = "INSERT INTO etudiants (nom, prenom, email, filiere, visible) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);  // Préparer la requête

    // Lier les paramètres à la requête
    $stmt->bind_param("ssssi", $nom, $prenom, $email, $filiere, $visible);
    $stmt->execute();  // Exécuter la requête
}

}
?>
