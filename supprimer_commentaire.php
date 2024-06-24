<?php
// Vérifier si des commentaires ont été sélectionnés pour suppression
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['commentaires'])) {
    // Inclure le fichier de connexion à la base de données
    include 'connexion_base_de_donnée.php';

    // Récupérer les commentaires sélectionnés
    $commentaires = $_POST['commentaires'];

    // Boucle à travers les commentaires sélectionnés et les supprimer un par un
    foreach ($commentaires as $commentaire_id) {
        // Préparer la requête SQL pour supprimer le commentaire de la table
        $sql = "DELETE FROM commentaire WHERE id = $commentaire_id";

        // Exécuter la requête SQL
        if ($conn->query($sql) === TRUE) {
            echo "Commentaire supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression du commentaire : " . $conn->error;
        }
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    // Si aucun commentaire n'a été sélectionné, afficher un message d'erreur
    echo "Aucun commentaire sélectionné pour suppression.";
}
// Redirection vers la page de compte
header("Location: compte.php");
exit();
?>

