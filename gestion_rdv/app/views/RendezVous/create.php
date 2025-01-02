<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un rendez-vous</title>
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

        /* Style spécifique au formulaire d'ajout de rendez-vous */
        .form-rendezvous {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff; /* Fond blanc pour le formulaire */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #69193D; /* Bordure avec la couleur demandée */
        }

        /* Style du titre */
        .form-rendezvous h1 {
            text-align: center;
            font-size: 20px;
            color: #69193D; /* Couleur principale pour le titre */
            margin-bottom: 20px;
        }

        /* Style des labels */
        .form-rendezvous label {
            font-size: 14px;
            color: #333;
            margin-bottom: 6px;
            display: block;
        }

        /* Style des champs de texte */
        .form-rendezvous input[type="text"],
        .form-rendezvous input[type="datetime-local"],
        .form-rendezvous input[type="time"] {
            width: 100%;
            padding: 10px;
            margin: 6px 0 12px 0;
            border: 1px solid #69193D; /* Bordure couleur principale */
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        /* Style du bouton de soumission */
        .form-rendezvous button[type="submit"] {
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

        .form-rendezvous button[type="submit"]:hover {
            background-color:rgb(135, 58, 93); /* Légère variation pour le hover */
        }
    </style>
</head>
<body>

    <!-- Formulaire d'ajout de rendez-vous -->
    <div class="form-rendezvous">
        <h1>Ajouter un rendez-vous</h1>
        <form action="?controller=rendezvous&action=store" method="POST">
            <label for="date">Date :</label>
            <input type="datetime-local" name="date" id="date" required>

            <label for="heure">Heure :</label>
            <input type="time" name="heure" id="heure" required>

            <label for="description">Description :</label>
            <input type="text" name="description" id="description" placeholder="Ex : Consultation" required>

            <label for="client_id">ID Client :</label>
            <input type="text" name="client_id" id="client_id" placeholder="Ex : 1" required>

            <button type="submit">Ajouter</button>
        </form>
    </div>

</body>
</html>
