<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Universitaire</title>
    <style>
        /* Style général */
        body {
            font-family: 'Arial', sans-serif;
            background-color:#CFFCFF;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
            padding-top: 50px;
            overflow-y: auto;
        }

        /* Titre principal */
        h1 {
            text-align: center;
            font-size: 32px;
            color: #459A9F;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* Barre de navigation */
        nav {
            width: 100%;
            max-width: 900px;
            background-color: #459A9F;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        nav button {
            background-color: #fff;
            color: #459A9F;
            padding: 12px 20px;
            margin: 10px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav button:hover {
            background-color:rgb(93, 174, 180);
            color: white;
        }

        /* Contenu dynamique */
        

        .content-container h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .content-container p {
            font-size: 16px;
            color: #555;
        }

        /* Bouton "Retour en haut" */
        .scroll-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #50878B;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 50%;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        .scroll-button:hover {
            background-color:rgb(120, 174, 177);
        }
        
    </style>
</head>
<body>

    <!-- Titre principal -->
    <h1>Gestion Universitaire</h1>

    <!-- Barre de navigation -->
    <nav>
        <button onclick="window.location.href='?controller=etudiants&action=index'">Afficher les étudiants</button>
        <button onclick="window.location.href='?controller=cours&action=index'">Afficher les cours</button>
        <button onclick="window.location.href='?controller=etudiants&action=create'">Ajouter un étudiant</button>
        <button onclick="window.location.href='?controller=cours&action=create'">Ajouter un cours</button>
    </nav>

    <!-- Contenu dynamique -->
    <div class="content-container">
        <?php
        require_once '../app/controllers/EtudiantController.php';
        require_once '../app/controllers/CoursController.php';

        if (isset($_GET['controller']) && isset($_GET['action'])) {
            $controller = $_GET['controller'];
            $action = $_GET['action'];

            if ($controller === 'etudiants') {
                $etudiantController = new EtudiantController();
                switch ($action) {
                    case 'index':
                        $etudiantController->index();
                        break;
                    case 'create':
                        $etudiantController->create();
                        break;
                    case 'store':
                        $etudiantController->store();
                        break;
                    case 'delete':
                        if (isset($_GET['id'])) {
                            $etudiantController->delete($_GET['id']);
                        }
                        break;
                    case 'edit':
                        if (isset($_GET['id'])) {
                            $etudiantController->edit($_GET['id']);
                        }
                        break;
                    case 'update':
                        if (isset($_POST['id'])) {
                            $etudiantController->update($_POST['id'], $_POST);
                        }
                        break;
                    default:
                        echo "<p>Action non valide pour le contrôleur 'etudiants'.</p>";
                        break;
                }
            } elseif ($controller === 'cours') {
                $coursController = new CoursController();
                switch ($action) {
                    case 'index':
                        $coursController->index();
                        break;
                    case 'create':
                        $coursController->create();
                        break;
                    case 'store':
                        $coursController->store();
                        break;
                    case 'edit':
                        if (isset($_GET['id'])) {
                            $coursController->edit($_GET['id']);
                        }
                        break;
                    case 'update':
                        if (isset($_POST['id'])) {
                            $coursController->update($_POST['id'], $_POST);
                        }
                        break;
                    case 'delete':
                        if (isset($_GET['id'])) {
                            $coursController->delete($_GET['id']);
                        }
                        break;
                    default:
                        echo "<p>Action non valide pour le contrôleur 'cours'.</p>";
                        break;
                }
            } else {
                echo "<p>Contrôleur non valide.</p>";
            }
        } else {
            //echo "<p>Action ou contrôleur non définis.</p>";
        }
        ?>
    </div>

    <!-- Bouton "Retour en haut" -->
    <button class="scroll-button" onclick="window.scrollTo(0, 0);">&#8679;</button>

</body>
</html>
