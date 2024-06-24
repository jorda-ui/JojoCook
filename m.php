<?php

// Paramètres de connexion à la base de données
$serveur = 'localhost';
$utilisateur = 'root';
$mot_de_passe_bd = '';
$base_de_donnees = 'jojocook';

// Connexion à la base de données
try {
    $bdd = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mot_de_passe_bd);
    // Active les erreurs PDO
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nomIdentifiant = $_POST["nom_identifiant"];
    $motDePasse = $_POST["mot_de_passe"];

    // Hacher le mot de passe
    $motDePasseHache = password_hash($motDePasse, PASSWORD_BCRYPT);

    // Insérer les données dans la base de données
    $requete = $bdd->prepare("INSERT INTO admins (nom_identifiant, mot_de_passe) VALUES (:nom_identifiant, :mot_de_passe)");
    $requete->bindParam(':nom_identifiant', $nomIdentifiant);
    $requete->bindParam(':mot_de_passe', $motDePasseHache);

    try {
        $requete->execute();
        echo "Enregistrement réussi.";
    } catch (PDOException $e) {
        die("Erreur d'insertion dans la base de données: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
</head>
<body>

<h2>Formulaire d'inscription</h2>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="nom_identifiant">Nom/Identifiant:</label>
    <input type="text" name="nom_identifiant" required><br>

    <label for="mot_de_passe">Mot de passe:</label>
    <input type="password" name="mot_de_passe" required><br>

    <input type="submit" value="S'inscrire">
</form>

</body>
</html>