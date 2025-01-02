<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Client</title>
    <style>
        /* Style général de la page */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #EAC7C7; /* Couleur de fond principale */
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-client {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff; /* Fond blanc pour le formulaire */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #69193D; /* Bordure avec la couleur demandée */
        }

        /* Style du titre */
        .form-client h1 {
            text-align: center;
            font-size: 20px;
            color: #69193D; /* Couleur principale pour le titre */
            margin-bottom: 20px;
        }

        /* Style des labels */
        .form-client label {
            font-size: 14px;
            color: #333;
            margin-bottom: 6px;
            display: block;
        }

        /* Style des champs de texte */
        .form-client input[type="text"],
        .form-client input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 6px 0 12px 0;
            border: 1px solid #69193D; /* Bordure couleur principale */
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        /* Style du bouton de soumission */
        .form-client button[type="submit"] {
            background-color: #69193D; /* Couleur principale */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        .form-client button[type="submit"]:hover {
            background-color:rgb(129, 68, 95); /* Légère variation pour le hover */
        }

        /* Style du lien */
        .form-client a {
            color: #69193D;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .form-client a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-client">
        <h1>Modifier le Client</h1>

        <!-- Formulaire de modification du client -->
        <form action="?controller=client&action=update" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($client['id']); ?>"> <!-- Cacher l'ID du client -->
            
            <label for="nom">Nom du Client :</label>
            <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($client['nom']); ?>" required>

            <label for="prenom">Prénom du Client :</label>
            <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($client['prenom']); ?>" required>

            <label for="email">Email du Client :</label>
            <input type="text" id="email" name="email" value="<?= htmlspecialchars($client['email']); ?>" required>

            <label for="telephone">Numéro de Téléphone :</label>
            <input type="text" id="telephone" name="telephone" value="<?= htmlspecialchars($client['telephone']); ?>" required>

            <button type="submit">Sauvegarder</button>
        </form>
    </div>

</body>
</html>
