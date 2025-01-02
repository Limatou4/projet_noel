<?php
// app/controllers/RendezVousController.php

require_once '../app/models/RendezVous.php';  // Inclure le modèle RendezVous

class RendezVousController {
    // Afficher la liste des rendez-vous
    public function index() {
        $rendezVousModel = new RendezVous();  // Créer une instance du modèle RendezVous
        $rendezVousList = $rendezVousModel->getAll();  // Récupérer tous les rendez-vous
        require_once '../app/views/rendezvous/index.php';  // Charger la vue pour afficher les rendez-vous
    }

    // Afficher le formulaire pour ajouter un rendez-vous
    public function create() {
        require_once '../app/views/rendezvous/create.php';  // Charger le formulaire d'ajout
    }

    // Ajouter un rendez-vous dans la base de données
    public function store() {
        // Vérifier si les données ont été envoyées via POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données du formulaire
            $date = $_POST['date'];
            $heure = $_POST['heure'];
            $description = $_POST['description'];
            $client_id = $_POST['client_id'];
            $visible = 1;  // Valeur par défaut pour 'visible' (si nécessaire)

            // Créer une instance de la classe RendezVous et appeler la méthode create()
            $rendezVousModel = new RendezVous();
            $rendezVousModel->create($date, $heure, $description, $client_id, $visible);

            // Rediriger vers la page des rendez-vous après l'ajout
            header('Location: ?controller=rendezvous&action=index');
            exit();
        }
    }

    // Récupérer un rendez-vous par son ID
    public function getById($id) {
        $db = new Database();
        $conn = $db->getConnection();
    
        if ($conn === null) {
            die("Erreur de connexion à la base de données");
        }
    
        $query = "SELECT * FROM rendezvous WHERE id = ? AND visible = 1";
        $stmt = $conn->prepare($query);
    
        if (!$stmt) {
            die("Erreur de préparation de la requête : " . $conn->errorInfo()[2]);
        }
    
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    
        // Ajout du log pour vérifier si les données sont récupérées
        if ($stmt->rowCount() > 0) {
            $rendezvous = $stmt->fetch(PDO::FETCH_ASSOC);
            // Log des données récupérées
            error_log("Données du rendez-vous : " . print_r($rendezvous, true));
            return $rendezvous;
        } else {
            return null;
        }
    
        $stmt->closeCursor();
    }
    

    // Afficher le formulaire pour éditer un rendez-vous
// Afficher le formulaire d'édition du rendez-vous
public function edit($id) {
    $rendezVousModel = new RendezVous();  
    $rendezVous = $rendezVousModel->getById($id);  // Récupérer les détails du rendez-vous

    // Vérifier si le rendez-vous existe
    if ($rendezVous) {
        // Extraire les données et les transformer en variables
        extract($rendezVous);  // Cela définira les variables comme $id, $date, $heure, $description, etc.
        
        // Passer les données du rendez-vous à la vue
        include __DIR__ . '/../views/rendezvous/edit.php';
    } else {
        // Si le rendez-vous n'existe pas, rediriger vers la liste des rendez-vous
        header('Location: ?controller=rendezvous&action=index');
        exit();
    }
}


    // Mettre à jour un rendez-vous
public function update($id, $data) {
    // Extraire les valeurs du tableau $data
    $date = $data['date'];
    $heure = $data['heure'];
    $description = $data['description'];
    $client_id = $data['client_id'];

    // Appeler la méthode update du modèle RendezVous
    $rendezVousModel = new RendezVous();
    $success = $rendezVousModel->update($id, $date, $heure, $description, $client_id);

    // Si la mise à jour a réussi, rediriger vers la liste des rendez-vous
    if ($success) {
        header("Location: ?controller=rendezvous&action=index");
        exit(); // N'oubliez pas d'utiliser exit() après la redirection
    } else {
        // Si l'update échoue, vous pouvez afficher un message d'erreur ou gérer l'erreur comme vous le souhaitez
        echo "Une erreur s'est produite lors de la mise à jour du rendez-vous.";
    }
}


    // Supprimer un rendez-vous en modifiant la colonne 'visible' à 0
    public function delete($id) {
        $rendezVousModel = new RendezVous();  // Créer une instance du modèle RendezVous
        $rendezVousModel->delete($id);  // Appeler la méthode delete du modèle
        // Rediriger vers la page des rendez-vous après la suppression
        header('Location: ?controller=rendezvous&action=index');
        exit();
    }
}
?>
