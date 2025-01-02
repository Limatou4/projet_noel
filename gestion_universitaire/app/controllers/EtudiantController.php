<?php 
// app/controllers/EtudiantController.php

require_once '../app/models/Etudiant.php';  // Inclure le modèle Etudiant

class EtudiantController {
    // Afficher la liste des étudiants
    public function index() {
        $etudiantModel = new Etudiant();  // Créer une instance du modèle Etudiant
        $etudiants = $etudiantModel->getAll();  // Récupérer tous les étudiants
        require_once '../app/views/etudiants/index.php';  // Charger la vue pour afficher les étudiants
    }

    // Afficher le formulaire pour ajouter un étudiant
    public function create() {
        require_once '../app/views/etudiants/create.php';  // Charger le formulaire d'ajout
    }

    // Ajouter un étudiant dans la base de données
    public function store() {
        // Vérifier si les données ont été envoyées via POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $filiere = $_POST['filiere'];
            $visible = 1; // Valeur par défaut pour 'visible' (si nécessaire)

            // Créer une instance de la classe Etudiant et appeler la méthode create()
            $etudiantModel = new Etudiant();
            $etudiantModel->create($nom, $prenom, $email, $filiere, $visible);

            // Rediriger vers la page des étudiants après l'ajout
            header('Location: ?controller=etudiants&action=index');
            exit();
        }
    }

    // Récupérer un étudiant par son ID
    public function getById($id) {
        $db = new Database();  // Créer une instance de la classe Database
        $conn = $db->getConnection();  // Obtenir la connexion à la base de données

        // Vérifier si la connexion a réussi
        if ($conn === null) {
            die("Erreur de connexion à la base de données");
        }

        // Préparer la requête pour récupérer un étudiant par son ID
        $query = "SELECT * FROM etudiants WHERE id = ? AND visible = 1";
        $stmt = $conn->prepare($query);  // Préparer la requête avec mysqli

        if (!$stmt) {
            die("Erreur de préparation de la requête : " . $conn->error);  // Gérer l'erreur si la préparation échoue
        }

        // Lier les paramètres
        $stmt->bind_param("i", $id);  // Associer l'ID à la requête (type 'i' pour entier)

        // Exécuter la requête
        $stmt->execute();
        $result = $stmt->get_result();

        // Vérifier si un étudiant a été trouvé
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();  // Retourner les détails de l'étudiant si trouvé
        } else {
            return null;  // Aucun étudiant trouvé
        }

        // Fermer la requête préparée
        $stmt->close();
    }


// Afficher le formulaire d'édition de l'étudiant
public function edit($id) {
    // Créer une instance du modèle Etudiant
    $etudiantModel = new Etudiant();  
    // Récupérer les informations de l'étudiant à partir de son ID
    $etudiant = $etudiantModel->getById($id);  

    // Vérifier si l'étudiant existe
    if ($etudiant) {
        // Passer les données de l'étudiant à la vue
        include __DIR__ . '/../views/etudiants/edit.php';
    } else {
        // Si l'étudiant n'existe pas, rediriger vers la liste des étudiants
        header('Location: ?controller=etudiants&action=index');
        exit();
    }
}


// Mettre à jour les informations de l'étudiant
public function update($id, $data) {
    // Extraire les valeurs du tableau $data
    $nom = $data['nom'];
    $prenom = $data['prenom'];
    $email = $data['email'];
    $filiere = $data['filiere'];
    $visible = isset($data['visible']) ? $data['visible'] : 1;

    // Appeler la méthode update du modèle Etudiant
    $etudiantModel = new Etudiant();
    $success = $etudiantModel->update($id, $nom, $prenom, $email, $filiere, $visible);

    // Si la mise à jour a réussi, rediriger vers la liste des étudiants
    if ($success) {
        header("Location: index.php?controller=etudiants&action=index");
        exit(); 
    } else {
        // Si l'update échoue, afficher un message d'erreur
        echo "Une erreur s'est produite lors de la mise à jour de l'étudiant.";
    }
}





    
    // Supprimer un étudiant en modifiant la colonne 'visible' à 0
    public function delete($id) {
        $etudiantModel = new Etudiant();  // Créer une instance du modèle Etudiant
        $etudiantModel->delete($id);  // Appeler la méthode delete du modèle
        // Rediriger vers la page des étudiants après la suppression
        header('Location: ?controller=etudiants&action=index');
        exit();
    }
}
?>
