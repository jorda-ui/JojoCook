<?php
// Connexion à la base de données (à ajuster selon vos informations)
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'jojocook';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
$titre = isset($_POST['titre']) ? $_POST['titre'] : '';
$nom_identifiant = isset ($_POST['nom']) ? $_POST['nom'] : '';
$listeUstensiles = isset($_POST['ustensile']) ? $_POST['ustensile'] : [];
$listeIngredients = isset($_POST['ingredient']) ? $_POST['ingredient'] : [];
$preparation = isset($_POST['preparation']) ? $_POST['preparation'] : '';
$cuisson = isset($_POST['cuisson']) ? $_POST['cuisson'] : '';
$etapes = isset($_POST['etape']) ? $_POST['etape'] : [];

// Échapper les caractères spéciaux pour éviter les injections SQL
$titre = $conn->real_escape_string($titre);
$nom_identifiant = $conn->real_escape_string($nom_identifiant);
$preparation = $conn->real_escape_string($preparation);
$cuisson = $conn->real_escape_string($cuisson);

// Insérer les données dans la base de données
$sql = "INSERT INTO page_recette (titre,nom_identifiant ,preparation, cuisson) VALUES ('$titre','$nom_identifiant','$preparation', '$cuisson')";

if ($conn->query($sql) === TRUE) {
    $id_recette = $conn->insert_id;
    // Insérer les ustensiles dans la base de données
    foreach ($listeUstensiles as $ustensile) {
        $ustensile = $conn->real_escape_string($ustensile);
        $sql = "INSERT INTO ustensile (id_recette, nom) VALUES ('$id_recette', '$ustensile')";
        $conn->query($sql);
    }
    // Insérer les ingrédients dans la base de données
    foreach ($listeIngredients as $ingredient) {
        $ingredient = $conn->real_escape_string($ingredient);
        $sql = "INSERT INTO ingredient (id_recette, nom) VALUES ('$id_recette', '$ingredient')";
        $conn->query($sql);
    }
    // Insérer les étapes dans la base de données
    foreach ($etapes as $etape) {
        $etape = $conn->real_escape_string($etape);
        $sql = "INSERT INTO etape (id_recette, texte) VALUES ('$id_recette', '$etape')";
        $conn->query($sql);
    }

    // Créer un fichier HTML pour la page web
    $file_name = str_replace(' ', '_', strtolower($titre)) . '.html';
     $file_content = <<<EOD
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Bienvenue dans les recettes gourmandes​​">
  <meta name="description" content="">
  <title>$titre</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="Crêpes.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 5.20.7, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
<style>
    u {
      color: white;
    }
	 /* Style des boutons */
    button {
      padding: 3px 8px;
      font-size: 12px;
    }
  .ingredient-item::marker {
    color: white;
  }
  
  .white-text {
        color: white;
    }

  </style>

  <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "JojoCook",
		"logo": "images/default-logo.png"
}</script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Recette">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>
<body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="fr">

<header class="u-clearfix u-header u-image u-image-contain u-header" id="sec-c472" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="" data-image-width="250" data-image-height="125">
    <div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
            <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
                <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                    <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
                    <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect></g>
                    </svg>
                </a>
            </div>
        </nav>
        <h1 class="u-align-center u-text u-text-default u-text-1">JojoCook</h1>
    </div>
</header>

<section class="u-clearfix u-container-align-center u-image u-section-1" id="sec-ee2a" data-image-width="7725"
    data-image-height="4016">
            <div class="u-size-30">
              <div class="u-layout-col">
                <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                  <div class="u-container-layout u-valign-middle u-container-layout-2">
                    <h2 class="u-custom-font u-font-raleway u-text u-text-default u-text-1">
					<label for="titre"><font font-family="Playfair Displat" color="white"><u>$titre :</u> </font></label>
					<p><font color="white">Crée par l'utilisateur $nom_identifiant </font></p>
                    </h2>
                    </font>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

	<section class="u-clearfix u-image u-section-3" id="sec-5232" data-image-width="7725" data-image-height="4016"
    data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h3 class="u-custom-font u-font-playfair-display u-text u-text-default u-text-1">
        <font color="white"><u>Les ustensiles</u></font>
      </h3>
      <div class="data-layout-selected u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1"></div>
            </div>
            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
              <div class="u-container-layout u-container-layout-2">
                <img class="u-image u-image-round u-radius-10 u-image-1" src="images/ustensiles.jpg" alt=""
                  data-image-width="612" data-image-height="408">
                <ul
                  class="u-custom-font u-custom-list u-font-playfair-display u-text u-text-custom-color-1 u-text-default u-text-2" id="listeUstensiles">
				</ul>
            
EOD;
    foreach ($listeUstensiles as $ustensile) {
        $file_content .= "<li><font color='white'>$ustensile</font></li>\n";
    }
    $file_content .= <<<EOD
            </ul>
				   
		</div>
              </font>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
EOD;

	$file_content .= <<<EOD
	<section class="u-clearfix u-image u-section-4" id="sec-2e03" data-image-width="7725" data-image-height="4016"
    data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h3 class="u-custom-font u-font-playfair-display u-text u-text-default u-text-1">
        <font color="white"><u>Ingrédients</u></font>
      </h3>
      <div class="data-layout-selected u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
                <div class="u-clearfix u-custom-html u-expanded-width u-custom-html-1">
                  <p>
				  <ul
                  class="u-custom-font u-custom-list u-font-playfair-display u-text u-text-custom-color-1 u-text-default u-text-2" id="listeIngredients" >
EOD;
	
    foreach ($listeIngredients as $ingredient) {
        $file_content .= "<li><font color='white'>$ingredient</font></li>\n";
    }
    $file_content .= <<<EOD
	</ul>
		</div>
              </div>
            </div>
            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
              <div class="u-container-layout u-valign-middle u-container-layout-2">
                <img class="u-image u-image-round u-radius-10 u-image-1" src="images/Ingrdients_crpes.jpg" alt=""
                  data-image-width="652" data-image-height="438">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
EOD;
    $file_content .= <<<EOD
	<section class="u-clearfix u-image u-section-5" id="sec-4f8a" data-image-width="7725" data-image-height="4016"
    data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h3 class="u-custom-font u-font-playfair-display u-text u-text-default u-text-1">
        <font><u><label for="Preparation">Preparation :$preparation</u></label>
        <br><u><label for="cuisson">Cuisson : $cuisson</u></label>
        </font>
      </h3>
      <div class="data-layout-selected u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-col">
            <div class="u-container-style u-layout-cell u-size-20 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
			  <h3 class="u-custom-font u-font-playfair-display u-text u-text-default u-text-1">
        <font><u><label for="Preparation">Etapes:</u></label>
        </font>
      </h3>
			  <ol id="listeEtapes">
			  
EOD;
	
    foreach ($etapes as $etape) {
        $file_content .= "<li><font color='white'>$etape</font></li>\n";
    }
	
	$file_content .= <<<EOD
	</ol>
	
	</div>
            </div>
          </div>
        </div>
      </div>
  </section>
  
EOD;

	$file_content .= <<<EOD
	<footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-7a7f">
    <div class="u-clearfix u-sheet u-sheet-1">
      <p class="u-small-text u-text u-text-variant u-text-1">Exemple de texte. Cliquez pour sélectionner l'élément de
        texte.</p>
    </div>
  </footer>
  <section class="u-backlink u-clearfix u-grey-80">
    <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
      <span>Website Templates</span>
    </a>
    <p class="u-text">
      <span>created with</span>
    </p>
    <a class="u-link" href="" target="_blank">
      <span>Website Builder Software</span>
    </a>.
  </section>
  </section><span
    style="height: 64px; width: 64px; margin-left: 0px; margin-right: auto; margin-top: 0px; background-image: none; right: 20px; bottom: 20px; padding: 15px"
    class="u-back-to-top u-icon u-icon-circle u-opacity u-opacity-85 u-palette-1-base" data-href="#">
    <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 551.13 551.13">
      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-1d98"></use>
    </svg>
    <svg class="u-svg-content" enable-background="new 0 0 551.13 551.13" viewBox="0 0 551.13 551.13"
      xmlns="http://www.w3.org/2000/svg" id="svg-1d98">
      <path d="m275.565 189.451 223.897 223.897h51.668l-275.565-275.565-275.565 275.565h51.668z"></path>
    </svg>
  </span>
EOD;
	
    $file_content .= "</body>\n";
    $file_content .= "</html>";


	// Enregistrer le fichier dans le répertoire spécifié
file_put_contents($file_name, $file_content);


    echo "Page créée avec succès !";
	echo "<a href='compte_utilisateurs.php'> Revenir a la page compte </a>";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>









