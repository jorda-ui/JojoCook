<?php
// Inclure le fichier de connexion à la base de données
include 'connexion_base_de_donnée.php';

// Vérifier si le formulaire a été soumis et si des utilisateurs ont été sélectionnés
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['utilisateurs'])) {
    // Récupérer les noms d'utilisateur sélectionnés
    $utilisateurs = $_POST['utilisateurs'];

    // Parcourir chaque utilisateur sélectionné
    foreach ($utilisateurs as $nom_identifiant) {
        // Échapper les caractères spéciaux pour éviter les injections SQL
        $nom_identifiant = $conn->real_escape_string($nom_identifiant);

        // Préparer la requête SQL pour supprimer l'utilisateur de la base de données
        $sql = "DELETE FROM utilisateurs WHERE nom_identifiant = '$nom_identifiant'";

        // Exécuter la requête SQL pour supprimer l'utilisateur
        if ($conn->query($sql) === TRUE) {
            echo "Utilisateur $nom_identifiant supprimé avec succès.<br>";
        } else {
            echo "Erreur lors de la suppression de l'utilisateur $nom_identifiant : " . $conn->error . "<br>";
        }
    }
} else {
    // Si aucun utilisateur n'a été sélectionné, afficher un message d'erreur
    echo "Aucun utilisateur sélectionné.";
}

// Fermer la connexion à la base de données
$conn->close();

// Redirection vers la page de compte
header("Location: compte.php");
exit();
?>

