<?php
session_start(); // Démarrage de la session

// Inclusion de l'en-tête
include 'header.php';

// Inclusion du fichier de connexion à la base de données
include 'connexion_base_de_donnée.php';

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['nom_identifiant'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit(); // Arrêt de l'exécution du script après la redirection
}

// Récupération de l'ID de session
$nom_identifiant = $_SESSION['nom_identifiant'];

// Préparation de la requête pour récupérer les données de l'utilisateur
$sql = "SELECT nom, prenom, age, adresse, ville, code_postal, mail FROM utilisateurs WHERE nom_identifiant = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nom_identifiant);
$stmt->execute();
$result = $stmt->get_result();

// Vérification si des données ont été trouvées
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Aucune information trouvée pour cet utilisateur.";
}

// Fermeture de la connexion à la base de données
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<head>
    <title>Compte utilisateur</title>
    
    <!-- Feuilles de style -->
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="compte.css" media="screen">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    
<?php
   include 'head.html';
   ?>
</head>

<body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="fr">

    <?php include 'header.php'; ?>

    <section class="u-clearfix u-image u-section-1" id="sec-a58f" data-image-width="2048" data-image-height="1388">
        <div class="u-clearfix u-sheet u-valign-bottom u-sheet-1">
            <div class="custom-expanded u-clearfix u-custom-html u-custom-html-1">
                <form method="POST" action="RemplirBase2.php">
                    <p id="titre" align="center"><u>Remplissez le formulaire suivant:</u></p>
                    <p></p>
                    <table border="0" width="400" align="center">
                        <tbody>
                            <tr>
                                <td width="200"><b>Nom</b></td>
                                <td width="200">
                                    <input type="text" name="nom" placeholder="Owczarczak" pattern="[A-Za-zÀ-ÖØ-öø-ÿ]+" value="<?php echo htmlspecialchars($row['nom']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td width="200"><b>Prénom</b></td>
                                <td width="200">
                                    <input type="text" name="prenom" placeholder="Jordan" pattern="[A-Za-zÀ-ÖØ-öø-ÿ]+" value="<?php echo htmlspecialchars($row['prenom']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td width="200"><b>Age</b></td>
                                <td width="200">
                                    <input type="number" name="age" min="0" max="120" placeholder="30" value="<?php echo htmlspecialchars($row['age']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td width="200"><b>Adresse</b></td>
                                <td width="200">
                                    <input type="text" name="adresse" placeholder="45 rue albert Letoret" value="<?php echo htmlspecialchars($row['adresse']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td width="200"><b>Ville</b></td>
                                <td width="200">
                                    <input type="text" name="ville" placeholder="Hirson" pattern="[A-Za-zÀ-ÖØ-öø-ÿ]+" value="<?php echo htmlspecialchars($row['ville']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td width="200"><b>Code postal</b></td>
                                <td width="200">
                                    <input type="text" name="code_postal" placeholder="02500" max="5" value="<?php echo htmlspecialchars($row['code_postal']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td width="200"><b>Mail</b></td>
                                <td width="200">
                                    <input type="email" name="mail" placeholder="Owczarczak.jordan@gmail.com" value="<?php echo htmlspecialchars($row['mail']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" value="Envoyer">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="reset" value="Réinitialiser le formulaire d'inscription">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </section>

    <?php
	include 'footer.php';
?>
</body>

</html>
