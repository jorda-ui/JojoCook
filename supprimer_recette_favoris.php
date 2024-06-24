<?php
session_start();

// Vérifier si des recettes ont été cochées pour la suppression
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['recettes'])) {
    // Inclure le fichier de connexion à la base de données
    include 'connexion_base_de_donnée.php';

    // Récupérer l'identifiant de l'utilisateur actuellement connecté
    $nom_identifiant = $_SESSION['nom_identifiant'];

    // Récupérer les recettes cochées à supprimer
    $recettes_a_supprimer = $_POST['recettes'];

    // Supprimer les recettes sélectionnées de la table des favoris
    foreach ($recettes_a_supprimer as $recette_id) {
        $sql = "DELETE FROM favoris WHERE id = $recette_id AND nom_identifiant = '$nom_identifiant'";
        if ($conn->query($sql) !== TRUE) {
            echo "Erreur lors de la suppression de la recette de favoris : " . $conn->error;
            exit;
        }
    }

    // Rediriger vers une page compte
    header("Location: compte_utilisateurs.php");
    exit;
} else {
    // Si aucune recette n'a été cochée, afficher un message d'erreur
    echo "Erreur : aucune recette sélectionnée pour la suppression.";
}
?>

