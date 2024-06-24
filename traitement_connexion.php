<?php
// Démarrer une session
session_start();

// Inclure le fichier de connexion à la base de données
include 'connexion_base_de_donnée.php';

// Récupérer le nom d'utilisateur et le mot de passe depuis le formulaire
$nom_identifiant = $conn->real_escape_string($_POST['nom_identifiant']);
$mot_de_passe = $_POST['mot_de_passe'];

// Requête pour vérifier si c'est un compte admin
$sqlAdmin = "SELECT * FROM admins WHERE nom_identifiant=?";
$stmtAdmin = $conn->prepare($sqlAdmin);
$stmtAdmin->bind_param("s", $nom_identifiant);
$stmtAdmin->execute();
$resultAdmin = $stmtAdmin->get_result();

// Requête pour vérifier si c'est un compte utilisateur normal
$sqlUser = "SELECT * FROM utilisateurs WHERE nom_identifiant=?";
$stmtUser = $conn->prepare($sqlUser);
$stmtUser->bind_param("s", $nom_identifiant);
$stmtUser->execute();
$resultUser = $stmtUser->get_result();

// Vérifier les résultats des requêtes
if ($resultAdmin->num_rows == 1) {
    // C'est un compte admin
    $rowAdmin = $resultAdmin->fetch_assoc();

    // Vérifier le mot de passe
    if (password_verify($mot_de_passe, $rowAdmin['mot_de_passe'])) {
        // Définir les variables de session pour l'admin
        $_SESSION['nom_identifiant'] = $nom_identifiant;
        $_SESSION['id_admin'] = $rowAdmin['id'];

        // Redirection vers la page d'accueil
        header("Location: Accueil.html");
        exit();
    } else {
        // Mot de passe incorrect pour le compte admin
        echo "Mot de passe incorrect pour le compte admin";
        echo "<br><a href='Connexion.html'> Revenez à la page connexion </a>";
    }
} elseif ($resultUser->num_rows == 1) {
    // C'est un compte utilisateur normal
    $rowUser = $resultUser->fetch_assoc();

    // Vérifier le mot de passe
    if (password_verify($mot_de_passe, $rowUser['mot_de_passe'])) {
        // Définir les variables de session pour l'utilisateur normal
        $_SESSION['nom_identifiant'] = $nom_identifiant;
        $_SESSION['id_utilisateur'] = $rowUser['id'];

        // Redirection vers la page d'accueil
        header("Location: Accueil.html");
        exit();
    } else {
        // Mot de passe incorrect pour le compte utilisateur normal
        echo "Mot de passe incorrect pour le compte utilisateur";
        echo "<br><a href='Connexion.html'> Revenez à la page connexion </a>";
    }
} else {
    // Nom d'utilisateur incorrect
    echo "Nom d'utilisateur incorrect";
    echo "<br><a href='Connexion.html'> Revenez à la page connexion </a>";
}

// Fermer les déclarations et la connexion à la base de données
$stmtAdmin->close();
$stmtUser->close();
$conn->close();
?>








