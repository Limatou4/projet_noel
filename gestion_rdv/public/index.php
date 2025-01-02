<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Rendez-vous</title>
    <style>
        /* Style général */
        body {
            font-family: 'Arial', sans-serif;
            background-color:#EAC7C7;
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
            color: #69193D;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* Barre de navigation */
        nav {
            width: 100%;
            max-width: 900px;
            background-color: #69193D;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        nav button {
            background-color: #fff;
            color: #69193D;
            padding: 12px 20px;
            margin: 10px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav button:hover {
            background-color:rgb(141, 63, 98);
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
            background-color: #69193D;
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
            background-color:rgb(132, 52, 88);
        }
        
    </style>
</head>
<body>

    <!-- Titre principal -->
    <h1>Gestion des Rendez-vous</h1>

    <!-- Barre de navigation -->
    <nav>
        <button onclick="window.location.href='?controller=rendezvous&action=index'">Afficher les rendez-vous</button>
        <button onclick="window.location.href='?controller=client&action=index'">Afficher les clients</button>
        <button onclick="window.location.href='?controller=rendezvous&action=create'">Ajouter un rendez-vous</button>
        <button onclick="window.location.href='?controller=client&action=create'">Ajouter un client</button>
    </nav>

    <!-- Contenu dynamique -->
    <div class="content-container">
        <?php
        require_once '../app/controllers/RendezvousController.php';
        require_once '../app/controllers/ClientController.php';

        if (isset($_GET['controller']) && isset($_GET['action'])) {
            $controller = $_GET['controller'];
            $action = $_GET['action'];

            if ($controller === 'rendezvous') {
                $rendezvousController = new RendezvousController();
                switch ($action) {
                    case 'index':
                        $rendezvousController->index();
                        break;
                    case 'create':
                        $rendezvousController->create();
                        break;
                    case 'store':
                        $rendezvousController->store();
                        break;
                    case 'delete':
                        if (isset($_GET['id'])) {
                            $rendezvousController->delete($_GET['id']);
                        }
                        break;
                    case 'edit':
                        if (isset($_GET['id'])) {
                            $rendezvousController->edit($_GET['id']);
                        }
                        break;
                    case 'update':
                        if (isset($_POST['id'])) {
                            $rendezvousController->update($_POST['id'], $_POST);
                        }
                        break;
                    default:
                        echo "<p>Action non valide pour le contrôleur 'rendezvous'.</p>";
                        break;
                }
            } elseif ($controller === 'client') {
                $clientController = new ClientController();
                switch ($action) {
                    case 'index':
                        $clientController->index();
                        break;
                    case 'create':
                        $clientController->create();
                        break;
                    case 'store':
                        $clientController->store();
                        break;
                    case 'edit':
                        if (isset($_GET['id'])) {
                            $clientController->edit($_GET['id']);
                        }
                        break;
                    case 'update':
                        if (isset($_POST['id'])) {
                            $clientController->update($_POST['id'], $_POST);
                        }
                        break;
                    case 'delete':
                        if (isset($_GET['id'])) {
                            $clientController->delete($_GET['id']);
                        }
                        break;
                    default:
                        echo "<p>Action non valide pour le contrôleur 'client'.</p>";
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
