<?php
// app/controllers/ClientController.php
require_once '../app/models/Client.php';  // Inclure le modèle Client

class ClientController {

    // Afficher la liste des clients
    public function index() {
        $clientModel = new Client();  // Créer une instance du modèle Client
        $clients = $clientModel->getAll();  // Récupérer tous les clients
        require_once '../app/views/client/index.php';  // Charger la vue pour afficher les clients
    }

    // Afficher le formulaire pour ajouter un client
    public function create() {
        // Cette ligne charge la vue contenant le formulaire d'ajout de client
        require_once '../app/views/client/create.php';  
    }

    // Supprimer un client
    public function delete($id) {
        $clientModel = new Client();  // Créer une instance du modèle Client
        $clientModel->deleteClient($id);  // Appeler la méthode deleteClient du modèle pour masquer le client
        // Rediriger vers la page des clients après la mise à jour
        header('Location: ?controller=client&action=index');
        exit();
    }

    // Afficher le formulaire pour éditer un client
    public function edit($id) {
        $clientModel = new Client();  // Créer une instance du modèle Client
        $client = $clientModel->getById($id);  // Récupérer les informations du client à partir de son ID

        // Vérifier si le client existe
        if ($client) {
            // Passer les données du client à la vue
            include __DIR__ . '/../views/client/edit.php';
        } else {
            // Si le client n'existe pas, rediriger vers la liste des clients
            header('Location: ?controller=client&action=index');
            exit();
        }
    }

    // Mettre à jour un client
    public function update($id, $data) {
        // Extraire les valeurs du tableau $data
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $email = $data['email'];
        $telephone = $data['telephone'];

        // Appeler la méthode update du modèle Client
        $client = new Client();
        $success = $client->update($id, $nom, $prenom, $email, $telephone);

        // Si la mise à jour a réussi, rediriger vers la liste des clients
        if ($success) {
            // Rediriger vers la page d'index des clients
            header("Location: index.php?controller=client&action=index");
            exit(); // N'oubliez pas d'utiliser exit() après la redirection
        } else {
            // Si l'update échoue, vous pouvez afficher un message d'erreur ou gérer l'erreur comme vous le souhaitez
            echo "Une erreur s'est produite lors de la mise à jour du client.";
        }
    }

    // Ajouter un client dans la base de données
    public function store() {
        // Vérifier si les données ont été envoyées via POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];

            // Créer une instance de la classe Client et appeler la méthode create()
            $clientModel = new Client();
            $clientModel->create($nom, $prenom, $email, $telephone);

            // Rediriger vers la page des clients après l'ajout
            header('Location: ?controller=client&action=index');
            exit();
        }
    }
}
?>
