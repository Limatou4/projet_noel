<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Cours</title>
    <style>
        /* Style général de la page */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #CFFCFF; /* Couleur de fond de la page */
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
            background-color: #FFFFFF; /* Fond blanc du conteneur */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Centrer le texte */
        }

        /* Titre de la page */
        h1 {
            text-align: center;
            font-size: 30px;
            color: #459A9F; /* Couleur du titre */
            margin-bottom: 20px;
        }

        /* Style du tableau */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #459A9F; /* Bordure de couleur */
        }

        th, td {
            padding: 12px;
            text-align: center;
            font-size: 14px;
        }

        th {
            background-color: #459A9F; /* Couleur de fond de l'en-tête */
            color: white;             /* Texte blanc */
        }

        td {
            background-color: #CFFCFF; /* Couleur des cellules */
            color: #333;              /* Texte sombre */
        }

        /* Style des liens d'action (modifier, supprimer, voir) */
        a {
            color: #459A9F; /* Couleur des liens */
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
        <!-- Vérifier si la variable $cours est définie et contient des données -->
        <?php if (isset($cours) && count($cours) > 0): ?>
            <h1>Liste des Cours</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom du Cours</th>
                        <th>Code du Cours</th>
                        <th>Nombre d'Heures</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Afficher chaque cours dans un tableau -->
                    <?php foreach ($cours as $coursItem): ?>
                        <tr>
                            <td><?= htmlspecialchars($coursItem['id']); ?></td>
                            <td><?= htmlspecialchars($coursItem['nom_cours']); ?></td>
                            <td><?= htmlspecialchars($coursItem['code_cours']); ?></td>
                            <td><?= htmlspecialchars($coursItem['nombre_heures']); ?></td>
                            <td>
                                <a href="?controller=cours&action=show&id=<?= urlencode($coursItem['id']); ?>">Voir</a> | 
                                <a href="?controller=cours&action=edit&id=<?= urlencode($coursItem['id']); ?>">Modifier</a> | 
                                <a href="?controller=cours&action=delete&id=<?= urlencode($coursItem['id']); ?>" class="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <!-- Si aucun cours n'est trouvé -->
            <p>Aucun cours trouvé.</p>
        <?php endif; ?>
    </div>

</body>
</html>
