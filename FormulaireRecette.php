<?php
// Démarrer la session
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Métadonnées -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="Bienvenue dans les recettes gourmandes​​">
  <meta name="description" content="">
  <title>Formulaire Inscription</title>
  <!-- Feuilles de style -->
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="Crêpes.css" media="screen">
  <!-- Scripts -->
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <!-- Générateur de thèmes -->
  <meta name="generator" content="Nicepage 5.20.7, nicepage.com">
  <!-- Police Google -->
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">

  <!-- Style personnalisé -->
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

  <!-- Données structurées JSON-LD -->
  <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "JojoCook",
		"logo": "images/default-logo.png"
}</script>
  <!-- Couleur du thème -->
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Recette">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>

<body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="fr">
	<?php
		// Inclure l'en-tête
		include 'header.php';
	?>
    <!-- Formulaire d'inscription -->
    <form action="traitementRecette.php" method="post">
       <!-- Section Titre -->
       <section class="u-clearfix u-container-align-center u-image u-section-1" id="sec-ee2a" data-image-width="7725"
    data-image-height="4016">
            <div class="u-size-30">
              <div class="u-layout-col">
                <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                  <div class="u-container-layout u-valign-middle u-container-layout-2">
                    <h2 class="u-custom-font u-font-raleway u-text u-text-default u-text-1">
					<label for="titre"><font font-family="Playfair Displat" color="white"><u>Titre :</u> </font></label>
                     <input type="text" name="titre">
					 <p><font color="white">Crée par l'utilisateur</font> <input type="text" name="nom" value="<?php $nom_identifiant = $_SESSION['nom_identifiant']; echo "$nom_identifiant";?>" readonly></p>
                    </h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Section Ustensiles -->
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
				<li><input type="text" name="ustensile[]"></li>
            </ul>
				   
        <button type="button" onclick="ajouterUstensile()">Ajouter un ustensile</button>
		<button type="button" onclick="enleverUstensile()">Enlever un ustensile</button>
		</div>
              </font>
            </div>
          </div>
        </div>
      </div>
    </div>
		</section>
           
<!-- Section Ingrédients -->
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
				  <li><input type="text" name="ingredient[]"></li>
            </ul>
				   
        <button type="button" onclick="ajouterIngredient()">Ajouter un ingrédient</button>
		<button type="button" onclick="enleverIngredient()">Enlever un ingredient</button>
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
        
<!-- Section Préparation et Cuisson -->
<section class="u-clearfix u-image u-section-5" id="sec-4f8a" data-image-width="7725" data-image-height="4016"
    data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h3 class="u-custom-font u-font-playfair-display u-text u-text-default u-text-1">
        <font><u><label for="Preparation">Preparation :</u></label>
        <input type="text" name="preparation" placeholder="Temps de la recette"><br><u><label for="cuisson">Cuisson :</u></label>
        <input type="text" name="cuisson" placeholder="Temps de la cuisson"></font>
      </h3>
      <div class="data-layout-selected u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-col">
            <div class="u-container-style u-layout-cell u-size-20 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
			  <ol id="listeEtapes">
                <li><input type="text" name="etape[]"></li>
            </ol>
    
         <button type="button" onclick="ajouterEtape()">Ajouter une étape</button>
        <button type="button" onclick="enleverEtape()">Enlever une étape</button>
        </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  
  <!-- Section bouton de soumission -->
  <section class="u-clearfix u-image u-section-5" id="sec-4f8a" data-image-width="7725" data-image-height="4016"
    data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
            <div class="u-container-style u-layout-cell u-size-20 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
				<input type="submit" value="Créer la page">
				</div>
            </div>
  </section>
				
<!-- Pied de page -->
<footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-7a7f">
    <div class="u-clearfix u-sheet u-sheet-1">
      <!-- Texte du pied de page -->
      <p class="u-small-text u-text u-text-variant u-text-1">Terms & conditions | Privacy Policy | Loi RGPD</p>
    </div>
  </footer>
  
    </form>
    <!-- Scripts JavaScript -->
    <script>
        function ajouterUstensile() {
            var ustensile = document.createElement("li");
            ustensile.innerHTML = '<input type="text" name="ustensile[]">';
            document.getElementById("listeUstensiles").appendChild(ustensile);
        }

        function ajouterIngredient() {
            var ingredient = document.createElement("li");
            ingredient.innerHTML = '<input type="text" name="ingredient[]">';
            document.getElementById("listeIngredients").appendChild(ingredient);
        }

        function ajouterEtape() {
            var etape = document.createElement("li");
            etape.innerHTML = '<input type="text" name="etape[]">';
            document.getElementById("listeEtapes").appendChild(etape);
        }
		
		function enleverUstensile() {
    var listeUstensiles = document.getElementById("listeUstensiles");
    var dernierUstensile = listeUstensiles.lastElementChild;
    if (dernierUstensile) {
        listeUstensiles.removeChild(dernierUstensile);
    }
}

function enleverIngredient() {
    var listeIngredients = document.getElementById("listeIngredients");
    var dernierIngredient = listeIngredients.lastElementChild;
    if (dernierIngredient) {
        listeIngredients.removeChild(dernierIngredient);
    }
}

function enleverEtape() {
    var listeEtapes = document.getElementById("listeEtapes");
    var derniereEtape = listeEtapes.lastElementChild;
    if (derniereEtape) {
        listeEtapes.removeChild(derniereEtape);
    }
}
    </script>
</body>

</html>
