<?php
    // Démarrer une session
    session_start();
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

    <!-- En-tête de la page -->
    <header class="u-clearfix u-header u-image u-image-contain u-header fond" id="sec-c472" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="" data-image-width="250" data-image-height="125">
        <div class="u-clearfix u-sheet u-sheet-1">
            <!-- Menu de navigation -->
            <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
                <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
                    <!-- Bouton de menu (Hamburger) -->
                    <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                        <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
                        <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect></g>
                        </svg>
                    </a>
                </div>
                <div class="u-custom-menu u-nav-container nav">
                    <ul class="u-nav u-unstyled u-nav-1">
                        <!-- Liens du menu -->
                        <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Accueil.html" style="padding: 10px 20px;">Accueil</a></li>
                        <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="À-propos-de.html" style="padding: 10px 20px;">À propos de</a></li>
                        <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Contact.html" style="padding: 10px 20px;">Contact</a></li>
                        <li class="u-nav-item">
                            <?php
                                // Condition pour afficher le lien Connexion ou Compte
                                if (isset($_SESSION['nom_identifiant'])) {
                                    echo '<a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="deconnexion.php">Deconnexion</a>';
                                } else {
                                    echo '<a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Compte_utilisateur.php">Compte</a>';
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Titre de la page -->
             <h1 class="u-align-center u-text u-text-default u-text-1 nav">JojoCook</h1>
        </div>
    </header>

    <!-- Le contenu principal de la page -->
    <main class="bg-dark text">
        <div class="container">
            <div class="row">
                <div class="col-md-12 border">
                    <div class="card text-center">
                        <div class="card-body fond2">
                            <!-- Titre et description -->
                            <h5 class="card-title textTitle">Bienvenue sur votre compte !</h5>
                            <p class="card-text">Ici vous retrouverez toutes vos informations personnelles liées à ce compte et vous retrouverez vos recettes créées.</p>
                            <!-- Onglets de navigation -->
                            <div class="container mt-4">
                                <ul class="nav nav-tabs fond2">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab">Données personnelles</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fond2" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab">Création de vos recettes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="favoris-tab" data-bs-toggle="tab" href="#favoris" role="tab">Recette favoris</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="commentaires-tab" data-bs-toggle="tab" href="#commentaires" role="tab">Commentaires des utilisateurs</a>
                                    </li>
                                </ul>
                                <!-- Contenu des onglets -->
                                <div class="tab-content" id="myTabContent">
                                    <!-- Onglet "Données personnelles" -->
                                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                                        <h3 class="textTitle">Données personnelles</h3>
                                        <p>
                                            <?php
                                                // Inclure le fichier de connexion à la base de données
                                                include 'connexion_base_de_donnée.php';

                                                $nom_identifiant = $_SESSION['nom_identifiant'];
                                                $sql = "SELECT * FROM utilisateurs WHERE nom_identifiant='$nom_identifiant'";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    $row = $result->fetch_assoc();
                                                    echo "<ul>";
                                                    // Afficher les données personnelles de l'utilisateur
                                                    echo "<li>Votre nom est <span class=\"spanText\">{$row['nom']}</span></li>";
                                                    echo "<li>Votre prénom est <span class=\"spanText\">{$row['prenom']}</span></li>";
                                                    echo "<li>Votre âge est <span class=\"spanText\">{$row['age']}</span> ans</li>";
                                                    echo "<li>Votre date de naissance est <span class=\"spanText\">{$row['date_de_naissance']}</span></li>";
                                                    echo "<li>Votre adresse est <span class=\"spanText\">{$row['adresse']}</span> dans la ville de <span class=\"spanText\">{$row['ville']} {$row['code_postal']}</li></span>";
                                                    echo "<li>Votre adresse e-mail est <span class=\"spanText\">{$row['mail']}</span></li>";
                                                    echo "<li>Votre identifiant est <span class=\"spanText\">{$row['nom_identifiant']}</span></li>";
                                                    echo "<li>Votre mot de passe est <span class=\"spanText\">{$row['mot_de_passe']}</span></li>";
                                                    echo "<br><br> Attention, votre mot de passe est caché, c'est pour cela que vous avez un grand numéro !</li>";
                                                    echo "</ul>";
                                                } else {
                                                    echo "Erreur lors de la récupération des données de l'utilisateur.";
                                                }
                                            ?>
                                        </p>
                                        <br>
                                        <!-- Bouton de modification des informations -->
                                        <form action="modifiation_informations.php">
                                            <button class="btn bouton" type="submit">Modification</button>
                                        </form>
                                    </div>
                                    <!-- Onglet "Création de recettes" -->
                                    <div class="tab-pane fade" id="profile" role="tabpanel">
                                        <h3 class="textTitle">Création de recettes</h3>
                                        <p></p>
                                        <div class="container mt-4">
                                            <!-- Formulaire pour supprimer des recettes -->
                                            <form action="supprimerRecette.php" method="post">
                                                <ul class="list-group">
                                                    <?php
                                                        $sql = "SELECT * FROM page_recette WHERE nom_identifiant = '$nom_identifiant'";
                                                        $result = $conn->query($sql);

                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                $url_titre = str_replace(' ', '_', $row['titre']);
                                                                echo "<li class='list-group-item'>";
                                                                echo "<input type='checkbox' name='recettes[]' value='{$row['titre']}'><a href='{$url_titre}'>{$row['titre']}</a>";
                                                                echo "</li>";
                                                            }
                                                        } else {
                                                            echo "Vous n'avez pas encore créé de recette.";
                                                        }
                                                    ?>
                                                </ul>
                                                <br>
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                            <br>
                                            <!-- Bouton pour créer une nouvelle recette -->
                                            <form action="FormulaireRecette.php">
                                                <button type="submit" class="btn bouton">Création de votre Recette</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Onglet "Recette favoris" -->
                                    <div class="tab-pane fade" id="favoris" role="tabpanel">
                                        <h3 class="textTitle">Recette favoris</h3>
                                        <p></p>
                                        <!-- Formulaire pour supprimer des recettes des favoris -->
                                        <form action="supprimer_recette_favoris.php" method="post">
                                            <div class="container mt-4">
                                                <ul class="list-group">
                                                    <?php
                                                        $sql = "SELECT favoris.id, page_recette.titre FROM favoris INNER JOIN page_recette ON favoris.recette_id = page_recette.id_recette WHERE favoris.nom_identifiant = '$nom_identifiant'";
                                                        $result = $conn->query($sql);

                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                $url_titre = str_replace(' ', '_', $row['titre']);
                                                                echo "<li class='list-group-item'>";
                                                                echo "<input type='checkbox' name='recettes[]' value='{$row['id']}'><a href='{$url_titre}'>{$row['titre']}</a>";
                                                                echo "</li>";
                                                            }
                                                        } else {
                                                            echo "Vous n'avez pas encore ajouté de recettes aux favoris.";
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                    <!-- Onglet "Commentaires des utilisateurs" -->
                                    <div class="tab-pane fade" id="commentaires" role="tabpanel">
                                        <h3 class="textTitle">Commentaires</h3>
                                        <p>
                                            <?php
                                                // Sélectionner les commentaires de l'utilisateur connecté
                                                $nom_utilisateur = $_SESSION['nom_identifiant'];
                                                $sql = "SELECT * FROM commentaire WHERE nom_utilisateurs = '$nom_utilisateur'";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    // Afficher les commentaires de l'utilisateur connecté
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<p>Utilisateur: {$row['nom_utilisateurs']}</p>";
                                                        echo "<p>Message: {$row['message']}</p>";
                                                    }
                                                } else {
                                                    echo "Aucun commentaire trouvé pour cet utilisateur.";
                                                }

                                                // Fermer la connexion à la base de données
                                                $conn->close();
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
	
	<?php
	include 'footer.php';
?>

</body>
</html>