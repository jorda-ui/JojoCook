<?php
session_start();

// Vérifier si le formulaire a été soumis et si des recettes ont été sélectionnées
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['recettes'])) {
    // Inclure le fichier de connexion à la base de données
    include 'connexion_base_de_donnée.php';

    // Récupérer le nom d'utilisateur connecté
    $nom_identifiant = $_SESSION['nom_identifiant'];

    // Vérifier si l'utilisateur est un administrateur
    $sql_check_admin = "SELECT * FROM admins WHERE nom_identifiant = '$nom_identifiant'";
    $result_check_admin = $conn->query($sql_check_admin);
    $est_admin = ($result_check_admin->num_rows > 0);

    // Parcourir les recettes sélectionnées
    foreach ($_POST['recettes'] as $titre) {
        // Préparer la requête SQL pour supprimer la recette de la table des recettes
        $sql_delete = "DELETE FROM page_recette WHERE titre = '$titre'";
        
        // Si l'utilisateur n'est pas un administrateur, limiter la suppression aux recettes créées par lui-même
        if (!$est_admin) {
            $sql_delete .= " AND nom_identifiant = '$nom_identifiant'";
        }

        // Exécuter la requête SQL pour supprimer la recette
        if ($conn->query($sql_delete) === TRUE) {
            echo "La recette '$titre' a été supprimée avec succès de la base de données.<br>";
        } else {
            echo "Erreur lors de la suppression de la recette '$titre' de la base de données : " . $conn->error . "<br>";
        }

        // Supprimer le fichier HTML correspondant à la recette
        $file_name = str_replace(' ', '_', strtolower($titre)) . '.html';
        $file_path = "D:/wamp/www/PHP/JojoCook/$file_name"; // Chemin complet vers le fichier
        if (file_exists($file_path) && unlink($file_path)) {
            echo "Le fichier '$file_name' a été supprimé avec succès.<br>";
        } else {
            echo "Erreur lors de la suppression du fichier '$file_name'.<br>";
        }
    }

    // Fermer la connexion à la base de données
    $conn->close();

    // Redirection vers la page de compte
    header("Location: compte_utilisateurs.php");
    exit();
} else {
    // Si aucune recette n'a été sélectionnée, afficher un message d'erreur
    echo "Aucune recette sélectionnée.";
}
?>






