<?php
session_start(); // Démarrage de la session

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['nom_identifiant'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit(); // Arrêt de l'exécution du script après la redirection
}

// Inclusion du fichier de connexion à la base de données
include 'connexion_base_de_donnée.php';

// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$adresse = $_POST['adresse'];
$ville = $_POST['ville'];
$code_postal = $_POST['code_postal'];
$mail = $_POST['mail'];

// Préparation de la requête pour mettre à jour les données de l'utilisateur
$sql = "UPDATE utilisateurs SET nom = ?, prenom = ?, age = ?, adresse = ?, ville = ?, code_postal = ?, mail = ? WHERE nom_identifiant = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiisiss", $nom, $prenom, $age, $adresse, $ville, $code_postal, $mail, $_SESSION['nom_identifiant']);

// Exécution de la requête
if ($stmt->execute()) {
    // Redirection vers la page de profil ou une autre page de confirmation
    echo 'Vos donnez on était mise à Jour' .'<br>';
	echo '<a href="compte_utilisateurs.php">Cliquez ici pour vous connecter</a>';
} else {
    // En cas d'erreur lors de l'exécution de la requête
    echo "Erreur lors de la mise à jour des informations.";
}

// Fermeture du statement et de la connexion à la base de données
$stmt->close();
$conn->close();
?>
