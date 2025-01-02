<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Étudiant</title>
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

        .form-etudiant {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff; /* Fond blanc pour le formulaire */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #459A9F; /* Bordure avec la couleur demandée */
        }

        /* Style du titre */
        .form-etudiant h1 {
            text-align: center;
            font-size: 20px;
            color: #459A9F; /* Couleur principale pour le titre */
            margin-bottom: 20px;
        }

        /* Style des labels */
        .form-etudiant label {
            font-size: 14px;
            color: #333;
            margin-bottom: 6px;
            display: block;
        }

        /* Style des champs de texte */
        .form-etudiant input[type="text"],
        .form-etudiant input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 6px 0 12px 0;
            border: 1px solid #459A9F; /* Bordure couleur principale */
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        /* Style du bouton de soumission */
        .form-etudiant button[type="submit"] {
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

        .form-etudiant button[type="submit"]:hover {
            background-color: #367F83; /* Légère variation pour le hover */
        }

        /* Style du lien */
        .form-etudiant a {
            color: #459A9F;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .form-etudiant a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-etudiant">
        <h1>Modifier l'Étudiant</h1>

        <!-- Formulaire de modification de l'étudiant -->
        <form action="?controller=etudiants&action=update" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($etudiant['id']); ?>"> <!-- Cacher l'ID de l'étudiant -->
            
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($etudiant['nom']); ?>" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($etudiant['prenom']); ?>" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($etudiant['email']); ?>" required>

            <label for="filiere">Filière :</label>
            <input type="text" id="filiere" name="filiere" value="<?= htmlspecialchars($etudiant['filiere']); ?>" required>

            <button type="submit">Sauvegarder</button>
        </form>

        <!-- Lien pour revenir à la liste -->
        <a href="?controller=etudiants&action=index">Retour à la liste des étudiants</a>
    </div>

</body>
</html>
