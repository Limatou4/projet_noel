<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Étudiant</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 900px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            font-size: 30px;
            color: #333;
        }
        .student-details {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
        .back-btn {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Détails de l'Étudiant</h1>
        <div class="student-details">
            <p><strong>ID:</strong> <?= htmlspecialchars($etudiant['id']); ?></p>
            <p><strong>Nom:</strong> <?= htmlspecialchars($etudiant['nom']); ?></p>
            <p><strong>Prénom:</strong> <?= htmlspecialchars($etudiant['prenom']); ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($etudiant['email']); ?></p>
            <p><strong>Téléphone:</strong> <?= htmlspecialchars($etudiant['telephone']); ?></p>
            <p><strong>Adresse:</strong> <?= htmlspecialchars($etudiant['adresse']); ?></p>
        </div>
        <a href="?controller=etudiants&action=index" class="back-btn">Retour à la liste des étudiants</a>
    </div>

</body>
</html>
