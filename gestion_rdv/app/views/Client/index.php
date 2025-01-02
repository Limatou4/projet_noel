<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
    <style>
        /* Style général de la page */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #EAC7C7; /* Couleur de fond de la page */
            margin: 0;
            display: flex;
            justify-content: center; /* Centrer horizontalement */
            align-items: center;    /* Centrer verticalement */
            height: 100vh;          /* Prend toute la hauteur de la fenêtre */
        }

        /* Conteneur principal pour centrer le contenu */
        .container {
            width: 100%;
            max-width: 900px;
            background-color:white; /* Fond blanc du conteneur */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Centrer le texte */
        }

        /* Titre de la page */
        h1 {
            text-align: center;
            font-size: 30px;
            color: #69193D; /* Couleur du titre */
            margin-bottom: 20px;
        }

        /* Style du tableau */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #69193D; /* Bordure de couleur */
        }

        th, td {
            padding: 12px;
            text-align: center;
            font-size: 14px;
        }

        th {
            background-color: #69193D; /* Couleur de fond de l'en-tête */
            color: white;             /* Texte blanc */
        }

        td {
            background-color: #EAC7C7; /* Couleur des cellules */
            color: #333;              /* Texte sombre */
        }

        /* Style des liens d'action (modifier, supprimer, voir) */
        a {
            color: #69193D; /* Couleur des liens */
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .delete {
            color: #f44336; /* Couleur rouge pour supprimer */
        }

        .delete:hover {
            color: #e53935;
        }

        /* Si aucune donnée n'est trouvée */
        p {
            text-align: center;
            color: #333;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <!-- Conteneur principal -->
    <div class="container">
        <!-- Vérifier si la variable $clients est définie et contient des données -->
        <?php if (isset($clients) && count($clients) > 0): ?>
            <h1>Liste des Clients</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Afficher chaque client dans un tableau -->
                    <?php foreach ($clients as $clientItem): ?>
                        <tr>
                            <td><?= htmlspecialchars($clientItem['id']); ?></td>
                            <td><?= htmlspecialchars($clientItem['nom']); ?></td>
                            <td><?= htmlspecialchars($clientItem['prenom']); ?></td>
                            <td><?= htmlspecialchars($clientItem['email']); ?></td>
                            <td><?= htmlspecialchars($clientItem['telephone']); ?></td>
                            <td>
                                <a href="?controller=client&action=show&id=<?= urlencode($clientItem['id']); ?>">Voir</a> | 
                                <a href="?controller=client&action=edit&id=<?= urlencode($clientItem['id']); ?>">Modifier</a> | 
                                <a href="?controller=client&action=delete&id=<?= urlencode($clientItem['id']); ?>" class="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <!-- Si aucun client n'est trouvé -->
            <p>Aucun client trouvé.</p>
        <?php endif; ?>
    </div>

</body>
</html>
