<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Rendez-vous</title>
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

        .form-rendezvous {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #69193D; 
        }

        /* Style du titre */
        .form-rendezvous h1 {
            text-align: center;
            font-size: 20px;
            color: #69193D; 
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
            background-color: rgb(117, 59, 85);
        }

        /* Style du lien */
        .form-rendezvous a {
            color: #69193D;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .form-rendezvous a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-rendezvous">
        <h1>Modifier le Rendez-vous</h1>

        <form action="?controller=rendezvous&action=update" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id); ?>">

    <label for="date">Date du Rendez-vous :</label>
    <input type="date" id="date" name="date" value="<?= htmlspecialchars($date); ?>" required>

    <label for="heure">Heure du Rendez-vous :</label>
    <input type="time" id="heure" name="heure" value="<?= htmlspecialchars($heure); ?>" required>

    <label for="description">Description du Rendez-vous :</label>
    <input type="text" id="description" name="description" value="<?= htmlspecialchars($description); ?>" required>

    <label for="client_id">Client associé :</label>
    <input type="number" id="client_id" name="client_id" value="<?= htmlspecialchars($client_id); ?>" required>

    <button type="submit">Sauvegarder</button>
</form>





        <!-- Lien pour revenir à la liste des rendez-vous -->
        <a href="?controller=rendezvous&action=index">Retour à la liste des rendez-vous</a>
    </div>

</body>
</html>
