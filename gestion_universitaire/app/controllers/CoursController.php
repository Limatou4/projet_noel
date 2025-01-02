<?php
// app/controllers/CoursController.php
require_once '../app/models/Cours.php';  // Inclure le modèle Cours

class CoursController {

    // Afficher la liste des cours
    public function index() {
        $coursModel = new Cours();  // Créer une instance du modèle Cours
        $cours = $coursModel->getAll();  // Récupérer tous les cours
        require_once '../app/views/cours/index.php';  // Charger la vue pour afficher les cours
    }

    // Afficher le formulaire pour ajouter un cours
    public function create() {
        // Cette ligne charge la vue contenant le formulaire d'ajout de cours
        require_once '../app/views/cours/create.php';  
    }

    public function delete($id) {
        $coursModel = new Cours();  // Créer une instance du modèle Cours
        $coursModel->deleteCourse($id);  // Appeler la méthode deleteCourse du modèle pour masquer le cours
        // Rediriger vers la page des cours après la mise à jour
        header('Location: ?controller=cours&action=index');
        exit();
    }
    public function edit($id) {
    $coursModel = new Cours();  // Créer une instance du modèle Cours
    $cours = $coursModel->getById($id);  // Récupérer les informations du cours à partir de son ID

    // Vérifier si le cours existe
    if ($cours) {
        // Passer les données du cours à la vue
        include __DIR__ . '/../views/cours/edit.php';
    } else {
        // Si le cours n'existe pas, rediriger vers la liste des cours
        header('Location: ?controller=cours&action=index');
        exit();
    }
}

public function update($id, $data) {
    // Extraire les valeurs du tableau $data
    $nom_cours = $data['nom_cours'];
    $code_cours = $data['code_cours'];
    $nombre_heures = $data['nombre_heures'];

    // Appeler la méthode update du modèle Cours
    $cours = new Cours();
    $success = $cours->update($id, $nom_cours, $code_cours, $nombre_heures);

    // Si la mise à jour a réussi, rediriger vers la liste des cours
    if ($success) {
        // Rediriger vers la page d'index des cours (vous pouvez adapter l'URL en fonction de votre structure)
        header("Location: index.php?controller=cours&action=index");
        exit(); // N'oubliez pas d'utiliser exit() après la redirection
    } else {
        // Si l'update échoue, vous pouvez afficher un message d'erreur ou gérer l'erreur comme vous le souhaitez
        echo "Une erreur s'est produite lors de la mise à jour du cours.";
    }
}



    
    

    // Ajouter un cours dans la base de données
    public function store() {
        // Vérifier si les données ont été envoyées via POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données du formulaire
            $nom_cours = $_POST['nom_cours'];
            $code_cours = $_POST['code_cours'];
            $nombre_heures = $_POST['nombre_heures'];

            // Créer une instance de la classe Cours et appeler la méthode create()
            $coursModel = new Cours();
            $coursModel->create($nom_cours, $code_cours, $nombre_heures);

            // Rediriger vers la page des cours après l'ajout
            header('Location: ?controller=cours&action=index');
            exit();
        }
    }
}
?>
