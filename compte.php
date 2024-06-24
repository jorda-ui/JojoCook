<?php
  // Démarrez la session si ce n'est pas déjà fait
  session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Compte Admin</title>
  <!-- Feuilles de style -->
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="compte.css" media="screen">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
  
  <?php
	include 'head.html';
  ?>
</head>

<body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="fr">

<!-- En-tête -->
<header class="u-clearfix u-header u-image u-image-contain u-header fond" id="sec-c472" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="" data-image-width="250" data-image-height="125">
  <div class="u-clearfix u-sheet u-sheet-1">
    <!-- Menu de navigation -->
    <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
      <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
        <!-- Bouton de menu (hamburger) -->
        <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
          <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
          <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
            <g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect></g>
          </svg>
        </a>
      </div>
      <div class="u-custom-menu u-nav-container">
        <!-- Liste des éléments de menu -->
        <ul class="u-nav u-unstyled u-nav-1 nav">
          <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Accueil.html" style="padding: 10px 20px;">Accueil</a></li>
          <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="À-propos-de.html" style="padding: 10px 20px;">À propos de</a></li>
          <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Contact.html" style="padding: 10px 20px;">Contact</a></li>
          <li class="u-nav-item">
            <?php
              // Condition pour afficher le lien Connexion ou Compte
              if (isset($_SESSION['id_admin'])) {
                echo '<li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="deconnexion.php">Deconnexion</a></li>';
              } else {
                echo '<li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Compte_utilisateur.php" >Compte</a></li>';
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

<!-- Le contenu principal -->
<main class="bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-12 border text-center">
        <div class="card text-center">
          <div class="card-body fond2 text">
            <h5 class="card-title">Bienvenue sur votre compte Admin!</h5>
            <p class="card-text">Ici vous retrouverez toutes vos informations personnelles liées à ce site internet.</p>

            <div class="container mt-4">
              <!-- Onglets pour les différentes sections -->
              <ul class="nav nav-tabs fond2">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab">Liste utilisateurs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab">Liste des recettes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="commentaires-tab" data-bs-toggle="tab" href="#commentaires" role="tab">Commentaires des utilisateurs</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <!-- Section pour la liste des utilisateurs -->
                <div class="tab-pane fade show active" id="home" role="tabpanel">
                  <h3 class="textTitle"><u>Liste utilisateurs</u></h3>
                  <p>
                    <!-- Formulaire pour supprimer des utilisateurs -->
                    <form action="supprimerUtilisateur.php" method="post">
                      <?php
                        include 'connexion_base_de_donnée.php';

                        // Récupérer les utilisateurs depuis la base de données
                        $sql = "SELECT * FROM utilisateurs";
                        $result = $conn->query($sql);

                        // Vérifier s'il y a des résultats
                        if ($result !== false && $result->num_rows > 0) {
                          // Afficher les données dans un tableau
                          echo "<table border='1' >
                                  <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Age</th>
                                    <th>Date de Naissance</th>
                                    <th>Adresse</th>
                                    <th>Ville</th>
                                    <th>Code Postal</th>
                                    <th>Mail</th>
                                    <th>Nom Identifiant</th>
                                    <th>Sélectionner</th>
                                  </tr>";

                          while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['nom']}</td>
                                    <td>{$row['prenom']}</td>
                                    <td>{$row['age']}</td>
                                    <td>{$row['date_de_naissance']}</td>
                                    <td>{$row['adresse']}</td>
                                    <td>{$row['ville']}</td>
                                    <td>{$row['code_postal']}</td>
                                    <td>{$row['mail']}</td>
                                    <td>{$row['nom_identifiant']}</td>
                                    <td><input type='checkbox' name='utilisateurs[]' value='{$row['nom_identifiant']}'></td>
                                  </tr>";
                          }

                          echo "</table>";
                        } else {
                          echo "Aucun utilisateur trouvé.";
                        }

                        // Fermer la connexion à la base de données
                        $conn->close();
                      ?>
                      <br>
                      <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                  </p>
                </div>
                <!-- Section pour la liste des recettes -->
                <div class="tab-pane fade" id="profile" role="tabpanel">
                  <h3 class="textTitle"><u>Liste des recettes</u></h3>
                  <p></p>
                  <div class="container mt-4">
                    <form action="supprimerRecette.php" method="post">
                      <?php
                        include 'connexion_base_de_donnée.php';

                        // Récupérer les recettes depuis la base de données
                        $sql = "SELECT * FROM page_recette";
                        $result = $conn->query($sql);

                        // Vérifier s'il y a des résultats
                        if ($result !== false && $result->num_rows > 0) {
                          // Afficher les données dans un tableau
                          echo "<table border='1'>
                                  <tr>
                                    <th>Titre</th>
                                    <th>Nom</th>
                                    <th>ListeUstensiles</th>
                                    <th>ListeIngredients</th>
                                    <th>Etapes</th>
                                    <th>Preparation</th>
                                    <th>Cuisson</th>
                                    <th>Lien</th>
                                    <th>Sélectionner</th>
                                  </tr>";

                          while ($row = $result->fetch_assoc()) {
                            $url_titre = str_replace(' ', '_', $row['titre']);
                            echo "<tr>
                                    <td>{$row['titre']}</td>
                                    <td>{$row['nom_identifiant']}</td>
                                    <td>{$row['listeUstensiles']}</td>
                                    <td>{$row['listeIngredients']}</td>
                                    <td>{$row['Etapes']}</td>
                                    <td>{$row['preparation']}</td>
                                    <td>{$row['cuisson']}</td>
                                    <td><a href='{$url_titre}'>{$row['titre']}</a></td>
                                    <td><input type='checkbox' name='recettes[]' value='{$row['titre']}'></td>
                                  </tr>";
                          }

                          echo "</table>";
                        } else {
                          echo "Aucune recette trouvée.";
                        }

                        // Fermer la connexion à la base de données
                        $conn->close();
                      ?>
                      <br>
                      <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                  </div>
                </div>
                <!-- Section pour les commentaires des utilisateurs -->
                <div class="tab-pane fade" id="commentaires" role="tabpanel">
                  <h3 class="textTitle"><u>Commentaires des utilisateurs</h3></u>
                  <p>
                    <?php
                      // Inclure le fichier de connexion à la base de données
                      include 'connexion_base_de_donnée.php';

                      // Sélectionner tous les commentaires
                      $sql = "SELECT * FROM commentaire";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        echo "<form action='supprimer_commentaire.php' method='post'>";
                        echo "<table border='1'>";
                        echo "<tr><th>Utilisateur</th><th>Message</th><th>Supprimer</th></tr>";
                        // Afficher les commentaires dans un tableau avec une case à cocher et un bouton supprimer
                        while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>{$row['nom_utilisateurs']}</td>";
                          echo "<td>{$row['message']}</td>";
                          echo "<td><input type='checkbox' name='commentaires[]' value='{$row['id']}'></td>";
                          echo "</tr>";
                        }
                        echo "</table>";
                        echo "<button type='submit' class='btn btn-danger'>Supprimer</button>";
                        echo "</form>";
                      } else {
                        echo "Aucun commentaire trouvé.";
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