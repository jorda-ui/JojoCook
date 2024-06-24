<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

	include 'connexion_base_de_donnée.php'; // Inclusion du fichier de connexion à la base de données

    // Préparer la requête SQL pour récupérer les informations de l'utilisateur
    $sql = "SELECT * FROM utilisateurs WHERE mail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // L'adresse email existe dans la base de données
        $user = $result->fetch_assoc();
        echo "Informations de l'utilisateur:<br>";
        echo "Nom: " . $user['nom'] . "<br>";
        echo "Email: " . $user['mail'] . "<br>";
		 echo '<form action="ConfirmationMotDePasse.php" method="post">
                <input type="hidden" name="email" value="' . $email . '">
                <label for="new_password">Nouveau Mot de Passe:</label>
                <input type="password" id="new_password" name="new_password" required><br><br>
                <button type="submit">Modifier le Mot de Passe</button>
              </form>';
        // Ici, vous pouvez rediriger vers une page pour modifier le mot de passe
    } else {
        echo "Aucun utilisateur trouvé avec cette adresse email.";
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
}
?>
