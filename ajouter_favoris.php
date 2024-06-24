<?php
session_start(); // Démarrage de la session

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['nom_identifiant'])) {
    // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("Location: connexion.html");
    exit;
}

// Vérifier si la recette à ajouter aux favoris a été soumise
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['recette_id'])) {
    // Récupérer l'ID de la recette à ajouter aux favoris
    $recette_id = $_POST['recette_id'];

    include 'connexion_base_de_donnée.php'; // Inclusion du fichier de connexion à la base de données

    // Récupérer l'identifiant de l'utilisateur actuellement connecté
    $nom_identifiant = $_SESSION['nom_identifiant'];

    // Insérer la recette dans la table des favoris de l'utilisateur
    $sql = "INSERT INTO favoris (nom_identifiant, recette_id) VALUES ('$nom_identifiant', '$recette_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Recette ajoutée aux favoris avec succès."; // Afficher un message de succès
		echo "<a href='compte_utilisateurs.php'> Revenir à la page compte </a>"; // Lien pour revenir à la page de compte utilisateur
    } else {
        echo "Erreur lors de l'ajout de la recette aux favoris : " . $conn->error; // Afficher un message d'erreur s'il y a eu un problème avec la requête SQL
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    echo "Erreur : recette non spécifiée."; // Message d'erreur si aucune recette n'a été spécifiée
}
?>


