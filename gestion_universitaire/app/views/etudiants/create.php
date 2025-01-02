<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>
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

        /* Style spécifique au formulaire d'ajout d'étudiant */
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
    </style>
</head>
<body>

    <!-- Formulaire d'ajout d'un étudiant -->
    <div class="form-etudiant">
        <h1>Ajouter un étudiant</h1>
        <form action="?controller=etudiants&action=store" method="POST">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" placeholder="Ex : Halima" required>

            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom"  placeholder="Ex : Yahaya" required>

            <label for="email">Email :</label>
            <input type="email" name="email" id="email"  placeholder="Ex : lima@gmail.com" required>

            <label for="filiere">Filière :</label>
            <input type="text" name="filiere" id="filiere"  placeholder="Ex : Maths" required>

            <button type="submit">Ajouter</button>
        </form>
    </div>

</body>
</html>
