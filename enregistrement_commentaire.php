<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['nom_identifiant'])) {
    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: connexion.html");
    exit; // Arrêter l'exécution du script
}

// Vérifier si le formulaire de commentaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    // Récupérer les données du formulaire
    $nom_utilisateur = $_SESSION['nom_identifiant'];
    $message = $_POST['message'];

    // Inclure le fichier de connexion à la base de données
    include 'connexion_base_de_donnée.php';

    // Préparer la requête SQL pour insérer le commentaire dans la table
    $sql = "INSERT INTO commentaire (nom_utilisateurs, message) VALUES ('$nom_utilisateur', '$message')";

    // Exécuter la requête SQL
    if ($conn->query($sql) === TRUE) {
        echo "Commentaire ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du commentaire : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    // Si le formulaire n'a pas été soumis, rediriger l'utilisateur ou afficher un message d'erreur
    echo "Erreur : Le formulaire de commentaire n'a pas été correctement soumis.";
}

// Rediriger l'utilisateur vers une autre page après le traitement du formulaire
header("Location: Accueil.html");
exit; // Arrêter l'exécution du script
?>


