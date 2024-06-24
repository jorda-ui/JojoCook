<?php
// Démarrez la session si ce n'est pas déjà fait
if (!isset($_SESSION)) {
    session_start();
}
?>

<head>
	<link rel="stylesheet" href="header.css" media="screen">
</head>
<header class="u-clearfix u-header u-image u-image-contain u-header nav" id="sec-c472" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="" data-image-width="250" data-image-height="125">
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
            <div class="u-custom-menu u-nav-container">
                <ul class="u-nav u-unstyled u-nav-1">
                    <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Accueil.html">Accueil</a></li>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="À-propos-de.html">À propos de</a></li>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Contact.html">Contact</a></li>
                    <li class="u-nav-item">
                        <?php
                        // Condition pour afficher le lien Connexion ou Compte
                        if (isset($_SESSION['nom_identifiant'])) {
                            // Vérifier si c'est un compte admin ou utilisateur
                            if (isset($_SESSION['id_admin'])) {
                                echo '<li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="compte.php">Compte</a></li>';
                            } elseif (isset($_SESSION['id_utilisateur'])) {
                                echo '<li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="compte_utilisateurs.php">Compte</a></li>';
                            }
                        } else {
                            echo '<li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Connexion.html" >Connexion</a></li>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>
        <h1 class="u-align-center u-text u-text-default u-text-1 nav">JojoCook</h1>
    </div>
</header>
