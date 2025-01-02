<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un client</title>
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

        /* Style spécifique au formulaire d'ajout de client */
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
            background-color:rgb(117, 59, 85); /* Légère variation pour le hover */
        }
    </style>
</head>
<body>

    <!-- Formulaire d'ajout d'un client -->
    <div class="form-client">
        <h1>Ajouter un client</h1>
        <form action="?controller=client&action=store" method="POST">
            <label for="nom">Nom du client :</label>
            <input type="text" name="nom" id="nom" placeholder="Ex : Halima" required>

            <label for="prenom">Prénom du client :</label>
            <input type="text" name="prenom" id="prenom" placeholder="Ex : Batouré" required>

            <label for="email">Email du client :</label>
            <input type="text" name="email" id="email" placeholder="Ex : lima@gmail.com" required>

            <label for="telephone">Numéro de téléphone :</label>
            <input type="text" name="telephone" id="telephone" placeholder="Ex : 0123456789" required>

            <button type="submit">Ajouter</button>
        </form>
    </div>

</body>
</html>
