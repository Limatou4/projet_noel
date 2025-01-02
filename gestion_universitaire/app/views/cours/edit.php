<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Cours</title>
    <style>
        /* Style général de la page */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #CFFCFF; /* Couleur de fond principale */
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-cours {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff; /* Fond blanc pour le formulaire */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #459A9F; /* Bordure avec la couleur demandée */
        }

        /* Style du titre */
        .form-cours h1 {
            text-align: center;
            font-size: 20px;
            color: #459A9F; /* Couleur principale pour le titre */
            margin-bottom: 20px;
        }

        /* Style des labels */
        .form-cours label {
            font-size: 14px;
            color: #333;
            margin-bottom: 6px;
            display: block;
        }

        /* Style des champs de texte */
        .form-cours input[type="text"],
        .form-cours input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 6px 0 12px 0;
            border: 1px solid #459A9F; /* Bordure couleur principale */
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        /* Style du bouton de soumission */
        .form-cours button[type="submit"] {
            background-color: #459A9F; /* Couleur principale */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        .form-cours button[type="submit"]:hover {
            background-color: #367F83; /* Légère variation pour le hover */
        }

        /* Style du lien */
        .form-cours a {
            color: #459A9F;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .form-cours a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-cours">
        <h1>Modifier le Cours</h1>

        <!-- Formulaire de modification du cours -->
        <form action="?controller=cours&action=update" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($cours['id']); ?>"> <!-- Cacher l'ID du cours -->
            
            <label for="nom_cours">Nom du Cours :</label>
            <input type="text" id="nom_cours" name="nom_cours" value="<?= htmlspecialchars($cours['nom_cours']); ?>" required>

            <label for="code_cours">Code du Cours :</label>
            <input type="text" id="code_cours" name="code_cours" value="<?= htmlspecialchars($cours['code_cours']); ?>" required>

            <label for="nombre_heures">Nombre d'Heures :</label>
            <input type="number" id="nombre_heures" name="nombre_heures" value="<?= htmlspecialchars($cours['nombre_heures']); ?>" required>

            <button type="submit">Sauvegarder</button>
        </form>
    </div>

</body>
</html>
