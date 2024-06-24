<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];

    // Connexion à la base de données
    include 'connexion_base_de_donnée.php'; // Inclusion du fichier de connexion à la base de données

    // Hash du nouveau mot de passe
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Préparer la requête SQL pour mettre à jour le mot de passe
    $sql = "UPDATE utilisateurs SET mot_de_passe = ? WHERE mail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $hashed_password, $email);

    if ($stmt->execute()) {
        // Si la mise à jour est réussie
        echo "Le mot de passe a été mis à jour avec succès." ."<br>";
		 echo '<a href="Connexion.html">Cliquez ici pour vous connecter</a>';
    } else {
        // En cas d'erreur lors de la mise à jour
        echo "Erreur lors de la mise à jour du mot de passe: " . $stmt->error;
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
} else {
    // Si la requête n'est pas une requête POST
    echo "Requête invalide.";
}
?>
