<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un cours</title>
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

        /* Style spécifique au formulaire d'ajout de cours */
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
    </style>
</head>
<body>

    <!-- Formulaire d'ajout d'un cours -->
    <div class="form-cours">
        <h1>Ajouter un cours</h1>
        <form action="?controller=cours&action=store" method="POST">
            <label for="nom_cours">Nom du cours :</label>
            <input type="text" name="nom_cours" id="nom_cours" placeholder="Ex : Mathématiques" required>

            <label for="code_cours">Code du cours :</label>
            <input type="text" name="code_cours" id="code_cours" placeholder="Ex : MATH101" required>

            <label for="nombre_heures">Nombre d'heures :</label>
            <input type="number" name="nombre_heures" id="nombre_heures" placeholder="Ex : 40" required>

            <button type="submit">Ajouter</button>
        </form>
    </div>

</body>
</html>
